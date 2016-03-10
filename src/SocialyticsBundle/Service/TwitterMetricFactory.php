<?php

namespace SocialyticsBundle\Service;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Form\Model\MetricPanel;
use SocialyticsBundle\Service\Strategy\Twitter\MetricNames;

class TwitterMetricFactory
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
    
    public function create(MetricPanel $metricPanel)
    {
      switch($metricPanel->metric)
      {
          case MetricNames::FOLLOWERS:
              $metric = new Followers();
          
          case MetricNames::FRIENDS:
              $metric = new Friends();
      }  
    }
}
