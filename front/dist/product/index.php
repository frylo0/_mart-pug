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
?><?php $id = $_GET['id']; ?> <?php $product = fi($id); ?> <?php // TODO: make check if product available ?><?php
if (!array_key_exists("-jf_product-$id-visited", $_COOKIE)) {
  // time steps are:                                  1h   1d 1y  10y
  setcookie("-jf_product-$id-visited", 'true', time()+3600*24*365*10);
  $product_viewed = $product->props->viewed_count;
  $product_viewed->update('value', intval($product_viewed->value) + 1);
}
?><!doctype html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title><?= $product->props->title ?> | Шпаргалка для лучшей жизни</title><link rel="apple-touch-icon" sizes="57x57" href="../apple-icon-57x57.png"><link rel="apple-touch-icon" sizes="60x60" href="../apple-icon-60x60.png"><link rel="apple-touch-icon" sizes="72x72" href="../apple-icon-72x72.png"><link rel="apple-touch-icon" sizes="76x76" href="../apple-icon-76x76.png"><link rel="apple-touch-icon" sizes="114x114" href="../apple-icon-114x114.png"><link rel="apple-touch-icon" sizes="120x120" href="../apple-icon-120x120.png"><link rel="apple-touch-icon" sizes="144x144" href="../apple-icon-144x144.png"><link rel="apple-touch-icon" sizes="152x152" href="../apple-icon-152x152.png"><link rel="apple-touch-icon" sizes="180x180" href="../apple-icon-180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="../android-icon-192x192.png"><link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png"><link rel="icon" type="image/png" sizes="96x96" href="../favicon-96x96.png"><link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png"><link rel="manifest" href="../manifest.json"><meta name="msapplication-TileColor" content="#ffffff"><meta name="msapplication-TileImage" content="../ms-icon-144x144.png"><meta name="theme-color" content="#ffffff"><link href="../product/product.bb03659eb0e280498b2d.css" rel="stylesheet"></head><body><header class="header fix top0 left0 w100"><div class="devicer mA"><div class="header__wrapper row aic mA"><div class="header__logo"><a class="cup" href="./shop"><img src="<?= fi(47) ?>"></a></div><div class="header__menu-wrapper col tar"><span class="header__slogan header__slogan_pc ff-ars-i fwn"><?= fi(49) ?> <a class="link dib shadow_link" href="#"><?= fi(50) ?></a></span><div class="header__menu rel"><div class="header__menu-underline header__menu-underline_main abs"></div><div class="header__menu-underline abs"></div><div class="header__menu-content"><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../home">Главная</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../about-me">Обо мне</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../about-project">О проекте</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../consult">Консультации психолога</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../event">Мероприятия</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../numerology">Нумерология</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../shop">Магазин шпаргалок</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../blog">Блог</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../home#contacts">Контакты</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../office">Личный кабинет</a></div></div></div></div><div class="header__slogan_mobile row jcsb aic"><div class="header__mobile-line"></div><span class="header__slogan ff-ars-i fwn"><?= fi(49) ?> <a class="link dib shadow_link" href="#"><?= fi(50) ?></a></span></div></div></header><button class="button rel cup scroll-top-button fix right2 bottom2 dn"><div class="button__inflation button__inflation_1 abs"></div><div class="button__inflation button__inflation_2 abs"></div><div class="button__inflation button__inflation_3 abs"></div><div class="button__inflation button__inflation_4 abs"></div><div class="button__inflation button__inflation_5 abs"></div><div class="button__inflation button__inflation_6 abs"></div><div class="arrow rel"><svg class="abs" width="24" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg) translate(50%, 50%);"><path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="#000"></path></svg></div></button><div class="devicer mA"><?php $price = $product->props->price; ?> <?php $page = $product->props->page; ?><?php
$action = false;
if ($product->props->is_enroll->value)
   $action = 'Записаться';
else if ($product->props->is_buy->value)
   $action = 'Купить';
else
   $action = '';
?><div class="product-preview col dn"><div class="product-preview__image" style="background-image: url('<?= $product->at_path('page/image') ?>'); background-position: <?= $page->props->image_pos_x ?>% <?= $page->props->image_pos_y ?>%"></div><?php if ($action) : ?><a href="../buy/?id=<?= $product->id ?>"><button class="button rel cup product-preview__button w100"><?= $action ?><div class="button__inflation button__inflation_1 abs"></div><div class="button__inflation button__inflation_2 abs"></div><div class="button__inflation button__inflation_3 abs"></div><div class="button__inflation button__inflation_4 abs"></div><div class="button__inflation button__inflation_5 abs"></div><div class="button__inflation button__inflation_6 abs"></div></button></a><?php endif; ?><?php
$title = $product->props->title;
if ($product->has_path('datetime'))
   $title = "$title ({$product->props->datetime})";?><div class="product-preview__title"><?= $title ?></div><div class="product-preview__tags"><?php $tags = $product->props->tags->get_children(); ?> <?php foreach ($tags as $tag) : ?> <?php if ($tag->type->name == 'space') continue; ?><a class="product-preview__tag product-shop__tag dib tdn cup" href="<?= '../shop/?theme=' . $tag ?>"><?= $tag ?> </a> <?php endforeach; ?></div><div class="product-preview__type"><?= $product->props->type ?></div><div><?php if ($price->props->sale->value) : ?><div class="product-preview__price product-preview__price-after"><?= $product->at_path('price/normal') ?></div><div class="product-preview__price product-preview__price-before"><?= $product->at_path('price/sale') ?></div><?php else : ?><div class="product-preview__price product-preview__price-normal"><?= $product->at_path('price/normal') ?></div><?php endif; ?></div></div><div class="page__content"><?php $price = $product->props->price; ?> <?php $page = $product->props->page; ?><?php
