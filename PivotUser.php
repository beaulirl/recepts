<?php
class PivotUser
{   
    /**
    *
    * @var int 
    */
    protected $user_id;

    /**
    *
    * @var int 
    */
    protected $dish_id;

    /**
    * Get data for pivot.
    *
    * @param User $user
    * @param Dish $dish
    * @param MySqlConnection $connection
    * 
    */
    function __construct(User $user, Dish $dish, MySqlConnection $connection)
    {
        //$this->user_id = $user->getId();
        $this->dish_id = $dish->getIdDish();
        $this->table = $connection->getTableName();
        $this->pdo = $connection->GetPdo();
    }

    /**
    * Create a new PivotTableUser Data
    */
    public function createPivotUserData($user_id)
    {
        $stmt = $this->pdo->prepare("INSERT into ".$this->table." (user_id, dish_id) values (:user_id, :dish_id)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':dish_id', $this->dish_id);
        $stmt->execute();
  }
}