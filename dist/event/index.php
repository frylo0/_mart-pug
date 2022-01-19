<?php
require_once __DIR__ . '/../path-to-jf-folder.php';
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
    <title>Мероприятия | Шпаргалка для лучшей жизни</title>
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
  <link href="../event/event.bundle.css" rel="stylesheet"></head>
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
    <div class="devicer mA">
      <center class="title ff-ars-b title_events">Ближайшие мероприятия</center>
      <div class="event-blocks"><?php $events = fi(651)->get_children(); ?>
<?php foreach ($events as $event) : ?>
<?php if ($event->props->is_visible->value) : ?>
        <div class="event-block row aic jcsb rel">
          <div class="event-block__background abs left0 top0 w100 h100" style="background-image: url('../__attach/Images/<?= $event->at_path('annotation/image') ?>');"></div>
          <div class="event-block__gradient abs left0 top0 w100 h100"></div><a class="event-block__titles col" href="../product/?id=<?= $event->id ?>">
            <div class="event-block__datetime"><?= $event->props->datetime ?></div>
            <div class="event-block__title"><?= $event->props->type . '. ' . $event->props->title ?></div></a>
          <div class="event-block__buttons col"><a href="../buy/?id=<?= $event->id ?>">
              <button class="button rel cup">Записаться
                <div class="button__inflation button__inflation_1 abs"></div>
                <div class="button__inflation button__inflation_2 abs"></div>
                <div class="button__inflation button__inflation_3 abs"></div>
                <div class="button__inflation button__inflation_4 abs"></div>
                <div class="button__inflation button__inflation_5 abs"></div>
                <div class="button__inflation button__inflation_6 abs"></div>
              </button></a><a href="../product/?id=<?= $event->id ?>">
              <button class="button rel cup">Подробнее
                <div class="button__inflation button__inflation_1 abs"></div>
                <div class="button__inflation button__inflation_2 abs"></div>
                <div class="button__inflation button__inflation_3 abs"></div>
                <div class="button__inflation button__inflation_4 abs"></div>
                <div class="button__inflation button__inflation_5 abs"></div>
                <div class="button__inflation button__inflation_6 abs"></div>
              </button></a></div>
        </div><?php endif; ?>
<?php endforeach; ?>
      </div>
      <div class="contacts" id="contacts">
        <center class="title ff-ars-b mb2">Контакты</center>
        <div class="row jcc mb1"><a class="contacts__card col aic" href="<?= fi(68) ?>" target="_blank"><img class="mbo25" src="../__attach/Images/contacts_facebook.png"><span><?= fi(69) ?></span></a><a class="contacts__card col aic" href="<?= fi(71) ?>" target="_blank" id="contact_instagram"><img class="mbo25" src="../__attach/Images/contacts_instagram.png"><span><?= fi(72) ?></span></a><a class="contacts__card col aic" href="<?= fi(74) ?>" target="_blank"><img class="mbo25" src="../__attach/Images/contacts_skype.png"><span><?= fi(75) ?></span></a>
        </div>
        <div class="row jcc"><?php
$tel = fi(160)->value;
$tel_link = 'tel:+'.$tel;
$tel_html = '<span>+'.substr($tel,0,1).' ('.substr($tel,1,3).')</span> '.substr($tel,4,3).'-'.substr($tel,7,2).'-'.substr($tel,9,2);
$email = fi(161)->value;
$et = strpos($email, '@');
$email_html = '<span>'.substr($email,0,$et).'</span>'.substr($email,$et);
$email_link = 'mailto:'.$email;?><a class="contacts__card contacts__card_extra col aife" href="<?= $tel_link ?>" id="contact_phone">
            <div class="contacts__card-extra-imgs row jcc aic mbo25 rel"><img src="../__attach/Images/contacts_phone-call.svg"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_phone-call.svg" data-i="1"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_phone-call.svg" data-i="2"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_phone-call.svg" data-i="3"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_phone-call.svg" data-i="4"></div><span><?= $tel_html ?></span></a><a class="contacts__card contacts__card_extra col aifs" href="<?= $email_link ?>">
            <div class="contacts__card-extra-imgs row jcc aic mbo25 rel"><img src="../__attach/Images/contacts_email.svg"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_email.svg" data-i="1"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_email.svg" data-i="2"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_email.svg" data-i="3"><img class="contacts__card-img-copy abs" src="../__attach/Images/contacts_email.svg" data-i="4"></div><span><?= $email_html ?></span></a>
        </div>
      </div>
    </div>
    <div class="footer ptbo5 w100 rel">
      <div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span>
        <div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div>
      </div>
    </div>
  <script src="../event/event.bundle.js"></script></body>
</html>