$action = false;
if ($product->props->is_enroll->value)
   $action = 'Записаться';
else if ($product->props->is_buy->value)
   $action = 'Купить';
else
   $action = '';
?><div class="product-preview col"><div class="product-preview__image" style="background-image: url('<?= $product->at_path('page/image') ?>'); background-position: <?= $page->props->image_pos_x ?>% <?= $page->props->image_pos_y ?>%"></div><?php if ($action) : ?><a href="../buy/?id=<?= $product->id ?>"><button class="button rel cup product-preview__button w100"><?= $action ?><div class="button__inflation button__inflation_1 abs"></div><div class="button__inflation button__inflation_2 abs"></div><div class="button__inflation button__inflation_3 abs"></div><div class="button__inflation button__inflation_4 abs"></div><div class="button__inflation button__inflation_5 abs"></div><div class="button__inflation button__inflation_6 abs"></div></button></a><?php endif; ?><?php
$title = $product->props->title;
if ($product->has_path('datetime'))
   $title = "$title ({$product->props->datetime})";?><div class="product-preview__title"><?= $title ?></div><div class="product-preview__tags"><?php $tags = $product->props->tags->get_children(); ?> <?php foreach ($tags as $tag) : ?> <?php if ($tag->type->name == 'space') continue; ?><a class="product-preview__tag product-shop__tag dib tdn cup" href="<?= '../shop/?theme=' . $tag ?>"><?= $tag ?> </a> <?php endforeach; ?></div><div class="product-preview__type"><?= $product->props->type ?></div><div><?php if ($price->props->sale->value) : ?><div class="product-preview__price product-preview__price-after"><?= $product->at_path('price/normal') ?></div><div class="product-preview__price product-preview__price-before"><?= $product->at_path('price/sale') ?></div><?php else : ?><div class="product-preview__price product-preview__price-normal"><?= $product->at_path('price/normal') ?></div><?php endif; ?></div></div><?= $product->at_path('page/text') ?><?php $price = $product->props->price; ?> <?php $page = $product->props->page; ?><?php
$action = false;
if ($product->props->is_enroll->value)
   $action = 'Записаться';
else if ($product->props->is_buy->value)
   $action = 'Купить';
else
   $action = '';
?><div class="product-preview col product-preview_button"><?php $link = ($action ? "../buy/?id={$product->id}" : '#'); ?><a class="product-preview__image col jcc ff-ars-b" href="<?= $link ?>" style="background-image: linear-gradient(to right, var(--c2), transparent), url('<?= $product->at_path('page/image') ?>'); background-position: <?= $page->props->image_pos_x ?>% <?= $page->props->image_pos_y ?>%"><?= mb_strtoupper($action) ?><?php $target_price = $price->props->normal; ?> <?php if ($price->props->sale->value) $target_price = $price->props->sale; ?><div><?= $action ? $target_price : '' ?></div></a><?php if ($action) : ?><a href="../buy/?id=<?= $product->id ?>"><button class="button rel cup product-preview__button w100"><?= $action ?><div class="button__inflation button__inflation_1 abs"></div><div class="button__inflation button__inflation_2 abs"></div><div class="button__inflation button__inflation_3 abs"></div><div class="button__inflation button__inflation_4 abs"></div><div class="button__inflation button__inflation_5 abs"></div><div class="button__inflation button__inflation_6 abs"></div></button></a><?php endif; ?><?php
$title = $product->props->title;
if ($product->has_path('datetime'))
   $title = "$title ({$product->props->datetime})";?><div class="product-preview__title"><?= $title ?></div><div class="product-preview__tags"><?php $tags = $product->props->tags->get_children(); ?> <?php foreach ($tags as $tag) : ?> <?php if ($tag->type->name == 'space') continue; ?><a class="product-preview__tag product-shop__tag dib tdn cup" href="<?= '../shop/?theme=' . $tag ?>"><?= $tag ?> </a> <?php endforeach; ?></div><div class="product-preview__type"><?= $product->props->type ?></div><div><?php if ($price->props->sale->value) : ?><div class="product-preview__price product-preview__price-after"><?= $product->at_path('price/normal') ?></div><div class="product-preview__price product-preview__price-before"><?= $product->at_path('price/sale') ?></div><?php else : ?><div class="product-preview__price product-preview__price-normal"><?= $product->at_path('price/normal') ?></div><?php endif; ?></div></div></div></div><div class="footer ptbo5 w100 rel"><div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span><div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div></div></div><script src="../product/product.bb03659eb0e280498b2d.js"></script></body></html>