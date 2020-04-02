<?php


namespace Src\resolver;


class Parser
{
    /**
     * @param $line
     * @return mixed
     */
    public static function jsonParser($line){
        $makeArray = json_decode($line,true);
        if($makeArray && is_array($makeArray)){
            return $makeArray;
        }
        return false;
    }
}