<?php

class logclienteModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultarLog() {
        $log = $this->_db->query("SELECT 											lcl.lcl_key,											lcl.lcl_observacion,											lcl.lcl_fecha,											lcl.cli_key,											lcl.usu_key,											lcl.lcl_estado 											FROM lcl WHERE lcl.lcl_estado!='0'");        if ($log)            return $log->fetchall();
    }

    public function consultarLogc($condicion='1') {
        $log = $this->_db->query("SELECT 											lcl.lcl_key,											lcl.lcl_observacion,											lcl.lcl_fecha,											lcl.cli_key,											lcl.usu_key,											lcl.lcl_estado 											FROM lcl WHERE {$condicion}");					
        if ($log)            return $log->fetchall();
    }

    public function crearLog($datos) {//print_r($datos);exit;
            $this->_db->prepare("INSERT INTO lcl 									(lcl_observacion,lcl_fecha,cli_key,usu_key,lcl_estado)								 VALUES 									(:lcl_observacion,:lcl_fecha,:cli_key,:usu_key,1)")
                    ->execute(                            array(
                                ':lcl_observacion' => $datos['lcl_observacion'],								':lcl_fecha' => $datos['lcl_fecha'],								':cli_key' => $datos['cli_key'],								':usu_key' => $datos['usu_key']
                            ));														//exit;
    }

    public function actulizarlog($key, $datos) {
        $this->_db->prepare("UPDATE lcl SET lcl_observacion=:lcl_observacion, 											lcl_fecha=:lcl_fecha,											cli_key=:cli_key,											usu_key=:usu_key,											1' WHERE lcl_key=:lcl_key;")
                ->execute(
                        array(
                            ':lcl_observacion' => $datos['lcl_observacion'],							':lcl_fecha' => $datos['lcl_fecha'],							':cli_key' => $datos['cli_key'],							':usu_key' => $datos['usu_key'],							':rol_key' => $key
                        )
        );
    }

}

?>