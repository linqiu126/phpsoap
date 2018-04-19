<?php
header("Content-type:text/html;charset=utf-8");


$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{
  $vendorCode = 'SH021081';
  $vendorName = array('vendorName' => "上海申环信息科技有限公司");
  $vendorCodeInput = array('vendorCode' => "SH021081");;



  //4、上传设备信息
  $emsDeviceList =
      array(
          'code'=>"",
          'name'=>"15040005",
          'ipAddr'=>"127.10.10.05",
          'macAddr'=>"AAAAAAAA",
          'port'=>"9510",
          'version'=>"01",
          'projectCode'=>"SHENHUAN_PRJ",
          'longitude'=>"121.556498",
          'latitude'=>"31.226542",
          'startDate'=>'2018-04-02T12:01:01',
          'endDate'=>'2018-05-02T12:01:01',
          'installDate'=>'2018-04-02T12:01:01',
          'onlineStatus'=>true,
          'videoUrl'=>"http"
      );

$result =  $client->__soapCall('pushDevices',[array('vendorCode'=> "SH021081",'emsDeviceList' => [$emsDeviceList])]);
//  $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
$strout = json_encode($result);
echo "pushDevices result :".$strout.PHP_EOL.PHP_EOL;

//5、上传设备状态信息
    $emsDeviceList =
        array(
            'code'=>"SHENHUAN_PRJ-SH021081-02",
            'name'=>"TEST_02",
            'ipAddr'=>"127.10.10.10",
            'macAddr'=>"AAAAAAAA",
            'port'=>"9510",
            'version'=>"01",
            'projectCode'=>"SHENHUAN_PRJ",
            'longitude'=>"121.556499",
            'latitude'=>"31.226544",
            'startDate'=>'2018-04-02T12:01:01',
            'endDate'=>'2018-06-02T12:01:01',
            'installDate'=>'2018-04-02T12:01:01',
            'onlineStatus'=>true,
            'videoUrl'=>"http"
        );

//    $result =  $client->__soapCall('pushDeviceStatus',[array('vendorCode'=> "SH021081",'emsDeviceList' => [$emsDeviceList])]);
//    $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
//    echo "pushDeviceStatus result :".$strout.PHP_EOL.PHP_EOL;

//    pushDevices result :{"deviceCodes":{"result":{"entry":{"key":"SHENHUAN_PRJ-SH021081-01","value":"15040003"}}}}
//    pushDevices result :{"deviceCodes":{"result":{"entry":{"key":"testhyj-SH021081-01","value":"15040003"}}}}

  //print_r($client->__getFunctions());//列出当前SOAP所有的方法，参数和数据类型，也可以说是获得web service的接口
  //print_r($client->__getTypes());//列出每个web serice接口对应的结构体
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>
