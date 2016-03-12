<?php

namespace SocialyticsBundle\Service\Strategy;

use SocialyticsBundle\Service\Strategy\Repository\ProviderRepository;
use SocialyticsBundle\Service\Strategy\Formatter\FormatterInterface;

/**
 * AbstractMetric, parent class for all Metric class implementations, 
 * regardless of provider (Twitter, Facebook,...).
 *
 * @author djuro
 */
abstract class AbstractMetric
{
    /**
     *
     * @var ProviderRepository
     */
    protected $providerRepository;
    
    /**
     *
     * @var FormatterInterface
     */
    protected $formatter;
    
    /**
     *
     * @var DateTime
     */
    protected $dateFrom;
    
    /**
     *
     * @var DateTime
     */
    protected $dateTo;
    
    /**
     *
     * @var string
     */
    protected $metricName;
    
    /**
     *
     * @var string
     */
    protected $username;
    
    
    function getProviderRepository() {
        return $this->providerRepository;
    }

    function getFormatter() {
        return $this->formatter;
    }
    
    function setProviderRepository(ProviderRepository $providerRepository) {
        $this->providerRepository = $providerRepository;
    }

    function setFormatter(FormatterInterface $formatter) {
        $this->formatter = $formatter;
    }

    function getDateFrom() {
        return $this->dateFrom;
    }

    function getDateTo() {
        return $this->dateTo;
    }

    function setDateFrom($dateFrom) {
        $this->dateFrom = $dateFrom;
    }

    function setDateTo($dateTo) {
        $this->dateTo = $dateTo;
    }

    abstract function calculate();


}
