<?php
$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{
  $name = 上海申环信息科技有限公司;
  var_dump($name);
  $result = $client->registerVendor($name); 
  var_dump($result);
  //print "The result is: $result";
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>

