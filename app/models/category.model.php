<?php

class RubroModel {

    private $db;

    function __construct() {
         // 1. Abro la conexión
        $this->db = $this->connect();
    }

    /**
     * Abre conexión a la base de datos;
     */
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_maqagricolas;charset=utf8', 'root', '');
        return $db;
    }

    /**
     * Devuelve todas las herramientas de la base de datos.
     */
    function getAll() {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM rubro');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $rubros = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de herramientas
    //    var_dump($rubros);
     //   die;
        return $rubros;
    }

    /**
     * Inserta la herramienta en la base de datos
     */
    function insert_rubro($descripcion) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO rubro (descripcion) VALUES (?)');
        $query->execute([$descripcion]);
        var_dump($query);
    
        // 3. Obtengo y devuelo el ID de la herramienta nueva
        return $this->db->lastInsertId();
        die;
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM rubro WHERE id = ?');
        $query->execute([$id]);
  }
}