<?php
require_once('twitterapi/TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "99194539-5OJZSclsiLf4YNqPRSnjwfcfHri7eAR1Vh4zXBTgk",
    'oauth_access_token_secret' => "iMn4TswXIHp3GgxEBelllEvw9saFb2whzmQGsaYCv5LgR",
    'consumer_key' => "aEmzmDkEgG1QkPWavWNQ4eyx5",
    'consumer_secret' => "DXcM21ElW348RGLA3PvanY3k2DBVzZH95xQFlLQ8U6P335YbH1"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
$getfield = '?screen_name=iagdotme&count=20';

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)

->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

// print_r($string);
// if ($string["errors"] != null){
//     if($string["errors"][0]["message"] != "") {
//         echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";
//         exit();
//     }
// }
echo "<pre>";
print_r($string);
echo "</pre>";
?>