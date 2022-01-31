<?php

class si_Widget_Contacts extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'si_widget_contacts', 
            'Contakt_Widget', 
            [
                'name'        => 'Собственный виджет контактов из Курса',
                'description' => 'Выводит текст телефона и адрес, контакты'
            ]
        );
    }

    public function form( $instance ) {
?>
    <div style="height: 200px">
    <p>
        <label for="<?php echo $this->get_field_id('id-phone'); ?>">
            Введите номер телефона:
        </label>
        <input
            id="<?php echo $this->get_field_id('id-phone'); ?>" 
            type="text"
            name="<?php echo $this->get_field_name('phone'); ?>"
            value="<?php echo $instance['phone']; ?>"
            class = "widefat"
        >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('id-adress'); ?>">
            Введите адрес:
        </label>
        <input
            id="<?php echo $this->get_field_id('id-adress'); ?>" 
            type="text"
            name="<?php echo $this->get_field_name('adress'); ?>"
            value="<?php echo $instance['adress']; ?>"
            class = "widefat"
        >
    </p>
    </div>

<?php
    }

    public function widget( $args, $instance ) {
        $tel_text = $instance['phone'];
        $pattern = '/[^+0-9]/';
        $tel = preg_replace($pattern, '', $tel_text);
        
?>

    <address class="main-header__widget widget-contacts">
        <a href="tel:<?php echo $tel; ?>" class="widget-contacts__phone"><?php echo $instance['phone']; ?></a>
        <p class="widget-contacts__address"><?php echo $instance['adress']; ?></p>
    </address>



<?php
    }

    public function update( $new_instance, $old_instace ) {
        
        return $new_instance;
    }



}

// $si_widget_contacts = new si_Widget_Contacts();

?>