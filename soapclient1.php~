<?php
//header("Content-type:text/html;charset=utf-8");


$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{
	$vendorCode = 'SH021081';
	$vendorName = array('vendorName' => "上海申环信息科技有限公司");
	$vendorCodeInput = array('vendorCode' => "SH021081");

  	//1、厂家信息注册
	//  var_dump($name);
	//  $result =  $client->__soapCall('registerVendor', [
	//      ['vendorName' => $name]
	//  ]);

	//$para = array('vendorName' => $name);
	$result =  $client->__soapCall('registerVendor', [$vendorName]);
	$vendorCode = $result->vendorCode;
	//echo $vendorCode."\n";
	//var_dump($result);
	
	//9、获取所有区县信息（新增）
	$xmlTpl = array('vendorCode'=> "SH021081",'parentDistrict'=> "浦东新区");
	//$result =  $client->__soapCall('pullDistrict', [$xmlTpl]);
	$result =  $client->__soapCall('pullDistrict', [array('vendorCode'=> "SH021081"),array('parentDistrict'=> "浦东新区")]);
	var_dump($result);

	$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	echo "pullDistrict result :".$strout.PHP_EOL.PHP_EOL;
	var_dump($result);

	//10、获取工程类型信息（新增）	
	$result =  $client->__soapCall('pullProjectType', [$vendorCodeInput]);
	var_dump($result);

	$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	echo "pullProjectType result :".$strout.PHP_EOL.PHP_EOL;

	//11、获取工程性质信息（新增）
	$result =  $client->__soapCall('pullProjectCategory', [$vendorCodeInput]);
	$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	echo "pullProjectCategory result :".$strout.PHP_EOL.PHP_EOL;

	//12、获取工程工期信息（新增）
	$result =  $client->__soapCall('pullProjectPeriod', [$vendorCodeInput]);
	$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	echo "pullProjectPeriod result :".$strout.PHP_EOL.PHP_EOL;
	
	//13、获取区域信息（新增）	
	$result =  $client->__soapCall('pullRegion', [$vendorCodeInput]);
	var_dump($result);
	$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	echo "pullRegion result :".$strout.PHP_EOL.PHP_EOL;
	//var_dump($result);

}catch(SoapFault $e){
  	print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>

