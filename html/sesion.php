<?php
    require('../db_config.php');

    function hash_password($password) {

        $options = array('cost' => 12);
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);
        return $password_hashed;
    }


    if(isset($_POST['btnregistrar'])){
        $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $apellido = filter_var($_POST["apellido"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password =filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $password_hashed = hash_password($password);

        $sql_statement = "INSERT INTO USUARIOS(nombre, apellido, email, password, suscripcion_activa) VALUES('$nombre', '$apellido', '$email', '$password_hashed', false);";
        if($result = pg_query($dbconn, $sql_statement)){
            echo "<script> alert('Usuario registrado: $nombre');window.location='login.html'</script>";  
        }else {
            echo "<script> alert('Error: Problemas con los datos o el correo ya se encuentra en uso');window.location='signup.html'</script>";
        }
        
    }


    if(isset($_POST['btnlogin'])){

        $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password =filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        $query= "SELECT * FROM ARTISTAS WHERE email = '$email'"; 
        $query2= "SELECT * FROM USUARIOS WHERE email = '$email'"; 

        $consulta = pg_query($dbconn, $query);
        $consulta2 = pg_query($dbconn, $query2);

        $cantidad = pg_num_rows($consulta);
        $cantidad2 = pg_num_rows($consulta2);

        $array = pg_fetch_array($consulta);
        $array2 = pg_fetch_array($consulta2);


        if(($cantidad > 0) && (password_verify($password, $array['password']))){
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["nombre"] = $array['nombre'];
            $_SESSION["nombre_artistico"] = $array['nombre_artistico'];
            $_SESSION["apellido"] = $array['apellido'];
            $_SESSION["verificado"] = $array['verificado'];
            header('location:inicio_artista.html');
        }else if ( ($cantidad2 > 0 ) && (password_verify($password, $array2['password']))) {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["suscripcion_activa"] = $array2['suscripcion_activa'];
            $_SESSION["nombre"] = $array2['nombre'];
            $_SESSION["apellido"] = $array2['apellido'];
            header('location:inicio_usuario.html');
        }else{
            echo "<script>alert('Error: El usuario o la contraseña son incorrectos.');window.location='login.html'</script>";
        }

    }
    
?>