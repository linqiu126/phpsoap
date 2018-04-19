<?php
//header("Content-type:text/html;charset=utf-8");


$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{
  $vendorCode = 'SH021081';
  $vendorName = array('vendorName' => "上海申环信息科技有限公司");
  $vendorCodeInput = array('vendorCode' => "SH021081");;
  	//1、厂家信息注册
	//  var_dump($name);
	//  $result =  $client->__soapCall('registerVendor', [
	//      ['vendorName' => $name]
	//  ]);

//  $para = array('vendorName' => $name);
  $result =  $client->__soapCall('registerVendor', [$vendorName]);
  $vendorCode = $result->vendorCode;
  //echo $vendorCode."\n";
  var_dump($result);
  $result =  $client->__soapCall('pullRegion', [$vendorCodeInput]);
  //var_dump($result);

  //2、上传工程信息
    $datetime = time();
    echo "time = ".$datetime.PHP_EOL;
  $emsProjectList =
      array(
          'code' => 'SHENHUAN_PRJ-00',
          'name' => '申环测试项目',
          'district'=> '浦东新区',
          'prjType'=>1,
          'prjCategory'=>1,
          'prjPeriod'=>1,
          'region'=> 1,
          'street'=> '123',
          'longitude'=>"121.556498",
          'latitude'=>"31.226542",
          'contractors'=>'123',
          'superintendent'=>'123',
          'telephone'=>'12345678',
          'address'=>'234',
          'siteArea'=>2000,
          'buildingArea'=>20000,
          'startDate'=>$datetime,
          'endDate'=>null,
          'stage'=>'7',
          'isCompleted'=>false,
          'status'=>true
        );

   $result =  $client->__soapCall('pushProjects',[array('vendorCode'=> "SH021081",'emsProjectList' => [$emsProjectList])]);
   //$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	$strout = json_encode($result);
   echo "pushProjects result :".$strout.PHP_EOL.PHP_EOL;


  //print_r($client->__getFunctions());//列出当前SOAP所有的方法，参数和数据类型，也可以说是获得web service的接口
  //print_r($client->__getTypes());//列出每个web serice接口对应的结构体
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>
