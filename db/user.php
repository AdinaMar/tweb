<?php 
 class user{
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function getUser($username){
        try{
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }     
    }

    public function getUserByName($name){
        try{
            $term = "$name%";
            $sql = "SELECT * FROM users WHERE name LIKE :name";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $term, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }     
    }

    public function insertUser($username,$name, $email, $password, $image) {
        try {
            //CHECK IF THERE ARE 2 USERS WITH THE SAME USERNAME
            $result = $this->getUserByUsername($username);
            //IF THERE'S 2 USERS WITH THE SAME USERNAME DO NOTHING
            if($result['num'] > 0) {
                return false;
            }else {
            //ENCRYPT PASSWORD
            $new_password = password_hash($password, PASSWORD_BCRYPT);
            //define sql query
            $sql = "INSERT INTO users(username,name, email,password,image) VALUES (:username,:name,:email,:password, :image)";
            //prepare statement
            $stmt = $this->db->prepare($sql);
            //bind placeholders to params
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':password', $new_password);
            $stmt->bindparam(':image', $image);
            //execute query  
             $stmt->execute();
            return true; 
            }
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($username){
        try{
            //GET NUMBER OF USERS THAT MATCH THAT USERNAME -> make sure we don't have 2 equal usernames
            $sql = "SELECT count(*) as num FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
        }     
    }

    public function countUsers(){
        try{
            $sql = "SELECT count(*) as num FROM users";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
        }     
    }

    public function countUsersPerOffice($id){
        try{
            $sql = "SELECT count(*) as num FROM offices WHERE office_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
        }     
    }
 }
 ?>
