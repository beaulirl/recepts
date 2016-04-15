<?php
class User
{

    /**
    *
    * @var string 
    */
    public $password;

    /**
    *
    * @var string 
    */
    public $email;
    
    /**
    * Get pdo and table name.
    *
    * @param MySqlConnection $connection
    * 
    */
    function __construct(MySqlConnection $connection)
    {
        $this->table = $connection->getTableName();
        $this->pdo = $connection->GetPdo();
    }

    /**
    * Create a new md5 password.
    *
    * @param string $clear_password 
    */
    public function setPassword($clear_password)
    {
        $this->password = md5($clear_password);
        return $this->password;
    }

    /**
    * Create a new User.
    *
    * @param string $clear_password 
    */
    public function createUser($name, $password, $email)
    {
        $stmt = $this->pdo->prepare("INSERT into ".$this->table." (name, password, email) values (:name, :password, :email)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $this->setPassword($password));
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    /**
    * Delete User.
    *
    * @param string $clear_password 
    */
    public function deleteUser($id)
    {
        $stmt = $this->pdo->query("DELETE from ".$this->table." where id='".$id."' limit 1");   
    }

}
