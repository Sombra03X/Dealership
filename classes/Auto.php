<?php

class car{

    // properties
    public $make;
    public $model;
    public $year;
    public $color;
    public $price;
    public $image;
    public $description;
    public $id;

    // constructor
    public function __construct($make, $model, $year, $color, $price, $image, $description, $id){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
        $this->id = $id;
    }

    // getters
    public function getMake(){
        return $this->make;
    }

    public function getModel(){
        return $this->model;
    }

    public function getYear(){
        return $this->year;
    }

    public function getColor(){
        return $this->color;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getImage(){
        return $this->image;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getId(){
        return $this->id;
    }

    // setters
    public function setMake($make){
        $this->make = $make;
    }

    public function setModel($model){
        $this->model = $model;
    }

    public function setYear($year){
        $this->year = $year;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setId($id){
        $this->id = $id;
    }

    // crud functions
    // create
    public function create(){
        require_once 'dbh.php';
        $sql = "INSERT INTO cars (make, model, year, color, price, image, description) VALUES (:make, :model, :year, :color, 
        :price, :image, :description)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->make, $this->model, $this->year, $this->color, $this->price, $this->image, $this->description]);
    }

    // read
    public static function read(){
        require_once 'dbh.php';
        $sql = "SELECT * FROM cars";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cars;
    }

    // update
    public function update(){
        require_once 'dbh.php';
        $sql = "UPDATE cars SET make = :make, model = :model, year = :year, color = :color, price = :price, image = :image, 
        description = :description WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->make, $this->model, $this->year, $this->color, $this->price, $this->image, $this->description, $this->id]);
    }

    // delete
    public static function delete($id){
        require_once 'dbh.php';
        $sql = "DELETE FROM cars WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    // search on ID
    public static function search($id){
        require_once 'dbh.php';
        $sql = "SELECT * FROM cars WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $car = $stmt->fetch(PDO::FETCH_ASSOC);
        return $car;
    }

}