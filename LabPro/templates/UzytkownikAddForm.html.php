{extends file="Main.html.php"}
{block name=title}Klient{/block}
{block name=body}

<div class="container">
	<div class="page-header">
		<h1>Dodaj użytkownika</h1>
	</div>
	<div class="row">
		<div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
			<form id="uzytkownikForm" action="http://{$smarty.server.HTTP_HOST}{$subdir}Uzytkownik/add" method="post">
				<div class="form-group">
					<label for="login">Login</label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
				</div>
				<div class="form-group">
					<label for="haslo">Hasło</label>
					<input type="password" class="form-control" id="haslo" name="haslo" placeholder="Wprowadź hasło">
				</div>
				<div class="form-group">
					<label for="IDKlient">IDKlienta</label>
					<input type="text" class="form-control" id="IDKlient" name="IDKlient" placeholder="Wprowadź hasło">
				</div>
				<!--div class="form-group">
					<label for="Imie">Imie</label>
					<input type="text" class="form-control" id="Imie" name="Imie" placeholder="Wprowadź imię">
				</div>
				<div class="form-group">
					<label for="Nazwisko">Nazwisko</label>
					<input type="text" class="form-control" id="Nazwisko" name="Nazwisko" placeholder="Wprowadź nazwisko">
				</div>
				<div class="form-group">
					<label for="NazwaFirmy">Firma</label>
					<input type="text" class="form-control" id="NazwaFirmy" name="NazwaFirmy" placeholder="Wprowadź nazwę firmy">
				</div>
				<div class="form-group">
					<label for="Telefon">Telefon</label>
					<input type="text" class="form-control" id="Telefon" name="Telefon" placeholder="Wprowadź telefon">
				</div>
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="text" class="form-control" id="Email" name="Email" placeholder="Wprowadź email">
				</div>
				<div class="form-group">
					<label for="Nip">Nip</label>
					<input type="text" class="form-control" id="Nip" name="Nip" placeholder="Wprowadź Nip"-->
				</div>
				<button type="submit" class="btn btn-default">Dodaj</button>  
			</form>
		</div>
	</div>
</div>
{/block}