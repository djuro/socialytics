<?php

namespace SocialyticsBundle\Service;

use SocialyticsBundle\Form\Model\MetricPanel;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Entity\MetricPanel as DomainMetricPanel;
use SocialyticsBundle\Entity\Metric;

class ReportService
{
    public function addMetric(Report $report, MetricPanel $metricPanel, $result)
    {
        $domainMetric = $this->createDomainMetric($metricPanel);
        $domainMetricPanel = new DomainMetricPanel();
        $domainMetricPanel->setTitle($metricPanel->title);
        $domainMetric->setResult($result);
        $domainMetricPanel->setMetric($domainMetric);
        $report->addPanel($domainMetricPanel);
    }
    
    private function createDomainMetric(MetricPanel $metricPanel)
    {
        $metric = new Metric();
        $metric->setName($metricPanel->metric);
        $metric->setFormat($metricPanel->format);
        $metric->setDateFrom($metricPanel->dateFrom);
        $metric->setDateTo($metricPanel->dateTo);
        
        return $metric;
    }
}
