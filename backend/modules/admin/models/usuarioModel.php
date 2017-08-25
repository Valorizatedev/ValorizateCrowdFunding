<?php



class usuarioModel extends Model {



    public function __construct() {

        parent::__construct();

    }



    public function consultar($condicion = '1') {

        $roles = $this->_db->query("SELECT usu_key, usu_nombre, usu_apellidos, usu_login, usu_password, usu_num_documento, 

            usu_observaciones, usu_foto, usu_email, usu_estado, tdo_key, rol_key FROM usu WHERE " . $condicion);

        if ($roles)

            return $roles->fetchall();

    }


    public function perfil($condicion = '1') {

        $data = $this->_db->query("SELECT usu_key, usu_nombre, usu_apellidos, usu_login, usu_password, usu_num_documento, 
            usu_observaciones, usu_foto, usu_email, usu_estado, tdo_key, rol_key,usu_tarjeta,usu_mes_ven,usu_ano_ven,usu_codigo FROM usu WHERE " . $condicion);
        if ($data)
            return $data->fetchall();

    }


    public function crear($datos) {

     
   

        $condicion = "usu_key=" . $datos['usu_key'];

        $key = $this->consultar($condicion);

        if (!$key) {

            $this->_db->prepare("INSERT INTO usu (usu_key,usu_nombre, usu_apellidos, usu_login, usu_num_documento, 

                usu_observaciones, usu_foto, usu_email, usu_estado, tdo_key, rol_key,usu_tarjeta,usu_mes_ven,usu_ano_ven,usu_codigo ) VALUES (:usu_key,:usu_nombre, :usu_apellidos, 

                :usu_login, :usu_num_documento, :usu_observaciones, :usu_foto, :usu_email, 1, :tdo_key, :rol_key,:usu_tarjeta,:usu_mes_ven,:usu_ano_ven,:usu_codigo )")

                    ->execute(

                            array(
                                ':usu_key'=>$datos['usu_key'],
                                ':usu_nombre' => $datos['usu_nombre'],
                                ':usu_apellidos' => $datos['usu_apellidos'],
                                ':usu_login' => $datos['usu_login'],
                                ':usu_num_documento' => $datos['usu_num_documento'],
                                ':usu_observaciones' => $datos['usu_observaciones'],
                                ':usu_foto' => $datos['usu_foto'],
                                ':usu_email' => $datos['usu_email'],
                                ':tdo_key' => $datos['tdo_key'],
                                ':rol_key' => $datos['rol_key'],
                                ':usu_tarjeta' => $datos['usu_tarjeta'],
                                ':usu_mes_ven' => $datos['usu_mes_ven'],
                                ':usu_ano_ven' => $datos['usu_ano_ven'],
                                ':usu_codigo' => $datos['usu_codigo'],
                                
                            )

            );

            $condicion = " usu_key= " . $datos['usu_key'] ;
            $key = $this->consultar($condicion);

        } else {

            $this->actualizar($key[0]['usu_key'], $datos);

        }

        return $key[0];

    }



    public function actualizar($key, $datos) {
        echo $key."";
        print_r($datos);
        
        $this->_db->prepare("UPDATE usu SET usu_nombre = :usu_nombre, usu_apellidos = :usu_apellidos, 
             usu_observaciones = :usu_observaciones, usu_foto = :usu_foto, 
            usu_email = :usu_email, usu_estado = 1,
            usu_tarjeta=:usu_tarjeta,usu_mes_ven=:usu_mes_ven,usu_ano_ven=:usu_ano_ven,usu_codigo=:usu_codigo WHERE usu_key='{$key}'")

                ->execute(

                        array(

                            ':usu_nombre' => $datos['usu_nombre'],
                            ':usu_apellidos' => $datos['usu_apellidos'],
                            ':usu_observaciones' => $datos['usu_observaciones'],
                            ':usu_foto' => $datos['usu_foto'],
                            ':usu_email' => $datos['usu_email'],
                            ':usu_tarjeta' => $datos['usu_tarjeta'],
                            ':usu_mes_ven' => $datos['usu_mes_ven'],
                            ':usu_ano_ven' => $datos['usu_ano_ven'],
                            ':usu_codigo' => $datos['usu_codigo'],

                        )

        );
                exit;

    }



    public function actualizarPassword($usu_password, $usu_key) {

        $this->_db->prepare("UPDATE usu SET usu_password=:usu_password WHERE usu_key = :usu_key")

                ->execute(

                        array(

                            ':usu_password' => $usu_password,

                            ':usu_key' => $usu_key

        ));

    }



    public function eliminar($usu_key) {

        $this->_db->prepare("UPDATE usu SET usu_estado=0 WHERE usu_key = :usu_key")

                ->execute(
                        array(
                            ':usu_key' => $usu_key

        ));

    }



}

?>