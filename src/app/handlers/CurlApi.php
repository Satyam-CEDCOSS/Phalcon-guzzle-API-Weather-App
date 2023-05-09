<?php

namespace App\Handler;

use GuzzleHttp\Client;

require BASE_PATH.'/vendor/autoload.php';

class CurlApi
{
    public function api($url)
    {
        $client = new Client([
            'base_uri' => $url,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', $url);
        return json_decode($response->getBody());
    }
}
