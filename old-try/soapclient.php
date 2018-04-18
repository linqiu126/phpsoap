<?php

$client = new SoapClient("http://112.64.17.60:9080/services/pushResource?wsdl");
try{

  //1、厂家信息注册
//  $name = "上海申环信息科技有限公司";
//  var_dump($name);
//  $result =  $client->__soapCall('registerVendor', [
//      ['vendorName' => $name]
//  ]);

//  $para = array('vendorName' => $name);
//  $result =  $client->__soapCall('registerVendor', [$para]);
//  $vendorCode = $result->vendorCode;
//  echo $vendorCode."\n";

  //2、上传工程信息
  $xmlTpl = "<EmsProject>
                    <code><![CDATA[SH]]></code>
                    <name><![CDATA[滴水湖工程]]></name>
                    <district><![CDATA[浦东新区]]></district>
                    <prjType><![CDATA[xx]]></prjType>
                    <prjCategory><![CDATA[xx]]></prjCategory>
                    <prjPeriod><![CDATA[xx]]></prjPeriod>
                    <street><![CDATA[临港街道]]></street>
                    <longitude><![CDATA[121556498]]></longitude>
                    <latitude><![CDATA[31226542]]></latitude>
                    <contractors><![CDATA[申环]]></contractors>
                    <superintendent><![CDATA[老张]]></superintendent>
                    <telephone><![CDATA[13912345678]]></telephone>
                    <address><![CDATA[环湖西二路]]></address>
                    <siteArea><![CDATA[10000]]></siteArea>
                    <buildingArea><![CDATA[5000]]></buildingArea>
                    <startDate><![CDATA[2018-01-01]]></startDate>
                    <endDate><![CDATA[2018-06-06]]></endDate>
                    <stage><![CDATA[30]]></stage>
                    <isCompleted><![CDATA[true]]></isCompleted>
                    <status><![CDATA[false]]></status></EmsProject>";


//  $para = array('vendorCode'=>"SH021081",'emsProjectList' => $xmlTpl);
//  $result =  $client->__soapCall('pushProjects', [$para]);


  //4、上传设备信息
  $xmlTpl = "<EmsDevice>
                    <code><![CDATA[]]></code>
                    <name><![CDATA[扬尘监控设备]]></name>
                    <ipAddr><![CDATA[127.0.0.1]]></ipAddr>
                    <macAddr><![CDATA[AAAAAAAA]]></macAddr>
                    <port><![CDATA[9510]]></port>
                    <version><![CDATA[3.1]]></version>
                    <projectCode><![CDATA[xx]]></projectCode>
                    <longitude><![CDATA[121556498]]></longitude>
                    <latitude><![CDATA[31226542]]></latitude>
                    <startDate><![CDATA[2018-01-01]]></startDate>
                    <endDate><![CDATA[2018-06-06]]></endDate>
                    <installDate><![CDATA[2018-06-06]]></installDate>
                    <onlineStatus><![CDATA[在线]]></onlineStatus>
                    <videoUrl><![CDATA[http://]]></videoUrl>
                 </EmsDevice>";

  $xmlTpl = array('code'=>"", 'name'=>"扬尘监控设备",'ipAddr'=>"127.0.0.1",'macAddr'=>"AAAAAAAA",'port'=>"9510",'version'=>"",'projectCode'=>"",'longitude'=>"",'latitude'=>"",'startDate'=>"",'endDate'=>"",'installDate'=>"",'onlineStatus'=>"",'videoUrl'=>"");

  $para = array('vendorCode'=>"SH021081",'emsDeviceList' => $xmlTpl);
  $result =  $client->__soapCall('pushProjects', [$para]);

  var_dump($result);
  //print "The result is: $result";
}catch(SoapFault $e){
  print "Sorry an error was caught executing your request: {$e->getMessage()}";
}
?>