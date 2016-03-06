<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SocialyticsBundle\Form\Model;

/**
 * Metric, underlying data class for a form that is used to define particular 
 * result panel in report.
 *
 * @author djuro
 */
class Metric
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
     * @var string
     */
    public $dateFrom;
    
    /**
     *
     * @var string
     */
    public $dateTo;
    
    /**
     *
     * @var string
     */
    public $compareFrom;
    
    /**
     *
     * @var string
     */
    public $compareTo;
}
