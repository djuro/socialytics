<?php

namespace SocialyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use \DateTime;

/**
 * Represents a particular metric as a property of a report metric panel.
 *
 * @ORM\Entity
 * @ORM\Table(name="metric")
 * 
 * @author djuro
 */

class Metric
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;
    
    /**
     *
     * @var DateTime
     * @ORM\Column(type="date", name="date_from")
     */
    private $dateFrom;
    
    /**
     *
     * @var DateTime
     * @ORM\Column(type="date", name="date_to")
     */
    private $dateTo;
    
    /**
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $format;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDateFrom() {
        return $this->dateFrom;
    }

    function getDateTo() {
        return $this->dateTo;
    }

    function getFormat() {
        return $this->format;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDateFrom(DateTime $dateFrom) {
        $this->dateFrom = $dateFrom;
    }

    function setDateTo(DateTime $dateTo) {
        $this->dateTo = $dateTo;
    }

    function setFormat($format) {
        $this->format = $format;
    }


}
