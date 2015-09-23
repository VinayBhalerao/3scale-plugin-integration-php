<?php

require_once('lib/ThreeScaleClient.php');

$client =  new ThreeScaleClient("ecbffa8e236aba08f98c50075d207f4c");

$user-key= "ced4fe2a1db89ff08c3e75896b82ece6";

$response = $client->authrep_with_user_key($user-key, array('hits' => 1));

function get_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer"));

  return $app_list;
}

if($response->isSuccess()) {


$possible_url = array("get_app_list");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
 {
  switch ($_GET["action"])
    {
      case "get_app_list":
        $value = get_app_list();
        break;
    }
 }
}
else {
  echo "Error: " . $response->getErrorMessage() . "\n";
}

//return JSON array
exit(json_encode($value));
?>
