<?php

use Phalcon\Mvc\Controller;

session_start();

class WeatherController extends Controller
{
    public function indexAction()
    {
        $baseUrl = "http://api.weatherapi.com/v1/";
        $type = "$_POST[type]";
        $key = ".json?key=0bab7dd1bacc418689b143833220304&q=";
        $place = "$_POST[search]";
        $date = date("Y-m-d");
        if ($type == 'forecast') {
            $_SESSION['data'] = $this->apiUrl->api($baseUrl . $type . $key . $place . '&days=3');
        }
        else if ($type == 'history') {
            $_SESSION['data'] = $this->apiUrl->api($baseUrl . $type . $key . $place .
             '&dt=2023-05-07&end_dt='.$date);
        } else {
            $_SESSION['data'] = $this->apiUrl->api($baseUrl . $type . $key . $place);
        }
        $this->response->redirect('display/' . $type);
    }
}
