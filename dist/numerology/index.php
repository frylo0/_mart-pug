<?php
require_once __DIR__ . '/../../../just-field/dist/__php/jf.php';
$reg->path_to_jf_php_folder = '../../../../just-field/dist/__php/';
?><?php
function url_query_decode() {
   $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   $query_start_pos = strrpos($actual_link, '?');
   if ($query_start_pos === false)
      $query_start_pos = mb_strlen($actual_link) - 1;
   $actual_query = substr($actual_link, $query_start_pos+1);
   
   $query_parts = [];
   if ($actual_query)
      $query_parts = explode('&', $actual_query);
   $query = [];
   foreach ($query_parts as $query_part) {
      if (strpos($query_part, '=') !== false) {
         $split = explode('=', $query_part);
         $query[$split[0]] = urldecode($split[1]);
      }
      else {
         $query[$query_part] = '';
      }
   }
   
   return $query;
}

function url_query_update($prop, $value) {
   $query = url_query_decode();
   
   $query[$prop] = $value;
   
   $target_link = './?';
   foreach ($query as $prop => $value)
      $target_link .= "$prop=$value&";
   $target_link = substr($target_link, 0, -1);

   return $target_link;
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Нумерология | Шпаргалка для лучшей жизни</title>
    <link rel="apple-touch-icon" sizes="57x57" href="../apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  <link href="../numerology/numerology.bundle.css" rel="stylesheet"></head>
  <body>
    <header class="header fix top0 left0 w100">
      <div class="devicer mA">
        <div class="header__wrapper row aic mA">
          <div class="header__logo"><a class="cup" href="./shop"><img src="<?= fi(47) ?>"></a></div>
          <div class="header__menu-wrapper col tar"><span class="header__slogan header__slogan_pc ff-ars-i fwn"><?= fi(49) ?> <a class="link dib shadow_link" href="#"><?= fi(50) ?></a></span>
            <div class="header__menu rel">
              <div class="header__menu-underline header__menu-underline_main abs"></div>
              <div class="header__menu-underline abs"></div>
              <div class="header__menu-content"><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../home">Главная</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../about-me">Обо мне</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../about-project">О проекте</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../consult">Консультации психолога</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../event">Мероприятия</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../numerology">Нумерология</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../shop">Магазин шпаргалок</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../blog">Блог</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../home#contacts">Контакты</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../office">Личный кабинет</a>
              </div>
            </div>
          </div>
        </div>
        <div class="header__slogan_mobile row jcsb aic">
          <div class="header__mobile-line"></div><span class="header__slogan ff-ars-i fwn"><?= fi(49) ?> <a class="link dib shadow_link" href="#"><?= fi(50) ?></a></span>
        </div>
      </div>
    </header>
    <button class="button rel cup scroll-top-button fix right2 bottom2 dn">
      <div class="button__inflation button__inflation_1 abs"></div>
      <div class="button__inflation button__inflation_2 abs"></div>
      <div class="button__inflation button__inflation_3 abs"></div>
      <div class="button__inflation button__inflation_4 abs"></div>
      <div class="button__inflation button__inflation_5 abs"></div>
      <div class="button__inflation button__inflation_6 abs"></div>
      <div class="arrow rel">
        <svg class="abs" width="24" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg) translate(50%, 50%);">
          <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="#000"></path>
        </svg>
      </div>
    </button>
    <div class="devicer mA rel page__content">
      <div class="numero-menu">
        <center class="title ff-ars-b title_numerology">Нумерология</center>
        <div class="diashad">
          <div class="diashad__shadow diashad_only-mobile" style="
         background: linear-gradient(97.1deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.3), rgba(246, 211, 206, 0));
         transform: rotate(-7.1deg);
         margin-top: 9em;
      "></div>
        </div>
        <div class="diashad">
          <div class="diashad__shadow diashad_only-mobile" style="
         background: linear-gradient(262.9deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.4), rgba(246, 211, 206, 0));
         transform: rotate(7.1deg);
         margin-top: 12em;
      "></div>
        </div>
        <div class="numero-menu__content">
          <div class="numero-submenu col aic">
            <div class="numero-subtitle numenu-item__trigger cup" data-target="consult-conversation">Консультации</div>
            <div class="numenu-item numenu-item__trigger row jcsb aic cup" data-target="consult-conversation">
              <div class="numenu-item__title">Общение</div>
              <div class="numenu-item__icon" style="background-image: url(../__attach/Images/nuicon-human.png)"></div>
            </div>
            <div class="numenu-item numenu-item__trigger row jcsb aic cup" data-target="consult-written">
              <div class="numenu-item__title">Описательные</div>
              <div class="numenu-item__icon" style="background-image: url(../__attach/Images/nuicon-pencil.png)"></div>
            </div>
          </div>
          <div class="numero-submenu col aic">
            <div class="numero-subtitle numenu-item__trigger cup" data-target="study">Обучение</div>
            <div class="numenu-item numenu-item__trigger row jcsb aic cup" data-target="study-live">
              <div class="numenu-item__title">Живое</div>
              <div class="numenu-item__icon" style="background-image: url(../__attach/Images/nuicon-chair.png)"></div>
            </div>
            <div class="numenu-item numenu-item__trigger row jcsb aic cup" data-target="study-online">
              <div class="numenu-item__title">Онлайн</div>
              <div class="numenu-item__icon" style="background-image: url(../__attach/Images/nuicon-globe.png)"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(97.1deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.5), rgba(246, 211, 206, 0));
         transform: rotate(-7.1deg);
         margin-top: -9em;
      "></div>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(262.9deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.3), rgba(246, 211, 206, 0));
         transform: rotate(7.1deg);
         margin-top: -4em;
      "></div>
      </div><?php $_numero = fp('pages/numerology')->walker; ?>
      <center class="title ff-ars-b numero-content-title" id="consult-conversation">Консультации <span style="color: #FE9081">Общение</span></center><?php $product = $_numero->consult_talk('item'); ?><?php $_product = $product->walker; ?>
      <div class="numero-section" data-json=""><?= $_product->page->text ?>
        <p class="numero-section__action"><span style="color: #EDA69C">Запишитесь на консультацию прямо сейчас: </span>воспользуйтесь <a href="../home#contacts" style="color: black">контактами психолога</a> или <a href="../buy/?id=<?= $product->id ?>">
            <button class="button rel cup" style="padding-left: 0.5em; padding-right: 0.5em;">запишитесь на сайте
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
            </button></a></p>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(262.9deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.3), rgba(246, 211, 206, 0));
         transform: rotate(7.1deg);
         margin-top: -1em;
      "></div>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(97.1deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.4), rgba(246, 211, 206, 0));
         transform: rotate(-7.1deg);
         margin-top: 8em;
      "></div>
      </div>
      <center class="title ff-ars-b numero-content-title" id="consult-written">Консультации <span style="color: #FE9081">Описательные</span></center><?php $product = $_numero->consult_write('item'); ?><?php $_product = $product->walker; ?>
      <div class="numero-section" data-json=""><?= $_product->page->text ?>
        <p class="numero-section__action"><span style="color: #EDA69C">Запишитесь на консультацию прямо сейчас: </span>воспользуйтесь <a href="../home#contacts" style="color: black">контактами психолога</a> или <a href="../buy/?id=<?= $product->id ?>">
            <button class="button rel cup" style="padding-left: 0.5em; padding-right: 0.5em;">запишитесь на сайте
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
            </button></a></p>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(262.9deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.4), rgba(246, 211, 206, 0));
         transform: rotate(7.1deg);
         margin-top: 3em;
      "></div>
      </div>
      <center class="title ff-ars-b numero-content-title" id="study">Обучение <span style="color: #FE9081"></span></center><?php $_numero->teach ?>
      <video width="100%" controls="controls" src="<?= $_numero->teach_video ?>"></video>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(97.1deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.5), rgba(246, 211, 206, 0));
         transform: rotate(-7.1deg);
         margin-top: 16em;
      "></div>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(262.9deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.3), rgba(246, 211, 206, 0));
         transform: rotate(7.1deg);
         margin-top: 24em;
      "></div>
      </div>
      <center class="title ff-ars-b numero-content-title" id="study-live">Обучение <span style="color: #FE9081">Живое</span></center><?php $product = $_numero->teach_real('item'); ?><?php $_product = $product->walker; ?>
      <div class="numero-section" data-json=""><?= $_product->page->text ?>
        <p class="numero-section__action"><span style="color: #EDA69C">Запишитесь на консультацию прямо сейчас: </span>воспользуйтесь <a href="../home#contacts" style="color: black">контактами психолога</a> или <a href="../buy/?id=<?= $product->id ?>">
            <button class="button rel cup" style="padding-left: 0.5em; padding-right: 0.5em;">запишитесь на сайте
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
            </button></a></p>
      </div>
      <center class="title ff-ars-b numero-content-title" id="study-online">Обучение <span style="color: #FE9081">Онлайн</span></center><?php $product = $_numero->teach_online('item'); ?><?php $_product = $product->walker; ?>
      <div class="numero-section" data-json=""><?= $_product->page->text ?>
        <p class="numero-section__action"><span style="color: #EDA69C">Запишитесь на консультацию прямо сейчас: </span>воспользуйтесь <a href="../home#contacts" style="color: black">контактами психолога</a> или <a href="../buy/?id=<?= $product->id ?>">
            <button class="button rel cup" style="padding-left: 0.5em; padding-right: 0.5em;">запишитесь на сайте
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
            </button></a></p>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(97.1deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.3), rgba(246, 211, 206, 0));
         transform: rotate(-7.1deg);
         margin-top: -10em;
      "></div>
      </div>
      <div class="diashad">
        <div class="diashad__shadow" style="
         background: linear-gradient(262.9deg, rgba(246, 211, 206, 0), rgba(246, 211, 206, 0.4), rgba(246, 211, 206, 0));
         transform: rotate(7.1deg);
         margin-top: -3em;
      "></div>
      </div>
    </div>
    <div class="footer ptbo5 w100 rel">
      <div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span>
        <div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div>
      </div>
    </div>
  <script src="../numerology/numerology.bundle.js"></script></body>
</html>