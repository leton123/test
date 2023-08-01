<?php
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/asset/conf.xml")) {
    header("Location: /asset/install.php");
    echo $str;
}

class Conf
{
    static $xmls;
    function __construct()
    {
        self::$xmls = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/asset/conf.xml');
    }
    function GetConf($item)
    {
        return self::$xmls->$item;
    }
    function ChangeConf($item, $str)
    {
        self::$xmls->$item = $str;
        self::$xmls->asXML($_SERVER['DOCUMENT_ROOT'] . '/asset/conf.xml');
    }
}
$conf = new Conf();
