<?php

namespace SocialyticsBundle\Service;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Form\Model\MetricPanel as FormMetricPanel;
use SocialyticsBundle\Service\Strategy\MetricNames;
use SocialyticsBundle\Service\Strategy\TwitterMetric;
use SocialyticsBundle\Service\Strategy\Formatter\FormatNumericResult;
use SocialyticsBundle\Service\Strategy\Formatter\FormatGraphicResult;
use SocialyticsBundle\Service\Strategy\Repository\TwitterRepository;

use \stdClass;

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
    
    public function create(FormMetricPanel $metricPanel)
    {
        $metricName = $metricPanel->metric;
        $formatter = $this->getFormatter($metricPanel->format);

        switch($metricName)
        {
            case 'TWITTER_FOLLOWERS':
                $twitterRepository = new TwitterRepository;
                $twitterRepository->setProviderParameters($this->getTwitterParameters());
                $metric = new TwitterMetric($metricName);
                $metric->setProviderRepository($twitterRepository);
                break;
            case 'TWITTER_FRIENDS':
                $metric = new TwitterMetric($metricName);
                $metric->setProviderRepository(new TwitterRepository);
                break;
            case 'TWEETS':
                $metric = new TwitterMetric($metricName);
                $metric->setProviderRepository(new TwitterRepository);
                break;
            case 'RETWEETS':
                $metric = new TwitterMetric($metricName);
                $metric->setProviderRepository(new TwitterRepository);
                break;
            /*
            case 'FACEBOOK_LIKES':
                $metric = new FacebookMetric($metricName);
                
            case 'LINKEDIN_LIKES':
                $metric = new FacebookMetric($metricName);
            */
        }  
        
        $metric->setFormatter($formatter);
        
        return $metric;
    }
    
    private function getFormatter($format)
    {
        switch($format)
        {
            case 'NUMERIC':
                return new FormatNumericResult();
            case 'GRAPHIC':
                return new FormatGraphicResult();
        }
    }
    
    private function getTwitterParameters()
    {
        $params = new stdClass;
        $params->accessToken = $this->twitterAccessToken;
        $params->tokenSecret = $this->twitterTokenSecret;
        $params->consumerKey = $this->twitterConsumerKey;
        $params->consumerSecret = $this->twitterConsumerSecret;
        return $params;
    }
}
