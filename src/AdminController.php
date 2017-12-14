<?php
namespace Itb;

class AdminController
{
    private $sessionManager;
    private $twig;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
    }

    public function adminHomepageAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $args = [
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

        $html = $this->twig->render($template, $args);
        print $html;
    }


    public function adminDeleteAllAction($db)
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $args = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'pageName' => 'Products Deleted'
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $db->dropTableProducts();
            $template = 'deleteProduct.html.twig';
        }

        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function addProduct($db, $price, $product, $colour){

        $image = $this->generateImageURL($product, $colour);

        if(null == $price){
            $price = 'Free';
        }

        $db->insertProduct($colour, $price, $image);
    }

    public function generateImageURL($product, $colour){
        //  T-Shirt
        if('T-Shirt' == $product && 'Light-Blue' == $colour){
            $image = "img/tshirt-01.png";
        } else if('T-Shirt' == $product && 'Black' == $colour){
            $image = "img/tshirt-02.png";
        } else if('T-Shirt' == $product && 'Red' == $colour){
            $image = "img/tshirt-03.png";
        } else if('T-Shirt' == $product && 'White' == $colour){
            $image = "img/tshirt-04.png";
        } else if('T-Shirt' == $product && 'Dark-Blue' == $colour){
            $image = "img/tshirt-05.png";

            //  Hoodies
        } else if('Hoodie' == $product && 'Light-Blue' == $colour){
            $image = "img/hoodie-01.png";
        } else if('Hoodie' == $product && 'Black' == $colour){
            $image = "img/hoodie-02.png";
        } else if('Hoodie' == $product && 'Red' == $colour){
            $image = "img/hoodie-03.png";
        } else if('Hoodie' == $product && 'White' == $colour){
            $image = "img/hoodie-04.png";
        } else if('Hoodie' == $product && 'Dark-Blue' == $colour){
            $image = "img/hoodie-05.png";

            //  Caps
        } else if('Cap' == $product && 'Light-Blue' == $colour){
            $image = "img/hat-01.png";
        } else if('Cap' == $product && 'Black' == $colour){
            $image = "img/hat-02.png";
        } else if('Cap' == $product && 'Red' == $colour){
            $image = "img/hat-03.png";
        } else if('Cap' == $product && 'White' == $colour){
            $image = "img/hat-04.png";
        } else if('Cap' == $product && 'Dark-Blue' == $colour){
            $image = "img/hat-05.png";
        }
        return $image;
    }
}