<?php

namespace SocialyticsBundle\Service\Strategy\Repository;

use Doctrine\Bundle\DoctrineBundle\Registry;

use \stdClass;
use \DateTime;
use \TwitterAPIExchange;

/**
 *
 * @author djuro
 */
class TwitterRepository implements ProviderRepository
{
    
    
    /**
     *
     * @var stdClass
     */
    private $parameters;
    
    /**
     *
     * @var string
     */
    private $metricName;
    
    /**
     *
     * @var Registry
     */
    private $doctrine;
    
    
    public function __construct(Registry $doctrine, $metricName)
    {
        $this->doctrine = $doctrine;
        $this->metricName = $metricName;
    }
    
    public function store($jsonResponse)
    {
        
    }
    
    public function find($metricName, DateTime $dateFrom, DateTime $dateTo, $username)
    {
        return null;
    }
    
    public function apiGet($username, $resourceUrl)
    {
        
        $settings = array(
            'oauth_access_token' => $this->parameters->accessToken,
            'oauth_access_token_secret' => $this->parameters->tokenSecret,
            'consumer_key' => $this->parameters->consumerKey,
            'consumer_secret' => $this->parameters->consumerSecret
        );
        
        
        $getfield = '?screen_name='.$username;
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);
        $jsonResponse = $twitter->setGetfield($getfield)
        ->buildOauth($resourceUrl, $requestMethod)
        ->performRequest();
        
        $this->store($jsonResponse);
        
        return json_decode($jsonResponse);
    }
    
    public function setProviderParameters(stdClass $parameters) 
    {
        $this->parameters = $parameters;
    }
    
}
