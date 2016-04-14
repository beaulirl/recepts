<?php
class Ingredient 
{	
    /**
    *
    * @var int 
    */
	protected $id;

    /**
    *
    * @var string 
    */
	protected $name;

    /**
    *
    * @var int 
    */
    protected $quantity;

    /**
    *
    * @var string 
    */
    protected $string; 

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
	* Create a new Ingredient
	* 
	* @param string $name
    * @param int $quantity
    * @param int $fats
    * @param int $price
    */
	public function createIngredient($name, $fats, $price, $quantity)
	{
	    $stmt = $this->pdo->prepare("INSERT into ".$this->table." (name, fats, price) values (:name, :fats, :price)");
        $this->name = $stmt->bindParam(':name', $name);
        $stmt->bindParam(':fats', $fats);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
        $this->quantity = $quantity;
        $this->name = $name;
	}

    /**
    * Get id  Ingredient
    *
    * @return int
    */
	public function getIdIngredient()
	{ 
        $stdt = $this->pdo->query("SELECT id from ".$this->table." where name='".$this->name."' limit 1");
        $this->id = $stdt->fetch();
        return $this->id['id'];
	}

    /**
    * Get quantity of Ingredient
    *
    * @return int
    */
	public function getQuantityIngredient()
	{ 
        return $this->quantity;
	}
}
