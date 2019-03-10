
<?php
   class Car {
      private $model;
      public function __construct($model) {
         $this->model = $model;
      }
      public function getDelivery() {
         return "Honda shine ready";
      }
   }
   class Bike {
      private $model;
      public function __construct($model) {
         $this->model = $model;
      }
      public function getDelivery() {
         return "Honda city ready";
      }
   }
   
  #Hiding object creation, and forcing user to use this class to create a object 
   class HondaFactory {
      public static function create($model) {
      	if($model == 'car')
	    	return new Car($model);
      	elseif($model == 'bike')
      		return new Bike($model);
      }
   }
   
   $car = HondaFactory::create('car');
   $bike = HondaFactory::create('bike');
   echo $car->getDelivery();
  // echo $bike->getDelivery();
   
?>

