{extends file="Main.html.php"}
{block name=title}Edycja{/block}
{block name=body}
<h1>Edytuj Klienta</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/update" method="post">
    <input type="hidden" name="IDKlient"  				value="{$IDKlient}"> 
    Imie: <input type="text" name="Imie" 				value="{$Imie}"/><br />
    Nazwisko: <input type="text" name="Nazwisko" 		value="{$Nazwisko}"/><br />
    Nazwa Firmy : <input type="text" name="NazwaFirmy" 	value="{$NazwaFirmy}"/><br />
    Telefon : <input type="text" name="Telefon" 		value="{$Telefon}"/><br />
    E-mail : <input type="text" name="Email" 			value="{$Email}"/><br />
    Nip : <input type="text" name="Nip" 				value="{$Nip}"/><br />
    <input type="submit" value="Aktualizuj" />
</form>

{if isset($error)}
<strong>{$error}</strong>
{/if}
<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Klienci/">Powrót</a>
{/block}