{extends file="Main.html.php"}
{block name=title}Klient{/block}
{block name=body}

<div class="container">
	<div class="page-header">
		<h1>Dodaj klienta</h1>
	</div>
	<div class="row">
		<div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
			<form id="KlientForm" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/add" method="post">
				<div class="form-group">
					<label for="imie">Imie</label>
					<input type="text" class="form-control" id="Imie" name="Imie" placeholder="Wprowadź imię">
				</div>
				<div class="form-group">
					<label for="nazwisko">Nazwisko</label>
					<input type="text" class="form-control" id="Nazwisko" name="Nazwisko" placeholder="Wprowadź nazwisko">
				</div>
				<div class="form-group">
					<label for="nazwaFirmy">Firma</label>
					<input type="text" class="form-control" id="NazwaFirmy" name="NazwaFirmy" placeholder="Wprowadź nazwę firmy">
				</div>
				<div class="form-group">
					<label for="telefon">Telefon</label>
					<input type="text" class="form-control" id="Telefon" name="Telefon" placeholder="Wprowadź telefon">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="Email" name="Email" placeholder="Wprowadź email">
				</div>
				<div class="form-group">
					<label for="Nip">Nip</label>
					<input type="text" class="form-control" id="Nip" name="Nip" placeholder="Wprowadź Nip">
				</div>		  
				<div class="alert alert-danger collapse" role="alert"></div>
				<button type="submit" class="btn btn-default">Dodaj</button>  
			</form>
		</div>
	</div>
</div>
{/block}