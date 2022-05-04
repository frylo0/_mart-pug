<?php
require_once __DIR__ . '/../path-to-jf-folder.php';
require_once __DIR__ . '/../__php/account-manager.php';
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
    <title>О проекте | Шпаргалка для лучшей жизни</title>
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
  <link href="../about-project/about-project.bundle.css" rel="stylesheet"></head>
  <body>
    <header class="header fix top0 left0 w100">
      <div class="devicer mA">
        <div class="header__wrapper row aic mA">
          <div class="header__logo"><a class="cup" href="./shop"><img src="<?= fi(47) ?>"></a></div>
          <div class="header__menu-wrapper col tar"><span class="header__slogan header__slogan_pc ff-ars-i fwn"><?= fi(49) ?> <a class="link dib shadow_link" href="#"><?= fi(50) ?></a></span>
            <div class="header__menu rel">
              <div class="header__menu-underline header__menu-underline_main abs"></div>
              <div class="header__menu-underline abs"></div>
              <div class="header__menu-content"><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../home">Главная</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../about-me">Обо мне</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../about-project">О проекте</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../consult">Консультации психолога</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../event">Мероприятия</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../numerology">Нумерология</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../shop">Магазин шпаргалок</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../blog">Блог</a><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../home#contacts">Контакты</a><?php if ($account_manager->is_logged_in()) : ?><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../office">Личный кабинет</a><?php else : ?><a class="link dib shadow_link header__menu-li ml1o25 rel" href="../login">Вход/Регистрация</a><?php endif; ?>
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
    <div class="devicer mA"><?php
$section = $db->at_id(184);
$is_main_hide_title = false;
$is_read_more = false;
$is_arrows = true;
$is_sales = false;?>
      <section class="section row rel <?= ($section->at_path('is_main')->value ? 'section_main' : '') .' '. ($section->at_path('is_image_right')->value ? '' : 'section_reversed') ?>">
        <div class="section__content col jcc">
          <div class="rel">
            <div class="section__content-text rel"><?php if ($is_main_hide_title) : ?>
<?php if (!$section->at_path('is_main')->value) : ?>
              <center class="title ff-ars-b"><?= $section->at_path('title')->value ?></center><?php endif; ?>
<?php else : ?>
              <center class="title ff-ars-b"><?= $section->at_path('title')->value ?></center><?php endif; ?>
              <div class="mtb1o5" data-json><?= $section->at_path('text')->value->html ?>
              </div><?php if ($is_read_more) : ?>
              <center><a href="<?= '../' . $section->key ?>">
                  <button class="button rel cup">Читать далее
                    <div class="button__inflation button__inflation_1 abs"></div>
                    <div class="button__inflation button__inflation_2 abs"></div>
                    <div class="button__inflation button__inflation_3 abs"></div>
                    <div class="button__inflation button__inflation_4 abs"></div>
                    <div class="button__inflation button__inflation_5 abs"></div>
                    <div class="button__inflation button__inflation_6 abs"></div>
                  </button></a>
              </center><?php endif; ?>
            </div>
            <div class="section__content-shadow abs top0"><img src="<?= $section->at_path('icon')->value->src ?>">
            </div>
          </div>
        </div>
        <div class="section__presentation rel row jcc"><?php if ($section->at_path('is_main')->value && iv(65) && $is_sales) : ?><?php
?>
          <div class="section__sales-block abs top0 right0 tac tdn cup"><a class="cup tdn" href="<?= fi(63) ?>">
              <div class="section__sales-block-round-fixer" style="width:3.898661250429001em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:3.898661250429001em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.749378459057302em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.749378459057302em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.028011636967066em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.028011636967066em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.5003524588650008em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.5003524588650008em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.0973322084401609em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.0973322084401609em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.7873470269218521em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.7873470269218521em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.5531266084298585em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.5531266084298585em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.3843973041864948em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.3843973041864948em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.27489644644146694em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.27489644644146694em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.2209863333647734em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.2209863333647734em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.2209863333647734em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.2209863333647734em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.27489644644146694em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.27489644644146694em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.3843973041864948em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.3843973041864948em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.5531266084298585em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.5531266084298585em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.7873470269218521em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:0.7873470269218521em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.0973322084401609em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.0973322084401609em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.5003524588650008em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:1.5003524588650008em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.028011636967066em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.028011636967066em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.749378459057302em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:2.749378459057302em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:3.898661250429001em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:3.898661250429001em;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:NaNem;height:0.5357142857142857em"></div>
              <div class="section__sales-block-round-fixer" style="width:NaNem;height:0.5357142857142857em"></div>
              <div class="mto25"><?= fi(64) ?></div><a class="abs bottom1o25 ct-abs_horiz fwb" href="<?= fi(63) ?>">Подробнее</a></a></div><?php endif; ?><a class="cup" href="<?= '../' . $section->key ?>">
            <div class="section__presentation-back w100 h100" style="background-image: linear-gradient(to right, #fff 0%, #ffffff88 50%, #fff 100%), url('<?= $section->at_path('image')->value->src ?>'); background-position: <?= ( $section->has_path('image_pos') ? $section->at_path('image_pos/x').'% '.$section->at_path('image_pos/y').'%' : '' ) ?>;">
              <div class="section__presentation-front w100 h100" style="background-image: url('<?= $section->at_path('image')->value->src ?>'); background-position: <?= ( $section->has_path('image_pos') ? $section->at_path('image_pos/x').'% '.$section->at_path('image_pos/y').'%' : '' ) ?>;"></div>
            </div></a>
        </div><?php if ($is_arrows && $section->at_path('is_main')->value) : ?>
        <div class="section__arrows abs bottom2o5 left0 w100">
          <div class="arrow rel mA">
            <svg class="abs" width="50" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
              <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="inherit"></path>
            </svg>
          </div>
          <div class="arrow rel mA">
            <svg class="abs" width="50" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
              <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="inherit"></path>
            </svg>
          </div>
          <div class="arrow rel mA">
            <svg class="abs" width="50" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
              <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="inherit"></path>
            </svg>
          </div>
        </div><?php endif; ?>
      </section>
      <div class="recommended-products">
        <center class="title ff-ars-b mb2">Рекомендуемые товары</center>
        <div class="recommended-products__content row jcc"><?php for ($i = 0; $i < 4; $i++) : ?>
<?php $product = $db->at_path('pages/shop/product1'); ?>
          <div class="product col product_normal">
            <div class="product__image-wrapper rel row jcc aic">
              <div class="product__image w100 h100 abs ct-abs w100 h100" style="background-image: url('<?= $product->walker->annotation->image ?>'); width: calc(100% - 2 * <?= $product->walker->annotation->image_padding('exists') ?>); height: calc(100% - 2 * <?= $product->walker->annotation->image_padding('exists') ?>)"></div>
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
                <button class="button rel cup rel">Купить
                  <div class="button__inflation button__inflation_1 abs"></div>
                  <div class="button__inflation button__inflation_2 abs"></div>
                  <div class="button__inflation button__inflation_3 abs"></div>
                  <div class="button__inflation button__inflation_4 abs"></div>
                  <div class="button__inflation button__inflation_5 abs"></div>
                  <div class="button__inflation button__inflation_6 abs"></div>
                  <div class="product__price ct-abs_horiz w100"><?= $product->walker->price->normal ?></div>
                </button></a></div>
          </div><?php endfor; ?>
        </div>
        <center class="more-recommended"><a href="../shop">
            <button class="button rel cup">Больше рекомендуемых
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
            </button></a></center>
      </div>
      <div class="contacts">
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
  <script src="../about-project/about-project.bundle.js"></script></body>
</html>