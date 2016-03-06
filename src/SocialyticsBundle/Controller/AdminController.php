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
    
    public function newReport()
    {
        
    }
}