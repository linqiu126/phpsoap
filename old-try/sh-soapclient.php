<?php
	
	$soap = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
	try{
		$name = "上海申环信息科技有限公司";
		//var_dump($name);

		$result =  $soap->__soapCall('registerVendor', [['vendorName' => $name]]);
		//$result = $client->registerVendor($name); 
		var_dump($result);
		//print "The result is: $result";

		
		print_r($soap->__getFunctions());//列出当前SOAP所有的方法，参数和数据类型，也可以说是获得web service的接口

		print_r($soap->__getTypes());//列出每个web serice接口对应的结构体

		//9、获取所有区县信息（新增）
		//public List<EmsDistrict> pullDistrict(String vendorCode, String parentDistrict)
		$vendorCode = 'SH021081';
		$result =  $soap->__soapCall('pullDistrict', [['vendorCode' => $vendorCode]]);
		var_dump($result);



		//10、获取工程类型信息（新增）
		//public List<EmsPrjType> pullProjectType(String vendorCode)
		$vendorCode = 'SH021081';
		$result =  $soap->__soapCall('pullProjectType', [['vendorCode' => $vendorCode]]);
		var_dump($result);


	}catch(SoapFault $e){
	  print "Sorry an error was caught executing your request: {$e->getMessage()}";
	}
?>

