<?php
/**
 * @package PermissionFormPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminTaxonomy()
    {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function adminWidget()
    {
        return require_once("$this->plugin_path/templates/widget.php");
    }

    public function adminCpt()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }
    public function permitOptionsGroup($input)
    {
        return $input;
    }
    public function permitAdminSection()
    {
        echo 'check this beautiful section!';
    }
    public function permitTextExample()
    {
        $value=esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="'.$value.'" placeholder="Write Something Here!" />';
    }
    public function permitFirstName()
    {
        $value=esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="'.$value.'" placeholder="Write your First Name" />';
    }
}