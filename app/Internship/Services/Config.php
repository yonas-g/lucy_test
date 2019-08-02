<?php 
namespace App\Internship\Services;
// $settings-> kidus
// $settings-> yemane
// $settings-> api.authenticate
// $settings-> api.invoices
// $settings-> api.transfers
// $settings-> api.accounts
//$baseURL = "https://api-et.hellocash.net";
define("API_URL","https://api-et.hellocash.net");
class Config {
  private static $settings = array(
    "kidus" => array(
      "principal" => "1416563",
      "credentials" => "lucy1234",
      "system"=> "lucy"
    ),
    "yemane" => array( 
      "principal"=> "1569560",
      "credentials"=> "lucy1234",
      "system"=> "lucy"
    ),
    "api" => array(
      "authenticate" => API_URL."/authenticate",
      "invoices" => API_URL."/invoices",
      "accounts" => API_URL."/accounts"
    )
    );
    
    static function kidus () {
      return json_encode(Config::$settings["kidus"]);
   
    } 
    static function yemane () {
      return json_encode(Config::$settings["yemane"]);
      
    }
    static function login($who) {      
      if(array_key_exists($who,Config::$settings)) {
        $options = array(
          "url" => Config::$settings["api"]["authenticate"],
          "method" => "POST",
          "headers" => array()          
        );
        $payload = Config::$settings[$who];
        return Request::post($options,$payload);
      }else {
        $message =array("message"=> "Unknown Account ".$who, "status"=> "ERROR");
        return json_encode($message);
      }
    }
  }
  