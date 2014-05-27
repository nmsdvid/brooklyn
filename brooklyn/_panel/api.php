<?php

require('../_cms/index.php');

/**
 * brooklyn cms
 * api
 * version: 0.1
 * http://brooklyncms.com/
 * created by David Nemes - @nmsdvid
 */

//create, modify content
if(isset($_POST['title'])){
    $count = count($_POST['title']);

    $array = array();

    for($i=0; $i<$count; $i++){
        $title = $_POST['title'][$i];
        $content = $_POST['content'][$i];
        $id = $_POST['id'][$i];
        $time = $_POST['time'][$i];
        $description = $_POST['description'][$i];
        $jsdata =  array("content" => array("id" => "$id", "meta" => array("content" => "$content","title" => "$title","time" => "$time","description" => "$description","id" => "$id")));
        array_push($array,$jsdata);
        if(($count-1) == $i){
            $cms->addData($array);
        }
    }
}

//login user
if(isset($_POST['username'])){
    $cms->login($_POST['username'], $_POST['password']);
}

//change settings
if(isset($_POST['settings-username'])){
    $set_username = $_POST['settings-username'];
    $set_password = $_POST['settings-password'];
    $cookie_token = $_POST['settings-cookie'];
    $site_title = $_POST['site-title'];
    $meta_desc = $_POST['meta-desc'];
    $meta_key = $_POST['meta-key'];
    $array = array();
    $jsdata =  array("settings" => array("cookie_token" => "$cookie_token","username" => "$set_username","password" => "$set_password","site_title" => "$site_title","meta_description" => "$meta_desc","meta_keywords" => "$meta_key"));
    array_push($array,$jsdata);
    $cms->saveSettings($array);
}

//delete content
if(isset($_POST['delete'])){
    $cms->delete($_POST['delete']);
}

//check id
if(isset($_POST['sugg-id'])){
    $cms->validateId($_POST['new-id']);
}
