<?php

namespace Itb;

class MainController
{
    private $twig;
    private $userController;
    private $sessionManager;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
        $this->userController = new UserController($twig, $sessionManager);
    }

    public function indexAction($db)
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $products = $db->getAllProducts();

        $template = 'home.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Home',
            'products' => $products
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function productsAction($db)
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $products = $db->getAllProducts();

        $template = 'products.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Products',
            'products' => $products,
            'productEmphasis' => '.emphasis'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    //Mail List
    public function mailList()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $db = new Database();

        $users = $db->getAllUsers();

        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Admin Home',
            'users' => $users
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $template = 'mailList.html.twig';
        }

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function contactAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'contact.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Contact'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function signUp()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'signUp.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Sign Up'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function userAdded($name,$email,$phoneNumber)
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'userAdded.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Sign Up',
            'name' => $name,
            'email' => $email,
            'phoneNumber' => $phoneNumber
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function adminAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'admin.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Log In'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function logInAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'adminlogin.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Log In'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function adminHomeAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Admin Home'
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $template = 'adminHomepage.html.twig';
        }

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function addProductPage()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Add Product'
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $template = 'addProduct.html.twig';
        }

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function productAddedAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Product Added'
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $template = 'productAdded.html.twig';
        }

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function aboutAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'about.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'About'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function logoutAction($db)
    {
        $this->sessionManager->killSession();
        $this->indexAction($db);
    }

    public function sentMailAction(){
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'emailsent.html.twig';
        $argsArray = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Email Sent'
        ];

        $html = $this->twig->render($template, $argsArray);
        print $html;
    }
}