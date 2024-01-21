<?php

class Dog
{
    private $id;
    private $name;
    private $breed;
    private $color;
    private $age;
    private $gender;
    private $size;
    private $coatLength;
    private $image;

    public function __construct($id, $name, $breed, $color, $age, $gender, $size, $coatLength, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->breed = $breed;
        $this->color = $color;
        $this->age = $age;
        $this->gender = $gender;
        $this->size = $size;
        $this->coatLength = $coatLength;
        $this->image=$image;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getBreed()
    {
        return $this->breed;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getSize()
    {
        return $this->size;
    }
    public function getCoatLength()
    {
        return $this->coatLength;
    }
    public function getImage(){
        return $this->image;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setBreed($breed)
    {
        $this->breed = $breed;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }
    public function setCoatLength($coatLength)
    {
        $this->coatLength = $coatLength;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
}
?>