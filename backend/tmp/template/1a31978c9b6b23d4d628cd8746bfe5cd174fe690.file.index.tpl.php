<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 14:43:20
         compiled from "/Applications/MAMP/htdocs/inventario/views/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13361427415909b01f0371b7-21967258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a31978c9b6b23d4d628cd8746bfe5cd174fe690' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/views/login/index.tpl',
      1 => 1493925364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13361427415909b01f0371b7-21967258',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5909b01f097765_89106780',
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909b01f097765_89106780')) {function content_5909b01f097765_89106780($_smarty_tpl) {?><div class="row" style="" width="">	<div class="col-md-3" ></div>	<div class="col-md-6" >	<form name="form1" style ="" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login" method="POST" enctype="multipart/form-data" autocomplete="off" >						<input type="hidden" value="1" name="enviar" />										<div align="center" >				<h3>Iniciar Sesión</h3>			</div>						<div class="control-group"  >			  <div class="controls" class="col-md-12">									<div class="input-group" class="col-md-12" >							<div class="input-group-addon">								<i class="entypo-user"></i>							</div>						  <input type="text" class="form-control" name="usuario" id='usuario' value="" placeholder="Usuario" required="true"/>					</div>					<br>					<div class="input-group" class="col-md-12" >							<div class="input-group-addon">								<i class="entypo-key"></i>							</div>					<input type="password" class="form-control" name="pass" id='pass' placeholder="Contraseña" required="true"/>					</div>						  </div>			</div>			<br>						<table >				<tr>					<td><a href="javascript:;" onclick ="$('#modal-2').modal('show')" class="btn " align="right" style ="width:100%;"> <p ><h5 class="text-info"><b>¿ Olvidaste tu contraseña <i class="entypo-cw"></i> ? </b></h5></p></a></td>					<td width="60%"><button class="btn" style ="width:100%;"> Acceder <i class="entypo-login"></i></button></td>				</tr>			</table>							</form>	</div>	<div class="col-md-3" ></div></div><!-- Modal para el olvido de contraseña --><div class="modal fade custom-width" id="modal-2" >	<div class="trans" style="">	<div class="modal-dialog" style="width: 60%;">		<div class="modal-content">						<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				<h4 ><b>Restablecer contraseña</b></h4>			</div>				<form name="form1" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login/restablecer" method="POST" enctype="multipart/form-data" >												<div class="modal-body">						<div id="alerta" class="alert alert-danger" style="display:none;">						</div>							<b>Correo electrónico:</b>							<input type="text" name="correor" id="correor" class="form-control" />						</div>						<div class="modal-footer">							<button class="btn btn-blue" id="botonverificacion" disabled> Enviar</button>							<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Cancelar</a>				</form>						</div>		</div>	</div>	</div></div><?php }} ?>