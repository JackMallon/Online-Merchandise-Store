<?php

namespace Itb;

class WebApplication
{
    const PATH_TO_TEMPLATES = __DIR__ . '/../views';
    private $mainController;
    private $userController;
    private $adminController;
    private $processUser;

    public function __construct()
    {
        $twig = new \Twig\Environment(new \Twig_Loader_Filesystem(self::PATH_TO_TEMPLATES));
        $sessionManager = new SessionManager();
        $this->mainController = new MainController($twig, $sessionManager);
        $this->userController = new UserController($twig, $sessionManager);
        $this->adminController = new AdminController($twig, $sessionManager);
        $this->processUser = new ProcessUser($twig, $sessionManager);
    }

    public function run()
    {
        require_once __DIR__ . '/../src/Database.php';

        $db = new Database();
        $db->createTableProducts();

        $dbUser = new Database();
        $dbUser->createTableUsers();

        $action = filter_input(INPUT_GET, 'action');
        if(empty($action)){
            $action = filter_input(INPUT_POST, 'action');
        }

        switch($action){
            case 'about':
                $this->mainController->aboutAction();
                break;

            case 'contact':
                $this->mainController->contactAction();
                break;

            case 'products':
                $this->mainController->productsAction($db);
                break;

            case 'admin':
                $this->mainController->adminAction();
                break;

            case 'login':
                $this->userController->loginFormAction();
                break;

            case 'mailList':
                $this->mainController->mailList();
                break;

            case 'clearMailingList':
                $this->processUser->clearMailingList($db);
                $this->mainController->adminHomeAction();
                break;

            case 'processLogin':
                $username = filter_input(INPUT_POST, 'username');
                $password = filter_input(INPUT_POST, 'password');
                $this->userController->processLoginAction($username, $password);
                break;

            case 'processNewProduct':
                $price = filter_input(INPUT_POST, 'price');
                $product = filter_input(INPUT_POST, 'product');
                $colour = filter_input(INPUT_POST, 'colour');
                $this->adminController->addProduct($db, $price, $product, $colour);
                $this->mainController->productAddedAction();
                break;

            case 'logIn':
                $this->mainController->logInAction();
                break;

            case 'adminHome':
                $this->mainController->adminHomeAction();
                break;

            case 'logout':
                $this->mainController->logoutAction($db);
                break;

            case 'signUp':
                $this->mainController->signUp();
                break;

            case 'sentMail':
                $this->mainController->sentMailAction();
                break;

            case 'addProductPage':
                $this->mainController->addProductPage();
                break;

            case 'deleteAll':
                $this->adminController->adminDeleteAllAction($db);
                break;

            case 'processUser':
                $name = filter_input(INPUT_POST, 'name');
                $email = filter_input(INPUT_POST, 'email');
                $phoneNumber = filter_input(INPUT_POST, 'phoneNumber');
                $this->processUser->addUserToDB($db,$name,$email,$phoneNumber);
                $this->mainController->userAdded($name,$email,$phoneNumber);
                break;

            case 'home':
            default:
                $this->mainController->indexAction($db);
        }
    }
}