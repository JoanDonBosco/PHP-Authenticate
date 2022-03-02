<?php
// Importem el fitxer database.php i en conseqüencia les seves variables
require "database.php";
// A partir de la URL amb el metode GET recollim el valor pasat amb la variable $id
$id = $_GET["id"];
// Primer de tot fem una QUERY a la base de dades per comprobar si exixteix algun contatcte amb la id pasada
$statement = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
// I executem la QUERY abre
$statement->execute([":id" => $id]);
// A partir de la QUERY feta anteriorment si el resultat de columnes es 0 no esxisteix retornem un 404
if ($statement->rowCount() == 0) {
  http_response_code(404);
  echo ("HTTP 404 NOT FOUND");
  return;
}
// En el cas que si existeix el contacte preparem la QUERY i la executarem 
 $conn->prepare("DELETE FROM contacts WHERE id = :id")->execute([":id", $id]);
// Redirigim l'usuari a index.php
header("Location: index.php");
?>