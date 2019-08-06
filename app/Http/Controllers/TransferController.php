<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship\Services\Config;
use App\Internship\Services\HelloCash\HelloCashApi;
use Symfony\Component\Console\Input\Input;

class TransferController extends Controller
{
    public function authenticate($who)
    {
        // return view('invoices', array("data" => Config::login($req->query('who'))));
        return Config::login($who);
    }

    public function getAllTransfer(Request $req)
    {
        $who = $req->query('who');
        $response = json_decode($this->authenticate($who));
        // return $req;

        if (!isset($response->token)) {
            return view('transfers')->with([
                'error' => 'wrong credentials'
            ]);
        }
        //  dd($response->token);
        // dd(HelloCashApi::getAllTransfers($response->token));

        return view('transfers')->with([
            'transfers' => HelloCashApi::getAllTransfers($response->token)
        ]);
    }
    public function makeTransfer(Request $req)
    {

        // return  $req->input("toname");

        $response = json_decode($this->authenticate($req->input("who")));
        if (!isset($response->token)) {
            return view('accounts')->with([
                'error' => 'wrong credentials'
            ]);
        } else {

            HelloCashApi::makeTransfer($response->token, $req);
            return back();
        }
    }
}
