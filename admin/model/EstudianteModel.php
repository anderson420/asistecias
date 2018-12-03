<?php
class EstudianteModel
{
    private $pdo;
    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=sql307.epizy.com; dbname=epiz_23091224_asistencia', 'epiz_23091224', '6bnlY6g5A8udN');
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

            $stm = $this->pdo->prepare("SELECT * FROM estudiantes" );
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Estudiante();


                $alm->__SET('idEstudiante', $r->idestudiantes);
                $alm->__SET('password', $r->contrasena);
                $alm->__SET('primerNombre', $r->primerNombre);
                $alm->__SET('segundoNombre', $r->segundoNombre);
                $alm->__SET('primerApellido', $r->primerApellido);
                $alm->__SET('segundoApellido', $r->segundoApellido);
                $alm->__SET('correo', $r->correo);

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
                      ->prepare("SELECT * FROM estudiantes WHERE idestudiantes = ? ");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Estudiante();


                $alm->__SET('idEstudiante', $r->idestudiantes);
                $alm->__SET('password', $r->contrasena);
                $alm->__SET('primerNombre', $r->primerNombre);
                $alm->__SET('segundoNombre', $r->segundoNombre);
                $alm->__SET('primerApellido', $r->primerApellido);
                $alm->__SET('segundoApellido', $r->segundoApellido);
                $alm->__SET('correo', $r->correo);

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
            $stm = $this->pdo
                      ->prepare("DELETE FROM estudiantes WHERE idestudiantes = ?");
            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Estudiante $data)
    {
        try 
        {
            $sql = "UPDATE estudiantes SET 
                        idestudiantes    = ?,
                        contrasena = ?,
                        primerNombre = ?,
                        segundoNombre = ?,
                        primerApellido = ?,
                        segundoApellido = ?,
                        correo = ?


                    WHERE idestudiantes = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('idEstudiante'),
                    $data->__GET('password'),
                    $data->__GET('primerNombre'),
                    $data->__GET('segundoNombre'),
                    $data->__GET('primerApellido'),
                    $data->__GET('segundoApellido'),
                    $data->__GET('correo'),
                    $data->__GET('idEstudiante')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Estudiante $data)
    {
        try 
        {
        $sql = "INSERT INTO estudiantes 
        ( idestudiantes,contrasena,primerNombre,segundoNombre,primerApellido,segundoApellido,correo ) 
                VALUES ( ?, ?,?,?,?,?,?) ";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $data->__GET('idEstudiante'),
                    $data->__GET('password'),
                    $data->__GET('primerNombre'),
                    $data->__GET('segundoNombre'),
                    $data->__GET('primerApellido'),
                    $data->__GET('segundoApellido'),
                    $data->__GET('correo')
                  
                )
            );
        } catch (Exception $e) 
        {
          
        }
    }
}
?>