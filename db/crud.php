<?php
 class crud{
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function getEmployees(){
        try{
            $sql = "SELECT * FROM users u inner join offices o on u.office_nr = o.office_id ORDER BY id";
            $result = $this->db->query($sql);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function setJson(){
        try{
            $sql = "SELECT * FROM users u inner join offices o on u.office_nr = o.office_id";
            $result = $this->db->query($sql);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function insertEmployee($username,$name, $email, $password, $role, $image, $office) {
        try {
            //ENCRYPT PASSWORD
            $new_password = password_hash($password, PASSWORD_BCRYPT);
            //define sql query
            $sql = "INSERT INTO users(username,name, email,password, user_type,image, office_nr ) VALUES (:username,:name,:email,:password,:role, :image, :office)";
            //prepare statement
            $stmt = $this->db->prepare($sql);
            //bind placeholders to params
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':password', $new_password);     
            $stmt->bindparam(':role', $role);
            $stmt->bindparam(':image', $image);
            $stmt->bindparam(':office', $office);
            //execute query  
             $stmt->execute();
            return true; 
            
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteEmployee($id){
        try{
            $sql = "DELETE FROM users WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }       
    }

    public function editEmployee($id, $name, $email, $role, $office){
        try{
            $sql = "UPDATE `users` SET `name`=:name, `email`=:email, `user_type`=:role, `office_nr`=:office WHERE id=:id ";
            //prepare statement
            $stmt = $this->db->prepare($sql);
            //bind placeholders to params
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':role', $role);
            $stmt->bindparam(':office', $office);
            //execute query
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getEmployeeDetails($id){
        try{
        $sql = "SELECT * FROM users where id= :id";
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

    public function getOffices(){
        try{
            $sql = "SELECT * FROM offices";
            $result = $this->db->query($sql);
            return $result;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function insertOffice($name, $address){
        try{
            $sql = "INSERT INTO offices(office_name, address) VALUES (:name, :address)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':address', $address);
            $stmt->execute();
            return true;            
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }        
    }

    public function deleteOffice($id){
        try{
            $sql ="DELETE FROM offices WHERE office_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        } 
    }
}
    


?>