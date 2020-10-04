{* 
<div class="row "> *}

<!--<div class="col-sm-9">-->
     <ul class='list-group'>     
        {foreach from=$tools item=$tool}
            <div class='col-9'>   
                <li class='list-group-item '> 
                    {$tool->descripcion }|{$tool->notas}|{$tool->modelo}
                </li>
            </div>
            <div class='col-6'> 
                <a class='btn btn-warning btn-sm' href='details/{$tool->id}'>Detalles</a>
       
            </div>
        {/foreach}
     </ul> 
</div>

{include file="footer.tpl" }    