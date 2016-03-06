<?php

namespace SocialyticsBundle\Service;

use \TwitterAPIExchange;

/**
 * Contacts Twitter API endpoints, retrieves and stores data.
 *
 * @author djuro
 */
class TwitterService
{
    /**
     *
     * @var string
     */
    private $accessToken;
    
    /**
     *
     * @var string
     */
    private $tokenSecret;
    
    /**
     *
     * @var string
     */
    private $consumerKey;
    
    /**
     *
     * @var string
     */
    private $consumerSecret;
    
    public function __construct($accessToken, $tokenSecret, $consumerKey, $consumerSecret)
    {
        $this->accessToken = $accessToken;
        $this->tokenSecret = $tokenSecret;
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
    }
    
    public function retrieveFollowers()
    {
        
        $settings = array(
    'oauth_access_token' => $this->accessToken,
    'oauth_access_token_secret' => $this->tokenSecret,
    'consumer_key' => $this->consumerKey,
    'consumer_secret' => $this->consumerSecret
);
        
        $url = 'https://api.twitter.com/1.1/followers/ids.json';
        $getfield = '?screen_name=EatDalmatia';
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);
        $jsonResponse = $twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest();
        
        var_dump(json_decode($jsonResponse));
    }
    //curl --get 'https://api.twitter.com/1.1/followers/ids.json' --data 'count=100&cursor=-1&screen_name=dmandini' --header 'Authorization: OAuth oauth_consumer_key="WjdCnrFSf9Odp23p6AJNLgeuI", oauth_nonce="d5c48a2a9fb18bd73c3ab54ca3d620fd", oauth_signature="jBQ7PuJSYGuOIQGiFkf6a9pdP4U%3D", oauth_signature_method="HMAC-SHA1", oauth_timestamp="1457218251", oauth_token="55793305-T5DxxlRcLHkqLR7AJieBCuE5u1ynnQmXHjb9Tlyhj", oauth_version="1.0"' --verbose

    
    private function curlRequest($params)
    {
        
    }
}
