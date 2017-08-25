<script>
    window.print();
</script>
{*foreach $tickets as $ticket*}
<div style="text-align: center">
    <p>
        <b>{$_layoutParams.configs.app_company_name}<br/>
        {$_layoutParams.configs.app_company_nit}</b><br/>
        Visitenos en {$_layoutParams.configs.app_company_web}
    </p>
    <p>
        {str_replace("\n","<br/>",$tickets.descripcion)}
    </p>
</div>
<br/>
<table style="text-align: center; width: 100%; height: 100%">
    <tr>
        <th>
            {$tickets.campana}
        </th>
    </tr>
    <tr>
        <th>
            Tiquete No. {$tickets.numero}
        </th>
    </tr>
    <tr>
        <td>
            {$tickets.nombre}
        </td>
    </tr>
    <tr>
        <td>
            {$tickets.identificacion}
        </td>
    </tr>
    <tr>
        <td>
            {$tickets.telefono}
        </td>
    </tr>
    <tr>
        <td>
            {$tickets.direccion}
        </td>
    </tr>
    <tr>
        <th><hr></th>
    </tr>
</table>
{*/foreach*}