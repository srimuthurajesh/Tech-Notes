<?php

class Student{
   private $studentName;
   private $schoolName;
   
   function setStudentName($studentName){
      $this->studentName=$studentName;
   }
   function setSchoolName($schoolName){
      $this->schoolName=$schoolName;
   }
   function getStudentInfo(){
      return "Student : ".$this->studentName.", School : ".$this->schoolName; 
   }
}

$obj = new Student();
$obj->setSchoolName("Avm school");

#clone with schoolname data 
$student1=clone $obj;
$student1->setStudentName("Rajesh");

$student2=clone $obj;
$student2->setStudentName("Arun");


echo $student1->getStudentInfo();
echo "<br>";   
echo $student2->getStudentInfo();