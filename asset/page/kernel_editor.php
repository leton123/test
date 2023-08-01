<?php
include $_SERVER['DOCUMENT_ROOT']."/asset/page/function.php";
if($_POST['tips'] == 1){
    $conf->ChangeConf("tips",0);
    echo 0;
}