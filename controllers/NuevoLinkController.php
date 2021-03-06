<?php

namespace controllers;

require_once("../models/LinksModel.php");

use models\LinksModel as LinksModel;

class NuevoLinkController{
    public $nombre;
    public $url;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->url = $_POST['url'];
    }

    public function crear()
    {
        session_start();
        if ($this->nombre == "" || $this->url == ""){
            $_SESSION['error'] = "Completa los campos";
            header("Location: ../views/nuevo_link.php");
            return;
        }
        $model = new LinksModel();
        $user = $_SESSION['usuario'];
        $data = ['nombre'=>$this->nombre, 'link'=>$this->url, "email"=> $user['email']];
        $count = $model->insertarLink($data);
        if($count == 1){
            $_SESSION['respuesta'] = "Link creado con éxito";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../views/nuevo_link.php");
    }
}

$obj = new NuevoLinkController();
$obj->crear();