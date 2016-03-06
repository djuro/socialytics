<?php

namespace SocialyticsBundle\Service\Strategy;

/**
 * Defines data repository behaviors.
 * 
 * @author djuro
 */
interface ProviderRepository
{
    public function getFromApi();
    
    public function getFromDb();
    
    public function store();
}
