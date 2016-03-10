<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SocialyticsBundle\Form\Model;

/**
 * MetricPanel, underlying data class for a form that is used to define particular 
 * result panel in report.
 *
 * @author djuro
 */
class MetricPanel
{
    /**
     *
     * @var string
     */
    public $name;
    
    /**
     *
     * @var string
     */
    public $metric;
    
    /**
     *
     * @var DateTime
     */
    public $dateFrom;
    
    /**
     *
     * @var DateTime
     */
    public $dateTo;
    
    /**
     *
     * @var DateTime
     */
    public $compareFrom;
    
    /**
     *
     * @var DateTime
     */
    public $compareTo;
    
    /**
     *
     * @var string
     */
    public $format;
}
