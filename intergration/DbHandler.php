<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbHandler
 *
 * @author Demit
 */

//$db = new DbHandler();
//if ($db->findWord("lepel") == TRUE){
//    $db->printWord();
//}
//else {
//    echo "niets gevonden";
//}

include_once '_config.php';
class DbHandler {
    //dit noemen we in OO een attribute
    private $woord;
    
    //een functie in OO heet een method
    function findWord($woord){
        $result = FALSE;
        $this->woord = $woord;
        
        //stap 1: instellen PDO
        $options = $this->setPDOoptions();
        
        $sql = "SELECT * FROM palindromen WHERE woord ='". $woord ."';";
        
        try {
            
            //stap2:
            $conn = $this->connectToDatabase($options);
            //stap 3: run the query
            $stmt = $conn->query($sql);
            
            //stap 4: fetch
            if ($stmt->rowCount() == 1){
                $result = TRUE;
            }     
        }
        catch (PDOException $e){
            echo "jouw tekst" . $e->getMessage()."(".$e->getCode().").";
        }
        return $result;
    }
    
    private function setPDOoptions(){
        $options = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];
        return $options;
    }
    
    private function connectToDatabase($options){
        $host = 'localhost';
        $charset = 'utf8mb4';
        $db = 'palindroom';
        
        $host = "mysql:host=$host; dbname=$db; charset=$charset";
        
        $conn = new PDO($host, USER, PASSWORD, $options);
        
        return $conn;
    }
    
    function printWord(){
        echo $this->woord;
    }
}
