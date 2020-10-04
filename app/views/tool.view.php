<?php

class ToolView {

    function showTools($tools) {
        include 'templates/header.php';
        include 'templates/form_alta.php';

        echo "<ul class='list-group'>";
     //   mt-5 
        
        foreach($tools as $tool) {
            echo "<li class='list-group-item '> 
             $tool->descripcion | $tool->notas                    | $tool->modelo
                    <a class='btn btn-warning btn-sm' href='eliminar/$tool->id'>ELIMINAR</a>
                </li>";
        }
        echo "</ul>";

    
        include 'templates/footer.php';
    }

    function showToolsconRubros($tools) {
        include 'templates/header.php';
        include 'templates/form_alta.php';

        echo "<ul class='list-group'>";
     //   mt-5 
        
        foreach($tools as $tool) {
            echo "<li class='list-group-item '> 
            $tool->descrubro | $tool->descripcion | $tool->notas                    | $tool->modelo
                    <a class='btn btn-warning btn-sm' href='eliminar/$tool->id'>ELIMINAR</a>
                </li>";
        }
        echo "</ul>";

    
        include 'templates/footer.php';
    }
    function showError($msg) {
        echo "<h1> ERROR ALGO ANDA MALLLL !</h1>";
        echo "<h2> $msg </h2>";
    }

    function showRubros($rubros) {
        include 'templates/header.php';
 //       include 'templates/form_alta_rubros.php';

        echo "<ul class='list-group '>";
     //   mt-5 
        
        foreach($rubros as $rubro) {
/*              echo "<li class='list-group-item '> 
                 $rubro->descripcion | $rubro->id         
                    <a class='btn btn-warning btn-sm' href='eliminar/$rubro->id'>ELIMINAR</a>
                </li>";
 */ 

            echo "<div id='list-example' class='list-group ' style='max-width: 250px'>
                   
              <a class='list-group-item list-group-item-action text-white bg-info' href='filtrar/$rubro->id'> $rubro->descripcion</a>

              </div>";



/*               "<div data-spy='scroll' data-target='#list-example' data-offset='0' class='scrollspy-example text-success'>
                <h4 id='list-item-1'>Item 1</h4>
                <p>...</p>
             
              </div>"; */

        }
   //     echo "</ul>";

   
/*prueba Select  
            echo "<select class='custom-select'>
                <option selected>Rubros</option>";
                  foreach($rubros as $rubro) {
                    "<option value='filtrar/$rubro->id'> $rubro->descripcion</option>
                </select>";
            }
*/    

        include 'templates/footer.php';
        
    }

}