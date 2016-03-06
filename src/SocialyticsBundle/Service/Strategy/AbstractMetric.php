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
    
    public function __construct(ProviderRepository $providerRepository, Formatter $formatter)
    {
        $this->providerRepository = $providerRepository;
        $this->formatter = $formatter;
    }
    
    function getProviderRepository() {
        return $this->providerRepository;
    }

    function getFormatter() {
        return $this->formatter;
    }


}
