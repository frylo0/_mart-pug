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
?><?php
$theme = $db->at_id($_GET['id']);

$theme_tag = $theme->props->tag->value;
$theme_title = tag_to_title($theme_tag);

function tag_to_title($tag) {
   $tag = str_replace('-', ' ', $tag);
   $tag = mb_strtoupper(mb_substr($tag, 0, 1)) . mb_substr($tag, 1);
   return $tag;
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог "<?= $theme_title ?>" | Шпаргалка для лучшей жизни</title>
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
  <link href="../blog-theme/blog-theme.bundle.css" rel="stylesheet"></head>
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
    <div class="devicer mA ovh">
      <div class="blog-theme-preview row">
        <div class="btp__image" style="background-image: url('<?= $theme->props->image ?>')"></div>
        <div class="btp__content">
          <div class="btp__decor-title ff-ars-b usn">БЛОГ</div>
          <div class="btp__title ff-ars-b"><?= $theme_title ?></div>
          <div class="btp__text"><?= $theme->props->annotation ?>
          </div>
        </div>
      </div>
      <div class="articles rel row wrap jcc">
        <?php
$posts = $db->at_path('pages/blog/posts')->get_children();
$posts_data = [];

foreach ($posts as $post) {
   $has_theme = false;

   $post_tags = $post->props->tags->get_children();
   foreach ($post_tags as $tag) {
      if ($tag == $theme_tag) {
         $has_theme = true; 
         break;
      }
   }

   if ($has_theme) {
      $data = new stdClass();
      
      $data->views = $post->props->viewed_count->value;
      $creation_date = implode('', array_reverse(explode('.', $post->props->creation_date->value)));
      $data->creation_date = $creation_date;
      $data->item = $post;

      array_push($posts_data, $data);
   }
}

usort($posts_data, function ($a, $b) {
   return ($a->views <=> $b->views) * -1;
});
$posts_popular = array_map(function ($data) { return $data->item; }, $posts_data);
usort($posts_data, function ($a, $b) {
   return ($a->creation_date <=> $b->creation_date) * -1;
});
$posts_recent = array_map(function ($data) { return $data->item; }, $posts_data);
?><?php foreach ($posts_recent as $product) : ?><?php
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
<?php if (count($posts_recent) == 0) : ?>
        <center class="title ff-ars-b" style="color: var(--c3); margin-bottom: 6rem; letter-spacing: 0.25em;">В теме пока нет публикаций</center><?php endif; ?>
      </div>
    </div>
    <div class="footer ptbo5 w100 rel">
      <div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span>
        <div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div>
      </div>
    </div>
  <script src="../blog-theme/blog-theme.bundle.js"></script></body>
</html>