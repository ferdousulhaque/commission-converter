<?php


namespace Src\resolver;


class Rate
{
    /**
     * @var string
     */
    private static $rateUrl = 'https://api.exchangeratesapi.io/latest';

    /**
     * @param $currency
     * @return bool|int
     */
    public static function getRate($currency){
        if($currency == 'EUR')
            return 1;
        $rateLatest = Http::request(self::$rateUrl,'get');
        if (!$rateLatest)
            return false;
        $r = json_decode($rateLatest,true);
        if(is_array($r) && !empty($r)){
            return isset($r['rates'][$currency])?doubleval($r['rates'][$currency]):1;
        }
        return false;
    }
}