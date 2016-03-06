<?php
namespace SocialyticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     * @Template()
     */
    public function dashBoardAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        var_dump($user);
        
        $twitterService = $this->get('twitter.service');
        $twitterService->retrieveFollowers();
        
        return array('var'=>12345);
    }
}