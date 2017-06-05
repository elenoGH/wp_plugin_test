<?php

function dwwp_sample_shortcode()
{
    echo "his is my short code ejemplo.";
}

add_shortcode('job_listing', 'dwwp_sample_shortcode');