<?php
include_once 'app/models/tool.model.php';
include_once 'app/models/rubro.model.php';
include_once 'app/views/tool.view.php';

class ToolController {

    private $model;
    private $model1;
    private $view;

    function __construct() {
        $this->model = new ToolModel();
        $this->model1 = new RubroModel();
        $this->view = new ToolsView();
    }q

    /**
     * Muestra la lista de herramientas
     */
    function showTools() {
        // obtiene las herramientas del modelo
        $tools = $this->model->getAll();
        // actualizo la vista
        $this->view->showTools($tools);
        //var_dump($tools);
        //die;
    }
    function showToolsconRubros() {
        // obtiene las herramientas del modelo
        $tools = $this->model->getAllconRubros();
        // actualizo la vista
        $this->view->showToolsconRubros($tools);

     
    }

     /**
     * muestra la lista de rubros
     */
    function showRubros() {
        // obtiene los rubros del modelo
        $rubros = $this->model1->getAll();
        // actualizo la vista
        $this->view->showRubros($rubros);
        //var_dump($rubros);
        //die;
    }

    function showToolsFiltro($id) {
        // obtiene las herramientas del modelo
        $tools = $this->model->getAllconFiltro($id);
        // actualizo la vista
        $this->view->showToolsconRubros($tools);
        //var_dump($tools);
        //die;
    }
 
 

    /**
     * Inserta una herramienta en la base
     */
    function addTool() {
        $descripcion = $_POST['descripcion'];
        $notas = $_POST['notas'];
        $rubro = $_POST['rubro'];
        $modelo = $_POST['modelo'];

        // verifico campos obligatorios
        if (empty($descripcion) || empty($rubro)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la herramienta en la DB
        $id = $this->model->insert($rubro,$descripcion,$modelo,$notas);

        // redirigimos al listado
        header("Location: " . BASE_URL); 
    }

    /**
     * Inserta un rubro en la base de rubros
     */

    function addRubro() {
        $desc_rubro = $_POST['desc_rubro'];
         // verifico campos obligatorios
        if (empty($desc_rubro)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto el rubro en la DB
        $id = $this->model->insert_rubro($desc_rubro);

        // redirigimos al listado
        header("Location: " . BASE_URL); 
    }

    /**
     * Elimina la herramienta del sistema
     */
    function deleteTool($id) {
        $this->model->remove($id);
        header("Location: " . BASE_URL); 
    }

/*     function finalizeTask() {
        echo "TODO: FINALIZAR LA TAREA";
    }
 */
}