<?php
//$JF = './../../../just-field/dist';
$JF = './../jf-cms';

require_once "$JF/php/JustField.php";
require_once "$JF/php/orm.config.php";
$db = new JustField\DB($orm);

$ASSETS = "$JF/Assets/";
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>
      Шпаргалка для лучшей жизни</title>
   <link href="../index/index.375473129d05df992117.css" rel="stylesheet">
</head>

<body>
   <?php $sections = $db->at_path('pages/main/sections')->get_children(); ?>
   <header class="header fix top0 left0 w100">
      <div class="devicer mA row aic mA">
         <div class="header__logo">
            <a class="cup" href="./shop">
               <?php $logo = $ASSETS . $db->at_path('logo')->value['src']; ?>
               <img src="<?= $logo ?>">
            </a>
         </div>
         <div class="col tar">
            <span class="header__slogan ff-ars-i fwn">
               <?= $db->at_path('pages/main/title/normal')->value ?>
               <a class="link dib shadow_link" href="#">
                  <?= $db->at_path('pages/main/title/shadow')->value ?>
               </a>
            </span>
            <div class="header__menu rel">
               <div class="header__menu-underline header__menu-underline_main abs">
               </div>
               <div class="header__menu-underline abs">
               </div>
               <a class="link dib shadow_link header__menu-li ml1o25 rel" href="./">
                  Главная</a>
               <?php foreach ($sections as $section) : ?>
                  <?php
                  $title = $section->get_child('title')->value;
                  $link = '#'; ?>
                  <a class="link dib shadow_link header__menu-li ml1o25 rel" href="<?= $link ?>">
                     <?= $title ?>
                  </a>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </header>
   <button class="button rel cup scroll-top-button fix right2 bottom2 dn">
      <div class="button__inflation button__inflation_1 abs">
      </div>
      <div class="button__inflation button__inflation_2 abs">
      </div>
      <div class="button__inflation button__inflation_3 abs">
      </div>
      <div class="button__inflation button__inflation_4 abs">
      </div>
      <div class="button__inflation button__inflation_5 abs">
      </div>
      <div class="button__inflation button__inflation_6 abs">
      </div>
      <div class="arrow rel">
         <svg class="abs" width="24" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg) translate(50%, 50%);">
            <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="#000">
            </path>
         </svg>
      </div>
   </button>
   <div class="devicer mA">
      <?php $i = 0; ?>
      <?php foreach ($sections as $section) : ?>
         <?php
         $title = $section->get_child('title')->value;
         $icon =  $ASSETS . $section->get_child('icon')->value['src'];
         $image =  $ASSETS . $section->get_child('image')->value['src'];
         $is_image_left = !boolval($section->get_child('is_image_right')->value);
         $link = '#';
         $isMain = $i == 0;
         ?>
         <section class="section row rel <?= $is_image_left ? 'section_reversed' : '' ?> <?= $isMain ? 'section_main' : '' ?>">
            <div class="section__content col jcc">
               <div class="rel">
                  <div class="section__content-text rel">
                     <center class="title ff-ars-b">
                        <?= $title ?>
                     </center>
                     <div class="mtb1o5">
                        <?php if ($isMain) : ?>
                           <p>
                              Lacus in iaculis ut ut
                              facilisi suspendisse pharetra. Scelerisque convallis ac tellus
                              felis mauris egestas amet, aenean urna. Scelerisque egestas sed
                              cursus at felis urna nullam. Ut rutrum adipiscing hendrerit
                              consectetur nulla cursus non gravida. Quam venenatis amet
                              ultrices quam massa faucibus maecenas pellentesque. Orci neque
                              ultrices pretium est et lectus enim vitae pellentesque.</p>
                           <p>
                              Augue cursus massa gravida et non risus tellus hac risus.
                              Consectetur varius integer sed at pulvinar id nunc. Pulvinar
                              laoreet neque vulputate ultricies felis. Pellentesque
                              pellentesque mattis morbi odio turpis nam. Tellus interdum
                              scelerisque leo ac id dictumst. Rhoncus, dictum commodo
                              tincidunt ornare sit odio pellentesque amet pretium.</p>
                        <?php else : ?>
                           <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing
                              elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                              aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                              aute irure dolor in reprehenderit in voluptate velit esse cillum
                              dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                              cupidatat non proident, sunt in culpa qui officia deserunt
                              mollit anim id est laborum.</p>
                        <?php endif; ?>
                     </div>
                     <center>
                        <a href="<?= $link ?>">
                           <button class="button rel cup">
                              Читать
                              далее<div class="button__inflation button__inflation_1 abs">
                              </div>
                              <div class="button__inflation button__inflation_2 abs">
                              </div>
                              <div class="button__inflation button__inflation_3 abs">
                              </div>
                              <div class="button__inflation button__inflation_4 abs">
                              </div>
                              <div class="button__inflation button__inflation_5 abs">
                              </div>
                              <div class="button__inflation button__inflation_6 abs">
                              </div>
                           </button>
                        </a>
                     </center>
                  </div>
                  <div class="section__content-shadow abs top0">
                     <img src="<?= $icon ?>">
                  </div>
               </div>
            </div>
            <div class="section__presentation rel row jcc">
               <?php if ($isMain) : ?>
                  <div class="section__sales-block abs top0 right0 tac tdn cup" href="#">
                     <a class="cup tdn" href="./sales">
                        <div class="section__sales-block-round-fixer" style="width:54.58125750600601px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:54.58125750600601px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:38.49129842680223px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:38.49129842680223px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:28.392162917538926px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:28.392162917538926px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:21.00493442411001px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:21.00493442411001px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:15.362650918162252px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:15.362650918162252px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:11.02285837690593px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:11.02285837690593px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:7.7437725180180195px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:7.7437725180180195px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:5.381562258610927px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:5.381562258610927px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.848550250180537px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.848550250180537px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.0938086671068277px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.0938086671068277px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.0938086671068277px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.0938086671068277px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.848550250180537px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:3.848550250180537px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:5.381562258610927px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:5.381562258610927px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:7.7437725180180195px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:7.7437725180180195px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:11.02285837690593px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:11.02285837690593px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:15.362650918162252px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:15.362650918162252px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:21.00493442411001px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:21.00493442411001px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:28.392162917538926px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:28.392162917538926px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:38.49129842680223px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:38.49129842680223px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:54.58125750600601px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:54.58125750600601px;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:NaNpx;height:7.5px">
                        </div>
                        <div class="section__sales-block-round-fixer" style="width:NaNpx;height:7.5px">
                        </div>
                        <div class="mto25">
                           Только сегодня скидка на все курсы</div>
                        <div class="section__sales-block-percent mto75">
                           20%</div>
                        <a class="abs bottom1o25 ct-abs_horiz fwb" href="#">
                           Подробнее</a>
                     </a>
                  </div>
               <?php endif; ?>
               <a class="cup" href="<?= $link ?>">
                  <div class="section__presentation-back w100 h100" style="background-image: linear-gradient(to right, #fff 0%, #ffffff88 50%, #fff 100%), url('<?= $image ?>');">
                     <div class="section__presentation-front w100 h100" style="background-image: url('<?= $image ?>');">
                     </div>
                  </div>
               </a>
            </div>
            <?php if ($isMain) : ?>
               <div class="section__arrows abs bottom2o5 left0 w100">
                  <div class="arrow rel mA">
                     <svg class="abs" width="50" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
                        <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="inherit">
                        </path>
                     </svg>
                  </div>
                  <div class="arrow rel mA">
                     <svg class="abs" width="50" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
                        <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="inherit">
                        </path>
                     </svg>
                  </div>
                  <div class="arrow rel mA">
                     <svg class="abs" width="50" viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(0deg) translate(-50%, -50%);">
                        <path d="M0.339661 1.05658L19.5 12.2918V12.2918C20.3281 12.7774 21.3532 12.7809 22.1846 12.3009L22.2003 12.2918L41.6603 1.05658" stroke="inherit">
                        </path>
                     </svg>
                  </div>
               </div>
            <?php endif; ?>
         </section>
         <?php $i++; ?>
      <?php endforeach; ?>
      <div class="contacts">
         <?php
         function pretty_phone($phone) {
            $str_parts = str_split($phone);
            array_unshift($str_parts, '+');
            array_splice($str_parts, 2, 0, ' (');
            array_splice($str_parts, 6, 0, ') ');
            array_splice($str_parts, 10, 0, '-');
            array_splice($str_parts, 13, 0, '-');
            return implode('', $str_parts);
         } ?>
         <center class="title ff-ars-b mb2">
            Контакты</center>
         <div class="row jcc mb1">
            <?php $contacts = $db->at_path('pages/main/contacts'); ?>
            <a class="contacts__card col aic" href="<?= $contacts->at_path('facebook/link')->value ?>">
               <img class="mbo25" src="../Attach/Images/contacts_facebook.png">
               <span>
                  <?= $contacts->at_path('facebook/title')->value ?>
               </span>
            </a>
            <a class="contacts__card col aic" href="<?= $contacts->at_path('inst/link')->value ?>" id="contact_instagram">
               <img class="mbo25" src="../Attach/Images/contacts_instagram.png">
               <span>
                  <?= $contacts->at_path('inst/title')->value ?>
               </span>
            </a>
            <a class="contacts__card col aic" href="<?= $contacts->at_path('skype/link')->value ?>">
               <img class="mbo25" src="../Attach/Images/contacts_skype.png">
               <span>
                  <?= $contacts->at_path('skype/title')->value ?>
               </span>
            </a>
         </div>
         <div class="row jcc">
            <a class="contacts__card contacts__card_extra col aife" href="tel:<?= $contacts->at_path('phone')->value ?>" id="contact_phone">
               <div class="contacts__card-extra-imgs row jcc aic mbo25 rel">
                  <img src="../Attach/Images/contacts_phone-call.svg">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_phone-call.svg" data-i="1">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_phone-call.svg" data-i="2">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_phone-call.svg" data-i="3">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_phone-call.svg" data-i="4">
               </div>
               <span>
                  <?= pretty_phone($contacts->at_path('phone')->value) ?>
               </span>
            </a>
            <a class="contacts__card contacts__card_extra col aifs" href="mailto:<?= $contacts->at_path('email')->value ?>">
               <div class="contacts__card-extra-imgs row jcc aic mbo25 rel">
                  <img src="../Attach/Images/contacts_email.svg">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_email.svg" data-i="1">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_email.svg" data-i="2">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_email.svg" data-i="3">
                  <img class="contacts__card-img-copy abs" src="../Attach/Images/contacts_email.svg" data-i="4">
               </div>
               <span>
                  <?= $contacts->at_path('email')->value ?>
               </span>
            </a>
         </div>
      </div>
   </div>
   <div class="footer po5 w100">
      <div class="devicer mA row jcsb">
         <span>
            Ирена Беркута &copy; <?= $db->at_path('pages/main/copywrite')->value ?>
         </span>
         <div class="row">
            <span class="mr2">
               prod: <a class="link dib shadow_link" href="http://frity.ru/">
                  Frity</a>
            </span>
            <span>
               icons: <a class="link dib shadow_link" href="https://www.flaticon.com/authors/freepik">
                  Freepik</a>
               , <a class="link dib shadow_link" href="https://www.flaticon.com/authors/gregor-cresnar">
                  Gregor Cresnar</a>
            </span>
         </div>
      </div>
   </div>
   <script src="../index/index.375473129d05df992117.js">
   </script>
</body>

</html>