<?php
$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{
  $result = $client->registerVendor("AQHJ0QP0100001"); //SH021161，AQHJ，AQHJ0QP0100001
  
  var_dump($result);
  //print "The result is: $result";
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>

