<?php

namespace SocialyticsBundle\Service\Strategy\Repository;

use \stdClass;
use \DateTime;

/**
 * Defines behaviors of Repository class implementations.
 * 
 * @author djuro
 */
interface ProviderRepository
{
    public function setProviderParameters(stdClass $parameters);
    
    /**
     * 
     * @param string $jsonResponse
     */
    public function store($jsonResponse);
    
    public function find($metricName, DateTime $dateFrom, DateTime $dateTo, $username);
    
    /**
     * 
     * @param string $username
     * @param string $resourceUrl
     */
    public function apiGet($username, $resourceUrl);
}
