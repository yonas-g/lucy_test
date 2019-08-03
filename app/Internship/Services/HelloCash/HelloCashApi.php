<?php

namespace App\Internship\Services\HelloCash;

use App\Internship\Services\Config;
use App\Internship\Services\Request;

class HelloCashApi {

    public static function getAllInvoices($token) {

        $options = array(
            'url'=> Config::api()['invoices'],
            'method' => 'GET',
            'headers' => array(
                "Authorization: Bearer ${token}"
            )
        );

        $response = json_decode(Request::get($options));

        return array_reverse($response);
        
    }
}