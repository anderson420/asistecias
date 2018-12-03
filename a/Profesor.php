<?php
class Profesor
{
    private $idprofesores;
    private $primerNombre;
    private $email;
    private $primerApellido;
    private $segundoNombre;
    private $segundoApellido;   
    private $contrasena;
    private $direccion;
    private $telefono;
    private $dia_nacimiento;
    private $mes_nacimiento;   
    private $anio_nacimiento;
    private $newid;
    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>