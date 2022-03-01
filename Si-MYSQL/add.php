<?php
  // Importem el fitxer database.php i en conseqüencia les seves variables
  require "database.php";
  // Crem variables de error per gestionar-los
  $error = null;
  // Si rebem un per les capçaleres un metode POST entrara dins del POST
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      // Si el parametres name i num enviats per post estan buits retornem el misstage de error
      if (empty($_POST["name"]) || empty($_POST["num"])) {
        $error = "Sisplau entri un nom i telèfon al contacte!";
      } else if (strlen($_POST["num"]) < 6) {
        $error = "Entra un número més gran o igual que 6!"; 
      }else {
        //Variables que rebem per POST
        $nom = $_POST["name"];
        $num_phone = $_POST["num"];
        // Preparem una syntaxis SQL amb valors incognita per prevenir un SQL Inyection!
        $statement = $conn->prepare("INSERT INTO contacts (name, num_phone) VALUES (:name, :num)");
        // Comprobem que els valors pasats per POST no son un atac a la base de dades i canviem les variables :name i :num per les que ens pasen per el POST el usuari
        $statement->bindParam(":name", $_POST["name"]);
        $statement->bindParam(":num", $_POST["num"]);
        // Executem la syntaxis anteriorment preparada
        $statement->execute();
        // Enviem al index.php
        header("Location: index.php");
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css"
    integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <script
    defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>

  <!-- Static Content -->
  <link rel="stylesheet" href="./static/css/index.css" />

  <title>Contacts App</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">
              <!-- If per mostra els errors en el cas que la variable tinqgui un error assignat -->
              <?php if ($error != null): ?>
                <p class="text-danger"><?= $error ?></p>
              <?php endif ?>
              <form method="POST" action="add.php">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
    
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
    
                  <div class="col-md-6">
                    <input id="phone_number" type="tel" class="form-control" name="num" autocomplete="phone_number" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>