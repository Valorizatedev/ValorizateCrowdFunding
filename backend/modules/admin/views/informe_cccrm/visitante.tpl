<div id='csssubmenu'>
    <ul>
        <li><a href='{$_layoutParams.root}admin/informe_cccrm'><span>Geopisicionamiento</span></a></li>
        <li><a href='{$_layoutParams.root}admin/informe_cccrm/evento'><span>Ventas en Evento</span></a></li>
        <li><a href='{$_layoutParams.root}admin/informe_cccrm/campana'><span>Ventas en Campa&ntilde;as</span></a></li>
        <li class='active '><a href='{$_layoutParams.root}admin/informe_cccrm/visitantes'><span>Reporte de Visitantes</span></a></li>
    </ul>
</div>
<br/>

<form method="POST">
    <input type="hidden" name="consultar" value="1">
    <table style="width: 100%">
        <tbody>
            <tr>
                <th colspan="2">Filtrar Reporte Por:</th>
            </tr>
            <tr>
                <th class="etiqueta">Estado: &nbsp;</th>
                <td>
                    <select name="estado">
                        <option value="">Seleccione una opci&oacute;n</option>
                        <option value="1">Soltero(a)</option>
                        <option value="2">Casado(a)</option>
                        <option value="3">Separado(a)</option>
                        <option value="4">Viudo(a)</option>
                        <option value="5">Divorciado(a)</option>
                        <option value="6">Uni&oacute;n Libre</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Hijos: &nbsp;</th>
                <td>
                    <select name="hijos">
                        <option value="">Seleccione una opci&oacute;n</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Genero: &nbsp;</th>
                <td>
                    <select name="genero">
                        <option value="">Seleccione una opci&oacute;n</option>
                        {foreach $generos as $genero}
                            <option value="{$genero.gen_key}">{$genero.gen_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Ciudad: &nbsp;</th>
                <td>
                    <select name="departamento" id="departamento">
                        <option value="">Seleccione un Departamento</option>
                        {foreach $departamentos as $departamento}
                            <option value="{$departamento.dep_key}">{$departamento.dep_nombre}</option>
                        {/foreach}
                    </select>
                    <select name="ciudad" id="ciudad">
                        <option value="">Primero Seleccione un Departamento</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Cumplea&ntilde;os en el mes de: &nbsp;</th>
                <td>
                    <select name="mes_cumple">
                        <option value="">Seleccione un Mes</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Edades: &nbsp;</th>
                <td>
                    Desde: <input type="text" name="edad_desde" value="" style="width: 48px"/>
                    Hasta: <input type="text" name="edad_hasta" value="" style="width: 48px"/>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <button class="btn btn-primary">Generar</button>
</form>