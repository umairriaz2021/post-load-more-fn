<?php
/*
Plugin Name: Posts Display
Plugin URI: https://www.pinease.com
Description: Cpt data display on Frontend 
Author Name: Pinease
Author URI: https://www.pinease.com
Version: 1.0.0
Text-domain: cptdisplay
*/

if(!defined('ABSPATH'))
{
    die("PATH is not define");
}
if(!defined('PLUGIN_DIR'))
{
    define('PLUGIN_DIR',plugin_dir_path(__FILE__));
}
if(!defined('PLUGIN_URL'))
{   
    
     define('PLUGIN_URL',plugins_url('/', __FILE__));
}


function cptdisplay_frontend_scripts()
{
    if(is_page('partner') || is_page('sample-page') || is_page('resources') || is_page('events1') || is_page('research-and-reports'))
    {
        wp_enqueue_style('bootstrapcss','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',[],false,'all');
        
        wp_enqueue_style('cptstyle',PLUGIN_URL.'assets/css/cptstyle.css',[],false,'all');
        wp_enqueue_script('bootstrapjs','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',['jquery'],false,true);
        wp_enqueue_script('mainjs',PLUGIN_URL.'assets/js/main.js',['jquery'],false,true);
        wp_localize_script('mainjs','cptdisplayajax', admin_url('admin-ajax.php'));
    }
}
add_action('wp_enqueue_scripts','cptdisplay_frontend_scripts');

include_once PLUGIN_DIR.'views/partners/partners-logos.php'; //Partner Shortcode 
include_once PLUGIN_DIR.'views/resources/resources.php'; 
include_once PLUGIN_DIR.'views/events/events.php';
include_once PLUGIN_DIR.'views/resources/reports/report.php'; 
function cptdisplay_ajax()
{
    include_once PLUGIN_DIR.'inc/ajax.php';
    wp_die();
}
add_action('wp_ajax_library','cptdisplay_ajax');
add_action('wp_ajax_nopriv_library','cptdisplay_ajax');