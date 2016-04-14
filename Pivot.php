<?php
class Pivot
{   
	/**
    *
    * @var int 
    */
	protected $dish_id;

	/**
    *
    * @var int 
    */
	protected $ingredient_id;

	/**
    *
    * @var int 
    */
	protected $quantity;

	/**
    * Get data for pivot.
    *
    * @param object $dish
    * @param object $ingredient
    * @param object $connection
    * 
    */
	function __construct(Dish $dish, Ingredient $ingredient, MySqlConnection $connection)
	{
		$this->dish_id = $dish->getIdDish();
		$this->ingredient_id = $ingredient->getIdIngredient();
		$this->quantity = $ingredient->getQuantityIngredient();
        $this->table = $connection->getTableName();
        $this->pdo = $connection->GetPdo();
	}

	/**
	* Create a new PivotTable Data
    */
	public function createPivotData()
	{
		$stmt = $this->pdo->prepare("INSERT into ".$this->table." (recept_id, ingredient_id, quantity) values (:dish_id, :ingredient_id, :quantity)");
        $stmt->bindParam(':dish_id', $this->dish_id);
        $stmt->bindParam(':ingredient_id', $this->ingredient_id);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->execute();
	}
}