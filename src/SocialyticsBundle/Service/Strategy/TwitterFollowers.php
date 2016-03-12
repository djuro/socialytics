<?php

namespace SocialyticsBundle\Service\Strategy;

use \stdClass;

/**
 * Concrete implementation of Metric class for Twitter.
 *
 * @author djuro
 */
class TwitterFollowers extends AbstractMetric
{
    const FOLLOWERS_URL = "https://api.twitter.com/1.1/followers/ids.json";
    
    public function __construct($name, $dateFrom, $dateTo, $username)
    {
        $this->name = $name;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->username = $username;
    }
    
    public function calculate()
    {
        $retrievedData = $this->providerRepository->find($this->name, $this->dateFrom, $this->dateTo, $this->username);
        if(empty($storedData))
        {
            $retrievedData = $this->getProviderRepository()->apiGet($this->username, self::FOLLOWERS_URL);
        }
        
        if($retrievedData instanceof stdClass)
        {
            $result = $this->getFormatter()->formatResult($retrievedData);
        }
        
        return $result;
        
    }
}
