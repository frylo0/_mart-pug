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
?><?php $_root = $db->get_root()->walker; ?>
<?php $products = $_root->pages->shop('children'); ?><?php
function prepare_select(&$select_props, $select_placeholder, &$select_selected, $get_param, &$select_url_prop, $criteria_path, $criteria_modifier) {
   global $products;

   $select_props = ['*' => $select_placeholder];
   $select_selected = 0;
   $target = array_key_exists($get_param, $_GET) ? $_GET[$get_param] : null;
   
   $select_url_prop = $get_param;

   $i = 1;
   foreach ($products as $product) {
      $criteria = $product->at_path($criteria_path);

      if ($criteria_modifier == 'children') {
         $criterias = $criteria->get_children();
         foreach ($criterias as $item) {
            $value = $item->value;
            
            if (!array_key_exists($value, $select_props)) {
               $value_pretty = str_replace('-', ' ', $value);
               $value_pretty = mb_strtoupper(mb_substr($value_pretty, 0, 1)) . mb_substr($value_pretty, 1);
               $select_props[$value] = $value_pretty;

               if ($value == $target)
                  $select_selected = $i;

               $i++;
            }
         }
      }
      else if ($criteria_modifier == 'item') {
         $value = $criteria->value;
         
         if (!array_key_exists($value, $select_props)) {
            $value_pretty = str_replace('-', ' ', $value);
            $value_pretty = mb_strtoupper(mb_substr($value_pretty, 0, 1)) . mb_substr($value_pretty, 1);
            $select_props[$value] = $value_pretty;

            if ($value == $target)
               $select_selected = $i;

            $i++;
         }
      }
   }

}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин шпаргалок | Шпаргалка для лучшей жизни</title>
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
  <link href="../shop/shop.bundle.css" rel="stylesheet"></head>
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
      <center class="title ff-ars-b title_page">Магазин шпаргалок</center>
      <div class="row selects jcc"><?php prepare_select($select_props, 'Любая тематика', $select_selected, 'theme', $select_url_prop, 'tags', 'children'); ?>
        <div class="select rel">
          <div class="select__basis row"><?php $title = $select_props[array_keys($select_props)[$select_selected]]; ?>
            <div class="select__title"><?= $title ?></div>
            <button class="button rel cup select__toggle">
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
              <div class="arrow-small rel">
                <svg class="abs" width="16" viewBox="0 0 18 7" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
                  <path d="M1 1L8.41918 5.67325V5.67325C8.73656 5.87316 9.14016 5.87457 9.45893 5.67688L9.46478 5.67325L17 1" stroke="black"></path>
                </svg>
              </div>
            </button>
          </div>
          <div class="select__dropdown abs dn"><?php $i = 0; ?>
<?php foreach ($select_props as $tag => $name) : ?><a class="select__option <?= ( $i == $select_selected ? 'select__option_selected' : '' ) ?>" href="<?= url_query_update($select_url_prop, $tag) ?>"><?= $name ?></a><?php $i++; ?>
<?php endforeach; ?>
          </div>
        </div><?php prepare_select($select_props, 'Любая цена', $select_selected, 'price', $select_url_prop, 'price/normal', 'item'); ?><?php
$select_selected = 0;
$select_url_prop = 'price';
$select_props = [
   '*' => 'Любая цена',
   '0-0' => 'Бесплатно',
   '1-200' => '1 - 200 руб',
   '200-500' => '200 - 500 руб',
   '500-1000' => '500 - 1 000 руб',
   '1000-2000' => '1 000 - 2 000 руб',
   '2000-5000' => '2 000 - 5 000 руб',
   '5000-10000' => '5 000 - 10 000 руб',
   '10000-20000' => '10 000 - 20 000 руб',
   '20000-50000' => '20 000 - 50 000 руб',
];
$target_range = array_key_exists($select_url_prop, $_GET) ? $_GET[$select_url_prop] : null;
$i = 0;
foreach (array_keys($select_props) as $range) {
   if ($range == $target_range) {
      $select_selected = $i;
      break;
   }
   $i++;
}?>
        <div class="select rel">
          <div class="select__basis row"><?php $title = $select_props[array_keys($select_props)[$select_selected]]; ?>
            <div class="select__title"><?= $title ?></div>
            <button class="button rel cup select__toggle">
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
              <div class="arrow-small rel">
                <svg class="abs" width="16" viewBox="0 0 18 7" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
                  <path d="M1 1L8.41918 5.67325V5.67325C8.73656 5.87316 9.14016 5.87457 9.45893 5.67688L9.46478 5.67325L17 1" stroke="black"></path>
                </svg>
              </div>
            </button>
          </div>
          <div class="select__dropdown abs dn"><?php $i = 0; ?>
