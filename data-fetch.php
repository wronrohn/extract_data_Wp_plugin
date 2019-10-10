<?php
/*
Plugin Name: Add Categories from BC API
Plugin URI: https://github.com/wronrohn
Description: A plugin which automatically displays all the tags as categories in the side bar of the website
Version: 1.0
Author: Rohnit Shetty
Author URI: https://github.com/wronrohn
*/
/*
	Copyright 2019	Rohnit Shetty	(email : jason@strangerstudios.com)
	Licensed under the GPLv2 license: http://www.gnu.org/licenses/gpl-2.0.html
*/

include 'config.php';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    $header
));
curl_setopt($ch, CURLOPT_HEADER, 0);

$output = curl_exec($ch);
$output = json_decode($output, true);
$catArr = array();
$data = $output['data'];

for($i=0; $i < count($data); $i++){
    if(in_array($data[$i]['tags'], $catArr)){
       continue;
    }else{
        array_push($catArr, $data[$i]['tags'] );
    }
}



function addCat(){
    global $catArr;
    for($i=0; $i < count($catArr); $i++){
        wp_insert_term(
            $catArr[$i],
            'category',
            array(
                'description' => $i,
                'slug' => $catArr[$i]
            )
        );
    }
    

    
    return;
}
add_filter( 'widget_categories_args', 'force_widget_cat_args' );
function force_widget_cat_args($cat_args) {
    $cat_args['hide_empty'] = 0;
    return $cat_args;
}



add_action("plugins_loaded", 'addCat');

