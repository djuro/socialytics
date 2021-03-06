<?php

namespace SocialyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetricPanel represents one visual unit on report. It contains single, or 
 * two metrics compared.
 *
 * @ORM\Entity
 * @ORM\Table(name="metric_panel")
 * 
 * @author djuro
 */
class MetricPanel
{
    
    /**
     * Generated by php uniqid() function.
     * 
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    private $id;
    
    /**
     * 
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;
    
    /**
     * @var Metric
     * @ORM\OneToOne(targetEntity="Metric",cascade={"persist"})
     * @ORM\JoinColumn(name="metric_id", referencedColumnName="id")
     */
   private $metric;
   
   /**
    *
    * @var Metric
    * @ORM\OneToOne(targetEntity="Metric",cascade={"persist"})
    * @ORM\JoinColumn(name="compare_to", referencedColumnName="id", nullable=true)
    */
   private $compareTo;
   
   /**
    *
    * @var Report
    * @ORM\ManyToOne(targetEntity="Report", inversedBy="panels")
    * @ORM\JoinColumn(name="report_id", referencedColumnName="id")
    */
   private $report;
   
   public function __construct()
   {
        $this->id = uniqid();
   }
    
   function getId() {
       return $this->id;
   }

   function getMetric() {
       return $this->metric;
   }

   function getCompareTo() {
       return $this->compareTo;
   }


   function setMetric(Metric $metric) {
       $this->metric = $metric;
   }

   function setCompareTo(Metric $compareTo) {
       $this->compareTo = $compareTo;
   }

   function getReport() {
       return $this->report;
   }

   function setReport(Report $report)
   {
       $this->report = $report;
   }

   function getTitle() {
       return $this->title;
   }

   function setTitle($title) {
       $this->title = $title;
   }



}
