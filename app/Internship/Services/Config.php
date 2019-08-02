<?php

namespace App\Internship\Services;
// $settings-> kidus
// $settings-> yemane
// $settings-> api.authenticate
// $settings-> api.invoices
// $settings-> api.transfers
// $settings-> api.accounts
define("API_URL",             env("HELLOCASH_API_URL"));

define("KIDUS_PRINCIPAL",     env("KIDUS_PRINCIPAL"));
define("KIDUS_CREDENTIALS",   env("KIDUS_CREDENTIALS"));
define("KIDUS_SYSTEM",        env("KIDUS_SYSTEM"));

define("YEMANE_PRINCIPAL",    env("YEMANE_PRINCIPAL"));
define("YEMANE_CREDENTIALS",  env("YEMANE_CREDENTIALS"));
define("YEMANE_SYSTEM",       env("YEMANE_SYSTEM"));
class Config
{
  private static $settings = array(
    "kidus" => array(
      "principal"     => KIDUS_PRINCIPAL,
      "credentials"   => KIDUS_CREDENTIALS,
      "system"        => KIDUS_SYSTEM
    ),
    "yemane" => array(
      "principal"     => YEMANE_PRINCIPAL,
      "credentials"   => YEMANE_CREDENTIALS,
      "system"        => YEMANE_SYSTEM
    ),
    "api" => array(
      "authenticate"  => API_URL . "/authenticate",
      "invoices"      => API_URL . "/invoices",
      "accounts"      => API_URL . "/accounts"
    )
  );

  static function kidus()
  {
    return json_encode(Config::$settings["kidus"]);
  }
  static function yemane()
  {
    return json_encode(Config::$settings["yemane"]);
  }
  static function login($who)
  {
    if (array_key_exists($who, Config::$settings)) {
      $options = array(
        "url" => Config::$settings["api"]["authenticate"],
        "method" => "POST",
        "headers" => array(
          'Content-Type: application/json'
        )
      );
      $payload = Config::$settings[$who];
      return Request::post($options, $payload);
    } else {
      $message = array("message" => "Unknown Account " . $who, "status" => "ERROR");
      return json_encode($message);
    }
  }
}
