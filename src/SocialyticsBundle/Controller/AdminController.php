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
        $user = $token->getUser();
        $resourceOwnerName = $token->getResourceOwnerName();
       
        $form = $this->createForm(new ReportType());
        
        return array(
            'form' => $form->createView(),
            'resourceOwnerName' => ucfirst($resourceOwnerName), 
            'username' => $user->getUsername()
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
        
        $form->handleRequest($request);
        if($form->isValid())
        {
            $token = $this->getToken();
            $username = $this->getUsername($token);
            $metricFactory = $this->get('metric_factory');
            
            $metric = $metricFactory->create($form->getData(), $username);
            
            $result = $metric->calculate();
            
            $reportService = $this->get('report.service');
            $reportService->addMetric($report, $form->getData(), $result);
            
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
        $formReport = $request->request->get('report');
        $title = $formReport['title'];
        $token = $this->getToken();
        $report = new Report();
        $report->setTitle($title);
        $report->setUsername($this->getUsername($token));
        $em = $this->getDoctrine()->getManager();
        $em->persist($report);
        $em->flush();
        
        return $this->redirect($this->generateUrl('admin_report',array('id'=>$report->getId())));
    }
    
   /**
     * @Route("/admin/reports", name="admin_reports")
     * @Template()
     */
    public function reportsAction()
    {
        $token = $this->getToken();
        $username = $this->getUsername($token);
        $reportRepository = $this->getDoctrine()->getManager()->getRepository('SocialyticsBundle:Report');
        
        $reportsResult = $reportRepository->findBy(array('username'=>$username));
        
        return array( 'reports' => $reportsResult );
        
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