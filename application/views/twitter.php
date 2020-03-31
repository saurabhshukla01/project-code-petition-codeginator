<?php

require_once "vendor/autoload.php";
 
use Abraham\TwitterOAuth\TwitterOAuth;
 
define('CONSUMER_KEY', $_SESSION['petition']['twitter_consumer_key']);
define('CONSUMER_SECRET', $_SESSION['petition']['twitter_consumer_secret']);
define('ACCESS_TOKEN', $_SESSION['petition']['twitter_access_token']);
define('ACCESS_TOKEN_SECRET', $_SESSION['petition']['twitter_access_token_secret']);
 
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$tweet = "This is a test tweet. https://callupon.org";
$imageMedia = $connection->upload('media/upload', array('media' => '/home/callupon/public_html/assets/img/privacy-policy.png'));
$parameters = array(
    "status" => $tweet,
    "media_ids" => $imageMedia->media_id_string);

$post_tweets = $connection->post("statuses/update", $parameters);
#echo "<pre>"; print_r($post_tweets);die();

?>
<div class="wrapper wrapForm">
    <div class="container">
        <div class="row">
                <div class="col-12 marginBottom60 whiteBG80">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Social Auth</h4>
                        <div class="row tools">
                            <div class="col-sm-12 col-xs-12 col-md-8 offset-md-2">
                                <ul><li> <a href="<?php echo $twitter_url; ?>">Click</a></li></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

