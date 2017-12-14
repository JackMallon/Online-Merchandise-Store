<?php


class User
{
    private $id;
    private $fullName;
    private $email;
    private $phoneNumber;

    /** ID */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    /** Name */
    public function getName()
    {
        return $this->fullName;
    }

    public function setName($fullName)
    {
        $this->fullName = $fullName;
    }


    /** Email */
    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    /** Phone Number */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}