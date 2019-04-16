<!DOCTYPE html>
<html>
<body>


<?php
// retrieve all XML errors when loading the document, result in an array of errors
libxml_use_internal_errors(true);       

$xml=simplexml_load_file("friends.xml") or die("Error: Cannot create object");

///////////////////////
// error handling
if ($xml === false) 
{  // failed loading XML, display error messages
   foreach (libxml_get_errors() as $error)
   {
      echo "$error->message <br/>";
   }
}
///////////////////////


echo $xml->friend[0]->name . "<br>";
echo $xml->friend[1]->email . "<br/>";


echo "<br/>---- Use loop to get node values ----<br/>";
foreach($xml->children() as $friends) {
   echo $friends->name . ", " . $friends->email . "<br/>";
//    echo $friends->favorite . "<br/>";
   
} 


echo "<br/>---- Get attribute values ----<br/>";
echo $xml->friend[0]['met'] . ", " . $xml->friend[0]['current'] . "<br>";
// echo $xml->friend[0]->favorite['food'] . ", " . $xml->friend[0]->favorite['cartoon'] . "<br/>";


echo "<br/>---- Use loop to get attribute values ----<br/>";
foreach($xml->children() as $friends) {
   echo $friends['met'] . ", " . $friends['current'] . "<br/>";
} 
	

?>


</body>
</html>