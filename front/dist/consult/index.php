<?php
require_once __DIR__ . '/../../../../just-field/dist/__php/jf.php';
$reg->path_to_jf_php_folder = '../../../../../just-field/dist/__php/';
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
    <title>Консультации | Шпаргалка для лучшей жизни</title>
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
  <link href="../consult/consult.bundle.css" rel="stylesheet"></head>
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
      <center class="title ff-ars-b title_consult-types mt2o5">Виды консультаций</center>
      <div class="row jcc wrap"><?php $types = fi(252)->get_children(); ?>
<?php foreach ($types as $product) : ?>
        <div class="product col product_normal">
          <div class="product__image-wrapper rel row jcc aic">
            <div class="product__image w100 h100 abs ct-abs w100 h100" style="background-image: url('../__attach/Images/<?= $product->walker->annotation->image ?>'); width: calc(100% - 2 * <?= $product->walker->annotation->image_padding('exists') ?>); height: calc(100% - 2 * <?= $product->walker->annotation->image_padding('exists') ?>)"></div>
            <div class="product__image-gradient abs top0 left0 w100 h100" style="background-image: linear-gradient(#ffffff00 8.85%, #F6D3CE90);">
              <div class="product__title ct-abs_horiz bottomo5 w100 tac ff-ars-b fz1o25"><?= $product->props->title ?></div>
            </div>
          </div>
          <div class="product__description taj mtb1"><?= $product->walker->annotation->text ?></div>
          <div class="product__footer row jcsb w100"><?php $more_link = '../product/?id='.$product->id; ?><a href="<?= $more_link ?>">
              <button class="button rel cup">Подробнее
                <div class="button__inflation button__inflation_1 abs"></div>
                <div class="button__inflation button__inflation_2 abs"></div>
                <div class="button__inflation button__inflation_3 abs"></div>
                <div class="button__inflation button__inflation_4 abs"></div>
                <div class="button__inflation button__inflation_5 abs"></div>
                <div class="button__inflation button__inflation_6 abs"></div>
              </button></a><?php $buy_link = '../buy/?id='.$product->id; ?><a href="<?= $buy_link ?>">
              <button class="button rel cup rel">Записаться
                <div class="button__inflation button__inflation_1 abs"></div>
                <div class="button__inflation button__inflation_2 abs"></div>
                <div class="button__inflation button__inflation_3 abs"></div>
                <div class="button__inflation button__inflation_4 abs"></div>
                <div class="button__inflation button__inflation_5 abs"></div>
                <div class="button__inflation button__inflation_6 abs"></div>
                <div class="product__price ct-abs_horiz w100"><?= $product->walker->price->normal ?></div>
              </button></a></div>
        </div><?php endforeach; ?>
      </div>
      <center class="title ff-ars-b title_services"><?= fi(879) ?></center>
      <div class="services">
        <?php $rating = fi(251)->get_children(); ?>
<?php foreach ($rating as $product) : ?><?php
$price = $product->props->price;
$target_price = $price->props->normal;
if ($price->props->sale->value)
  $target_price = $price->props->sale;?>
        <div class="service-row row"><a class="service-row__title" href="../product/?id=<?= $product->id ?>"><?= $product->props->title ?></a>
          <div class="service-row__info">
            <div class="service-row__price"><?= $target_price ?></div><a class="service-row__button" href="../buy/?id=<?= $product->id ?>">
              <button class="button rel cup w100">Записаться
                <div class="button__inflation button__inflation_1 abs"></div>
                <div class="button__inflation button__inflation_2 abs"></div>
                <div class="button__inflation button__inflation_3 abs"></div>
                <div class="button__inflation button__inflation_4 abs"></div>
                <div class="button__inflation button__inflation_5 abs"></div>
                <div class="button__inflation button__inflation_6 abs"></div>
              </button></a>
          </div>
        </div><?php endforeach; ?>
      </div>
    </div>
    <div class="footer ptbo5 w100 rel">
      <div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span>
        <div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div>
      </div>
    </div>
  <script src="../consult/consult.bundle.js"></script></body>
</html>