<?php

class si_Widget_Iframe extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'si_widget_iframe', 
            'Виджет катрты', 
            [
                'name'        => 'Вывод Iframe',
                'description' => 'Собственный виджет карты из Курса'
            ]
        );
    }

    public function form( $instance ) {
?>
    <p>
        <label for="<?php echo $this->get_field_id('id-code'); ?>">
            Введите техт:
        </label>
        <textarea
            id="<?php echo $this->get_field_id('id-code'); ?>" 
            name="<?php echo $this->get_field_name('code'); ?>"
            value="<?php echo esc_html($instance['code']); ?>"
            class = "widefat"
        >       
        <?php echo esc_html($instance['code']); ?>
        </textarea>
    </p>

<?php
    }

    public function widget( $args, $instance ) {
        echo $instance['code'];
    }

    public function update( $new_instance, $old_instace ) {
        return $new_instance;
    }



}