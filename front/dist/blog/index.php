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
    <title>Блог | Шпаргалка для лучшей жизни</title>
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
  <link href="../blog/blog.bundle.css" rel="stylesheet"></head>
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
      <div class="blog-title row aic" style="background-image: url('../__attach/Images/bg_blog.png')">
        <div class="blog-title__basis col jcc aifs">
          <div class="blog-title__main ff-ars-b">БЛОГ</div>
          <div class="blog-title__sub ff-rlw-r">Ирены Беркуты</div>
        </div>
        <div class="blog-title__quote col jcc">
          <div class="blog-title-quote__text taj"><?= $db->at_path('pages/blog/header/text') ?></div><?php $author = $db->at_path('pages/blog/header/author'); ?>
<?php if ($author->value) : ?>
          <div class="blog-title-quote__author tar"><?= $author ?></div><?php endif; ?>
        </div>
      </div><?php
$cylinder_sides = [[],[],[],[],[]];
$themes = $db->at_path('pages/blog/themes')->get_children();
for ($i = 0; $i < count($themes); $i++) {
   $col = $i - ((int)($i / 5)) * 5; // $col is 0-4
   array_push($cylinder_sides[$col], $themes[$i]);
}

function tag_to_title($tag) {
   $tag = str_replace('-', ' ', $tag);
   $tag = mb_strtoupper(mb_substr($tag, 0, 1)) . mb_substr($tag, 1);
   return $tag;
}?>
      <div class="cylinder rel grid-pc" id="cylinder">
        <div class="cylinder-container">
          <div class="cylinder-frame">
            <div class="strip">
              <div class="cylinder-l-0"><?php foreach ($cylinder_sides[3] as $theme) : ?><a class="blog-block rel db" href="../blog-theme/?id=<?= $theme->id ?>" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('<?= $theme->props->image ?>') center/cover no-repeat;">
        <div class="blog-block__title abs ct-abs ff-ars-b"><?= tag_to_title($theme->props->tag) ?></div>
        <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><?php endforeach; ?>
              </div>
              <div class="cylinder-l-1"><?php foreach ($cylinder_sides[1] as $theme) : ?><a class="blog-block rel db" href="../blog-theme/?id=<?= $theme->id ?>" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('<?= $theme->props->image ?>') center/cover no-repeat;">
        <div class="blog-block__title abs ct-abs ff-ars-b"><?= tag_to_title($theme->props->tag) ?></div>
        <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><?php endforeach; ?>
              </div>
              <div class="cylinder-l-2"><?php foreach ($cylinder_sides[0] as $theme) : ?><a class="blog-block rel db" href="../blog-theme/?id=<?= $theme->id ?>" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('<?= $theme->props->image ?>') center/cover no-repeat;">
        <div class="blog-block__title abs ct-abs ff-ars-b"><?= tag_to_title($theme->props->tag) ?></div>
        <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><?php endforeach; ?>
              </div>
              <div class="cylinder-l-3"><?php foreach ($cylinder_sides[2] as $theme) : ?><a class="blog-block rel db" href="../blog-theme/?id=<?= $theme->id ?>" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('<?= $theme->props->image ?>') center/cover no-repeat;">
        <div class="blog-block__title abs ct-abs ff-ars-b"><?= tag_to_title($theme->props->tag) ?></div>
        <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><?php endforeach; ?>
              </div>
              <div class="cylinder-l-4"><?php foreach ($cylinder_sides[4] as $theme) : ?><a class="blog-block rel db" href="../blog-theme/?id=<?= $theme->id ?>" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('<?= $theme->props->image ?>') center/cover no-repeat;">
        <div class="blog-block__title abs ct-abs ff-ars-b"><?= tag_to_title($theme->props->tag) ?></div>
        <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><?php endforeach; ?>
              </div>
              <div class="cylinder-l-5">
              </div>
              <div class="cylinder-l-6">
              </div>
              <div class="cylinder-l-7">
              </div>
              <div class="cylinder-l-8">
              </div>
              <div class="cylinder-l-9">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grid-mobile row wrap jcc"><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_3T5A0419.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Отношения</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_3T5A9944.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Позитивное мышление</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_3T5A0395.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Эмоции и чувства</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_IMG_9403-1.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Личностный рост</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_3T5A9944.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Позитивное мышление</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_3T5A0419.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Отношения</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_IMG_9403-1.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Личностный рост</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a><a class="blog-block rel db" href="../blog-theme/?id=undefined" style="background: linear-gradient(#f6d3ce1c, #f6d3ce7c), url('photo_3T5A0395.jpg') center/cover no-repeat;">
          <div class="blog-block__title abs ct-abs ff-ars-b">Эмоции и чувства</div>
          <div class="blog-block__button abs ct-abs_horiz row jcc aic cup">Подробнее</div></a>
      </div>
      <center class="title ff-ars-b title_articles title_articles-popular">Популярные записи</center><?php
$posts = $db->at_path('pages/blog/posts')->get_children();
$posts_data = [];

foreach ($posts as $post) {
   $data = new stdClass();
   
   $data->views = $post->props->viewed_count->value;
   $creation_date = implode('', array_reverse(explode('.', $post->props->creation_date->value)));
   $data->creation_date = $creation_date;
   $data->item = $post;

   array_push($posts_data, $data);
}

usort($posts_data, function ($a, $b) {
   return ($a->views <=> $b->views) * -1;
});
$posts_popular = array_map(function ($data) { return $data->item; }, $posts_data);
usort($posts_data, function ($a, $b) {
   return ($a->creation_date <=> $b->creation_date) * -1;
});
$posts_recent = array_map(function ($data) { return $data->item; }, $posts_data);?>
      <div class="articles rel row wrap jcc"><?php $product = $posts_popular[0]; ?><?php
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
        </div><?php $product = $posts_popular[1]; ?><?php
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
        </div>
      </div>
      <center class="title ff-ars-b title_articles title_articles-recent">Свежие записи</center>
      <div class="articles rel row wrap jcc"><?php $product = $posts_recent[0]; ?><?php
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
        </div><?php $product = $posts_recent[1]; ?><?php
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
        </div>
      </div><?php switch (count($themes)) : ?>
<?php case 4: ?>
<script> window.CYLINDER_START_DEGREE = 124; </script>
<script> window.CYLINDER_ROTATE_FACTOR = 0.035; </script>
<script> window.CYLINDER_HEIGHT_FACTOR = 1; </script>
<script> window.CYLINDER_SCROLL_Y_SHIFT = -200; </script>
<?php break; ?>
<?php case 5: ?>
<script> window.CYLINDER_START_DEGREE = 106; </script>
<script> window.CYLINDER_ROTATE_FACTOR = 0.02; </script>
<script> window.CYLINDER_HEIGHT_FACTOR = 1; </script>
<script> window.CYLINDER_SCROLL_Y_SHIFT = -200; </script>
<?php break; ?>
<?php default: ?>
<script> window.CYLINDER_START_DEGREE = 106; </script>
<script> window.CYLINDER_ROTATE_FACTOR = 0.01; </script>
<script> window.CYLINDER_HEIGHT_FACTOR = 1; </script>
<script> window.CYLINDER_SCROLL_Y_SHIFT = 0; </script>
<?php break; ?>
<?php endswitch; ?>
    </div>
    <div class="footer ptbo5 w100 rel">
      <div class="devicer mA"><span class="footer__copywrite"><?= fi(163) ?> &copy; <?= fi(164); ?></span>
        <div class="row footer__production"><span class="mr2">prod: <a class="link dib shadow_link" href="http://frity.ru/">Frity</a></span><span>icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">Freepik</a>, <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></span></div>
      </div>
    </div>
  <script src="../blog/blog.bundle.js"></script></body>
</html>