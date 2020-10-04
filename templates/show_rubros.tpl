{include file="header.tpl"}

{* <div class="column" style='max-width: 250px'> *}

{* <div class="col-sm-2" style='padding:10px'> *}


<div class="row justify-content-md-center">
   <div class="col ">
 
 <!--   <div class="btn-group-vertical">-->
      <ul class='list-group'>
      <div id='list-example' class='list-group col-sm-3' style='max-width: 250px'>
        {foreach from=$rubros item=$rubro} 
          <a class='list-group-item list-group-item-action text-white bg-info' href='filtrar/{$rubro->id}'>{$rubro->descripcion}</a>
        {/foreach}
      </div>    
    </ul>
  </div>
