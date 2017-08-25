<?php

class oprproModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT pxo_key, pxo_estimado_sin_impuesto, pxo_estimado_con_impuesto, pxo_cantidad, 
            pro_key, opo_key FROM pxo WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        print_r($datos);
        $key = $this->consultar("UPPER(opo_key)=UPPER('{$datos['opo_key']}') AND 
            UPPER(pro_key)=UPPER('{$datos['pro_key']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO pxo (pxo_estimado_sin_impuesto, pxo_estimado_con_impuesto, pxo_cantidad, 
                pro_key, opo_key) VALUES (:pxo_estimado_sin_impuesto, :pxo_estimado_con_impuesto, :pxo_cantidad, :pro_key, 
                :opo_key)")
                    ->execute(
                            array(
                                ':opo_key' => $datos['opo_key'],
                                ':pro_key' => $datos['pro_key'],
                                ':pxo_estimado_sin_impuesto' => $datos['pxo_estimado_sin_impuesto'],
                                ':pxo_estimado_con_impuesto' => $datos['pxo_estimado_con_impuesto'],
                                ':pxo_cantidad' => $datos['pxo_cantidad']
                            )
            );
            $key = $this->consultar("UPPER(opo_key)=UPPER('{$datos['opo_key']}') AND 
                UPPER(pro_key)=UPPER('{$datos['pro_key']}')");
        } else {
            $this->actulizar($key[0]['pxo_key'], $datos);
        }
        return $key[0];
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE pxo SET opo_key = :opo_key, pro_key = :pro_key, pxo_cantidad = :pxo_cantidad,
            pxo_estimado_sin_impuesto = :pxo_estimado_sin_impuesto, pxo_estimado_con_impuesto = :pxo_estimado_con_impuesto 
            WHERE pxo_key = :pxo_key")
                ->execute(
                        array(
                            ':opo_key' => $datos['opo_key'],
                            ':pro_key' => $datos['pro_key'],
                            ':pxo_estimado_sin_impuesto' => $datos['pxo_estimado_sin_impuesto'],
                            ':pxo_estimado_con_impuesto' => $datos['pxo_estimado_con_impuesto'],
                            ':pxo_cantidad' => $datos['pxo_cantidad'],
                            ':pxo_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("DELETE FROM pxo WHERE pxo_key = :pxo_key")
                ->execute(
                        array(
                            ':pxo_key' => $key
                        )
        );
    }

}

?>