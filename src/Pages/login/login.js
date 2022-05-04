import './../../bundle';
import md5 from 'md5';

// Code libs and plugins
import { globalEventone } from '../../Plugins/eventone.js';

globalEventone();

$('.button_input-controls-eye').on('click', e => {
   e.preventDefault();

   const $input = $('.button_input-controls-eye').parent().prev('input');
   if ($input.attr('type') == 'password') $input.attr('type', 'text')
   else $input.attr('type', 'password');
});

function isPasswordsEqual($inputsPassword) {
   const values = $inputsPassword.map((i, input) => input.value);
   return values[0] == values[1];
}

const $inputsPassword = $('.login_register-input .input-controls__input[type="password"]');

const $messagePasswordsCorrect = $('.office_password-message [role="correct"]');
const $messagePasswordsError = $('.office_password-message [role="error"]');
const $messagePasswordsFree = $('.office_password-message [role="free"]');

const $messagesPasswords = [$messagePasswordsCorrect, $messagePasswordsError, $messagePasswordsFree];
$messagesPasswords.slideUpAll = function () {
   this.forEach($message => $message.slideUp(0));
};

const $changePasswordButton = $('.login_register-button');
$changePasswordButton.enable = function () { this.removeAttr('disabled'); };
$changePasswordButton.disable = function () { this.attr('disabled', 'disabled'); };

const passwordTimediffer = new Timediffer(500);
$inputsPassword.on('keyup', e => $changePasswordButton.disable() || passwordTimediffer.ifReached(() => {
   if (e.target.value == '') {
      $messagesPasswords.slideUpAll();
      $messagePasswordsFree.slideDown();
   } else if (!isPasswordsEqual($inputsPassword)) {
      $messagesPasswords.slideUpAll();
      $messagePasswordsError.slideDown();
   } else {
      $messagesPasswords.slideUpAll();
      $messagePasswordsCorrect.slideDown();
      $changePasswordButton.enable();
   }
}));

$('#formLogin').on('submit', e => {
   let $passwordView = $('#loginPasswordView > input');
   let $password = $('#loginPassword');
   
   $password.val(md5($passwordView.val()));
   $passwordView.remove();

   return true;
});
$('#formRegister').on('submit', e => {
   let $passwordView0 = $('#registerPass0View > input');
   let $passwordView1 = $('#registerPass1View > input');
   let $password0 = $('#registerPass0');
   let $password1 = $('#registerPass1');
   
   $password0.val(md5($passwordView0.val()));
   $password1.val(md5($passwordView1.val()));
   $passwordView0.remove();
   $passwordView1.remove();

   return true;
});


import './../../Blocks/product/product';
import './../../Blocks/product-office/product-office';
import './../../Blocks/recommended-products/recommended-products';
