<?php


namespace Src\resolver;


class Http
{
    /**
     * @param $url
     * @param $method
     * @param $verifySSL boolean
     * @param array $header
     * @param null $params
     * @return bool|string
     */
    public static function request($url, $method, $verifySSL = false, $header = [],$params = null) {
        try{
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => strtoupper($method),
                CURLOPT_SSL_VERIFYPEER => $verifySSL
            ]);

            if($params != null){
                curl_setopt($curl, CURLOPT_POSTFIELDS,$params);
            }

            if(!empty($header)){
                curl_setopt($curl,CURLOPT_HTTPHEADER ,$header);
            }

            $response = curl_exec($curl);

            if(curl_error($curl)) {
                echo curl_close($curl);
                return false;
            }else{
                curl_close($curl);
                return $response;
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
            return false;
        }
    }
}