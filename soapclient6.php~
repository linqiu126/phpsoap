<?php
//header("Content-type:text/html;charset=utf-8");


$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{
  $vendorCode = 'SH021081';
  $vendorName = array('vendorName' => "上海申环信息科技有限公司");
  $vendorCodeInput = array('vendorCode' => "SH021081");;


//6、上传实时监测数据


    	$datetime = time();
	//$datetime = (float)$datetime;
	echo "time = ".$datetime.PHP_EOL;

	$date = new DateTime();
	echo $date->format('Y-m-d H:i:00').PHP_EOL;
	//echo $date->format('U');
	$mintime =  strtotime($date->format('Y-m-d H:i:00'));
	$mintime = (float) $mintime;
	echo $mintime.PHP_EOL;

    $datetime = time();
    $emsDataList =
        array(
             'devCode'=>'SHENHUAN_PRJ-SH021081-06',
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
    //$strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
	$strout =json_encode($result);
    echo "pushRealTimeData result :".$strout.PHP_EOL.PHP_EOL;

//    $result =  $client->__soapCall('pushHourlyData',[array('vendorCode'=> "SH021081",'emsHourlyDataList' => [$emsDataList])]);
//    $strout = iconv("utf-8","gbk", json_encode($result, JSON_UNESCAPED_UNICODE));
//    echo "pushHourlyData result :".$strout.PHP_EOL.PHP_EOL;


  //print_r($client->__getFunctions());//列出当前SOAP所有的方法，参数和数据类型，也可以说是获得web service的接口
  //print_r($client->__getTypes());//列出每个web serice接口对应的结构体
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>
