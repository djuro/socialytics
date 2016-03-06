<?php

namespace SocialyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Report represents one collection of metric panels created by 
 * user and with custom title.
 * 
 * @ORM\Entity
 * @ORM\Table(name="report")
 * @author djuro
 */
class Report
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
    private $title;
    
    /**
     *
     * @var MetricPanel[]
     * @ORM\OneToMany(targetEntity="MetricPanel", mappedBy="report")
     */
    private $panels;
    
    /**
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $username;
    
    public function __construct()
    {
        $this->panels = new ArrayCollection();
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getPanels() {
        return $this->panels;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setPanels(array $panels) {
        $this->panels = $panels;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function addPanel(MetricPanel $panel)
    {
        $this->panels->add($panel);
    }
    
}
