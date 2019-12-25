
<?php
   class Car {
      public function getDelivery() {
         return "Honda car ready";
      }
   }
   class Bike {
      public function getDelivery() {
         return "Honda bike ready";
      }
   }

   class ElectricCar {
      public function getDelivery() {
         return "Tesla car ready";
      }
   }
   class ElectricBike {
      public function getDelivery() {
         return "Tesla bike ready";
      }
   }
  #Hiding object creation, and forcing user to use this class to create a object 
   class HondaFactory {
      public function create($model) {
      	if($model == 'car')
	    	return new Car();
      	elseif($model == 'bike')
      		return new Bike();
      }
   }

   class TeslaFactory {
      public function create($model) {
         if($model == 'car')
         return new Car();
         elseif($model == 'bike')
            return new Bike();
      }
   }
   #factory of factories
   class AutomobileManufacturer{
      public static function create($company) {
         if($model == 'honda')
         return new HondaFactory();
         elseif($model == 'tesla')
            return new TeslaFactory();
      }
   }
   
   $company = AutomobileManufacturer::create('honda');
   $car = $company->create('car')->getDelivery();
   $bike = $company->create('bike')->getDelivery();

   $company = AutomobileManufacturer::create('tesla');
   $car = $company->create('car')->getDelivery();
   $bike = $company->create('bike')->getDelivery();
   
?>

