<?php include 'templates/header.html.php'; ?>
<h1>Lista Osprzętów</h1>


<table>
   
       <thead>
      <tr>
        <td><a>ID</a></td>
        <td>Osprzętu</td>
        
    </tr>
	</thead>
	<tbody>
<ul>
    <?php $osprzety = $this->get('osprzety');
    if(isset($osprzety)) {
        foreach($osprzety as $osprzet) { ?>
	<tr>
   <td><?= $osprzet['NrOsprzet'];?></td>
                    <td><?= $osprzet['NazOsprzet'];?></td>
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
<a>Wersje Osprzętów należy dodać w interfejsie phpmyadmin. NIE USUWAĆ ISTNIEJĄCYCH WPISÓW</a>
<?php include 'templates/footer.html.php'; ?>

