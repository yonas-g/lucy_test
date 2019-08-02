<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intership\Services\Accounts;

class InvoicesControler extends Controller
{
    public function authenticate($who) { 
        //I have to be able to get $config.includes($who) returning true / false
    }
    public function getInvoices(Request $req) {
        
    }
}
