<?php
require_once __DIR__ . '/account-manager.php';

session_start();

if (isset($_POST['email'], $_POST['name'], $_POST['pwd0'], $_POST['pwd1'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];

   $pwd0 = $_POST['pwd0'];
   $pwd1 = $_POST['pwd1'];

   if ($pwd0 != $pwd1) {
      $_SESSION['register_error'] = 'Введённые пароли не совпадают';
      header('location: ../login/');
      die;
   }

   $password = $pwd0;

   if (!$account_manager->exists('email', $email)) {

      $_SESSION['register_error'] = '';
      $account = $account_manager->register('email', $email, $password);
      $account->name = $name;

      $res = $db->at_path('accounts/__tpl__')->duplicate();
      $account->field_id = $res->new_field_id;

      $item = $account->item();
      $item->update('key', 'account'.$item->id);
      $item->update('name', 'Аккаунт '.$name);

      header('location: ../office/');

   } else {
      $_SESSION['register_error'] = 'Аккаунт с таким email уже существует';
      header('location: ../login/');
      die;
   }
   
}
else {
   $_SESSION['register_error'] = 'Заполните все поля формы регистрации';
   header('location: ../login/');
}