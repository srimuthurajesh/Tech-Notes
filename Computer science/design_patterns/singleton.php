<?php

#Object creational design pattern
#1.make constructor private
#2.static method to initiate object
#Be carefule while using concurrent programming multithreadings

 class Singleton {
      protected function __construct() {
      }
      
      public static function getInstance() {
         static $instance = null;
         
         if (null === $instance) {
            $instance = new static();
         }
         return $instance;
      }
   }
   
   class SingletonChild extends Singleton {
   }
   
   $obj = Singleton::getInstance();
   echo ($obj === Singleton::getInstance());
   
   $anotherObj = SingletonChild::getInstance();
   echo ($anotherObj === Singleton::getInstance());
   echo ($anotherObj === SingletonChild::getInstance()); 
