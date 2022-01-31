<?php

class si_Widget_Info extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'si_widget_info', 
            'Виджет информации под картой', 
            [
                'name'        => 'Виджет информации под картой',
                'description' => 'Виджет информации под картой'
            ]
        );
    }

    public function form( $instance ) {
        $vars = [
            'position' => 'Адрес',
            'time' => 'Время',
            'phone' => 'Номер телефона',
            'email' => 'Адрес электронной почты'
        ]
?>
    <p>
        <label for="<?php echo $this->get_field_id('id-info'); ?>">
            Текст:
        </label>
        <input
            id="<?php echo $this->get_field_id('id-info'); ?>" 
            type="text"
            name="<?php echo $this->get_field_name('info'); ?>"
            value="<?php echo $instance['info']; ?>"
            class = "widefat"
        >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('id-var'); ?>">
            Выберите Вариант отображения:
        </label>
        <select
            id="<?php echo $this->get_field_id('id-var'); ?>" 
            name="<?php echo $this->get_field_name('var'); ?>"           
            class = "widefat"
        >
            <?php 
                foreach($vars as $var => $desc) :                
            ?>
                <option 
                    value="<?php echo $var; ?>"
                    <?php selected($instance['var'], $var, true); ?>
                
                >
                    <?php echo $desc; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

<?php
    }

    public function widget( $args, $instance ) {
        switch( $instance ['var']) {
            case 'position':
?>
            <span class="widget-address">
                 <?php echo $instance['info']; ?> 
            </span>
<?php
            break;
            case 'time':
?>
            <span class="widget-working-time"> <?php echo $instance['info']; ?> </span>

<?php
            break;
            case 'phone':
                $text = $instance['info'];
                $tel_text = $text;
                $pattern = '/[^+0-9]/';
                $tel = preg_replace($pattern, '', $tel_text);
?>
            <a href="tel:<?php echo $tel; ?>" class="widget-phone"> <?php echo $text; ?> </a>
<?php
            break;
            case 'email':
?>
            <a href="mailto:<?php echo $instance['info']; ?>" class="widget-email">
                <?php echo $instance['info']; ?>
            </a>
<?php
            break;
            default: echo '';
            break;
        }
    }

    public function update( $new_instance, $old_instace ) {
        return $new_instance;
    }



}

?>