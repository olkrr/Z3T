<?php include 'templates/header.html.php'; ?>
<h1>Lista Statusów</h1>


<table>
   
       <thead>
      <tr>
        <td><a>ID</a></td>
        <td>Status</td>
        
    </tr>
	</thead>
	<tbody>
<ul>
    <?php $statusy = $this->get('statusy');
    if(isset($statusy)) {
        foreach($statusy as $status) { ?>
	<tr>
   <td><?= $status['IDStatus'];?></td>
                    <td><?= $status['NazStatus'];?></td>
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
<a>Statusy należy dodać w interfejsie phpmyadmin. NIE USUWAĆ ISTNIEJĄCYCH WPISÓW</a>
<?php include 'templates/footer.html.php'; ?>

