<?php

require_once '../../vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '1491487620928045',
  'app_secret' => 'f4592f17c14fe094206de54b5d46b0cd',
  'default_graph_version' => 'v2.10',
  'default_access_token' => 'EAAVMgAXVEi0BAHHGhnjvBK3Q5b1y1tGIKNSBTaVpZC8GhxAo8Q9zdV61BM2pgh70PUaDFJDpO1nImhp6a7mCHfZBQdrrCueuTH0T6J75tOusRS8KRbZBMrd9GYk0smtbvGZBZC5gpmDFLXfHbRFF4ZAVVZCjvxeyQ4D6q5LsCdo8wZDZD
  ', // optional
]);

// print_r($fb);
// echo "<br />";

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
  $helper = $fb->getRedirectLoginHelper();

//   print_r($helper);
//   echo "<br/>";
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', 'EAAVMgAXVEi0BAHHGhnjvBK3Q5b1y1tGIKNSBTaVpZC8GhxAo8Q9zdV61BM2pgh70PUaDFJDpO1nImhp6a7mCHfZBQdrrCueuTH0T6J75tOusRS8KRbZBMrd9GYk0smtbvGZBZC5gpmDFLXfHbRFF4ZAVVZCjvxeyQ4D6q5LsCdo8wZDZD
  ');

  // Returns a `Facebook\FacebookResponse` object
//   $response = $fb->get('/me?fields=id,name', '$accessToken');

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();

?>