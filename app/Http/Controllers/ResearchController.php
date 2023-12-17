<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Resopnse;
use JSON;

class ResearchController extends AppController
{

    /*private $api_key = "AIzaSyC9BEMl9_aY-gWK5GlzNUYhQz1nioV6vjM";*/
    /*private $api_key = "AIzaSyDu1v1s5A6u7XEid_Oq32V6CnMgIsGVJdA";*/
    /*private $cx = "832e93e7cd48a4f8a";*/

    private $key = "739004dea9msh170126ee0145b2fp1c4854jsn276c9d626d66";
    private $host = "imdb8.p.rapidapi.com";

    public function search($sentence) {
        $link = "https://imdb8.p.rapidapi.com/auto-complete?rapidapi-key={$this->key}&rapidapi-host={$this->host}&q={$sentence}";
        $response = Http::get($link);

        $result = array();

        foreach ($response->json()['d'] as $item){
            if (!array_key_exists('q', $item)){
                continue;
            }
            if (array_key_exists('i', $item)){
                $picture = $item['i']['imageUrl'];
                }
            else {
                $picture = 'https://upload.wikimedia.org/wikipedia/commons/a/a1/Alan_Turing_Aged_16.jpg';
            }
            if (array_key_exists('y', $item)){
                $year = $item['y'];
                }
            else {
                $year = 'Unknown';
            }
            $object = array(
                'picture' => $picture,
                'id' => $item['id'],
                'title' => $item['l'],
                'type' => $item['q'],
                'cast' => $item['s'],
                'year' => $year
            );
            
            array_push($result, $object);
        }

        return $result;

    }

}
