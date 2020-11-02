<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class LoginController
{
    public $email;
    public $pass;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->pass = $_POST['pass'];
    }

    public function iniciarSesion()
    {
        session_start();
        if ($this->email == "" || $this->pass == "") {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../index.php");
            return;
        }

        $model = new UsuarioModel;
        $array = $model->buscarUsuarioLogin($this->email, $this->pass);

        if(count($array) == 0){
            $_SESSION['error'] = "Email o clave incorrectos";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../views/nuevo_link.php");
    }
}

$obj = new LoginController();
$obj->iniciarSesion();
