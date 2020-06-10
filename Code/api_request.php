<?php

    include("db.php");
    // api URL
    $query_url = "https://randomuser.me/api/?results=1000";
    // making request
    $json_data = file_get_contents($query_url);
    // Decode into an array
    $users_data = json_decode($json_data);

    foreach($users_data-> results as $user){
        // Data that we are going to introduce into our database;
        $nombre = $user -> name -> first;
        $apellido = $user -> name -> last;
        $correo = $user -> email;
        $direccion = $user -> location -> street -> name." ".$user -> location -> street -> number;
        $edad = $user -> dob -> age;
        $fecha_nacimiento = $user -> dob -> date;
        $foto_peq = $user -> picture -> thumbnail;
        $foto_grande = $user -> picture -> large;
        $genero = $user -> gender;
        $nacionalidad = $user -> nat;
        $telefono = $user -> phone;
        $latitude = $user -> location -> coordinates -> latitude;
        $longitude = $user -> location -> coordinates -> longitude;
        // insert
        $query = "INSERT INTO personas(Edad, Nombre, apellido, Telefono, correo, direccion, longitud, latitud, Genero, foto_pequeña, fecha_nacimiento,Foto_grande, Nacionalidad) 
        VALUES ('{$edad}','{$nombre}','{$apellido}','{$telefono}','{$correo}','{$direccion}','{$longitude}','{$latitude}','{$genero}','{$foto_peq}','{$fecha_nacimiento}','{$foto_grande}','{$nacionalidad}')";
        //Executing query
        mysqli_query($conn,$query);

    }
    header("Location: index.php");

?>