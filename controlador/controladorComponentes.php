<?php
//include_once '../modelo/conexion.php';
//include_once '../modelo/componente.php';

class controladorComponentes{
    private $conexion;

    function __construct(){
        $this->conexion=new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    /* Listar los datos de los componentes (Read) */
    function listar(){
        try{
            $sql="select * from listado";
            $ps=$this->conexion->getConexion()->prepare($sql);
            $ps->execute(NULL);
            $resultado=[];
            while($row=$ps->fetch(PDO::FETCH_OBJ)){
                $componente=new componente();
                $componente->setPzReferencia($row->pz_referencia);
                $componente->setPzMotherboard($row->pz_motherboard);
                $componente->setPzProcesador($row->pz_procesador);
                $componente->setPzRam($row->pz_ram);
                $componente->setPzVideo($row->pz_video);
                $componente->setPzFuente($row->pz_fuente);
                array_push($resultado,$componente);
            }
            $this->conexion=null;
        }catch(PDOException $e){
            echo "Falló la conexion" . $e->getMessage();
        }
        return $resultado;
    }

    function crear($componente){
        try{
            $sql="insert into listado values (?,?,?,?,?,?)";
            $ps=$this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $componente->getPzReferencia(),
                $componente->getPzMotherboard(),
                $componente->getPzProcesador(),
                $componente->getPzRam(),
                $componente->getPzVideo(),
                $componente->getPzFuente()
            ));

            if($ps->rowCount()>0){
                $mensaje="Se creó el registro correctamente";
            }else{
                $mensaje="No se pudo registrar";
            }
            $this->conexion=null;

        }catch(PDOException $e){
            $mensaje="Error al crear el regitro de componentes" . $e->getMessage();
        }
        
        return $mensaje;
    }
}
