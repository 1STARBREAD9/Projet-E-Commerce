<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de Livraison</title>
	<link rel="stylesheet" type="text/css" href="css/LivraisonCSS.css">
</head>
<body>
	<form>
    <h1> Détail de livraison </h1>
		<div class="row">
			<div class="col-25">
				<label for="nom">Nom :</label>
			</div>
			<div class="col-75">
				<input type="text" id="nom" name="nom" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="prenom">Prénom :</label>
			</div>
			<div class="col-75">
				<input type="text" id="prenom" name="prenom" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="adresse">Adresse :</label>
			</div>
			<div class="col-75">
				<input type="text" id="adresse" name="adresse" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="ville">Ville :</label>
			</div>
			<div class="col-75">
				<input type="text" id="ville" name="ville" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="code-postal">Code Postal :</label>
			</div>
			<div class="col-75">
				<input type="text" id="code-postal" name="code-postal" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="pays">Pays :</label>
			</div>
			<div class="col-75">
				<select id="pays" name="pays">
					<option value="france">France</option>
					<option value="belgique">Belgique</option>
					<option value="suisse">Suisse</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="telephone">Téléphone :</label>
			</div>
			<div class="col-75">
				<input type="tel" id="telephone" name="telephone" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="email">Email :</label>
			</div>
			<div class="col-75">
				<input type="email" id="email" name="email" required>
			</div>
		</div>
		<div class="row">
			<a href="Payement.php"><input type="submit" value="Valider la commande"></a>
		</div>
	</form>
</body>
</html>
