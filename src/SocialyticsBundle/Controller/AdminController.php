<?php
namespace SocialyticsBundle\Controller;

use SocialyticsBundle\Service\Strategy\Twitter\MetricNames;
use SocialyticsBundle\Service\Strategy\Twitter\MetricFormatTypes;

use SocialyticsBundle\Form\ReportType;
use SocialyticsBundle\Form\Model\Report;
use SocialyticsBundle\Form\Model\MetricPanel;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     * @Template()
     */
    public function dashBoardAction()
    {
        $token = $this->get('security.token_storage')->getToken();//->getUser();
        $user = $token->getUser();
        $resourceOwnerName = $token->getResourceOwnerName();
        //var_dump($user->getUsername());
        
        //$twitterService = $this->get('twitter.service');
        //$twitterService->retrieveFollowers();
        
        return array(
            'resourceOwnerName' => ucfirst($resourceOwnerName), 
            'username' => $user->getUsername()
                );
    }
    
    /**
     * @Route("/admin/new-report", name="admin_new_report")
     * @Template()
     */
    public function newReportAction(Request $request)
    {
        $report = new Report();
        $metricPanel = new MetricPanel();
        $report->addPanel($metricPanel);
        
        $form = $this->createForm(new ReportType(MetricNames::names(),  MetricFormatTypes::names()),$report);
        
        $form->handleRequest($request);
        if($form->isValid())
        {
            ddd($form->getData());
        }
        
        return array('form' => $form->createView());
    }
}