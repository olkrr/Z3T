{extends file="Main.html.php"}
{block name=title}Lista Klientów{/block}
{block name=body}
<h1>Lista Klientów</h1>
{if isset($klienci)}
{if $klienci|@count === 0}
	<b>Brak Klientów w Bazie!</b><br/><br/>
{else}

<table class="table">
   
       <thead>
      <tr>
        <td><a>ID Klienta </a></td>
        <td>Imie </td>
        <td>Nazwisko </td>
        <td>Nazwa Firmy </td>
        <td>Telefon </td>
        <td>Email </td>
        <td>Nip </td>
      
        <td> </td>
       <td> </td>
       <td> </td>
    </tr>
	</thead>
	<tbody>
    {foreach $klienci as $id => $klient}
        
        <tr>
                    <td>{$klient['IDKlient']	}</td>
                    <td>{$klient['Imie']		}</td>
                    <td>{$klient['Nazwisko']	}</td>
                    <td>{$klient['NazwaFirmy']	}</td>
                    <td>{$klient['Telefon']		}</td>
                    <td>{$klient['Email']		}</td>
                    <td>{$klient['Nip']			}</td>
            <td class="btn-toolbar pull-left table-fit">
<div class="btn-group btn-group-xs">
<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/editform/{$klient['IDKlient']}">edytuj</a>
</div>
<div class="btn-group btn-group-xs">
<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Naprawa/addform/{$klient['IDKlient']}">nowa naprawa </a>
</div>
<div class="btn-group btn-group-xs">
								<a type="button" class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/delete/{$klient['IDKlient']}">usuń</a>
							</div>
 </tr>
 {/foreach}

	</tbody>
</table>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/addform">Dodaj Klienta</a>
{/block}