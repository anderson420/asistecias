<?php 
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
require_once 'EstudianteModel.php';
require_once 'Estudiante.php';

// Logica
$alm = new Estudiante();
$model = new EstudianteModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {   
        case 'actualizar':
           
                $alm->__SET('idEstudiante',  $_REQUEST['idEstudiante']);
                $alm->__SET('password', $_REQUEST['password']);
                $alm->__SET('primerNombre', $_REQUEST['primerNombre']);
                $alm->__SET('segundoNombre', $_REQUEST['segundoNombre']);
                $alm->__SET('primerApellido', $_REQUEST['primerApellido']);
                $alm->__SET('segundoApellido',   $_REQUEST['segundoApellido']);
                $alm->__SET('correo', $_REQUEST['correo']);
                $model->Actualizar($alm);
                header('Location: index.estudiante.php');
        
            break;

        case 'registrar':
            if( $_REQUEST['idEstudiante'] != '')
            {
                $alm->__SET('idEstudiante',  $_REQUEST['idEstudiante']);
                $alm->__SET('password', $_REQUEST['password']);
                $alm->__SET('primerNombre', $_REQUEST['primerNombre']);
                $alm->__SET('segundoNombre', $_REQUEST['segundoNombre']);
                $alm->__SET('primerApellido', $_REQUEST['primerApellido']);
                $alm->__SET('segundoApellido',   $_REQUEST['segundoApellido']);
                $alm->__SET('correo', $_REQUEST['correo']);

                $model->Registrar($alm);
                header('Location: index.estudiante.php');
            }else{
                echo '<script>alert("Hay campos vacios.")</script>';

            }
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idestudiante']);
            header('Location: index.estudiante.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idestudiante']);
            break;
    }
}
echo "<a  href=logout.php>Cerrar Sesion X </a>";
}


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>web</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body class="body">
        <header>
            <h1>CRUD DE ESTUDIANTES</h1>
        </header>

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idEstudiante > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="idEstudiantes" value="<?php echo $alm->__GET('idEstudiante'); ?>" />
                    
                    <table >
                        <tr>
                            <th >idEstudiante</th>
                            <td><input type="text" name="idEstudiante" value="<?php echo $alm->__GET('idEstudiante'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >password</th>
                            <td><input type="text" name="password" value="<?php echo $alm->__GET('password'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >primerNombre</th>
                            <td><input type="text" name="primerNombre" value="<?php echo $alm->__GET('primerNombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >segundoNombre</th>
                            <td><input type="text" name="segundoNombre" value="<?php echo $alm->__GET('segundoNombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >primerApellido</th>
                            <td><input type="text" name="primerApellido" value="<?php echo $alm->__GET('primerApellido'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >segundoApellido</th>
                            <td><input type="text" name="segundoApellido" value="<?php echo $alm->__GET('segundoApellido'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >correo</th>
                            <td><input type="text" name="correo" value="<?php echo $alm->__GET('correo'); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                        
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >idEstudiante</th>
                            <th >password</th>
                            <th >primerNombre</th>
                            <th >segundoNombre</th>
                            <th>primerApellido</th>
                            <th>segundoApellido a</th>
                            <th>correo</th>
                            <th>editar</th>
                            <th>eliminar</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idEstudiante'); ?></td>
                            <td><?php echo $r->__GET('password'); ?></td>
                            <td><?php echo $r->__GET('primerNombre'); ?></td>
                            <td><?php echo $r->__GET('segundoNombre'); ?></td>
                            <td><?php echo $r->__GET('primerApellido'); ?></td>
                            <td><?php echo $r->__GET('segundoApellido'); ?></td>
                            <td><?php echo $r->__GET('correo'); ?></td>
                            <td>
                                <a href="?action=editar&idestudiante=<?php echo $r->idEstudiante; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idestudiante=<?php echo $r->idEstudiante; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>