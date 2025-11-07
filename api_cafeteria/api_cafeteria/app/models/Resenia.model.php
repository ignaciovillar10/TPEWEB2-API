<?php
require_once 'app/config/config.php';
class Resenia {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM resenia');
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function get($id) {
        $stmt = $this->db->prepare('SELECT * FROM resenia WHERE id_resenia = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($id_producto, $comentario, $puntuacion) {
        $stmt = $this->db->prepare('INSERT INTO resenia (id_producto, comentario, puntuacion) VALUES (?, ?,?)');
        return $stmt->execute([$id_producto, $comentario, $puntuacion]);
    }
    public function update($id, $id_producto, $comentario, $puntuacion) {
        $stmt = $this->db->prepare('UPDATE resenia SET comentario = ?, puntuacion = ?, id_producto = ? WHERE id_resenia = ?');
        return $stmt->execute([ $comentario, $puntuacion, $id_producto, $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM resenia WHERE id_resenia = ?');
        return $stmt->execute([$id]);
    }
}
