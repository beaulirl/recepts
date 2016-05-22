<?php
/**
* class for creating and getting menu
*/
class Dish
{
    const FIRST_DISH = "1";
    const SECOND_DISH = "2";
    const SALAD = "3";
    const DESERT = "4";

    /**
    *
    * @var string 
    */
    protected $table; 

    /**
    *
    * @var id 
    */
    protected $id;

    /**
    *
    * @var string 
    */
    protected $name;

    /**
    * Create a new connection.
    *
    * @param object $connection 
    */
    function __construct( MySqlConnection $connection)
    {
        $this->table = $connection->getTableName();
        $this->pdo = $connection->GetPdo();
    }

    /**
    * Create a new Dish
    * 
    * @param string $name
    * @param string $type
    * @param string $recept
    */
    public function createDish($name, $type, $recept, $mail)
    {
        $stmt = $this->pdo->prepare("INSERT into ".$this->table." (name, type, recept, user) values (:name, :type, :recept, '".$mail."')");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':recept', $recept);
        $stmt->execute();
        $this->name = $name;
    }

    /**
    * Get random Dish by type
    *
    * @param string $type
    * @return int
    */
    public function getRandDish($type)
    { 
        $stmt = $this->pdo->query("SELECT name, recept, price from ".$this->table." where type='".$type."' order by RAND() limit 1");
        $row = $stmt->fetch();
        return $row;  
    }

    /**
    * Get id Dish
    *
    * @return int
    */
    public function getIdDish()
    { 
        $stdt = $this->pdo->query("SELECT id from ".$this->table." where name='".$this->name."' limit 1");
        $this->id = $stdt->fetch();
        return $this->id['id'];
    }
}