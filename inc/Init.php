<?php

/**
 * @package PermissionFormPlugin
 */

namespace Inc;

//final is not inherit (not extends anotherClasses)
final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services(): array
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }
    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     * @return void
     */
    public static function register_services(): void
    {

        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     *Initialize the class
     * @param string $class class from the services array
     * @return mixed class  instance new instance of the class
     */
    private static function instantiate( string $class): mixed
    {
        $service = new $class();
        return $service;
    }
}

//use Inc\Base\Activate;
//use Inc\Base\Deactivate;
//use Inc\Pages\Admin;
//
//if (!class_exists('PermissionFormPlugin')) {
//    class PermissionFormPlugin
//    {
//        public $plugin;
//
//        public function __construct()
//        {
//            $this->plugin = plugin_basename(__FILE__);
//        }
//
//        function register()
//        {
//            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
//            add_action('admin_menu', array($this, 'add_admin_pages'));
//
//            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
//        }
//
//        public function settings_link($link)
//        {
//            // add custom settings link
//            $settings_link = '<a href="admin.php?page=permission_form">Settings </a>';
//            $link[] = $settings_link;
//            return $link;
//        }
//
//        public function add_admin_pages()
//        {
//            add_menu_page('Permission Form Plugin',
//                'Permission',
//                'manage_options',
//                'permission_form',
//                array($this, 'admin_index'),
//                'dashicons-store',  // Menü ikonu (isteğe bağlı)
//                20,
//            );
//        }
//
//        public function admin_index()
//        {
//            //require template
//            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//
//        }
//
//        function activate()
//        {
//            //  require_once plugin_dir_path(__FILE__) . 'inc/Activate.php';
//            Activate::activate();
//        }
//
//        function deactivate()
//        {
//
//            Deactivate::deactivate();
//        }
//
//        function enqueue()
//        {
//            //enqueue all our scripts
//            wp_enqueue_script('mypluginscript', plugins_url('/assets/script.js', __FILE__));
//            wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
//        }
//    }
//
//    $permissionForm = new PermissionFormPlugin();
//    $permissionForm->register();
//
//
//    register_activation_hook(__FILE__, array($permissionForm, 'activate'));
//
////    require_once plugin_dir_path(__FILE__) . 'inc/Deactivate.php';
//    register_deactivation_hook(__FILE__, array($permissionForm, 'deactivate'));
//}