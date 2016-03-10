<?php

namespace SocialyticsBundle\View;

use Doctrine\Common\Collections\ArrayCollection;
use \Serializable;

/**
 * Contains a collection of date string and numeric value pairs. Suitable to render as a graph.
 */
class GraphResult implements Serializable
{
    /**
     *
     * @var DateResult[]
     */
    private $dateResults;
    
    public function __construct()
    {
        $this->dateResults = new ArrayCollection();
    }
    
    public function addDateResult(DateResult $dateResult)
    {
        $this->dateResults->add($dateResult);
    }
    
    public function serialize()
    {
        $results = array();
        foreach($this->dateResults as $dateResult)
        {
            $results[$dateResult->date] = $dateResult->value;
        }
        
        return serialize($results);
    }
    
    public function unserialize(){}
}
