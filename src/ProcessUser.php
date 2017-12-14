<?php
namespace Itb;

class ProcessUser
{
    private $sessionManager;
    private $twig;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
    }

    public function addUserToDB($db,$name,$email,$phoneNumber){
        $db->insertUser($name,$email,$phoneNumber);
    }

    public function clearMailingList($db){
        $db->dropTableUsers();
        $db->createTableProducts();
    }
}