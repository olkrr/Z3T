<?php include 'templates/header.html.php'; ?>

<h1>Edytuj dane Klienta</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>index.php?controller=Klient&amp;action=update&amp;id=<?php echo $this->get('IDKlient') ?>" method="post">
    <input type="hidden" name="IDKlient"  value="<?php echo $this->get('IDKlient') ?>"> 
    Imie: <input type="text" name="Imie" value="<?php echo $this->get('Imie') ?>"/><br />
    Nazwisko: <input type="text" name="Nazwisko" value="<?php echo $this->get('Nazwisko') ?>"/><br />
    Nazwa Firmy : <input type="text" name="NazwaFirmy" value="<?php echo $this->get('NazwaFirmy') ?>"/><br />
    Telefon : <input type="text" name="Telefon" value="<?php echo $this->get('Telefon') ?>"/><br />
    E-mail : <input type="text" name="Email" value="<?php echo $this->get('Email') ?>"/><br />
    Nip : <input type="text" name="Nip" value="<?php echo $this->get('Nip') ?>"/><br />
    <input type="submit" value="Aktualizuj" />
</form>

<?php include 'templates/footer.html.php'; ?>