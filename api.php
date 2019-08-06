<?php
function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
}

function returnTweet(){
    $oauth_access_token         = "1157590717491011584-abLYx8QjCeiTqLz7DZvtZlhonDvyvd";
    $oauth_access_token_secret  = "K16ZqnxNiTqXwFQlSiYkloMzPiNJCEnhlGfvmXxy7xoTA";
    $consumer_key               = "T7Q2dAX6jKWLBnna8shQmyV35";
    $consumer_secret            = "CV1VQeIsynITulswTA7nLLhk8y5x8jkb13BHQ04KUIUS8X2XQ9";

    $twitter_timeline           = "user_timeline"; 

    if(isset($_POST['name']) ? $_POST['name']: false)
    {
        $name = $_POST['name'];
    }
    //  create request
        $request = array(
            'screen_name'       => $name,
            'count'             => '1'
        );

    $oauth = array(
        'oauth_consumer_key'        => $consumer_key,
        'oauth_nonce'               => time(),
        'oauth_signature_method'    => 'HMAC-SHA1',
        'oauth_token'               => $oauth_access_token,
        'oauth_timestamp'           => time(),
        'oauth_version'             => '1.0'
    );

    
        $oauth = array_merge($oauth, $request);

   
        $base_info              = buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
        $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature']   = $oauth_signature;

    //  make request
        $header = array(buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
                          CURLOPT_HEADER => false,
                          CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);

    return json_decode($json, true);
}


$twit = returnTweet();
echo  "Latest tweets:" .$twit[0]["text"];