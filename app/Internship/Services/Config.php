<?php 
namespace App\Internship\Services;
// $config-> kidus
// $config-> yemane
// $config-> api.authenticate
// $config-> api.invoices
// $config-> api.transfers
// $config-> api.accounts
class Config {
  private static $baseURL = "https://api-et.hellocash.net";
  private static $config = array(
    "kidus" => array(
      "principal" => "1416563",
      "credentials" => "lucy1234",
      "system"=> "lucy"
    ),
    "yemane" => array( 
      "principal"=> "1569560",
      "credentials"=> "lucy1234",
      "system"=> "lucy")
    );
    
    static function kidus () {
      return json_encode(Config::$config["kidus"]);
   
    } 
    static function yemane () {
      return json_encode($config["yemane"]);
      
    }
    static function login($who) {
    }
  }
  