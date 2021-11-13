<?php
wp_enqueue_style('flatpickr-css', get_template_directory_uri() . '/assets/flatpickr/flatpickr.min.css', array(), null);
wp_enqueue_script('flatpickr-js', get_template_directory_uri() . '/assets/flatpickr/flatpickr.js', array('jquery'), '4.6.9', true);