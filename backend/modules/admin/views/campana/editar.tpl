<form id="form1" action="{$_layoutParams.root}admin/campana/editar/{$datos.cam_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <td class="etiqueta">Nombre: &nbsp;</td>
            <td><input type="texto" name="nombre" id="nombre" value="{$datos.cam_nombre|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha Inicio:&nbsp; </td>
            <td><input type="texto" name="fecha_ini" id="fecha_ini" value="{$datos.cam_fecha_ini|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha Fin:&nbsp; </td>
            <td><input type="texto" name="fecha_fin" id="fecha_fin" value="{$datos.cam_fecha_fin|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Monto:&nbsp; </td>
            <td><input type="texto" name="monto" id="monto" value="{number_format($datos.cam_monto|default:"",0,',','.')}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n:&nbsp; </th>
            <td><textarea name="descripcion" id="descripcion">{$datos.cam_descripcion|default:""}</textarea></td>
        </tr>
        <tr>
            <th colspan="2">Promociones</th>
        </tr>
        <tr>
            <th class="etiqueta">Multiplica por:&nbsp; </th>
            <td><input type="texto" name="multiplicador" id="multiplicador" value="{$datos.cam_promo_multiplicar|default:""}" /></td></td>
        </tr>
        <tr>
            <th class="etiqueta">Dias de promoci&oacute;n:&nbsp; </th>
            <td>
                <input type="checkbox" name="lunes" {if substr($datos.cam_promo_dias,0,1)==1}checked="true"{/if}/> Lunes<br/>
                <input type="checkbox" name="martes" {if substr($datos.cam_promo_dias,1,1)==1}checked="true"{/if}/> Martes<br/>
                <input type="checkbox" name="miercoles" {if substr($datos.cam_promo_dias,2,1)==1}checked="true"{/if}/> Miercoles<br/>
                <input type="checkbox" name="jueves" {if substr($datos.cam_promo_dias,3,1)==1}checked="true"{/if}/> Jueves<br/>
                <input type="checkbox" name="viernes" {if substr($datos.cam_promo_dias,4,1)==1}checked="true"{/if}/> Viernes<br/>
                <input type="checkbox" name="sabado" {if substr($datos.cam_promo_dias,5,1)==1}checked="true"{/if}/> Sabado<br/>
                <input type="checkbox" name="domingo" {if substr($datos.cam_promo_dias,6,1)==1}checked="true"{/if}/> Domingo
            </td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana"> Cancelar</a>
    </p>
</form>