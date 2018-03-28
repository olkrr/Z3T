{extends file="Main.html.php"}
{block name=title}Lista Napraw{/block}
{block name=body}
<h1>Lista Napraw</h1>
{if isset($naprawy)}
{if $naprawy|@count === 0}
	<b>Brak Zapisanych Napraw!</b><br/><br/>
{else}

<table class="table">
   <thead>
      <tr>
		<td><a>ID </a></td>
        <td><a>Klient </a></td>
        <td><a>Producent </a></td>
        <td><a>Model Myjki </a></td>
        <td><a>Typ Myjki </a></td>
        <td><a>Osprzęt </a></td>
        <td><a>Wycena? </a></td>
        <td><a>Data Dostarczenia </a></td>
        <td><a>Data Odbioru </a></td>
        <td><a>Należność </a></td>
        <td><a>Opis </a></td>
        <td><a>Status </a></td>
        <td> </td>
        <td> </td>
    </tr>
</thead>
<tbody>



{foreach $naprawy as $id => $naprawa}
<tr>
<td>{$naprawa['IDNaprawa']}</td>
<td>{$naprawa['IDKlient']}</td>
<td>{$naprawa['NazProducent']}</td>
<td>{$naprawa['NazMyjki']}</td>
<td>{$naprawa['TypMyjkiNazwa']}</td>
<td>{$naprawa['NazOsprzet']}</td>
<td>{$naprawa['Wycena']}</td>
<td>{$naprawa['DataDost']}</td>
<td>{$naprawa['DataOdbi']}</td>
<td>{$naprawa['KwotaNap']}</td>
<!--td>{$naprawa['OpisNapr']}</td-->
</div>
	<td><button id="button2" class="btn btn-default" type="submit">Opis</button></td>
	
	
	

<td>{$naprawa['NazStatus']}</td>
<td class="btn-toolbar pull-left table-fit">
<div class="btn-group btn-group-xs">
<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Naprawa/editform/{$naprawa['IDNaprawa']}">edytuj</a>
</div>
<div class="btn-group btn-group-xs">
<a type="button" class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Naprawa/delete/{$naprawa['IDNaprawa']}">usuń</a>
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
{/block}
<script src="./js/custom1.js"></script>