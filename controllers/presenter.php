<?php






include_once '../models/palindroom.php';
if(!empty($_POST )){
    if (checkPostArgument()) {
        $woord = $_POST["naam"];
        if(strlen($woord) > 1){
            $palindroom = new Palindroom();
            $palindroom->flipText($woord);
            
            if($palindroom->heeftFlippedtextEenBetekenis()){
               $vieuwData = array(
                   "palindroom" => $palindroom->getFlippedText(),
                   "message" => " heeft een betekenis",
                   "action" => " vul nog een woord in of sluit de browser"
               );
            }
            else{
               $vieuwData = array(
                       "palindroom" =>$palindroom->getFlippedText(),
                       "message" => " heeft geen betekenis",
                       "action" => " vul nog een woord in of sluit de browser"
                   );
            }
        }    
     else{
         $vieuwData = array(
                   "palindroom" => "",
                   "message" => " u heeft geen woord ingevuld",
                   "action" => " vul nog een woord in of sluit de browser"
             );
    }
}
}
include '../views/View.php';



function checkPostArgument() {
 $validArguments = array("naam", "submit");
$aantalArgumentenInPost = sizeof($validArguments);
return TRUE;


//    if(sizeof($_POST) == $aantalArgumentenInPost){
//       for ($index =0; index < $aantalArgumentenInPost ; $index++) {
//           if (!isset($_POST[$validarguments[$index]])) {
//               return FALSE;
//           }
//       }
//       return TRUE;
//    }
//    return FALSE;  
}

