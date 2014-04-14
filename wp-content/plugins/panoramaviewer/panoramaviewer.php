<?php

/*
Plugin Name: Panorama Viewer
Plugin URI: https://github.com/lukaselmer/ethz-web-engineering-wordpress
Description: A simple panorama viewer with multitouch support
Version: 1.0.0
Author: Andreas Nufer, Ivo Nussbaumer, Lukas Elmer
Author URI: https://github.com/lukaselmer/ethz-web-engineering-wordpress/graphs/contributors
License: The MIT License (MIT)
License URI: https://raw.githubusercontent.com/lukaselmer/ethz-web-engineering-wordpress/master/LICENSE
*/


class PageTemplateHook {
    // This class is inspired (and partly copied) from http://www.wpexplorer.com/wordpress-page-templates-plugin/
    private $templates;

    private static $instance;

    // Singleton... :-(
    public static function get_instance() {
        if (null == self::$instance) self::$instance = new PageTemplateHook();
        return self::$instance;
    }

    private function __construct() {
        $this->templates = array();
        add_filter('page_attributes_dropdown_pages_args', array($this, 'register_project_templates'));
        add_filter('wp_insert_post_data', array($this, 'register_project_templates'));
        add_filter('template_include', array($this, 'view_project_template'));
        $this->templates = array('weekly.php' => 'Weekly Recommendation');
    }

    public function register_project_templates($atts) {
        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());
        $templates = wp_get_theme()->get_page_templates();
        if (empty($templates)) $templates = array();
        wp_cache_delete($cache_key, 'themes');
        $templates = array_merge($templates, $this->templates);
        wp_cache_add($cache_key, $templates, 'themes', 1800);
        return $atts;
    }

    public function view_project_template($template) {
        global $post;

        if (!isset($this->templates[get_post_meta($post->ID, '_wp_page_template', true)])) return $template;
        $file = plugin_dir_path(__FILE__) . get_post_meta($post->ID, '_wp_page_template', true);
        if (file_exists($file)) return $file;

        echo($file);
        return $template;
    }
}

add_action('plugins_loaded', array('PageTemplateHook', 'get_instance'));


function panorama_assets() {
    wp_register_style('panoramaviewer', plugins_url('panoramaviewer/panorama.css'));
    wp_enqueue_style('panoramaviewer');

    wp_register_script('panoramaviewer', plugins_url('panoramaviewer/js/panorama.js'), array('jquery'));
    wp_enqueue_script('panoramaviewer');
}

add_action('wp_enqueue_scripts', 'panorama_assets');
