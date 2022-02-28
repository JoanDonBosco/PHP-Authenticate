<?php 
// Array amb Info
$contact = ["Joan", "Jorge", "Jaume"];
// Iterem el array amb les variables que tingui
foreach ($contact as $con) {
    // PHP_EOL es un salt de linea tal \n i les pintem per pantalla
    print("<div>$con</div>" . PHP_EOL);
}
?>

<?php 
// Foreach amb un filtro utilitzant un if
foreach ($contact as $con) { ?>
    <?php if ($con !="Jorge") {?>
        <div><?= $con ?></div>
    <?php } ?>
<?php } ?>