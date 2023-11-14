<?php
/**
 * @package PermissionFormPlugin
 */

namespace Inc\Base;
class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}