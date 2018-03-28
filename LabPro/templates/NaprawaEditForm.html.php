{extends file="Main.html.php"}
{block name=title}Edycja{/block}
{block name=body}
<h1>Edytuj Naprawę</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Naprawa/update" method="post">
    ID Naprawy<input type="text" readonly name="IDNaprawa"  value="{$IDNaprawa}"> 
	</br>                                                          
	ID Klienta: <input type="text" name="IDKlient" readonly value="{$IDKlient}"/><br />
	

     Producent:
	{html_options name=Producent options=$producenci selected=$IDProducent}<br />
    
	
Model: <input type="text" name="NazMyjki" value="{$NazMyjki}"/><br />

  TypMyjki:
	{html_options name=TypMyjki options=$typymyjki selected=$IDTypMyjki}<br />
   
     Osprzet:
	{html_options name=NrOsprzet options=$osprzety selected=$NrOsprzet}<br />
   
	
	Wycena: <input type="text" name="Wycena" value="{$Wycena}"/><br />
	  Przyjęto: <input type="date" name="DataDost" required="required"  value="{$DataDost}"  placeholder="RRRR-MM-DD"  /><br />
	  Odebrano: <input type="date" name="DataOdbi" value="{$DataOdbi}"  placeholder="RRRR-MM-DD"    /><br />
	  Cena: <input type="text" name="KwotaNap" value="{$KwotaNap}" /><br />
	
  Status:
	{html_options name=IDStatus options=$statusy selected=$IDStatus}<br />
   

	Opis: <textarea name="OpisNapr" rows="5" cols="30"> {$OpisNapr} </textarea><br />
    <input type="submit" value="Aktualizuj" />
	</form>
	
{if isset($error)}
<strong>{$error}</strong>
{/if}

{/block}
