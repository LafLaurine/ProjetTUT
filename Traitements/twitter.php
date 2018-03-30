<?php 

require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/TwitterAPIExchange.php';

     $settings = array(
         'oauth_access_token' => "616321333-rej1p4eczOa8cZi1Kq0QsrNhIPotxcXeDuniVLmp",
         'oauth_access_token_secret' => "YRZ2DX1SCs1sOpLwcMzzDpNSB67TCkevCYMmEDXdCjRHP",
         'consumer_key' => "Xc6Hdbc7Uv9hJxCtvhPmxn6vI",
         'consumer_secret' => "wfmLSdpOxdn7QXY71uFpwv09AAMtNBgBaWd62gjomS0vfD0Hvf"
     );

     $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
     $requestMethod = "GET";

     if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "ISPFrance";}

     if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 3;}

     $getfield = "?screen_name=$user&count=$count";
     $twitter = new TwitterAPIExchange($settings);
     $string = json_decode($twitter->setGetfield($getfield)
     ->buildOauth($url, $requestMethod)
     ->performRequest(),$assoc = TRUE);
     $img = "https://twitter.com/ISPFrance/profile_image?size=original";
     echo "<div class='twi'>";
        foreach($string as $items)
        {
            
            echo "<blockquote class='twitter-tweet'>";
            echo "<img class='imgTweet'src=".$img.">";
            echo "<p lang='fr' dir='ltr'>". $items['text']."</p>";
            echo "<a>".$items['created_at']."</a></br>";
            echo "<a href='https://twitter.com/ISPFrance' target='_blank'>". $items['user']['screen_name']."</a></blockquote>";
            
        }
        echo "</div>";

/*         $url1 = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=#EtudiantsInternationaux';
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);
        $response = $twitter->setGetfield($getfield)
            ->buildOauth($url1, $requestMethod)
            ->performRequest();

            foreach($response as $items)
            {
                echo "Date du tweet: ".$items['created_at']."<br />";
                echo "Tweet: ". $items['text']."<br />";
                echo "Twitter: ". $items['user']['screen_name']."<br />";
            }

        var_dump(json_decode($response)); */
    

?>