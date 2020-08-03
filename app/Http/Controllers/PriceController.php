<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PriceController extends Controller{
    public static function getPrice($basePrice){
        try{
            $client = new Client([
                'base_uri' => 'http://localhost:8000',
                'defaults' => [
                    'exceptions' => false
                ]
            ]);
            $res = $client->get('/cost/getCost/' .$basePrice. '/a/b/c');
            return json_decode($res->getBody(), true);
        }catch (GuzzleException $e){

        }

        return "test";
    }

    public function getFinalPrice($basePrice, $region, $age, $category){
        try{
            $client = new Client([
                'base_uri' => 'http://localhost:8000',
                'defaults' => [
                    'exceptions' => false
                ]
            ]);
            //dd('/cost/getFinalPrice/' .$basePrice. '/'.$region.'/30/'.$category);
            $res = $client->get('/cost/getFinalPrice/' .$basePrice. '/'.$region.'/'.$age.'/'.$category);

            return json_decode($res->getBody(), true);
        }catch (GuzzleException $e){

        }
        return "test";
    }

}
