<?php

class Appointment{
    // properties
    private $id;
    private $user_id;
    private $user_name;
    private $user_email;
    private $user_phone;
    private $car_model;
    private $car_year;
    private $createdat;
    private $appointment_date;
    private $conn;

    // constructor
    public function __construct($id, $user_id, $user_name, $user_email, $user_phone, $car_model, $car_year, $createdat, $appointment_date, $conn){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_phone = $user_phone;
        $this->car_model = $car_model;
        $this->car_year = $car_year;
        $this->createdat = $createdat;
        $this->appointment_date = $appointment_date;
        $this->conn = $conn;
    }

    // getters
    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getUserName(){
        return $this->user_name;
    }

    public function getUserEmail(){
        return $this->user_email;
    }

    public function getUserPhone(){
        return $this->user_phone;
    }   

    public function getCarModel(){
        return $this->car_model;
    }

    public function getCarYear(){
        return $this->car_year;
    }

    public function getCreatedAt(){
        return $this->createdat;
    }   

    public function getAppointmentDate(){
        return $this->appointment_date;
    }

    // setters
    public function setId($id){
        $this->id = $id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function setUserName($user_name){
        $this->user_name = $user_name;
    }

    public function setUserEmail($user_email){
        $this->user_email = $user_email;
    }

    public function setUserPhone($user_phone){
        $this->user_phone = $user_phone;
    }

    public function setCarModel($car_model){
        $this->car_model = $car_model;
    }

    public function setCarYear($car_year){
        $this->car_year = $car_year;
    }

    public function setCreatedAt($createdat){
        $this->createdat = $createdat;
    }

    public function setAppointmentDate($appointment_date){
        $this->appointment_date = $appointment_date;
    }

    // methods
    // create
}