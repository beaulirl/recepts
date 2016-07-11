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

    /**
    * Find user.
    *
    * @param string $name
    * @param string $email 
    */
    public function findUser($email, $password)
    {
        $stdt = $this->pdo->prepare("SELECT password, email from ".$this->table." where email=:email limit 1");
        $stdt->bindParam(':email', $email);
        $stdt->execute();
        $user = $stdt->fetch();
        $passw = substr(md5($password), 0, -17);
        if(($passw) == $user['password']&&($email == $user['email']))
        {
            return 1;
        }
        return false;
    }

    /**
    * Get UserId
    */
    public function getId($mail)
    {
        $stdt = $this->pdo->query("SELECT id from ".$this->table." where email='".$mail."' limit 1");
        $this->id = $stdt->fetch();
        return $this->id['id'];
    }

}
