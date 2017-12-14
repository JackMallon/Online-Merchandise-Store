<?php
namespace Itb;
require_once __DIR__ . '/../src/Database.php';

class UserController
{
    private $sessionManager;
    private $adminController;
    private $twig;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
        $this->adminController = new AdminController($twig, $sessionManager);
    }

    public function loginFormAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'login.html.twig';
        $args = [
            'isloggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function processLoginAction($username, $password)
    {
        if($this->validCredentials($username, $password)){
            $_SESSION['username'] = $username;
            $this->adminController->adminHomepageAction();
        } else {
            $this->loginErrorAction();
        }
    }


    public function loginErrorAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'loginerror.html.twig';
        $args = [
            'isloggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Login Error'
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }

    private function validCredentials($u, $p)
    {
        /*$db = new Database();
        $username = $db->getUsername();
        $password = $db->getPassword();

        $u = md5($u);
        $p = md5($p);*/
        if('admin' == $u && 'admin' == $p){
            return true;
        } else {
            return false;
        }
    }
}