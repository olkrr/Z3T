{extends file="Strona.html.php"}
{block name=title}Logowanie{/block}
{block name=tresc}
<div class="container">
<div class="page-header">
  <h1>Zaloguj się do systemu</h1>
</div>
<form id="logform" action="http://{$smarty.server.HTTP_HOST}{$subdir}access/login" method="post">
  <div class="form-group">
    <label for="name">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
  </div>
  <div class="form-group">
    <label for="name">Hasło</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
  </div>   
  <div class="alert alert-danger collapse" role="alert"></div>  
  {if isset($message)}
  <div class="alert alert-success" role="alert">{$message}</div>
  {/if}      
  {if isset($error)}
  <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}       
  <button type="submit" class="btn btn-default">Zaloguj</button>  
</form>
</div>
{/block}