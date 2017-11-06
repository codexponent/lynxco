<?php

require_once '../../vendor/autoload.php'; // change path as needed

    $fb = new Facebook\Facebook([
        'app_id' => '1491487620928045',
        'app_secret' => 'f4592f17c14fe094206de54b5d46b0cd',
        'default_graph_version' => 'v2.2',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl('http://localhost/lynxco/api/product/fb-callback.php', $permissions);

    echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>