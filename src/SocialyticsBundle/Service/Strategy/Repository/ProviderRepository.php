<?php

namespace SocialyticsBundle\Service\Strategy\Repository;

use \stdClass;

/**
 * Defines behaviors of Repository class implementations.
 * 
 * @author djuro
 */
interface ProviderRepository
{
    public function setProviderParameters(stdClass $parameters);
    
    public function store();
    
    public function find();
    
    public function apiGet();
}
