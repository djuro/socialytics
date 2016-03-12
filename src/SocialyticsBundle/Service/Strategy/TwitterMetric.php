<?php

namespace SocialyticsBundle\Service\Strategy;

/**
 * Concrete implementation of Metric class for Twitter.
 *
 * @author djuro
 */
class TwitterMetric extends AbstractMetric
{
    /**
     *
     * @var string
     */
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
}
