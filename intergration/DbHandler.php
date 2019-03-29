<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbHandler
 *
 * @author johan
 * 
 */
$db = new DbHandler();
if ($db ->findWoord("lepel") == TRUE){
    $db->printWoord();
}
else {
    echo "geen kaas vandaag";
}
//een functiwe heet ook wel een method

class DbHandler {
    //dit noemen we ook wel een attribute
    private $woord;
    
    function findWoord($woord){
        $result = FALSE;
        $this->woord =$woord;
        
        $options = [
           PDO::ATTR_ERRMODE                =>PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE     =>PDO::FETCH_ASSOC,
           PDO::ATTR_EMULATE_PREPARES       =>false,
        ]  ; 
        
        $host = "localhost"; 
     $charset= 'utf8mb4';
     $db = "palindroom";
     $user = "root";
     $password = "";
     $host = "mysql:host=$host;dbname=$db;charset=$charset";

     $sql = "Select * FROM palindromen WHERE woord = '".$woord."';";
     
     try{
         $conn = new PDO($host, $user, $password, $options);
         $stmt = $conn->query($sql);
         if  ($stmt->rowCount() == 1){
             $result = TRUE;
         }
     }
                 
     catch(PDOException $e){
         echo "jou text" . $e->getMessage()."(".$e->getCode().").";
     }
     return $result;
       
   }
             
    Function printWoord(){
        echo $this->woord;
    }
   
   }
//put your code here

