<?php include 'templates/header.html.php'; ?>

<h1>Lista Napraw</h1>
<table>
   <thead>
      <tr>
		<td><a>ID</a></td>
        <td><a>Klient</a></td>
        <td><a>Producent</a></td>
        <td><a>Model Myjki</a></td>
        <td><a>Typ Myjki</a></td>
        <td><a>Osprzęt</a></td>
        <td><a>Wycena?</a></td>
        <td><a>Data Dostarczenia</a></td>
        <td><a>Data Odbioru</a></td>
        <td><a>Należność</a></td>
        <td><a>Opis</a></td>
        <td><a>Status</a></td>
        <td></td>
        <td></td>
    </tr>
</thead>
<tbody>

<?php $naprawy = $this->get('naprawy');

if(isset($naprawy)){
  $model = $this->getModel('Klient');
  $klienci = $model->getAllForSelect();
  $model = $this->getModel('TypMyjki');
  $typymyjki = $model->getAllForSelect();
  $model = $this->getModel('Osprzet');
  $osprzety = $model->getAllForSelect();
  $model = $this->getModel('Status');
  $statusy = $model->getAllForSelect();
  $model = $this->getModel('Producent');
  $producenci = $model->getAllForSelect();
  
foreach($naprawy as $naprawa) {?>
<tr>
<td><?= $naprawa['IDNaprawa'];?></td>
<td><?= $klienci[$naprawa['IDKlient']];?></td>
<td><?= $producenci[$naprawa['IDProducent']];?></td>
<td><?= $naprawa['NazMyjki'];?></td>
<td><?= $typymyjki[$naprawa['TypMyjki']];?></td>
<td><?= $osprzety[$naprawa['NrOsprzet']];?></td>
<td><?= $naprawa['Wycena'];?></td>
<td><?= $naprawa['DataDost'];?></td>
<td><?= $naprawa['DataOdbi'];?></td>
<td><?= $naprawa['KwotaNap'];?></td>
<td><?= $naprawa['OpisNapr'];?></td>
<td><?= $statusy[$naprawa['IDStatus']];?></td>



    <td><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&amp;action=editform&amp;id=<?= $naprawa['IDNaprawa']; ?>">edytuj</a></td>
<td><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&amp;action=delete&amp;id=<?= $naprawa['IDNaprawa']; ?>">usuń</a></td>
                </tr>
    <?php }
    
    
    }
	//else echo "BRAK";	
	?>

</table>

<strong><?= $this->get('error')?></strong>
<strong><?= $this->get('message')?></strong>
<br/><br/>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&amp;action=addform&amp;id=<?= $naprawa['IDKlient']; ?>">Dodaj Naprawę</a>

<?php include 'templates/footer.html.php'; ?>

