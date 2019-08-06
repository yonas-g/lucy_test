<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship\Services\Config;
use App\Internship\Services\HelloCash\HelloCashApi;

class AccountController extends Controller
{
    public function authenticate(Request $req)
    {
        // return view('invoices', array("data" => Config::login($req->query('who'))));
        return Config::login($req->query('who'));
    }

    public function getAccounts(Request $req)
    {
        $response = json_decode($this->authenticate($req));
        // return $req;

        if (!isset($response->token)) {
            return view('accounts')->with([
                'error' => 'wrong credentials'
            ]);
        }

        //dd(HelloCashApi::getAllAccounts($response->token));

        return view('accounts')->with([
            'accounts' => HelloCashApi::getAllAccounts($response->token)
        ]);
    }
}
