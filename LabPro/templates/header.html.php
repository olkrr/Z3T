<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Serwis Myjek</title>

    <!-- Bootstrap -->
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/bootstrap.min.css" rel="stylesheet">
    
	
	<link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/datatables.min.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/starter-template.css" rel="stylesheet">
	<link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/jquery-ui.css" rel="stylesheet">
	<link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/custom.css" rel="stylesheet">

 </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Serwis Myjek</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient">Klienci</a></li>
			<li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/addform">Dodaj Klienta</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Naprawa">Naprawy</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
			  {if !isset($login)}
				<li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}access/logform">Zaloguj</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Uzytkownik/addform">Rejestracja</a></li>
			  {else}
				<li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}access/logout">Wyloguj</a></li>
			  {/if}
			  </ul>	
        </div><!--/.nav-collapse -->
      </div>
    </nav>


 