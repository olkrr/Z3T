<?php include 'templates/header.html.php'; ?>



<h1>Lista Klientów</h1>

<td></td>
<table>
   
       <thead>
      <tr>
        <td><a>ID Klienta</a></td>
        <td>Imie</td>
        <td>Nazwisko</td>
        <td>Nazwa Firmy</td>
        <td>Telefon</td>
        <td>Email</td>
        <td>Nip</td>
      
        <td></td>
       <!-- <td></td-->
       <td></td>
    </tr>
	</thead>
	<tbody>
    
    <?php $klienci = $this->get('klienci');
    if(isset($klienci)) {
        foreach($klienci as $klient) { ?>
        
        <tr>
                    <td><?= $klient['IDKlient'];?></td>
                    <td><?= $klient['Imie'];?></td>
                    <td><?= $klient['Nazwisko'];?></td>
                    <td><?= $klient['NazwaFirmy'];?></td>
                    <td><?= $klient['Telefon'];?></td>
                    <td><?= $klient['Email'];?></td>
                    <td><?= $klient['Nip'];?></td>
            
<td><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Klient&amp;action=editform&amp;id=<?= $klient['IDKlient']; ?>">edytuj</a></td>
            
 <td><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Klient&amp;action=delete&amp;id=<?= $klient['IDKlient']; ?>">usuń</a></td>
<!--<td><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&amp;action=getOne&amp;id=<?= $klient['IDKlient'];?>">Wyświetl Naprawy</a></td>-->
<td><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&amp;action=addform&amp;id=<?= $klient['IDKlient'];?>">Dodaj Naprawę</a></td>
                </tr>
    <?php }}
	else echo "BRAK Klientów";	
	?>
	</tbody>
</table>
<strong><?= $this->get('error')?></strong>
<strong><?= $this->get('message')?></strong>
<br/><br/>
<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Klient&amp;action=addform">Dodaj Klienta</a>
<?php include 'templates/footer.html.php'; ?>
