<?php

require_once 'app/models/Resenia.model.php';

class ReseniaControllerApi{


    private $model;


    public function __construct(){
         $this->model = new Resenia();
    }



    public function getResenias($req, $res) {
        $resenias = $this->model->getAll();
        // respondo tareas con 200 OK
        return $res->json($resenias);
    }


    public function insertResenia($req, $res) {

        if (empty($req->body->comentario) || empty($req->body->puntuacion) || empty($req->body->id_producto)) {
            return $res->json('Faltan datos', 400);
        }


        $comentario = $req->body->comentario;
        $puntuacion = $req->body->puntuacion;
        $id_producto = $req->body->id_producto;


        $this->model->create($id_producto, $comentario, $puntuacion);

        return $res->json("Se agrego la reseña", 200); 
    }

}

?>