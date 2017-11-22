<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LynxCo</title>
    <!-- Bootstrap core CSS -->
    <link href="../slider/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/full-slider.css" rel="stylesheet">
    <link href="../css/ihover.min.css" rel="stylesheet">
  </head>

  <style>

    table, tr, th, td, tbody{
        border: 1px solid black;
    }

    h2 {
        text-align: center;
    }

</style>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">LynxCo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>        

    <section class="py-5">
        <h2>REST API Representation </h2>
                <div class="row">
                    <div class="col-md-2 col-md-offset-2"></div>
                    <div class="col-md-8 col-md-offset-2">
                        <table >
                        <thead>
                            <tr>
                                <th>Time and Date of Tweet</th>
                                <th>Tweet</th>
                                <th>Tweeted by</th>
                                <th>Screen Name</th>
                                <th>Followers</th>
                                <th>Friends</th>
                                <th>Listed</th>
                            </tr>
                        </thead>
                        <tbody>

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
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "iagdotme";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
// if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        // echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        // echo "Tweet: ". $items['text']."<br />";
        // echo "Tweeted by: ". $items['user']['name']."<br />";
        // echo "Screen name: ". $items['user']['screen_name']."<br />";
        // echo "Followers: ". $items['user']['followers_count']."<br />";
        // echo "Friends: ". $items['user']['friends_count']."<br />";
        // echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
        $tweetTime = $items['created_at'];
        $tweet = $items['text'];
        $tweetedBy = $items['user']['name'];
        $screenName = $items['user']['screen_name'];
        $followers = $items['user']['followers_count'];
        $friends = $items['user']['friends_count'];
        $listed = $items['user']['listed_count'];
    
?>


<tr>
            <td><?php echo $tweetTime; ?></td>
            <td><?php echo $tweet; ?></td>
            <td><?php echo $tweetedBy; ?></td>
            <td><?php echo $screenName; ?></td>
            <td><?php echo $followers; ?></td>
            <td><?php echo $friends; ?></td>
            <td><?php echo $listed; ?></td>	  
        </tr>

		<?php 
		  }
			// mysqli_close($connection); 
		?>	<!-- Closing of the while loop -->

    </section>

    <!-- <section class="py-5">
        <div class="row">
            <div class="col-sm-2"></div>
            
            <div class="col-sm-5"> 
            </div>

            <div class="col-sm-5">    
            </div>  
        </div>
    </section> -->
    
    <!-- Page Content -->
    <!-- <section class="py-5">
      <div class="container">
        <h1>Full Slider by Start Bootstrap</h1>
        <p>The background images for the slider are set directly in the HTML using inline CSS. The rest of the styles for this template are contained within the
          <code>full-slider.css</code>file.</p>
      </div>
    </section> -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; LynxCo</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../slider/jquery/jquery.min.js"></script>
    <script src="../slider/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
