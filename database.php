<?php 
// Parametres connexió base de dades
    // IP on es troba MySQL
    $HOST="Public IP";
    // La base de dades en la que volem treballar en aquest cas
    $DATABASE="contacts_app";
    // Usuari que tinguem al MySQL per authrnyicarnos
    $USER="user";
    // Contrasenya del Usuari MySQL
    $PASS="password";
    // Port per on es fara la connexió a la base de dades per Defecte MySQL utilitza 3306 pero en el cas que segui un altre el canviem
    $PORT="10012";
    // String o cadena per dur a terme la connexió a la base de dades en el cas que no utilitzem el port default
    $dsn='mysql:dbname=contacts_app;host=PublicIP;port=10012';

    // Connexió amb port Diferent i utilitzant DSN
    try {
        $conn = new PDO($dsn, $USER, $PASS);
    } catch (PDOException $error) {
        die("PDO Connexió Error: " . $error->getMessage());
    }

    /* Connexió mitjançant les variables amb port per defecte
     try {
        $conn = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USER, $PASS);
    } catch (PDOException $error) {
        die("PDO Connexió Error: " . $error->getMessage());
    }
    */
?>
