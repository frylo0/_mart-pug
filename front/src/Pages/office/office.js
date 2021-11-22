import './../../bundle';

// Code libs and plugins
import { globalEventone } from '../../Plugins/eventone.js';

globalEventone();

$('.button_input-controls-eye').on('click', e => {
   const $input = $('.button_input-controls-eye').parent().prev('input');
   if ($input.attr('type') == 'password') $input.attr('type', 'text')
   else $input.attr('type', 'password');
});

function isPasswordsEqual($inputsPassword) {
   const values = $inputsPassword.map((i, input) => input.value);
   return values[0] == values[1];
}

const $inputsPassword = $('.input-controls__input[type="password"]');

const $messagePasswordsCorrect = $('.office_password-message [role="correct"]');
const $messagePasswordsError = $('.office_password-message [role="error"]');
const $messagePasswordsFree = $('.office_password-message [role="free"]');

const $messagesPasswords = [$messagePasswordsCorrect, $messagePasswordsError, $messagePasswordsFree];
$messagesPasswords.slideUpAll = function () {
   this.forEach($message => $message.slideUp(0));
};

const $changePasswordButton = $('.office_change-password-button');
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

import './../../Blocks/product/product';
import './../../Blocks/product-office/product-office';
import './../../Blocks/recommended-products/recommended-products';
