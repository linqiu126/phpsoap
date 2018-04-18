<?php
    $parameter=array(
        'uri'=>'http://112.64.17.60:9080/',
        'location'=>'http://112.64.17.60:9080/services/pushResource'
        );
    try{
        $soapClient = new SoapClient(null,$parameter);
        $name = '上海申环信息科技有限公司';
        $result = $soapClient->registerVendor($name);
        var_dump($result);

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>

   