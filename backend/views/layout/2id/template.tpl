<!DOCTYPE html>
<html lang="es">
    <head>
        <title>{$titulo|default:$_layoutParams.configs.app_name}</title>
        <meta charset="utf-8">
        <link href="{$_layoutParams.ruta_css}bootstrap.css" rel="stylesheet" type="text/css">
        <link href="{$_layoutParams.ruta_css}core.css" rel="stylesheet" type="text/css">
        <link href="{$_layoutParams.ruta_css}jquery.ui.autocomplete.css" rel="stylesheet" type="text/css">
        {if isset($_layoutParams.css_plugin) && count($_layoutParams.css_plugin)}
            {foreach item=plg from=$_layoutParams.css_plugin}
                <link href="{$plg}" rel="stylesheet" type="text/css"/>
            {/foreach}
        {/if}
        
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
            {foreach item=css from=$_layoutParams.css}
                <link href="{$css}" rel="stylesheet" type="text/css"></link>
            {/foreach}
        {/if}
        
        <style type="text/css">
        </style>
    </head>

    <body>
        <!--Head-->
        <div class="navbar navbar-static-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="{$_layoutParams.root}">{$titulo|default:$_layoutParams.configs.app_name}</a>
                    {if Session::get('autenticado')}
                        <div class="navbar-form pull-right">
                            <a href="{$_layoutParams.root}login/cerrar" class="btn"><i class="icon-off"> </i> Salir</a>
                        </div>
                        <div class="navbar-form pull-right">
                            <a href="{$_layoutParams.root}admin/usuario/personal" class="btn"><i class="icon-user"> </i> {Session::get('usuario')}</a>
                        </div>
                    {/if}
                </div>
            </div>
        </div>
        <!--Body-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <div class="navbar-static-top" style="height:110px; background: url('{$_layoutParams.ruta_img}logo.png') no-repeat center; "></div>
                    {if isset($_layoutParams.menu)}
                        <div id="cssmenu">
                            <ul>
                                {foreach item=it from=$_layoutParams.menu}
                                    {if isset($_layoutParams.item) && $_layoutParams.item == $it.id}
                                        {assign var="_style" value='active'}
                                    {else}
                                        {assign var="_style" value='has-sub'}
                                    {/if}

                                    {if $it.enlace}
                                        <li class="{$_style}">
                                            <a  href="{$it.enlace}"><span><i class="{$it.imagen}"> </i> {$it.titulo}</span></a>
                                        </li>
                                    {else}
                                        <li class="{$_style}">
                                            <a  href="{$it.enlace}"><span><i class="{$it.imagen}"> </i> {$it.titulo}</span>
                                            </a>
                                            <ul>
                                                {foreach item=sub from=$it.submenu}

                                                    {if isset($_layoutParams.item) && $_layoutParams.item == $sub.id}
                                                        {assign var="_style" value='active'}
                                                    {else}
                                                        {assign var="_style" value='has-sub'}
                                                    {/if}
                                                    <li class="{$_style}">
                                                        <a  href="{$sub.enlace}"><span><i class="{$sub.imagen}"> </i> {$sub.titulo}</span></a>
                                                    </li>
                                                {/foreach}
                                            </ul>
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </div>
                    {/if}
                    <div class="navbar navbar-fixed-bottom">
                        <div class="container">
                            <a href="http://www.2idigital.co" target="_blank">
                                <img src="{$_layoutParams.ruta_img}logo2id.png" style="width: auto; height: auto;"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="span10">
                    <div class="contenedor">
                        {if isset($_error)}
                            <div id="_errl" class="alert alert-error">
                                <a class="close" data-dismiss="alert">x</a>
                                {$_error}
                            </div>
                        {/if}

                        {if isset($_mensaje)}
                            <div id="_msgl" class="alert alert-success">
                                <a class="close" data-dismiss="alert">x</a>
                                {$_mensaje}
                            </div>
                        {/if}

                        {include file=$_contenido}
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->

        <!-- javascript -->
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-ui.js"></script>
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery.ui.autocomplete.js"></script>
        <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.js"></script>
        
        <script type="text/javascript">
            var _root_ = '{$_layoutParams.root}';
        </script>

        {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
            {foreach item=plg from=$_layoutParams.js_plugin}
                <script src="{$plg}" type="text/javascript"></script>
            {/foreach}
        {/if}

        {if isset($_layoutParams.js) && count($_layoutParams.js)}
            {foreach item=js from=$_layoutParams.js}
                <script src="{$js}" type="text/javascript"></script>
            {/foreach}
        {/if}
    </body>
</html>