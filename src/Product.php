<?php
namespace Mattsmithdev;

class Product
{
    private $id;
    private $description;
    private $quantity;

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function __toString()
    {
        $text = '';
        $text .= '<hr>';
        $text .= '<br>Id: ' . $this->getId();
        $text .= '<br>Product: ' . $this->getDescription();
        $text .= '<br>Quantity: ' . $this->getQuantity();

        return $text;
    }
}