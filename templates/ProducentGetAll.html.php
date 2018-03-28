<?php include 'templates/header.html.php'; ?>
<h1>Lista Producentów</h1>


<table>
   
       <thead>
      <tr>
        <td><a>ID</a></td>
        <td>Producent</td>
        
    </tr>
	</thead>
	<tbody>
<ul>
    <?php $producenci = $this->get('producenci');
    if(isset($producenci)) {
        foreach($producenci as $producent) { ?>
	<tr>
   <td><?= $producent['IDProducent'];?></td>
                    <td><?= $producent['NazProducent'];?></td>
                </tr>
    <?php }}
	//else echo "BRAK";	
	?>
	</tbody>
</ul>
</table>
<strong><?= $this->get('error')?></strong>
<strong><?= $this->get('message')?></strong>
<br/><br/>
<a>Dodatkowych należy dodać w interfejsie phpmyadmin. NIE USUWAĆ ISTNIEJĄCYCH WPISÓW</a>
<?php include 'templates/footer.html.php'; ?>

