<?php

class si_Widget_Main_Page_Article extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'si_widget_main_page_article', 
            'Виджет вывода статьи на гоавную страницу', 
            [
                'name'        => 'Вывод статью на главной странице',
                'description' => 'Вывод статью на главной странице'
            ]
        );
    }

    public function form( $instance ) {

        $get_all_posts = get_posts();

        //var_dump($get_all_posts);

    ?>

        <p>
            <label for="<?php echo $this->get_field_id('id-main-page-article'); ?>">
                Выберите статью для главной страницы:
            </label>
            <select
                id="<?php echo $this->get_field_id('id-main-page-article'); ?>" 
                name="<?php echo $this->get_field_name('main_page_article'); ?>"           
                class = "widefat"
            >
                <?php 
                    foreach($get_all_posts as $post) :                
                ?>
                    <option 
                        value="<?php echo $post->ID; ?>"
                        <?php selected($instance['main_page_article'], $post->ID, true); ?>
                    
                    >
                        <?php echo $post->post_title; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
    
    <?php
    }

    public function widget( $args, $instance ) {
        $post_id =  $instance['main_page_article'];
        $main_page_post = get_post($post_id);

    ?>


    <article class="about">
        <div class="wrapper about__flex">
          <div class="about__wrap">
            <h2 class="main-heading about__h"> <?php echo $main_page_post->post_title ?> </h2>
            <p class="about__text"><?php echo $main_page_post->post_excerpt; ?></p>
            <a href="<?php echo get_the_permalink($main_page_post->ID); ?>" class="about__link btn">подробнее</a>
          </div>
          <figure class="about__thumb">
            <?php echo get_the_post_thumbnail($main_page_post->ID); ?>
          </figure>
        </div>
    </article>



    <?php
    }

    public function update( $new_instance, $old_instace ) {
        return $new_instance;
    }



}

?>