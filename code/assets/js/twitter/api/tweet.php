<?php
    require_once("twitteroauth/twitteroauth.php"); // Path to twitteroauth library
    
	// Consumer Key
    define('CONSUMER_KEY', 'hURfXZW4c8bTR8dDHceEQ');
    define('CONSUMER_SECRET', 'ZcHcT1OkMScUK9yg0lvuYRIHI06VnET0x5dUJ0Q');

    // User Access Token
    define('ACCESS_TOKEN', '1522772834-hIHSKSUqKeuqbU1eBTbxChBAYJmlr0OLowXCAfS');
    define('ACCESS_SECRET', 'EYhuWGsi5fPc4Hv5wFRVQEkQ3T9ntix9puf3L3T4rlmdP');

    // Check if keys are in place
    if (CONSUMER_KEY === '' || CONSUMER_SECRET === '' || CONSUMER_KEY === 'CONSUMER_KEY_HERE' || CONSUMER_SECRET === 'CONSUMER_SECRET_HERE') {
        echo 'You need a consumer key and secret keys. Get one from <a href="https://dev.twitter.com/apps">dev.twitter.com/apps</a>';
      
        exit;
    }

    // If count of tweets is not fall back to default setting
    $username = $_GET['username'];
    $number = $_GET['count'];
    $exclude_replies = $_GET['exclude_replies'];
    
    /**
     * Gets connection with user Twitter account
     * @param  String $cons_key     Consumer Key
     * @param  String $cons_secret  Consumer Secret Key
     * @param  String $oauth_token  Access Token
     * @param  String $oauth_secret Access Secrete Token
     * @return Object               Twitter Session
     */
    function getConnectionWithToken($cons_key, $cons_secret, $oauth_token, $oauth_secret) {
      $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_secret);
      
      return $connection;
    }
    
    // Connect
    $connection = getConnectionWithToken(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_SECRET);
    
    // Get Tweets
    $screenname = (isset($username)) ? '&screen_name='.$username : '';

    $tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?count='.$number.$screenname.'&exclude_replies='.$exclude_replies);

    // Return JSON Object
    header('Content-Type: application/json');

    echo json_encode($tweets);