<?php
class Estudiante
{
    private $idEstudiante;
    private $password;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;   
    private $segundoApellido;
    private $correo;
    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>