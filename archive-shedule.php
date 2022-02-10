<?php get_header(); ?>

    <main class="main-content">
      <div class="wrapper">
        <?php get_template_part('tmp/breadcrumbs') ?>
        <!-- <ul class="breadcrumbs">
          <li class="breadcrumbs__item breadcrumbs__item_home">
            <a href="index.html" class="breadcrumbs__link">Главная</a>
          </li>
          <li class="breadcrumbs__item">
            <a href="schedule.html" class="breadcrumbs__link">Расписание</a>
          </li>
        </ul> -->
        <h1 class="main-heading schedule-page__h">расписание</h1>
        <div class="tabs">
          <ul class="tabs-btns">
            <?php
              $days = get_terms([
                'taxonomy' => 'shedule_days',
                'order' => 'ASC',
                'orderby' => 'slug',
              ]);
              $index = 0;
              $active_class = '';
              foreach($days as $day) :
                if($index === 0){
                  $active_class = ' active-tab';
                } else {
                  $active_class = '';
                }
            ?>

              <li class="tabs-btns__item <?php echo $active_class; ?>">
                <a href="#<?php echo $day->slug; ?>" class="tabs-btns__btn" aria-label="<?php echo $day->description; ?>"> <?php echo $day->name; ?> </a>
              </li>

            <?php
              $index++;
              endforeach;
            ?>
          </ul>

          <ul class="tabs-content">

            <?php
              $index = 0;
              foreach($days as $day) :
                if($index === 0) {
                  $active_class = ' active-tab';
                } else {
                  $active_class = '';
                }
            ?>

            <li class="tabs-content__item <?php echo $active_class; ?>" id="<?php echo $day->slug; ?>">
              <h2 class="sr-only"> <?php echo $day->description; ?></h2>
              <ul class="schedule tabs-content__list">

                <?php
                  $actions = new WP_Query([
                    'posts_per_page' => -1,
                    'post_type' => 'shedule',
                    'shedule_days' => $day->slug,
                    'meta_key' => 'shedule_time_start',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                  ]);
                  if ($actions->have_posts()) :
                  while($actions->have_posts()) :
                    $actions->the_post();
                    $trainer = esc_html(get_the_title(get_field('shedule_trainer')));
                    $place = get_the_terms($id, 'places')[0];
                    $color = get_field('place_color', 'places_' . $place->term_id);
                ?>

                <li class="schedule__item">
                  <p class="schedule__time"> <?php the_field('shedule_time_start'); ?> &ndash; <?php the_field('shedule_time_end'); ?>  </p>
                  <h2 class="schedule__h"> <?php the_field('shedule_name'); ?> </h2>
                  <p class="schedule__trainer"> с <?php echo $trainer; ?> </p>
                  <p class="schedule__place" style="color: <?php echo $color; ?>;"> <?php echo $place->name; ?> </p>
                </li>

                <?php
                  endwhile;
                  wp_reset_postdata();
                  endif;
                ?>

<!--                 <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li>

                <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li>

                <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li>

                <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li>

                <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li>

                <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li>

                <li class="schedule__item">
                  <p class="schedule__time"> 07:00 - 22:00 </p>
                  <h2 class="schedule__h"> Фитнесс </h2>
                  <p class="schedule__trainer"> с Литвиненко Ольгой </p>
                  <p class="schedule__place"> фитнесс зал </p>
                </li> -->

              </ul>
            </li>


            <?php
              $index++;
              endforeach;
            ?>


          </ul>
        </div>
      </div>
    </main>


<?php get_footer(); ?>
