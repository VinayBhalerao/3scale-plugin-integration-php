<?php

require_once('lib/ThreeScaleClient.php');

$client =  new ThreeScaleClient("YOUR_PROVIDER_KEY");

$response = $client->authorize_with_user_key($_GET["user_key"]);

function speech_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  
  //report against metric 
  GLOBAL $client;
   $client->report(array(array('user_key' => $_GET["user_key"],'usage' => array('speech' => 1))));

  $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer"));

  return $app_list;
}

function enroll_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array

  //report against metric 
  GLOBAL $client;
  $client->report(array(array('user_key' => $_GET["user_key"],'usage' => array('enroll' => 1))));

  $app_list = array(array("id" => 1, "name" => "Enroll abc"), array("id" => 2, "name" => "Enroll efg"), array("id" => 3, "name" => "Enroll mnp"), array("id" => 4, "name" => "Enroll xyz"));

  return $app_list;
}

if($response->isSuccess()) {


$possible_url = array("speech_list","enroll_list");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
 {
  switch ($_GET["action"])
    {
      case "speech_list":
        $value = speech_app_list();
        break;

      case "enroll_list":
        $value = enroll_app_list();
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
