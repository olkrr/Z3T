<?php include 'templates/header.html.php'; ?>

<?php
 $klienci = $this->get('Klient');

  $typymyjek = $this->get('TypMyjki');
 
  $osprzety = $this->get('Osprzet');

  $statusy = $this->get('Status');

  $producenci = $this->get('Producent');

?>

<h1>Edycja naprawy </h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Naprawa&amp;action=update&amp;id=<?php echo $this->get('IDNaprawa') ?>" method="post">
    ID Naprawy<input type="text" readonly name="IDNaprawa"  value="<?php echo $this->get('IDNaprawa') ?>"> 
	</br>
	ID Klienta: <input type="text" name="IDKlient" readonly value="<?php echo $this->get('IDKlient') ?>"/><br />
	

    <label> Producent:</label>
    <select name="IDProducent" required="required">
    <?php 
        $model = $this->getModel('Producent');
        $producenci = $model->getAll();
        $producenci = $producenci['producenci'];
        if(isset($producenci)){
            foreach($producenci as $producent){
    ?>
                <option <?php if($producent['IDProducent'] === $this->get('IDProducent')) echo("selected='selected'");?> value="<?php echo $producent['IDProducent'];?>"><?php echo $producent['NazProducent'];?></option>
        
      <?php }} ?>
    </select> <br/>
	
Model: <input type="text" name="NazMyjki" value="<?php echo $this->get('NazMyjki') ?>" /><br />

     <label>Typ Myjki:</label>
    <select name="TypMyjki" required="required">
    <?php 
	
        $model = $this->getModel('TypMyjki');
        $typymyjki = $model->getAll();
        $typymyjki = $typymyjki['typymyjki'];
        if(isset($typymyjki)){
            foreach($typymyjki as $typmyjki){
    ?>
                <option <?php if($typmyjki['IDTypMyjki'] === $this->get('IDTypMyjki')) echo("selected='selected'");?> value="<?php echo $typmyjki['IDTypMyjki'];?>"><?php echo $typmyjki['TypMyjkiNazwa'];?></option>
        
      <?php }} ?>
    </select> <br/>
	 <label>Osprzęt:</label>
    <select name="NrOsprzet" required="required">
    <?php 
        $model = $this->getModel('Osprzet');
        $osprzety = $model->getAll();
        $osprzety = $osprzety['osprzety'];
        if(isset($osprzety)){
            foreach($osprzety as $osprzet){
    ?>
                <option <?php if($osprzet['NrOsprzet'] === $this->get('NrOsprzet')) echo("selected='selected'");?> value="<?php echo $osprzet['NrOsprzet'];?>"><?php echo $osprzet['NazOsprzet'];?></option>
        
      <?php }} ?>
	  
		
    </select> <br/>
	Wycena: <input type="text" name="Wycena" value="<?php echo $this->get('Wycena') ?>" /><br />
	  Przyjęto: <input type="date" name="DataDost" required="required"  value="<?php echo $this->get('DataDost') ?>"  placeholder="RRRR-MM-DD"  /><br />
	  Odebrano: <input type="date" name="DataOdbi" value="<?php echo $this->get('DataOdbi') ?>"  placeholder="RRRR-MM-DD"    /><br />
	  Cena: <input type="text" name="KwotaNap" value="<?php echo $this->get('KwotaNap') ?>"  /><br />
	
 <label>Status:</label>
    <select name="IDStatus" required="required">
    <?php 
	
        $model = $this->getModel('Status');
        $statusy = $model->getAll();
        $statusy = $statusy['statusy'];
        if(isset($statusy)){
            foreach($statusy as $status){
    ?>
                <option <?php if($status['IDStatus'] === $this->get('IDStatus')) echo("selected='selected'");?> value="<?php echo $status['IDStatus'];?>"><?php echo $status['NazStatus'];?></option>
        
      <?php }} ?>
	  
	  
		
    </select> <br/>
	Opis: <input type="textarea" rows="4" cols="50" name="OpisNapr" value="<?php echo $this->get('OpisNapr') ?>" /><br/>
    <input type="submit" value="Aktualizuj" />
	</form>
	
<?php include 'templates/footer.html.php';  ?>
    
    
