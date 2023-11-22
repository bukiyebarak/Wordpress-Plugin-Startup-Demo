<?php
/**
 * @package PermissionFormPlugin
 */

namespace Inc\Base;
class Deactivate
{
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}