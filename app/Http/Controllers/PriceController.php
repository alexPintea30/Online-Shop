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
}