<?php foreach ($select_props as $tag => $name) : ?><a class="select__option <?= ( $i == $select_selected ? 'select__option_selected' : '' ) ?>" href="<?= url_query_update($select_url_prop, $tag) ?>"><?= $name ?></a><?php $i++; ?>
<?php endforeach; ?>
          </div>
        </div><?php prepare_select($select_props, 'Любой формат', $select_selected, 'type', $select_url_prop, 'type', 'item'); ?>
        <div class="select rel">
          <div class="select__basis row"><?php $title = $select_props[array_keys($select_props)[$select_selected]]; ?>
            <div class="select__title"><?= $title ?></div>
            <button class="button rel cup select__toggle">
              <div class="button__inflation button__inflation_1 abs"></div>
              <div class="button__inflation button__inflation_2 abs"></div>
              <div class="button__inflation button__inflation_3 abs"></div>
              <div class="button__inflation button__inflation_4 abs"></div>
              <div class="button__inflation button__inflation_5 abs"></div>
              <div class="button__inflation button__inflation_6 abs"></div>
              <div class="arrow-small rel">
                <svg class="abs" width="16" viewBox="0 0 18 7" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
                  <path d="M1 1L8.41918 5.67325V5.67325C8.73656 5.87316 9.14016 5.87457 9.45893 5.67688L9.46478 5.67325L17 1" stroke="black"></path>
                </svg>
              </div>
            </button>
          </div>
          <div class="select__dropdown abs dn"><?php $i = 0; ?>
<?php foreach ($select_props as $tag => $name) : ?><a class="select__option <?= ( $i == $select_selected ? 'select__option_selected' : '' ) ?>" href="<?= url_query_update($select_url_prop, $tag) ?>"><?= $name ?></a><?php $i++; ?>
<?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="products row wrap jcc">
        <?php
$query = url_query_decode(); // from select__option mixin, at start of page

$target_theme = false;
$target_price = false;
$target_type = false;

if (array_key_exists('theme', $query) && $query['theme'] != '*')
   $target_theme = $query['theme'];
if (array_key_exists('price', $query) && $query['price'] != '*')
   $target_price = $query['price'];
if (array_key_exists('type', $query) && $query['type'] != '*')
   $target_type = $query['type'];

$target_products = [];
foreach ($products as $product) {
   $is_target_theme = true;
   $is_target_price = true;
   $is_target_type = true;

   if ($target_theme) {
      $tags = $product->props->tags->get_children();

      $is_target_theme = false;
      foreach ($tags as $tag) {
         if ($tag->value == $target_theme) {
            $is_target_theme = true;
            break;
         }
      }
   }
   
   if ($target_price) {
      $target_price_split = explode('-', $target_price);
      $target_price_min = intval($target_price_split[0]);
      $target_price_max = intval($target_price_split[1]);

      $_product = $product->walker;

      $price = $_product->price->normal();
      $price_sale = $_product->price->sale();

      if ($price_sale)
         $price = $price_sale;
         
      if (!$price)
         $price = 0;
      else {
         $price = preg_replace('/[^\d.]/', '', $price);
         $price = intval($price);
      }

      $is_target_price = $target_price_min <= $price && $price <= $target_price_max;
   }

   if ($target_type) {
      $is_target_type = $product->props->type->value == $target_type;
   }

   if ($is_target_theme && $is_target_price && $is_target_type)
      array_push($target_products, $product);
}
?><?php if (count($target_products) != 0) : ?>
<?php foreach ($target_products as $product) : ?><?php
$price = $product->props->price;
$annotation = $product->props->annotation;
$tags = $product->props->tags->get_children();

$is_sales = $price->props->sale->value;
$use_read_button = !$product->props->is_enroll->value && !$product->props->is_buy->value;
?>
        <div class="product-shop row rel"><?php if ($is_sales) : ?>
          <div class="product-shop__sales-badge abs row jcc aic">Акция</div><?php endif; ?>
          <div class="col product-shop__card">
            <div class="product-shop__image product__image-wrapper rel row jcc aic">
              <div class="product__image w100 h100 abs ct-abs w100 h100" style="background-image: url('<?= $annotation->props->image ?>');"></div>
              <div class="product__image-gradient abs top0 left0 w100 h100" style="background-image: linear-gradient(180deg, rgba(255, 255, 255, 0) 8.85%, #F6D3CE 100%);"></div><?php if ($product->has_path('creation_date')) : ?>
              <div class="product-shop__creation-date abs"><?= $product->props->creation_date ?></div><?php endif; ?>
            </div>
            <div class="product-shop__title"><?= $product->props->title ?></div><?php if (!$use_read_button) : ?>
            <div class="product-shop__type"><?= $product->props->type ?></div><?php endif; ?>
<?php if (!$use_read_button) : ?>
<?php if ($is_sales) : ?>
            <div class="product-shop__price-block row">
              <div class="product-shop__price_sales"><?= $price->props->sale ?></div>
              <div class="product-shop__price_before"><?= $price->props->normal ?></div>
            </div><?php elseif ($price->props->normal->value) : ?>
            <div class="product-shop__price-block product-shop__price"><?= $price->props->normal ?></div><?php endif; ?>
