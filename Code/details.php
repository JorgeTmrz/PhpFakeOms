<?php
include("db.php");
    // Evaluating request
    if(isset($_GET["id"])) {
        // getting person id
        $id = $_GET["id"];
        $query = "SELECT * FROM personas WHERE id = $id";
        $result = mysqli_query($conn,$query);
        // getting all the information from patient
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
        }
    }
?>

<?php include("includes/header.php")?>
<div class="container p-4">
        <div class= "row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <h3><?php echo($row["Nombre"]." ".$row["apellido"]); ?></h3>
                <img src="<?php echo ($row["Foto_grande"]); ?>" alt="" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Telefono: <?php echo($row["Telefono"]); ?></li>
                    <li class="list-group-item">Correo: <?php echo($row["correo"]); ?></li>
                    <li class="list-group-item">Direccion: <?php echo($row["direccion"]); ?></li>
                    <li class="list-group-item">Genero: <?php echo($row["Genero"]); ?></li>
                    <li class="list-group-item">Nacionalidad: <?php echo($row["Nacionalidad"]); ?></li>
                </ul>
                </div>
            </div>
            <div class="col-md-8">
            <h4>Ubicacion en el mapa</h4>
            <iframe class="embed-responsive" width="200" height="500" src="https://www.openstreetmap.org/export/embed.html?bbox=-78.59619140625001%2C16.36230951024085%2C-66.33544921875001%2C22.978623970384913&amp;layer=mapnik&amp;marker=<?php echo($row["latitud"]) ?>%2C<?php echo($row["longitud"]) ?>" style="border: 1px solid black"></iframe>
                
                <a href="index.php" class="btn btn-secondary m-4 float-right"> <- Volver Atras</a>
            </div>
        </div>
</div>


<?php include("includes/footer.php")?>
