<?php
require_once __DIR__ . '/account-manager.php';

session_start();

if (isset($_POST['email'], $_POST['password'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $account = $account_manager->login('email', $email, $password);
   if ($account) {
      $_SESSION['login_error'] = '';
      header('location: ../office/');
   } else {
      $_SESSION['login_error'] = 'Неверный email или пароль';
      header('location: ../login/');
   }
}
else {
   $_SESSION['login_error'] = 'Заполните все поля формы входа';
   header('location: ../login/');
}