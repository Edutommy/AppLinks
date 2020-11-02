<?php 

namespace controllers;

use models\UsuarioModel as UsuarioMOdel;

require_once("../models/UsuarioModel.php");

class RegistroController{
    public $email;
    public $nombre;
    public $pass;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->nombre = $_POST['nombre'];
        $this->pass = $_POST['pass'];
    }

    public function registrar()
    {
        session_start();
        if($this->email == "" || $this->nombre == "" || $this->pass == ""){
            $_SESSION['error'] = "Complete la información";
            header("Location: ../registro.php");
            return;
        }

        $model = new UsuarioModel();
        $data = ['email'=>$this->email, 'nombre'=>$this->nombre, "pass"=>$this->pass];
        $count = $model->insertarUsuario($data);

        if($count == 1){
            $_SESSION['respuesta'] = "Usuario Creado con Exito!";
        }else{
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../registro.php");
    }

}

$obj = new RegistroController();
$obj->registrar();

?>