<?php else : ?>
            <div class="product-shop__price-block product-shop__price"></div><?php endif; ?>
            <div class="product-shop__controls"><?php if ($use_read_button) : ?><a href="../product/?id=<?= $product->id ?>">
                <button class="button rel cup product-shop__button-read-only">Читать
                  <div class="button__inflation button__inflation_1 abs"></div>
                  <div class="button__inflation button__inflation_2 abs"></div>
                  <div class="button__inflation button__inflation_3 abs"></div>
                  <div class="button__inflation button__inflation_4 abs"></div>
                  <div class="button__inflation button__inflation_5 abs"></div>
                  <div class="button__inflation button__inflation_6 abs"></div> 
                </button></a><?php else : ?><a href="../product/?id=<?= $product->id ?>">
                <button class="button rel cup product-shop__button-read-more">Подробнее
                  <div class="button__inflation button__inflation_1 abs"></div>
                  <div class="button__inflation button__inflation_2 abs"></div>
                  <div class="button__inflation button__inflation_3 abs"></div>
                  <div class="button__inflation button__inflation_4 abs"></div>
                  <div class="button__inflation button__inflation_5 abs"></div>
                  <div class="button__inflation button__inflation_6 abs"></div> 
                </button></a><a href="../buy/?id=<?= $product->id ?>">
                <button class="button rel cup product-shop__button-buy">Купить
                  <div class="button__inflation button__inflation_1 abs"></div>
                  <div class="button__inflation button__inflation_2 abs"></div>
                  <div class="button__inflation button__inflation_3 abs"></div>
                  <div class="button__inflation button__inflation_4 abs"></div>
                  <div class="button__inflation button__inflation_5 abs"></div>
                  <div class="button__inflation button__inflation_6 abs"></div>
                </button></a><?php endif; ?></div>
          </div>
          <div class="col product-shop__content">
            <div class="product-shop__tags"><?php foreach ($tags as $tag) : ?><a class="product-shop__tag dib tdn" href="../shop/?theme=<?= $tag ?>"><?= $tag ?></a> <?php endforeach; ?>
            </div>
            <div class="product-shop__description"><?= $annotation->props->text ?></div>
          </div>
        </div><?php endforeach; ?>
<?php else : ?>
        <center class="title ff-ars-b" style="color: var(--c3); margin-bottom: 6rem; letter-spacing: 0.25em;">Нет найденных товаров</center><?php endif; ?>
      </div>
      <center class="title ff-ars-b title_pages">Возможно вы искали?</center>
      <div class="page-blocks">
        <div class="page-blocks_1-2">
          <div class="page-block row aic page-block_full-width page-block_blog"><a class="page-block__title" href="../blog">БЛОГ</a><img class="page-block__icon" src="../__attach/Images/icon_blog.svg">
            <div class="page-block__content">
              <div class="row"><a href="../product/?id=undefined">Как не позволять людям влиять на нас</a><a href="../product">Не играйте мне на нервах или как научиться противостоять третированию</a></div>
            </div>
          </div>
          <div class="page-block row aic page-block_full-width page-block_consult"><a class="page-block__title" href="../consult">КОНСУЛЬТАЦИИ</a><img class="page-block__icon" src="../__attach/Images/icon_promotion.svg">
            <div class="page-block__content">
              <div class="row">
                <div class="row page-block_consult__directions"><a class="col aic" href="../product/?id=<?= $db->at_path('pages/consult/types/once')->id ?>"><img src="../__attach/Images/pink_mentor.svg"><span>Разовые</span></a><a class="col aic" href="../product/?id=<?= $db->at_path('pages/consult/types/serial')->id ?>"><img src="../__attach/Images/pink_meeting.svg"><span>Серийные</span></a><a class="col aic" href="../product/?id=<?= $db->at_path('pages/consult/types/family')->id ?>"><img src="../__attach/Images/pink_networking.svg"><span>Семейные</span></a>
                </div>
                <div class="col page-block_consult__top jcc"><?php $consult_rating = $db->at_path('pages/consult/rating')->get_children(); ?><a href="../product/?id=<?= $consult_rating[0]->id ?>"><?= $consult_rating[0]->props->title ?></a><a href="../product/?id=<?= $consult_rating[1]->id ?>"><?= $consult_rating[1]->props->title ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="page-blocks_3-4">
          <div class="page-block row aic page-block_about-me"><a class="page-block__title" href="../about-me">ОБО МНЕ</a><img class="page-block__icon" src="../__attach/Images/icon_drawing-tablet.svg">
          </div>
          <div class="page-block row aic page-block_about-project"><a class="page-block__title" href="../about-project">О ПРОЕКТЕ</a><img class="page-block__icon" src="../__attach/Images/icon_startup.svg">
          </div>
        </div>
      </div>
    </div>
    <div class="footer ptbo5 w100 rel">
      <div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span>
        <div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div>
      </div>
    </div>
  <script src="../shop/shop.bundle.js"></script></body>
</html>