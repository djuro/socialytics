<?php

namespace SocialyticsBundle\Service;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Form\Model\MetricPanel as FormMetricPanel;
use SocialyticsBundle\Service\Strategy\MetricNames;
use SocialyticsBundle\Service\Strategy\TwitterFollowers;
use SocialyticsBundle\Service\Strategy\TwitterFollowing;
use SocialyticsBundle\Service\Strategy\Tweets;
use SocialyticsBundle\Service\Strategy\Formatter\FormatNumericResult;
use SocialyticsBundle\Service\Strategy\Formatter\FormatGraphicResult;
use SocialyticsBundle\Service\Strategy\Repository\TwitterRepository;

use Doctrine\Bundle\DoctrineBundle\Registry;

use \stdClass;

class MetricFactory
{
    /**
     *
     * @var Registry
     */
    private $doctrine;
    
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
    
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function setTwitterParameters($twitterAccessToken,$twitterTokenSecret,
            $twitterConsumerKey,$twitterConsumerSecret)
    {
        $this->twitterAccessToken = $twitterAccessToken;
        $this->twitterConsumerKey = $twitterConsumerKey;
        $this->twitterConsumerSecret = $twitterConsumerSecret;
        $this->twitterTokenSecret = $twitterTokenSecret;
    }
    
    public function create(FormMetricPanel $metricPanel, $username)
    {
        $metricName = $metricPanel->metric;
        $formatter = $this->getFormatter($metricPanel->format);

        switch($metricName)
        {
            case 'TWITTER_FOLLOWERS':
                $twitterRepository = new TwitterRepository($this->doctrine, $metricName);
                $twitterRepository->setProviderParameters($this->getTwitterParameters());
                $metric = new TwitterFollowers($metricName, $metricPanel->dateFrom, $metricPanel->dateFrom, $username);
                $metric->setProviderRepository($twitterRepository);
                break;
            case 'TWITTER_FRIENDS':
                $twitterRepository = new TwitterRepository($this->doctrine, $metricName);
                $twitterRepository->setProviderParameters($this->getTwitterParameters());
                $metric = new TwitterFollowing($metricName, $metricPanel->dateFrom, $metricPanel->dateFrom, $username);
                $metric->setProviderRepository($twitterRepository);
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
