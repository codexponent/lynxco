<?php
session_start();

// Include config file and twitter PHP Library
include_once("config.php");
include_once("twitter/twitteroauth.php");

if(isset($_GET['request']))
{
    //Fresh authentication
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
    $request_token = $connection->getRequestToken(OAUTH_CALLBACK);
    
    //Received token info from twitter
    $_SESSION['token'] 			= $request_token['oauth_token'];
    $_SESSION['token_secret'] 	= $request_token['oauth_token_secret'];
    
    //Any value other than 200 is failure, so continue only if http code is 200
    if($connection->http_code == '200')
    {
        //redirect user to twitter
        $twitter_url = $connection->getAuthorizeURL($request_token['oauth_token']);
        header('Location: ' . $twitter_url);
    }else{
        die("error connecting to twitter! try again later!");
    }
}


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LynxCo</title>

    <!-- Bootstrap core CSS -->
    <link href="../../slider/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../css/full-slider.css" rel="stylesheet">
    <link href="../../css/ihover.min.css" rel="stylesheet">
  </head>
  <style>
    table,
    tr,
    th,
    td,
    tbody {
      border: 1px solid black;
    }
    
    h2 {
      text-align: center;
    }
  </style>

  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">LynxCo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../../index.php">Home
<a class="nav-link" href="index.php?request=twitter">Login Via Twitter
<span class="sr-only">(current)</span>
</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br />
    <br />
    <br />

    <?php
if(isset($_REQUEST['oauth_token']) && $_SESSION['token'] == $_REQUEST['oauth_token']){
    
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['token'] , $_SESSION['token_secret']);
    $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
    if($connection->http_code == '200')
    {
        
        $user_data = $connection->get('account/verify_credentials');
        $result = '<h1>Twiiter Profile Details </h1>';
        $result .= '<img src="'.$user_data['profile_image_url'].'">';
        $result .= '<br/>Twiiter ID : ' . $user_data['id'];
        $result .= '<br/>Name : ' . $user_data['name'];
        $result .= '<br/>Twiiter Handle : ' . $user_data['screen_name'];
        $result .= '<br/>Follower : ' . $user_data['followers_count'];
        $result .= '<br/>Follows : ' . $user_data['friends_count'];
        $result .= '<br/>Logout from <a href="logout.php?logout">Twiiter</a>';
        // echo '<div>'.$result.'</div>';
    }else{
        die("error, try again later!");
    }
    ?>

      <section class="py-5">
        <h2>Twitter Profile Details </h2>
        <div class="row">
          <div class="col-md-2 col-md-offset-2"></div>
          <div class="col-md-8 col-md-offset-2">
            <table>
              <thead>
                <tr>
                  <th>Twitter Profile</th>
                  <th>Twitter ID</th>
                  <th>Name</th>
                  <th>Twitter Handle</th>
                  <th>Follower</th>
                  <th>Follows</th>
                  <th>Logout</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td><img src="<?php echo $user_data['profile_image_url']; ?>"></td>
                  <td>
                    <?php echo $user_data['id']; ?>
                  </td>
                  <td>
                    <?php echo $user_data['name']; ?>
                  </td>
                  <td>
                    <?php echo $user_data['screen_name']; ?>
                  </td>
                  <td>
                    <?php echo $user_data['followers_count']; ?>
                  </td>
                  <td>
                    <?php echo $user_data['friends_count']; ?>
                  </td>
                  <td>Logout from <a href="logout.php?logout">Twiiter</a></td>
                </tr>


                <?php
}
else{
    //Display login button
    ?>
                  <br />
                  <h2>OAuth Representation</h2>
                  <?php
    // echo '<a href="index.php?request=twitter"><img src="image/login_button.jpg" /></a>';
}
?>

                    <footer class="py-10 bg-dark">
                      <div class="container">
                        <p class="m-0 text-center text-white">Copyright &copy; LynxCo</p>
                      </div>
                      <!-- /.container -->
                    </footer>

                    <!-- Bootstrap core JavaScript -->
                    <script src="../../slider/jquery/jquery.min.js"></script>
                    <script src="../../slider/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>