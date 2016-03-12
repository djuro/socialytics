<?php

namespace SocialyticsBundle\Service;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Form\Model\MetricPanel;
use SocialyticsBundle\Service\Strategy\Twitter\MetricNames;

class MetricFactory
{
    /**
     *
     * @var string
     */
    private $twitterAccessToken;
    
    /**
     *
     * @var string
     */
    private $twitterTokenSecret;
    
    /**
     *
     * @var string
     */
    private $twitterConsumerKey;
    
    /**
     *
     * @var string
     */
    private $twitterConsumerSecret;
    
   
    
    public function setTwitterParameters($twitterAccessToken,$twitterTokenSecret,
            $twitterConsumerKey,$twitterConsumerSecret)
    {
        $this->twitterAccessToken = $twitterAccessToken;
        $this->twitterConsumerKey = $twitterConsumerKey;
        $this->twitterConsumerSecret = $twitterConsumerSecret;
        $this->twitterTokenSecret = $twitterTokenSecret;
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
