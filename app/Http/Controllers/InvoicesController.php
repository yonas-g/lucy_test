<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship\Services\Config;
use App\Internship\Services\HelloCash\HelloCashApi;

class InvoicesController extends Controller
{
    public function authenticate(Request $req)
    {
        // return view('invoices', array("data" => Config::login($req->query('who'))));
        return Config::login($req->query('who'));
    }

    public function getInvoices(Request $req)
    { 
        $response = json_decode($this->authenticate($req));

        if(!isset($response->token)) {
            return view('invoices')->with([
                'error' => 'wrong credentials'
            ]);
        }

        // dd(HelloCashApi::getAllInvoices($response->token));

        return view('invoices')->with([
            'invoices' => HelloCashApi::getAllInvoices($response->token)
        ]);
    }
}
