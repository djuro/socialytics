<?php

namespace SocialyticsBundle\Form\Model;

/**
 * Data underlying class for ReportType.
 *
 * @author djuro
 */
class Report
{
    /**
     *
     * @var string
     */
    public $title;
    
    /**
     *
     * @var MetricPanel[]
     */
    public $panels;
    
    public function addPanel(MetricPanel $panel)
    {
        $this->panels[] = $panel;
    }
}
