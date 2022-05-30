<?php
    require('../db_config.php');

    function hash_password($password) {

        $options = array('cost' => 12);
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);
        return $password_hashed;
    }


    if(isset($_POST['btnregistrar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hashed = hash_password($password);

        $sql_statement = "INSERT INTO USUARIOS(nombre, apellido, email, password, suscripcion_activa) VALUES('$nombre', '$apellido', '$email', '$password_hashed', false);";
        if($result = pg_query($dbconn, $sql_statement)){
            echo "<script> alert('Usuario registrado: $nombre');window.location='login.html'</script>";  
        }else {
            echo "<script> alert('Error: Usuario no registrado')</script>";
        }
        
    }


    if(isset($_POST['btnlogin'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query= "SELECT * FROM ARTISTAS WHERE email = '$email'"; 
        $query2= "SELECT * FROM USUARIOS WHERE email = '$email'"; 

        $consulta = pg_query($dbconn, $query);
        $consulta2 = pg_query($dbconn, $query2);

        $cantidad = pg_num_rows($consulta);
        $cantidad2 = pg_num_rows($consulta2);

        $buscar_pass = pg_fetch_array($consulta);
        $buscar_pass2 = pg_fetch_array($consulta2);


        if(($cantidad > 0) && (password_verify($password, $buscar_pass['password']))){
            session_start();
            $_SESSION["email"] = $email;
            header('location:inicio_artista.html');
        }else if ( ($cantidad2 > 0 ) && (password_verify($password, $buscar_pass2['password']))) {
            session_start();
            $_SESSION["email"] = $email;
            header('location:inicio_usuario.html');
        }else{
            echo "<script>alert('Error: El usuario o la contraseña son incorrectos.');window.location='login.html'</script>";
        }

    }
    
?>