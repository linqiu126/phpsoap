<?php
header("Content-type:text/html;charset=utf-8");


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
  $xmlTpl = array('vendorCode'=> "SH021081",'parentDistrict'=> "浦东新区");
  //$result =  $client->__soapCall('pullDistrict', [$xmlTpl]);
  $result =  $client->__soapCall('pullDistrict', [array('vendorCode'=> "SH021081"),array('parentDistrict'=> "浦东新区")]);
  $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
 echo "pullDistrict result :".$strout.PHP_EOL.PHP_EOL;

 $result =  $client->__soapCall('pullProjectType', [$vendorCodeInput]);
 $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
 echo "pullProjectType result :".$strout.PHP_EOL.PHP_EOL;
 $result =  $client->__soapCall('pullProjectCategory', [$vendorCodeInput]);
 $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
 echo "pullProjectCategory result :".$strout.PHP_EOL.PHP_EOL;
  $result =  $client->__soapCall('pullProjectPeriod', [$vendorCodeInput]);
 $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
 echo "pullProjectPeriod result :".$strout.PHP_EOL.PHP_EOL;
  $result =  $client->__soapCall('pullRegion', [$vendorCodeInput]);
 $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
 echo "pullRegion result :".$strout.PHP_EOL.PHP_EOL;
 //var_dump($result);

  //2、上传工程信息
  $emsProjectList =
      array(
          'code' => 'SHENHUAN_PRJ',
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
          'startDate'=>null,
          'endDate'=>null,
          'stage'=>'7',
          'isCompleted'=>false,
          'status'=>true
        );

//   $result =  $client->__soapCall('pushProjects',[array('vendorCode'=> "SH021081",'emsProjectList' => [$emsProjectList])]);
//   $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
//   echo "pushProjects result :".$strout.PHP_EOL.PHP_EOL;

  //3、上传工程状态信息
  $emsProjectList =
      array(
          'code' => 'SHENHUAN_PRJ',
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
          'startDate'=>null,
          'endDate'=>null,
          'stage'=>'7',
          'isCompleted'=>false,
          'status'=>true
      );

//  $result =  $client->__soapCall('pushProjectStatus',[array('vendorCode'=> "SH021081",'emsProjectList' => [$emsProjectList])]);
//  $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
//  echo "pushProjectStatus result :".$strout.PHP_EOL.PHP_EOL;

  //4、上传设备信息
  $emsDeviceList =
      array(
          'code'=>"",
          'name'=>"15040005",
          'ipAddr'=>"127.10.10.108",
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

//  $result =  $client->__soapCall('pushDevices',[array('vendorCode'=> "SH021081",'emsDeviceList' => [$emsDeviceList])]);
//  $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
//  echo "pushDevices result :".$strout.PHP_EOL.PHP_EOL;

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

//    6、上传实时监测数据


    $datetime = time();
    echo "time = ".$datetime.PHP_EOL;
    $emsDataList =
        array(
             'devCode'=>'SHENHUAN_PRJ-SH021081-02',
             'prjCode'=>'SHENHUAN_PRJ',
             'prjType'=>1,
             'dust'=>57.001,
             'maxDust'=>80.001,
             'minDust'=>45.001,
             'temperature'=>17.1,
             'maxTemperature'=>22.1,
             'minTemperature'=>13.1,
             'humidity'=>45.5,
             'maxHumidity'=>55.5,
             'minHumidity'=>39.5,
             'noise'=>38.2,
             'maxNoise'=>45.8,
             'minNoise'=>35.1,
             'pressure'=>1013.2,
             'maxPressure'=>1013.8,
             'minPressure'=>1013.1,
             'rainfall'=>0,
             'maxRainfall'=>0,
             'minRainfall'=>0,
             'windSpeed'=>2,
             'windDirection'=>90,
             'dateTime'=>$datetime,
             'dustFlag'=>'N',
             'noiseFlag'=>'N',
             'humiFlag'=>'N'
        );
    $result =  $client->__soapCall('pushRealTimeData',[array('vendorCode'=> "SH021081",'emsDataList' => [$emsDataList])]);
    $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
    echo "pushRealTimeData result :".$strout.PHP_EOL.PHP_EOL;

    $result =  $client->__soapCall('pushHourlyData',[array('vendorCode'=> "SH021081",'emsHourlyDataList' => [$emsDataList])]);
    $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
    echo "pushHourlyData result :".$strout.PHP_EOL.PHP_EOL;


    //9、获取所有区县信息（新增）
  //public List<EmsDistrict> pullDistrict(String vendorCode, String parentDistrict)
//  $para = array('vendorCode' => $vendorCode);
//  $result =  $client->__soapCall('pullRegion', [$para]);
//  var_dump($result);



  //10、获取工程类型信息（新增）
  //public List<EmsPrjType> pullProjectType(String vendorCode)
//  $vendorCode = 'SH021081';
//  $result =  $client->__soapCall('pullProjectType', [['vendorCode' => $vendorCode]]);
//  var_dump($result);

  //print_r($client->__getFunctions());//列出当前SOAP所有的方法，参数和数据类型，也可以说是获得web service的接口
  //print_r($client->__getTypes());//列出每个web serice接口对应的结构体
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>