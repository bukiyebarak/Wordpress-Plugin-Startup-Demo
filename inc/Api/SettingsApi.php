<?php
/**
 * @package PermissionFormPlugin
 */

namespace Inc\Api;

use function Symfony\Component\Translation\t;

class SettingsApi
{
    public array $admin_pages = array();
    public array $admin_subpages = array();
    public array $settings = array();
    public array $sections = array();
    public array $fields = array();

    public function register(): void
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', array($this, 'addAdminMenu'));
        }
        if (!empty($this->settings)){
            add_action('admin_init',array($this,'registerCustomFields'));
        }
    }

    public function addPages(array $pages): static
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function withSubpage(string $title = null): static
    {
        if (empty($this->admin_pages)) {
            return $this;
        }
        $admin_page = $this->admin_pages[0];
        $subpage = array(
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback'],
            ),
        );

        $this->admin_subpages = $subpage;
        return $this;
    }

    public function addSubpages(array $pages): static
    {
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);
        return $this;
    }

    public function addAdminMenu(): void
    {

        foreach ($this->admin_pages as $page) {
            add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
        }

        foreach ($this->admin_subpages as $subpage) {
            add_submenu_page($subpage['parent_slug'], $subpage['page_title'], $subpage['menu_title'], $subpage['capability'], $subpage['menu_slug'], $subpage['callback']);
        }
    }

    /**
     * @param array $settings
     * @return SettingsApi
     */
    public function setSettings(array $settings): static
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * @param array $fields
     * @return SettingsApi
     */
    public function setFields(array $fields): static
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param array $sections
     * @return SettingsApi
     */
    public function setSections(array $sections): static
    {
        $this->sections = $sections;
        return $this;
    }

    public function registerCustomFields()
    {
        // register setting
        foreach ($this->settings as $setting)
        {
            register_setting($setting["option_group"], $setting["option_name"], ($setting["callback"] ?? ''));
        }

        // add settings section
        foreach ($this->sections as $section)
        {
            add_settings_section($section["id"], $section["title"], ($section["callback"] ?? ''), $section["page"]);
        }
        // add settings field
        foreach ($this->fields as $field)
        {
            add_settings_field($field["id"], $field["title"], ($field["callback"] ?? ''), $field["page"], $field["section"], ($field["args"] ?? ''));
        }
    }
}