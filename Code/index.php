<?php
include("includes/header.php");
?>

<?php
include("db.php");
$query = "SELECT * FROM personas";
$result = mysqli_query($conn, $query);
// if the table of persons is empthy put a button to generate;
if (mysqli_num_rows($result) == 0) {
?>
    <div class="container">
        <div class="crad card-body">
            <form class="form form-control" action="api_request.php" method="GET">
                <button class="btn btn-block btn-primary" value="generar">
                    LISTADO DE PERSONAS AFECTADAS
                </button>
            </form>
        </div>
    </div>
<?php } 
else {
    $listar = include('listar.php');
    echo "<div class 'container'>$listar</div>";
}
?>


<?php
include("includes/footer.php");
?>