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
    public function createAppo(){
        $sql = "INSERT INTO appointment (naam, email, phone, model, year, dateappo) VALUES (:naam, :email, :phone, :model, 
        :year, :dateappo)";

        try {
            // Prepare the statement
            $prst = $this->conn->prepare($sql);

            // Bind parameters to the placeholders
            $prst->bindParam(':naam', $this->user_name);
            $prst->bindParam(':email', $this->user_email);
            $prst->bindParam(':phone', $this->user_phone);
            $prst->bindParam(':model', $this->car_model);
            $prst->bindParam(':year', $this->car_year);
            $prst->bindParam(':dateappo', $this->appointment_date);

            // Execute the prepared statement
            $prst->execute();
        } catch (Exception $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
        }
    }
    public function readAppo(){
        $sql = "SELECT * FROM appointment";
    
        try {
            // Prepare the statement
            $prst = $this->conn->prepare($sql);
    
            // Execute the prepared statement
            $prst->execute();
    
            // Fetch the results
            $appointments = $prst->fetchAll(PDO::FETCH_ASSOC);
    
            // Return the results
            return $appointments;
        } catch (PDOException $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
        }
        
    }
    public function updateAppo(){
        $sql = "UPDATE appointment SET naam = :naam, email = :email, phone = :phone, model = :model, year = :year, dateappo = :dateappo WHERE id = :id";
    
        try{
            // prepare statement
            $prst = $this->conn->prepare($sql);
    
            // bind parameters to placeholders
            $prst->bindParam(':id', $this->id);
            $prst->bindParam(':naam', $this->user_name);
            $prst->bindParam(':email', $this->user_email);
            $prst->bindParam(':phone', $this->user_phone);
            $prst->bindParam(':model', $this->car_model);
            $prst->bindParam(':year', $this->car_year);
            $prst->bindParam(':dateappo', $this->appointment_date);
    
            // Execute prepared statement
            $prst->execute();
        } catch (Exception $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteAppo(){
        $sql = "DELETE FROM appointment WHERE id = :id";
    
        try{
            // prepare the statement
            $prst = $this->conn->prepare($sql);
    
            // bind parameters to the placeholders
            $prst->bindParam(':id', $this->id);
    
            // Execute the prepared statement
            $prst->execute();
        } catch (Exception $e) {
            // Handle any exceptions here
            echo "Error: " . $e->getMessage();
        }
    }    
}