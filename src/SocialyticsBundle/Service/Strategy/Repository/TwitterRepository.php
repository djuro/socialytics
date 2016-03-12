<?php

namespace SocialyticsBundle\Service\Strategy\Repository;

use \stdClass;

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

    public function store(){}
    
    public function find(){}
    
    public function apiGet(){}
    
    public function setProviderParameters(stdClass $parameters) 
    {
        $this->parameters = $parameters;
    }
}
