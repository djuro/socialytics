<?php

namespace SocialyticsBundle\Service\Strategy;

/**
 * AbstractMetric, parent class for all Metric class implementations, 
 * regardless of provider (Twitter, Facebook,...).
 *
 * @author djuro
 */
abstract class AbstractMetric
{
    private $providerRepository;
    
    private $formatter;
    
    
    function getProviderRepository() {
        return $this->providerRepository;
    }

    function getFormatter() {
        return $this->formatter;
    }
    
    function setProviderRepository($providerRepository) {
        $this->providerRepository = $providerRepository;
    }

    function setFormatter($formatter) {
        $this->formatter = $formatter;
    }




}
