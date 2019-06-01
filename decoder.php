<?php

$f = file_get_contents("load.php");
$a = explode("eval", $f);
ob_start();
eval("?>".$a[0]." print ".$a[1]);
$e = str_replace(["exit", "sleep"], "print", ob_get_clean());
ob_start();
eval($e);
ob_get_clean();
ob_start();
eval("print ".$a[2]);
$e = ob_get_clean();
$e = str_replace("eval", "print", $e);
ob_start();
eval($e);
$e = ob_get_clean();
$e = str_replace("eval", "print", $e);
ob_start();
eval($e);
$e = str_replace("/*\0*/", "", ob_get_clean());
$e = preg_replace("/[^[:print:]\n]+/", "b", $e);
echo "<?php\n".$e;
