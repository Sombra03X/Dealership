<?php
class User
{
    //  properties -----------------------------------------
    protected $firstname;
    protected $lastname;
    protected $password;
    protected $email;
    protected $phone;
    protected $createdat;
    protected $role;
    
    // functions ------------------------------------------------
    
    // constructor
    public function __construct($firstname=NULL, $lastname=NULL, $password=NULL, $email=NULL, $phone=NULL, $createdat=NULL, $role=NULL)
    {
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->password=$password;
        $this->email=$email;
        $this->phone=$phone;
        $this->createdat=$createdat;
        $this->role=$role;
    }
    
    // setters
    public function set_firstname($firstname)
    {
        $this->firstname=$firstname;
    }
    public function set_lastname($lastname)
    {
        $this->lastname=$lastname;
    }
    public function set_password($password)
    {
        $this->password=$password;
    }
    public function set_email($email)
    {
        $this->email=$email;
    }
    public function set_phone($phone)
    {
        $this->phone=$phone;
    }
    public function set_createdat($createdat)
    {
        $this->createdat=$createdat;
    }
    public function set_role($role)
    {
        $this->role=$role;
    }
    
    // getters
    public function get_username()
    {
        return $this->username;
    }
    
    public function get_firstname()
    {
        return $this->firstname;
    }
    public function get_lastname()
    {
        return $this->lastname;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_phone()
    {
        return $this->phone;
    }
    public function get_createdat()
    {
        return $this->createdat;
    }
    public function get_role()
    {
        return $this->role;
    }
    
    // crud methods ------------------------------------------------------
    
    public function createUser() // create a user
    {
        try {
            require "dbh.php";
            
            // get inputs, make variables out of them
            $id = NULL; // auto inc.
            $firstname = $this->get_firstname();
            $lastname = $this->get_lastname();
            $password = $this->get_password();
            $email = $this->get_email();
            $phone = $this->get_phone();
            
            // check if email is taken already
            $stmt = $conn->prepare("
                                  SELECT email
                                  FROM users
                                  WHERE email = :email
                              ");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                // if email in use, give warning and redirect to ../index (gotta be changed)
                echo '' ?>
		        <script type="text/javascript">
                    window.open("../index.php","_self");
                    alert("Email is already taken!");
                </script>
                <?php ;
		    } else {
		        // prepare statement to insert into database
		        $sql = $conn->prepare("
                                         INSERT INTO users (id, firstname, lastname, password, email, phone)
                                         VALUES (:id, :firstname, :lastname, :password, :email, :phone)
                                     ");
		        // put variables into statement and execute
		        $sql->bindParam(":id", $id);
		        $sql->bindParam(":firstname", $firstname);
		        $sql->bindParam(":lastname", $lastname);
		        $sql->bindParam(":password", $password);
		        $sql->bindParam(":email", $email);
		        $sql->bindParam(":phone", $phone);
		        $sql->execute();
		        
		        // notify successful creation + redirect to ../index
		        echo '' ?>
		        <script type="text/javascript">
                    window.open("../index.php","_self");
                    alert("Account registered! You can now login!");
                </script>
                <?php 
                ;
		    }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function readUser()
    {
        try {
            require "dbh.php";
            
            if (!isset($_SESSION['email'])) {
                // if not logged in (email doesnt exist in session)
                
                echo '<p> You are not logged in! Please login at <a href="index.php">our login page</a>!</p>';
            }else{
                //if logged in, continue
                
                $sesuser = $_SESSION['email'];
                // create statement to select info from the database based on session's email
                $sql = $conn->prepare("
                                         SELECT id, firstname, lastname, password, email, phone, role
                                         FROM users
                                         WHERE email = :email
                                     ");
                $sql->bindParam(":email", $sesuser);
                $sql->execute();
                
                // Retrieve the user record from the database
                $user = $sql->fetch(PDO::FETCH_ASSOC);
                
                {
                    echo $user['id'];
                    echo $user['firstname'];
                    echo $user['lastname'];
                    echo $user['password'];
                    echo $user['email'];
                    echo $user['phone'];
                    if ($user['role'] == 0){
                        echo'Admin';
                    }
                }
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function updateUser($id)
    {
        try {
        require "dbh.php";
        // gegevens uit het object in variabelen zetten
        $username 	= $this->get_username();
        $password1 	= $this->get_password();
        
        // statement maken
        $sql = $conn->prepare("
									 update users
									 set username=:username, password=:password
									 where id=:id
								 ");
        // variabelen in de statement zetten
        $password = password_hash($password1, PASSWORD_DEFAULT); // Creates a password hash
        $sql->bindParam(":username", $username);
        $sql->bindParam(":password", $password);
        $sql->bindParam(":id", $id);
        $sql->execute();
        header("location: includes/logout.inc.php");
        /*
         echo '<script type="text/javascript">
         window.open("checkuser.php","_self");
         </script>';
         */
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function deleteUser($email)
    {
        try {
            require "dbh.php";
            // statement maken
            $sql = $conn->prepare("
									 DELETE from users
									 WHERE email = :email
								 ");
            // variabele in de statement zetten
            $sql->bindParam(":username", $email);
            $sql->execute();
            header("location: includes/logout.inc.php");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>