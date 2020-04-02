<?php


namespace Src;


use Src\resolver\Country;
use Src\resolver\Parser;
use Src\resolver\Rate;
use Src\resolver\Reader;

class Commission
{
    /**
     * @param $filename
     */
    public static function calculateCommission($filename){
        $data = Reader::fileLineToArray($filename);
        if(is_array($data) && !empty($data)){
            foreach($data as $single){
                $spread = Parser::jsonParser($single);
                $rate = Rate::getRate($spread['currency']);
                $amountFixed = $spread['amount'] / $rate;
                $commission = round($amountFixed * (Country::isEU($spread['bin']) == 'yes' ? 0.01 : 0.02),2);
                self::logPrinter($commission);
            }
        }
    }

    /**
     * @param $commission float
     */
    private static function logPrinter($commission){
        echo $commission;
        print "\n";
    }
}