<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->library('grocery_CRUD');	
		$this->load->library('twitteroauth');
	}

	
	public function index()
	{
		$this->load->view('info');
	}
	
	public function twitter()
	{
		
		$consumer = "hURfXZW4c8bTR8dDHceEQ";
		$consumer_secret="ZcHcT1OkMScUK9yg0lvuYRIHI06VnET0x5dUJ0Q";
		$access_token="1522772834-hIHSKSUqKeuqbU1eBTbxChBAYJmlr0OLowXCAfS";
		$access_token_secret="EYhuWGsi5fPc4Hv5wFRVQEkQ3T9ntix9puf3L3T4rlmdP";
		
		// If count of tweets is not fall back to default setting
		$username = 'faraheedy1';
		$number = 16;
		$exclude_replies = true;
		
		/**
		 * Gets connection with user Twitter account
		 * @param  String $cons_key     Consumer Key
		 * @param  String $cons_secret  Consumer Secret Key
		 * @param  String $oauth_token  Access Token
		 * @param  String $oauth_secret Access Secrete Token
		 * @return Object               Twitter Session
		 */
		
	    $connection = $this->twitteroauth->create($consumer, $consumer_secret, $access_token, $access_token_secret);
		
		
		// Get Tweets
		$screenname = (isset($username)) ? '&screen_name='.$username : '';

		$tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?count='.$number.$screenname.'&exclude_replies='.$exclude_replies);

		// Return JSON Object
		header('Content-Type: application/json');

		echo json_encode($tweets);
	}
	
}