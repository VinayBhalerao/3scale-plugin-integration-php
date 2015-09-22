<?php


require_once('/home/github_repo/php-plugin/sample-php/3scale_ws_api_for_php/lib/ThreeScaleClient.php');

$client =  new ThreeScaleClient("9062f7afd5a594f2e9882c34206eea67");

$response = $client->authrep_with_user_key('USER_KEY', array('hits' => 1));

if($response->isSuccess()) {

function get_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer")); 

  return $app_list;
}

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
