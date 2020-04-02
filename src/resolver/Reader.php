<?php


namespace Src\resolver;


class Reader
{
    /**
     * @param $filename
     * @return array|bool
     */
    public static function fileLineToArray($filename){
        try{
            $contents = @file_get_contents($filename);
            if(!empty($contents)){
                return explode("\n", $contents);
            }
        }catch (\Exception $ex){
            //echo $ex->getMessage();die;
            return false;
        }

    }
}