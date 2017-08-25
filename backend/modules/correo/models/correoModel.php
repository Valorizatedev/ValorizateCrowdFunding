<?php

class correoModel extends Model {
    public function __construct() {        parent::__construct();    }		public function enviar($cuerpo=false,$destinatario=false)	{				$body = $cuerpo;                $this->getLibrary("xpm" . DS . "MAIL");                //require_once 'libs/xpm/MAIL.php';                $m = new MAIL;                $m->From(EMAIL_REMITENTE, EMAIL_NOMBRE_REMITENTE); // set from address                $m->AddTo($destinatario); // add to address                $m->Subject($titulo); // set subject                $m->html($body);                $c = $m->Connect(EMAIL_HOST, (int) EMAIL_SALIDA, EMAIL_USER, EMAIL_PASS) or die(print_r($m->Result));                $m->Send($c);                $m->Disconnect();		}
}
?>