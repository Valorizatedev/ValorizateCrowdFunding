<div id='csssubmenu'>
    <ul>
        <li><a href='{$_layoutParams.root}admin/informe_cccrm'><span>Geopisicionamiento</span></a></li>
        <li class='active '><a href='{$_layoutParams.root}admin/informe_cccrm/evento'><span>Ventas en Evento</span></a></li>
        <li><a href='{$_layoutParams.root}admin/informe_cccrm/campana'><span>Ventas en Campa&ntilde;as</span></a></li>
        <li><a href='{$_layoutParams.root}admin/informe_cccrm/visitantes'><span>Reporte de Visitantes</span></a></li>
    </ul>
</div>
<br/>
<form method="POST">
    <input type="hidden" value="1" name="consultar"/>
    <table style="width: 100%">
        <tr>
            <th class="etiqueta">Evento: &nbsp;</th>
            <td>
                <select name="evento" required="true">
                    <option value="">Selecciones un evento</option>
                    {foreach $eventos as $evento}
                        <option value="{$evento.eve_fecha}">{$evento.eve_nombre}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr>
            <th colspan="2">Puede discriminar la b&uacute;squeda por:</th>
        </tr>
        <tr>
            <th class="etiqueta">Almacen: &nbsp;</th>
            <td>
                <select name="almacen">
                    <option value="">Selecciones un Almacen</option>
                    {foreach $almacenes as $almacen}
                        <option value="{$almacen.alm_key}">{$almacen.alm_nombre}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr>
            <th colspan="2">O por:</th>
        </tr>
        <tr>
            <th class="etiqueta">Bloque: &nbsp;</th>
            <td>
                <input name="bloque" id="bloque"/>
            </td>
        </tr>
        <tr>
            <th colspan="2">O por:</th>
        </tr>
        <tr>
            <th class="etiqueta">Piso: &nbsp;</th>
            <td>
                <input name="piso" id="piso"/>
            </td>
        </tr>
    </table>
    <br/>
    <button class="btn btn-primary">Generar</button>
</form>