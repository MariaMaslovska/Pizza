<?php

/*
    Plugin Name: My Form Plugin
    Author: Maria Maslovska
    Version: 1.0
*/

function my_form_settings_page() {
    add_options_page(
        'My Form Settings',
        'My Form',
        'manage_options',
        'my-form-settings',
        'my_form_settings_html'
    ); 
}

function my_form_settings_html() {
    ?>
        <h1>Enroll Form Settings</h1>
        <form method='post' action="options.php">
            <?php 
                settings_fields('my_form_group');
                do_settings_sections('my-form-settings');
                submit_button(); 
            ?>
        </form>
    <?php
}

add_action('admin_menu', 'my_form_settings_page');

function my_form_settings() {
    add_settings_section(
        'my_form_section',
        'Enroll all form settings',
        NULL,
        'my-form-settings'
    );
    register_setting(
        'my_form_group',
        'my_form_title',
        array(
            'default' => 'Use the following form to send us a message:',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_title',
        'Fill in or change form title',
        'my_form_title_html',
        'my-form-settings',
        'my_form_section'
    );
    register_setting(
        'my_form_group',
        'my_form_choose_datetime',
        array(
            'default' => '1',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_choose_datetime',
        'Is datetime field enable',
        'my_form_choose_datetime_html',
        'my-form-settings',
        'my_form_section'
    );
    register_setting(
        'my_form_group',
        'my_form_start_date',
        array(
            'default' => 'Use the following form to send us a message:',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_start_date',
        'Choose form start date',
        'my_form_start_date_html',
        'my-form-settings',
        'my_form_section'
    );
    register_setting(
        'my_form_group',
        'my_form_end_date',
        array(
            'default' => 'Use the following form to send us a message:',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_end_date',
        'Choose form end date',
        'my_form_end_date_html',
        'my-form-settings',
        'my_form_section'
    );
    register_setting(
        'my_form_group',
        'my_form_enter_tel',
        array(
            'default' => '1',
            'sanitize_callback' => 'sanitize_text_field'
        ),
    );
    add_settings_field(
        'my_form_enter_tel',
        'Is phone number field enable',
        'my_form_enter_tel_html',
        'my-form-settings',
        'my_form_section'
    );
}

function my_form_title_html() {
    ?> 
        <input 
            type="text" 
            value="<?php echo get_option('my_form_title'); ?>" 
            name='my_form_title'
        >
    <?php
}

function my_form_start_date_html() {
    ?> 
        <input 
            type="datetime-local" 
            value="<?php echo get_option('my_form_start_date'); ?>" 
            name='my_form_start_date'
        >
    <?php
}

function my_form_end_date_html() {
    ?> 
        <input 
            type="datetime-local" 
            value="<?php echo get_option('my_form_end_date'); ?>" 
            name='my_form_end_date'
        >
    <?php
}

function my_form_choose_datetime_html() {
    ?>
        <input 
            type="checkbox" 
            name='my_form_choose_datetime'
            value='1'
            <?php echo checked(get_option('my_form_choose_datetime', '1')); ?>
        >
    <?php
}

function my_form_enter_tel_html() {
    ?>
        <input 
            type="checkbox" 
            name='my_form_enter_tel'
            value='1'
            <?php echo checked(get_option('my_form_enter_tel', '1')); ?>
        >
    <?php
}

add_action('admin_init', 'my_form_settings');

function fill_form_html() {
    ?> 
    <section class="contact">
        <h2 class="title">Contact</h2>
        <div class="contact-text">
            <p>Find us at some address at some place or call us at <?php the_field('phone_number', 20) ?></p>
            <div>
                <span>FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggest criteria of them all, both look and taste.
            </div>
        </div>
        <div id="contact-form">
            <h3><?php echo get_option('my_form_title'); ?></h3>
            <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" autocomplete="off">
                <input type="hidden" name="action" value="fill">
                <input type="text" name="name" placeholder="Name">
                <br>
                <input type="text" name="amount" placeholder="How many people">
                <br>
                <?php if (get_option('my_form_choose_datetime')) {
                    ?>
                    <input type="datetime-local" name="event-time" placeholder="Date and time" value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>" 
                    min="<?php echo get_option('my_form_start_date'); ?>" max="<?php echo get_option('my_form_end_date'); ?>"><br>
                    <?php
                } ?>
                <input type="text" name="message" placeholder="Message \ Special requirements">
                <br>
                <?php if (get_option('my_form_enter_tel')) {
                    ?>
                    <input type="tel" name="phone" placeholder="093-123-4567"><br>
                    <?php
                } ?>
                <input type="submit" name="form-submit" value="Send message">
            </form>
        </div>
    </section>
    <?php
}

function handle_fill_form($name) {
    $start = get_option('my_form_start_date');
    $end = get_option('my_form_end_date');
    $valid = true;

    if (isset($_POST['form-submit'])) {
        $name = '';
        if (!empty($_POST['name'])) {
            $name = sanitize_text_field($_POST['name']);
        } else {
            $name = 'No name '.rand(0, 1000);
        }

        $amount = '';
        if (!empty($_POST['amount'])) {
            $amount = intval($_POST['amount']);
            
        } else {
            $amount = "Omitted";
        }

        $event_time = '';
        if (!empty($_POST['event-time'])) {
            $event_time = $_POST['event-time'];
            if($event_time < $start || $event_time > $end) {
                $valid = false;
            }
        }

        $message = '';
        if (!empty($_POST['message'])) {
            $message = sanitize_text_field($_POST['message']);
        } else {
            $message = 'Omitted';
        }

        $phone_number = '';
        if (!empty($_POST['phone'])) {
            $phone_number = $_POST['phone'];
            
        } else {
            $valid = false;
        }

        $form_content = '';
        if ($valid) {
            $form_content = 'Name: '.$name.'<br>';
            $form_content .= 'Amount: '.$amount.'<br>';
            $form_content .= 'Event time: '.$event_time.'<br>';
            $form_content .= 'Message: '.$message.'<br>';
            $form_content .= 'Phone number: '.$phone_number.'<br>';

            var_dump($form_content);

            wp_insert_post(array(
                'post_title' => $name.' - '.wp_date('d.m.Y h:i'),
                'post_type' => 'message',
                'post_content' => $form_content,
                'post_status' => 'publish'
            ));
        
            wp_safe_redirect(site_url('thank-you'));  
            exit;
        } else {
            wp_safe_redirect(site_url('ooops'));
            exit;
        }

    }
}

add_action('admin_post_fill', 'handle_fill_form');
add_action('admin_post_nopriv_fill', 'handle_fill_form');

add_action('get_template_part_form', 'fill_form_html');