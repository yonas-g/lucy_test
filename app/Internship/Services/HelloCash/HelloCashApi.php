<?php

namespace App\Internship\Services\HelloCash;

use App\Internship\Services\Config;
use App\Internship\Services\Request;
use function GuzzleHttp\json_decode;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Float_;

define('ALL_STATUES', 'PREPARED%2CPENDING%2CCANCELED%2CDENIED%2CEXPIRED%2CPROCESSED%2CFAILED');
class HelloCashApi
{

    public static function getAllInvoices($token)
    {

        $options = array(
            'url' => Config::api()['invoices'],
            'method' => 'GET',
            'headers' => array(
                "Authorization: Bearer ${token}"
            )
        );

        $response = json_decode(Request::get($options));

        return array_reverse($response);
    }
    public static function getAllAccounts($token)
    {
        $options = array(
            'url' => Config::api()['accounts'],
            'method' => 'GET',
            'headers' => array(
                "Authorization: Bearer ${token}"
            )

        );
        $response = json_decode(Request::get($options));
        return array_reverse($response);
    }
    public static function getAllTransfers($token)
    {
        $options = array(
            'url' => Config::api()['transfers'] . '?limit=100&status=' . ALL_STATUES,
            'method' => 'GET',
            'headers' => array(
                "Authorization: Bearer ${token}"
            )

        );

        $response = json_decode(Request::get($options));
        // $response = Request::get($options);
        // dd($response);
        return array_reverse($response);
    }
    public static function makeTransfer($token, $req)
    {
        $data = array(

            'to' => $req->input('toname'),
            'amount' => (float) $req->input('fee'),
            'notifyfrom' => true,
            'notifyto' => true
        );

        $option = array(
            'url' => Config::api()['transfers'],
            'method' => 'POST',
            'headers' => array(
                "Content-Type: application/json",
                "Authorization: Bearer ${token}"
            )
        );
        //Transfer payload
        $JSON = '
        {
            "amount": 40.15,
            "description": "{{transfer_description}}",
            "to": "{{default_customer}}",
            "currency": "{{currency}}",
            "tracenumber": "{{transfer_trace_number}}",
            "referenceid": "{{$guid}}",
            "notifyfrom": true,
            "notifyto": true
          }';
        $response = json_decode(Request::post($option, $data));
        dd($response);
        // dd($response);
        // $response = Request::post($option, $data);
        // return array_reverse($response);
        return $response;
    }
}
