<?php
    get_header();
    if( is_home() ) :  /* index.php = true на установленной странице блога если установлены "Главная страница" и "Страница записей" */
?>
    <!-- <main class="main-content">
      <h1 class="sr-only"> Домашняя страница спортклуба SportIsland. </h1>
      <div class="banner">
        <span class="sr-only">Будь в форме!</span>
        <a href="trainers.html" class="banner__link btn">записаться</a>
      </div>
      <article class="about">
        <div class="wrapper about__flex">
          <div class="about__wrap">
            <h2 class="main-heading about__h"> кто мы такие </h2>
            <p class="about__text"> Спортивный клуб SPORTISLAND существует уже более 5 лет. За это время большое количество посетителей получили положительный результат от своих тренировок. Мы предлагаем посещать просторный и укомплектованный тренажерный зал с персональными тренерами, массаж, групповые занятия (фитнес), занятия единоборствами в группах и индивидуально, и большое количество тренировок для детей. В каждый абонемент входит посещение финской сауны </p>
            <a href="blog.html" class="about__link btn">подробнее</a>
          </div>
          <figure class="about__thumb">
            <img src="img/index__about_img.jpg" alt="Power lifter">
          </figure>
        </div>
      </article>
      <section class="sales">
        <div class="wrapper">
          <header class="sales__header">
            <h2 class="main-heading sales__h"> акции и скидки </h2>
            <p class="sales__btns">
              <button class="sales__btn sales__btn_prev">
                <span class="sr-only"> Предыдущие акции </span>
              </button>
              <button class="sales__btn sales__btn_next">
                <span class="sr-only"> Следующие акции </span>
              </button>
            </p>
          </header>
          <div class="sales__slider slider">
            <section class="slider__slide stock">
              <a href="blog.html" class="stock__link" aria-label="Подробнее об акции скидка 20% на групповые занятия">
                <img src="img/index__sales_pic1.jpg" alt="" class="stock__thumb">
                <h3 class="stock__h"> Групповые занятия 20% скидка </h3>
                <p class="stock__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке. </p>
                <span class="stock__more link-more_inverse link-more">Подробнее</span>
              </a>
            </section>
            <section class="slider__slide stock">
              <a href="blog.html" class="stock__link" aria-label="Подробнее об акции Скидка 30% на занятия с тренером">
                <img src="img/index__sales_pic2.jpg" alt="" class="stock__thumb">
                <h3 class="stock__h"> Скидка 30% на занятия с тренером </h3>
                <p class="stock__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке. </p>
                <span class="stock__more  link-more_inverse link-more">Подробнее</span>
              </a>
            </section>
            <section class="slider__slide stock">
              <a href="blog.html" class="stock__link" aria-label="Подробнее об акции Скидка 30% на занятия с тренером">
                <img src="img/index__sales_pic2.jpg" alt="" class="stock__thumb">
                <h3 class="stock__h"> Скидка 30% на занятия с тренером </h3>
                <p class="stock__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке. </p>
                <span class="stock__more  link-more_inverse link-more">Подробнее</span>
              </a>
            </section>
          </div>
        </div>
      </section>
      <section class="cards cards_index">
        <div class="wrapper">
          <h2 class="main-heading cards__h"> клубные карты </h2>
          <ul class="cards__list row">
            <li class="card">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class="price__unit" aria-label="рублей в месяц">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a data-post-id="99" href="#modal-form" class="card__buy btn btn_modal">купить</a>
            </li>
            <li class="card card_profitable">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class="price__unit" aria-label="рублей в месяц">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a data-post-id="99" href="#modal-form" class="card__buy btn btn_modal">купить</a>
            </li>
            <li class="card">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class="price__unit" aria-label="рублей в месяц">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a data-post-id="99" href="#modal-form" class="card__buy btn btn_modal">купить</a>
            </li>
            <li class="card">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class="price__unit" aria-label="рублей в месяц">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a data-post-id="99" href="#modal-form" class="card__buy btn btn_modal">купить</a>
            </li>
          </ul>
        </div>
      </section>
    </main> -->
    <main class="main-content">
      <h1 class="sr-only">Страница категорий блога на сайте спорт-клуба SportIsland</h1>
      <div class="wrapper">
        <?php get_template_part('tmp/breadcrumbs') ?>
      </div>
      <?php
        if(have_posts()):
      ?>
      <section class="last-posts">
        <div class="wrapper">
          <h2 class="main-heading last-posts__h"> последние записи </h2>
          <ul class="posts-list">
          <?php
            while(have_posts()):
              the_post();
          ?>
            <li class="last-post">
              <a href="<?php the_permalink(); ?>" class="last-post__link" aria-label="Читать текст статьи: <?php the_title(); ?>">
                <figure class="last-post__thumb">
                  <!-- <img src="img/blog__article_thmb1.jpg" alt="" class="last-post__img"> -->
                  <?php the_post_thumbnail('full', [
                    'class' => 'last-post__img'
                  ]); ?>
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> <?php the_title(); ?> </h3>
                  <p class="last-post__text"> <?php echo get_the_excerpt(); ?> </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
          <?php
            endwhile;
          ?>
          </ul>
        </div>
      </section>
      <?php
        else:          
      ?>

      <?php get_template_part('tmp/no-posts') ?>

      <?php
        endif;
      ?>
      
      <!-- Получаем категории -->

      <?php 
      
      $categories = get_categories();

      //var_dump($categories);
      
      if($categories) :
      
      ?>

      <section class="categories">
        <div class="wrapper">
          <h2 class="categories__h main-heading"> категории </h2>
          <ul class="categories-list">
          <?php           
            foreach( $categories as $category ) : 
              $i++;

              $img = get_field('cat_thumb', 'category_' . $category->cat_ID);
              $img_url = $img['url'];
              $img_alt = $img['alt'];
              $category_link = get_category_link($category->cat_ID);         
          ?>
            <li class="category">
              <a href="<?php echo $category_link ?>" class="category__link">
                <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" class="category__thumb">
                <span class="category__name">
                  <?php echo $category->name; ?>
                </span>
              </a>
            </li>
          <?php endforeach; ?>
          </ul>
        </div>
      </section>

      <?php
        endif;
      ?>
    </main>

<?php
    else:
?>

    <main style="color:red">Для случайных записей, без шаблона</main>
    <?php
        if(have_posts()):
      ?>
      <section class="last-posts">
        <div class="wrapper">
          <h2 class="main-heading last-posts__h"> последние записи </h2>
          <ul class="posts-list">
          <?php
            while(have_posts()):
              the_post();
          ?>
            <li class="last-post">
              <a href="<?php the_permalink(); ?>" class="last-post__link" aria-label="Читать текст статьи: <?php the_title(); ?>">
                <figure class="last-post__thumb">
                  <!-- <img src="img/blog__article_thmb1.jpg" alt="" class="last-post__img"> -->
                  <?php the_post_thumbnail('full', [
                    'class' => 'last-post__img'
                  ]); ?>
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> <?php the_title(); ?> </h3>
                  <p class="last-post__text"> <?php echo get_the_excerpt(); ?> </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
          <?php
            endwhile;
          ?>
          </ul>
          <?php the_posts_pagination(); ?>
        </div>
      </section>
      <?php
        else:          
      ?>
      <section class="last-posts">
        <div class="wrapper">
          <h2 class="main-heading last-posts__h"> Нет записей </h2>
        </div>
      </section>

      <?php
        endif;
      ?>

<?php
    endif;
    get_footer();
?>
    