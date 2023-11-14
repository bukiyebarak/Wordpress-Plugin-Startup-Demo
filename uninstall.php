<?php
/**
 * Trigger this file on Plugin uninstall
 *
 * @package PermissionFormPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')){
    die;
}

// Clear Database stored data

////$permits=get_posts(array('post_title'=>'permit', 'numberposts'=>-1)); //-1 : get all permit title
////
////foreach ($permits as $permit) {
////    wp_delete_post($permit->ID,true);
////}
//
//global $wpdb;
//$wpdb->query("DELETE FROM wp_posts WHERE post_title='permit'");
//$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)");
//$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");