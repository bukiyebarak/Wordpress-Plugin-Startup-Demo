<?php
/**
 * @package PermissionFormPlugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public SettingsApi $settings;
    public AdminCallbacks $callbacks;
    public array $pages = array();
    public array $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings->addPages($this->pages)->withSubpage('Dashboard')->addSubpages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Permission Form Plugin',
                'menu_title' => 'Permission',
                'capability' => 'manage_options',
                'menu_slug' => 'permission_form',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',  // Menü ikonu (isteğe bağlı)
                'position' => 20
            ),
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'permission_form',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'permit_form_cpt',
                'callback' => array($this->callbacks, 'adminCpt')
            ),
            array(
                'parent_slug' => 'permission_form',
                'page_title' => 'Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'permit_form_taxonomies',
                'callback' => array($this->callbacks, 'adminTaxonomy')
            ),
            array(
                'parent_slug' => 'permission_form',
                'page_title' => 'Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'permit_form_widgets',
                'callback' => array($this->callbacks, 'adminWidget')
            ),
        );
    }


    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'permit_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'permitOptionsGroup')
            ),
            array(
                'option_group' => 'permit_options_group',
                'option_name' => 'first_name',
            )
        );
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'permit_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'permitAdminSection'),
                'page' => 'permission_form_plugin'
            )
        );
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'permitTextExample'),
                'page' => 'permission_form_plugin',
                'section' => 'permit_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            )  ,
            array(
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'permitFirstName'),
                'page' => 'permission_form_plugin',
                'section' => 'permit_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class'
                )
            )
        );
        $this->settings->setFields($args);
    }
}