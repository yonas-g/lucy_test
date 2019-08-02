<?php

namespace App\Internship\Services;

class Request
{
    static function get($url)
    {
        $response = array("status" => 200, "message" => "Welcome");
        return json_encode($response); //TODO;
    }
    static function post($options, $payload)
    {
        $response = null;
        //  $response = array("status"=> 200, "message"=> "Welcome", "body"=> array("options" => $options,"payload"=> $payload));
        $ch = curl_init($options['url']);
        // curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $options['headers']);
        if (!$response = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        // dd($response);
        curl_close($ch);
        return $response;
    }
}
