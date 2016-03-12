<?php

namespace SocialyticsBundle\Service\Strategy\Repository;

/**
 * Defines behaviors of Repository class implementations.
 * 
 * @author djuro
 */
interface ProviderRepository
{
    public function store();
    
    public function find();
    
    public function apiGet();
}
