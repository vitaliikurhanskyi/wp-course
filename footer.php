<div class="modal">
      <div class="wrapper">
        <section class="modal-content modal-form" id="modal-form">
          <button class="modal__closer">
            <span class="sr-only">Закрыть</span>
          </button>
          <form method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="modal-form__form">
            <h2 class="modal-content__h"> Отправить заявку </h2>
            <p> Оставьте свои контакты и менеджер с Вами свяжется </p>
            <p>
              <label>
                <span class="sr-only">Имя: </span>
                <input type="text" name="si-user-name" placeholder="Имя">
              </label>
            </p>
            <p>
              <label>
                <span class="sr-only">Телефон:</span>
                <input type="text" name="si-user-phone" placeholder="Телефон" pattern="^\+{0,1}[0-9]{4,}$" required>
              </label>
            </p>
            <input type="hidden" name="action" value="si-modal-form">
            <button class="btn" type="submit">Отправить</button>
          </form>
        </section>
      </div>
    </div>
    <div class="footer">
      <header class="main-header">
        <div class="wrapper main-header__wrap">
          <!-- <a href="index.html" class="main-header__logolink" aria-label="Логотип-ссылка на Главную">
            <img src="img/logo.png" alt="">
            <span class="slogan">Твой фитнес клуб всегда рядом!</span>
          </a> -->
          <p class="main-header__logolink">
            <?php the_custom_logo(); ?>
            <span class="slogan"><?php echo get_option('si_option_field_slogan'); ?></span>
          </p>
          
          <!-- Выводи меню дугим способом -->

          <?php
            $menu_locations = get_nav_menu_locations();

            $menu_id = $menu_locations['menu-footer'];

            $menu_items = wp_get_nav_menu_items($menu_id, [
              'order' => 'ASC',
              'orderby' => 'menu_order'
            ]);

            //dd($menu_items);
            
          ?>

          <!-- Выводи меню дугим способом -->
          <nav class="main-navigation">
            <ul class="main-navigation__list">
              <?php
                $http_s = 'http' . ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '' ) . '://';
                $url = $http_s . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                // echo $url . '</br>';
                foreach($menu_items as $menu_item) :
                  $class_text = '';
                  if($menu_item->url === $url){
                    $class_text = 'class="active"';
                  }
                
              ?>
              <li <?php echo $class_text; ?>>
                <a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
              </li>
              <?php endforeach; ?>
            </ul>
          </nav>
          <!-- <address class="main-header__widget widget-contacts">
            <a href="tel:88007003030" class="widget-contacts__phone"> 8 800 700 30 30 </a>
            <p class="widget-contacts__address"> ул. Приречная 11 </p>
          </address> -->
          <?php 
            if (is_active_sidebar('si-header')) {
              dynamic_sidebar('si-footer');
            } 
          ?>
        </div>
      </header>
      <footer class="main-footer wrapper">
        <div class="row main-footer__row">
          <div class="main-footer__widget main-footer__widget_copyright">
            <span class="widget-text"> <?php 
              if(is_active_sidebar('si-footer-1')) {
                dynamic_sidebar('si-footer-1');
              }
            ?> </span>
          </div>
          <div class="main-footer__widget">
            <p class="widget-contact-mail"> 
              <?php
              if(is_active_sidebar('si-footer-2')) {
                  dynamic_sidebar('si-footer-2');
              }
              ?>
            </p>
          </div>
          <div class="main-footer__widget main-footer__widget_social">
            <?php
              if(is_active_sidebar('si-footer-3')) {
                  dynamic_sidebar('si-footer-3');
              }
            ?>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
