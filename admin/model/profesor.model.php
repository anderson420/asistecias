<?php
class ProfesorModel
{
    private $pdo;
    public function __CONSTRUCT()
    {
        try
        {
                $this->pdo =new PDO('mysql:host=sql307.epizy.com; port=3306; dbname=epiz_23091224_asistencia', 'epiz_23091224', '6bnlY6g5A8udN');
           // $this->pdo = new PDO('mysql:host=localhost;dbname=asistencia', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM profesores");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Profesor();

                $alm->__SET('idprofesores', $r->idprofesores);
                $alm->__SET('primerNombre', $r->primerNombre);
                $alm->__SET('email', $r->email);
                $alm->__SET('primerApellido', $r->primerApellido);
                $alm->__SET('segundoNombre', $r->segundoNombre);
                $alm->__SET('segundoApellido', $r->segundoApellido);
                $alm->__SET('contrasena', $r->contrasena);
                $alm->__SET('direccion', $r->direccion);
                $alm->__SET('telefono', $r->telefono);
                $alm->__SET('dia_nacimiento', $r->dia_nacimiento);
                $alm->__SET('mes_nacimiento', $r->mes_nacimiento);
                $alm->__SET('anio_nacimiento', $r->anio_nacimiento);



                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM profesores  WHERE idprofesores = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Profesor();

                $alm->__SET('idprofesores', $r->idprofesores);
                $alm->__SET('primerNombre', $r->primerNombre);
                $alm->__SET('email', $r->email);
                $alm->__SET('primerApellido', $r->primerApellido);
                $alm->__SET('segundoNombre', $r->segundoNombre);
                $alm->__SET('segundoApellido', $r->segundoApellido);
                $alm->__SET('contrasena', $r->contrasena);
                $alm->__SET('direccion', $r->direccion);
                $alm->__SET('telefono', $r->telefono);
                $alm->__SET('dia_nacimiento', $r->dia_nacimiento);
                $alm->__SET('mes_nacimiento', $r->mes_nacimiento);
                $alm->__SET('anio_nacimiento', $r->anio_nacimiento);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {   
        try 
        {
            $stm = $this->pdo->prepare("DELETE FROM profesores WHERE idprofesores = ?");
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Profesor $data)
    {
        try 
        {
            $sql = "UPDATE profesores SET 
                        idprofesores                = ?, 
                        primerNombre              = ?,
                        email                    = ?,
                        primerApellido             = ?, 
                        segundoNombre            = ?,
                        segundoApellido         = ?, 
                        contrasena               = ?,
                        direccion                = ?,
                        telefono             = ?,
                        dia_nacimiento         = ?, 
                        mes_nacimiento       = ?,
                        anio_nacimiento       = ?

                    WHERE idprofesores = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('newid'), 
                    $data->__GET('primerNombre'), 
                    $data->__GET('email'),
                    $data->__GET('primerApellido'),
                    $data->__GET('segundoNombre'),
                    $data->__GET('segundoApellido'),
                    $data->__GET('contrasena'), 
                    $data->__GET('direccion'), 
                    $data->__GET('telefono'),
                    $data->__GET('dia_nacimiento'),
                    $data->__GET('mes_nacimiento'),
                    $data->__GET('anio_nacimiento'),
                    $data->__GET('idprofesores')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Profesor $data)
    {
        try 
        {
        $sql = "INSERT INTO profesores (
                        idprofesores           , 
                        primerNombre         ,
                        email                 ,
                        primerApellido          , 
                        segundoNombre         ,
                        segundoApellido      , 
                        contrasena    ,
                        direccion      ,
                        telefono ,
                        dia_nacimiento, 
                        mes_nacimiento,
                        anio_nacimiento

                                        ) 
                VALUES (?, ?, ?, ?, ?,?,?,?,?,?,?,?) ;";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $data->__GET('idprofesores'), 
                    $data->__GET('primerNombre'), 
                    $data->__GET('email'),
                    $data->__GET('primerApellido'),
                    $data->__GET('segundoNombre'),
                    $data->__GET('segundoApellido'),
                    $data->__GET('contrasena'), 
                    $data->__GET('direccion'), 
                    $data->__GET('telefono'),
                    $data->__GET('dia_nacimiento'),
                    $data->__GET('mes_nacimiento'),
                    $data->__GET('anio_nacimiento'),
                )
            );
        } catch (Exception $e) 
        {
     
        }
    }
}
?>