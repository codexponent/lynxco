<?php

// require "twitteroauth/autoload.php";
// use Abraham\TwitterOAuth\TwitterOAuth;

// $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
// $content = $connection->get("account/verify_credentials");
// $access_token = '99194539-5OJZSclsiLf4YNqPRSnjwfcfHri7eAR1Vh4zXBTgk';
// $access_token_secret = 'iMn4TswXIHp3GgxEBelllEvw9saFb2whzmQGsaYCv5LgR';
// $connection = new TwitterOAuth('aEmzmDkEgG1QkPWavWNQ4eyx5', 'DXcM21ElW348RGLA3PvanY3k2DBVzZH95xQFlLQ8U6P335YbH1', $access_token, $access_token_secret);
// $content = $connection->get("account/verify_credentials");

//https://api.twitter.com/oauth/authenticate?oauth_token=Z6eEdO8MOmk394WozF5oKyuAv855l4Mlqo7hhlSLik


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
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

?>