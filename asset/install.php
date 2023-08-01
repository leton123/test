<style>
    body {
        font-size: 14px;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .logo {
        padding-top: 2rem;
        height: 40px;
        text-align: center;
        margin: 0 auto;
    }

    .ins-form {
        padding-top: 1rem;
        margin: 0 auto;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-content: center;
        flex-wrap: wrap;
        box-sizing: border-box;
    }

    .ins-input {
        margin: 5px;
        height: 1.8rem;
        padding: .5rem;
        outline-color: #0088ff
    }

    h2 {
        color: gray;
    }

    .submit {
        padding: .5rem;
        background-color: aliceblue;
        border: 1px solid #0088ff;
        color: #0088ff;
    }

    .submit:hover {
        outline-style: solid;
        outline-width: .1rem;
    }
</style>
<img class="logo" src="./pic/logo.png" alt="logo">
<form class="ins-form" action="" method="post">
    <h2>安装程序1.0</h1>
        <input required name="dbhost" class="ins-input" type="text" value="localhost" placeholder="数据库地址"></input>
        <input required name="dbuser" class="ins-input" type="text" placeholder="数据库用户"></input>
        <input name="dbpass" class="ins-input" type="text" placeholder="数据库密码"></input>
        <input required name="dbport" class="ins-input" type="text" value="3306" placeholder="数据库端口"></input>
        <br>
        <input required name="adminname" class="ins-input" type="text" placeholder="管理用户名"></input>
        <input required name="adminpass" class="ins-input" type="text" placeholder="管理员密码"></input>
        <br>
        <textarea cols="30" rows="10" readonly>
欢迎使用 web笔记 程序。
轻量级web程序，用于记录学习笔记，日志等内容。
在学习C#的时候考虑到需要全平台都可以查看的笔记软件。开发这款程序的初衷，为了方便随时随地可以查看自己的学习笔记加强记忆。
不论是手机电脑都可以轻松的记录笔记。


此程序由Leton(https://leton.top)开发制作并上传，如要使用此程序你必须遵守以下几点。

1.禁止一切修改程序及散发互联网的行为。
2.此程序绑定会员ID,只允许一个站点使用，禁止分享给他人源码包。
3.官网下载不含恶意程序。


如果继续，则默认你8接受上述所有内容。否则请关闭此程序，谢谢。
    </textarea>
        <br>
        <span><input required name="readok" type="checkbox" id="readok">我已阅读并接受条款的所有内容.</span>
        <br>
        <input type="submit" class="submit" value="开始安装">
</form>


<?php
@session_start();
function Conf_is_connect()
{
    $GLOBALS['xmls'] = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/asset/conf.xml');
    @$conn = mysqli_connect($GLOBALS['xmls']->dbhost, $GLOBALS['xmls']->dbuser, $GLOBALS['xmls']->dbpass, "", (int) $GLOBALS['xmls']->dbport);
    if ($conn) {
        return true;
    } else {
        return false;
    }
}
function User_is_connect()
{
    @$conn = mysqli_connect(@$_POST["dbhost"], @$_POST["dbuser"], @$_POST["dbpass"], "", @(int) $_POST["dbport"]);
    if ($conn) {
        return true;
    } else {
        return false;
    }
}
function Install_if()
{
    @$dbhost = $_POST["dbhost"];
    @$dbuser = $_POST["dbuser"];
    @$dbpass = $_POST["dbpass"];
    @$dbport = (int) $_POST["dbport"];
    @$adminname = $_POST["adminname"];
    @$adminpass = $_POST["adminpass"];
    if (User_is_connect()) {
        $_xml = <<<xml
            <?xml version="1.0" encoding="utf-8"?>
            <root>
            <dbhost>$dbhost</dbhost>
            <dbuser>$dbuser</dbuser>
            <dbpass>$dbpass</dbpass>
            <dbport>$dbport</dbport>
            <adminname>$adminname</adminname>
            <adminpass>$adminpass</adminpass>
            <tips>1</tips>
            </root>
            xml;
        $GLOBALS['xmls'] = new SimpleXMLElement($_xml);
        $GLOBALS['xmls']->asXML('conf.xml');
        echo "<span style='color: #03A9F4;margin-top: 1rem;font-weight: 600;font-size: 1.01rem;text-align:center;'>安装完成，即将跳转到主页。</span>";
        echo "<script>window.setTimeout('window.location=", '"/"\'', ",1200);</script>";
    } else {
        echo "<span style='color:red;text-align:center;'>连接数据库失败！请检查你的输入</span>";
    }
}

if (file_exists($_SERVER['DOCUMENT_ROOT']."/asset/conf.xml")) {
    if (Conf_is_connect()) {
        header("Location: /");
    } else {
        unlink($_SERVER['DOCUMENT_ROOT']."/asset/conf.xml");
        Install_if();
    }
}
if (@$_POST["dbhost"] != '' && @$_POST["dbuser"] != '' && @$_POST["dbport"] != '' && @$_POST["adminname"] != '' && @$_POST["adminpass"] != '') {
    Install_if();
}
?>