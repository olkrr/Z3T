<?php include 'templates/header.html.php'; ?>

<h1>Dodaj Klienta</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo \Config\Website\Config::$subdir?>?controller=Klient&action=add" method="post">
    Imie: <input type="text" name="Imie" /><br />
    Nazwisko: <input type="text" name="Nazwisko" /><br />
    Nazwa Firmy: <input type="text" name="NazwaFirmy" /><br />
    Telefon: <input type="text" name="Telefon" /><br />
    E-Mail: <input type="text" name="Email" /><br />
    Nip: <input type="text" name="Nip" /><br />
    <input type="submit" value="Dodaj" />
</form>

<?php include 'templates/footer.html.php'; ?>


