
<!doctype html>
<html>
<head>
    <title>Twitter Client</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style>
	body{
		
		background-color:#55ACEE;
	}


</style>  



  </head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 text-center">

<?php

	session_start();
require "autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$apikey="wTpmJ14mrACez4yjgnAdzwcvQ";
	$apisecret="hSZoGmyQNUf92iSvLDuety6FiB0MLHJkQTupfU5FQPl1kGddVy";
	$accesstoken="1579469118-NNjQcXmA1bAPPR9GG7QGngwQXGpme0sxZJLXD6n";
	$accesssecret="DWGcruCRXkn6aTWbHoDLsN7uDEUNgv4Z439n3Sm4Z7yxb";
	
	$connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);
//	$tweets = $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json");
	
	$tweets = $connection->get("statuses/home_timeline",["count" => 100]);
	
	foreach($tweets as $tweet){
		if($tweet->favorite_count >50){
		//echo $tweet->text;
		$embed = $connection->get("statuses/oembed", ["id" => $tweet->id]);
		echo $embed->html;
		
		}
		}
	

	//for array form of apikey
	//echo json_encode($tweets); for encode api into json
	
	 
	
?>


</div>
</div>
</div>   


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/
jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files
as needed -->
<script src="bootstrap.min.js"></script>
 
  </body>
</html>