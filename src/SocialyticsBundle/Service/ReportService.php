<?php

namespace SocialyticsBundle\Service;

use SocialyticsBundle\Form\Model\MetricPanel;
use SocialyticsBundle\Entity\MetricPanel as DomainMetricPanel;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Entity\Metric;

class ReportService
{
    public function addMetric(MetricPanel $metricPanel)
    {
        $domainMetric = $this->createDomainMetric($metricPanel);
        $domainMetricPanel = new DomainMetricPanel();
        $domainMetricPanel->setMetric($domainMetric);
    }
    
    private function createDomainMetric(MetricPanel $metricPanel)
    {
        $metric = new Metric();
        $metric->setName($metricPanel->name);
        $metric->setFormat($metricPanel->format);
        $metric->setDateFrom($metricPanel->dateFrom);
        $metric->setDateTo($metricPanel->dateTo);
        
        return $metric;
    }
}
