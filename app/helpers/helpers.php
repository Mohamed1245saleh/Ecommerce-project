<?php
namespace App\helpers;
class helpers
{
    public static function  activeSideBar($url , $moduleName){
        $return = "";
        $explode = explode("/" , $url);
        if($explode[6] == strtolower($moduleName)){
            $return = "active has-sub";
            return $return;
        }

    }
}

