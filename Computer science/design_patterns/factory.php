
<?php
   class Car {
      public function getDelivery() {
         return "Honda shine ready";
      }
   }
   class Bike {
      public function getDelivery() {
         return "Honda city ready";
      }
   }
   
  #Hiding object creation, and forcing user to use this class to create a object 
   class HondaFactory {
      public static function create($model) {
      	if($model == 'car')
	    	return new Car();
      	elseif($model == 'bike')
      		return new Bike();
      }
   }
   
   $car = HondaFactory::create('car');
   $bike = HondaFactory::create('bike');
   echo $car->getDelivery();
   echo $bike->getDelivery();
   
?>

