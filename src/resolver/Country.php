<?php

namespace Src\resolver;

class Country
{

    /**
     * @var string
     */
    private static $resolverUrl = 'https://lookup.binlist.net/';

    private static $euArr = ['AT','BE','BG','CY','CZ','DE','DK','EE','ES','FI','FR','GR','HR','HU','IE','IT','LT','LU','LV','MT','NL','PO','PT','RO','SE','SI','SK'];

    /**
     * @param $binVal
     * @return string | null
     */
    public static function resolveCountry($binVal){
        $binResults = Http::request(self::$resolverUrl.$binVal,'get');
        if (!$binResults)
            return false;
        $r = json_decode($binResults);
        return isset($r->country->alpha2)?$r->country->alpha2:null;
    }

    /**
     * @param $binVal
     * @return bool
     */
    public static function isEU($binVal){
        return in_array(self::resolveCountry($binVal),self::$euArr);
    }
}