<!DOCTYPE html>
<html>
    <head>
        <title>Przykład wykorzystania wzorca MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
	<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Klient&action=getAll">Klient</a>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&action=getAll">Naprawa</a>
<br><br/>
<a>(</a>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Osprzet&action=getAll">Osprzet</a> 
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Producent&action=getAll">Producent</a>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Status&action=getAll">"Status</a 
<a>) Opcje Tylko do wglądu</a>
<br><br/>

