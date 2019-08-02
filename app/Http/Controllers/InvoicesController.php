<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship\Services\Config;

class InvoicesController extends Controller
{
    public function authenticate(Request $req)
    {
        //    return view('invoices',array("data" => dd(Config::login($req->query('who')))));
        return Config::login($req->query('who'));
    }
    public function getInvoices(Request $req)
    { }
}
