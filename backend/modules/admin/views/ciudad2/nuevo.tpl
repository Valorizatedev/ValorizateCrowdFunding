<form id="form1" method="POST" action="{$_layoutParams.root}admin/ciudad/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th ><b>Codigo: </b></th>
            <td><input class="form-control" type="text" name="codigo" id="codigo" value=""/></td>
        </tr>
        <tr>
            <th ><b>Nombre: </b></th>
            <td><input class="form-control" type="text" name="nombre" id="nombre" value=""/></td>
        </tr>
        <th ><b>Departamento: </b></th>
        <td>
            <select  class="form-control"name='departamento' id="departamento" >
                <option value="">Elija el tipo de ciudadano</option>
                {foreach $departamentos as $nombre}
                    <option value="{$nombre.dep_key}">{$nombre.dep_nombre}</option>
                {/foreach}
            </select>        
        </td>
    </table>
    <br/>
    <p>
      
    </p>
</form>