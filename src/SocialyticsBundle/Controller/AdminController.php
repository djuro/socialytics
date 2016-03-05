<?php
namespace SocialyticsBundle\Controller;

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
        return array('var'=>12345);
    }
}