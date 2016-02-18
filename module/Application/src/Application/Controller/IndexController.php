<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\User;
use Application\Form\UserForm;

class IndexController extends AbstractActionController
{
    protected $em;
 
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function indexAction()
    {
        // user session checking
        if ($user = $this->identity()) {
            echo 'Logged in as ' . $user->getFullname(); exit;
        }
        
        // user login
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $adapter = $authService->getAdapter();
        $adapter->setIdentityValue('arjun');
        $adapter->setCredentialValue('pass123');
        $authResult = $authService->authenticate();

        if ($authResult->isValid()) {
            $identity = $authResult->getIdentity();
            $authService->getStorage()->write($identity);
            echo "valid"; exit;
        }

        //db flush
//        $em = $this->getEntityManager();
//        $user = new User('Arjun', 'Kumar', 'arjun', 'pass123', true);
//        $em->persist($user);
//        $em->flush();
        
        return array('val' => 'Zend 2');
    }
    
    public function registerAction() {
        try {
           // $user = new User();
            $userForm = new UserForm();
        } catch(\Exception $e){
            echo $e->getMessage(); exit;
        }
        
        return array('form' => $userForm);
    }
}
