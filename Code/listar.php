<?php
include("db.php");
//first query
$query = "SELECT * FROM personas";
$all_persons = mysqli_query($conn,$query);

//Working with the pagination
$results_per_page = 50;
$number_of_results = mysqli_num_rows($all_persons);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET["page"])){
    $page = 1;
} else {
    $page = $_GET["page"];
}
// Determining SQL Limit start
$this_page_first_result = ($page-1)*$results_per_page;

// Previous and next button
$previous = $page -1;
$next = $page + 1;

// Select from database
$query = "SELECT * FROM personas LIMIT " .$this_page_first_result.",".$results_per_page;
$all_persons = mysqli_query($conn,$query);
include("get_zodiacal_sign.php");

?>
<div class="container">
<table class="table tabble-bordered">
    <thead>
        <tr>
            <th> </th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Signo zodiacal</th>
            <th>Nacionalidad</th>
        </tr>
    </thead>
        <tbody>
            <?php
            // Generating rows
            while($row = mysqli_fetch_array($all_persons)){ 
                // zodiacal sign
                $sign = get_sign_by_id($row["id"]);
                $nationality = $row["Nacionalidad"];
                ?>
                <tr>
                    <td><a href="details.php?id=<?php echo $row['id'] ?>">Mas detalles</a></td>
                    <td><img src="<?php echo($row["foto_pequeña"]);?>" alt=""></td>
                    <td> <?php echo($row["Nombre"]);?></td>
                    <td> <?php echo($row["apellido"]);?></td>
                    <td> <?php echo($row["Edad"]);?></td>
                    <td> <img class='width:10%' src="https://www.horoscope.com/images-US/signs/profile-<?php echo($sign);?>.png"width=10% alt=""></td>
                    <td> <img class='width:10%' src="https://www.countryflags.io/<?php echo($nationality)?>/flat/32.png"alt=""></td>
                </tr>
           <?php }?>
        </tbody>
</table>
    <div class="container justify-content-center">
        <nav aria-label="Page navigation">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo($previous); ?>">Previous</a></li>
            <?php
                for ($page = 1; $page <= $number_of_pages; $page++) { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo($page) ?>"><?php echo($page)?></a></li>
                <?php } ?> 
        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo($next); ?>">Next</a></li>
        </ul>
        </nav>
    </div>
</div>
