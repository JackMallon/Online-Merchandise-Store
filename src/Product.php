<?php


class Product
{
    private $id;
    private $price;
    private $colour;
    private $image;

    /** ID */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    /** Price */
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


    /** Colour */
    public function getColour()
    {
        return $this->colour;
    }


    public function setColour($colour)
    {
        $this->colour = $colour;
    }


    /** Image */
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}