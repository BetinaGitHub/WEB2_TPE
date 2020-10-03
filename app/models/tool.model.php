<?php

class ToolModel {

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
        $query = $this->db->prepare('SELECT * FROM maquinaria');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $tools = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de herramientas

        return $tools;
    }
    
    /**
     * Devuelve todas las herramientas de la base de datos.
     */
    function getAllconRubros() {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT rubro.descripcion as descrubro, maquinaria.id, maquinaria.descripcion, maquinaria.modelo, maquinaria.notas FROM maquinaria join rubro on maquinaria.idrubro = rubro.id');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $tools = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de herramientas

        return $tools;
    }

    function getAllconFiltro($id) {
     //   var_dump($id);
    //    die;
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare("SELECT id, idrubro, descripcion, modelo, notas FROM maquinaria where idRubro = $id");
        $query->execute();
        
        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)

        $tools = $query->fetchAll(PDO::FETCH_OBJ); 
        var_dump($tools);
        die;
        return $tools;
    }
    


    /**
     * Inserta la herramienta en la base de datos
     */
    function insert($rubro,$descripcion,$modelo,$notas) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO maquinaria (idRubro,descripcion,modelo,notas) VALUES (?,?,?,?)');
        $query->execute([$rubro,$descripcion,$modelo,$notas]);
        var_dump($query);
    
        // 3. Obtengo y devuelo el ID de la herramienta nueva
        return $this->db->lastInsertId();
        die;
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM maquinaria WHERE id = ?');
        $query->execute([$id]);
  }
}