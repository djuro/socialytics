<?php
namespace SocialyticsBundle\Controller;

use SocialyticsBundle\Service\Strategy\MetricNames;
use SocialyticsBundle\Service\Strategy\MetricFormatTypes;

use SocialyticsBundle\Form\ReportType;
use SocialyticsBundle\Entity\Report;
use SocialyticsBundle\Form\Model\MetricPanel;
use SocialyticsBundle\Form\MetricPanelType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     * @Template()
     */
    public function dashBoardAction()
    {
        $token = $this->getToken();
       // $user = $token->getUser();
        //$resourceOwnerName = $token->getResourceOwnerName();
        //var_dump($user->getUsername());
        
        //$twitterService = $this->get('twitter.service');
        //$twitterService->retrieveFollowers();
        $form = $this->createForm(new ReportType());
        
        return array(
            'form' => $form->createView(),
            'resourceOwnerName' => 'Twitter',//ucfirst($resourceOwnerName), 
            'username' => 'dmandini'//$user->getUsername()
                );
    }
    
    /**
     * @Route("/admin/report/{id}", name="admin_report")
     * @Template()
     */
    public function reportAction(Request $request, $id)
    {
        $metricPanel = new MetricPanel();
        $report = $this->getDoctrine()->getManager()->getRepository('SocialyticsBundle:Report')->find($id);
        $form = $this->createForm(new MetricPanelType(MetricNames::names(),  MetricFormatTypes::names()), $metricPanel);
        
        //ddd($report->getPanels());
        $form->handleRequest($request);
        if($form->isValid())
        {
            $metricFactory = $this->get('metric_factory');
            
            //ddd($form->getData());
            $domainMetric = $metricFactory->create($form->getData());
            
            ddd($domainMetric);
            //ddd($form->getData());
            //$reportService = $this->get('report.service');
            //$reportService->addMetric($report, $form->getData());
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            
            return $this->redirect($this->generateUrl('admin_report',array('id'=>$id)));
        }
        
        return array('form' => $form->createView(), 
                    'report'=>$report);
    }
    
    /**
     * @Route("/admin/store-report", name="admin_store_report", options={"expose"=true})
     * @Template()
     */
    public function storeReportAction(Request $request)
    {
        $report = $request->request->get('report');
        $title = $report['title'];
        $token = $this->getToken();
        $report = new Report();
        $report->setTitle($title);
        $report->setUsername('dmandini');//$this->getUsername($token));
        $em = $this->getDoctrine()->getManager();
        $em->persist($report);
        $em->flush();
        
        return $this->redirect($this->generateUrl('admin_report',array('id'=>$report->getId())));
    }
    
    public function storeMetric(Request $request)
    {
        
    }
    
    private function getUsername($token)
    {
        return $token->getUser()->getUsername();
    }
    
    private function getToken()
    {
        return $this->get('security.token_storage')->getToken();
    }
    
    private function getResourceOwnerName($token)
    {
        return $token->getResourceOwnerName();
    }
}