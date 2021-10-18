<?php
class Venta{
    public $id;
    public $email;
    public $sabor;
    public $tipo;
    public $cantidad;
    public $fecha;


    public function ToVentaFromRequest($sabor, $email, $tipo, $cantidad)
    {
        $this->sabor = $sabor;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
        $this->email = $email;
    }

    public function ToVentaFromRequestQuery($sabor, $tipo)
    {
        $this->sabor = $sabor;
        $this->tipo = $tipo;
    }

    function setId($id)
    {
        $this->id = $id + 1;
    }

    function ToJson($venta)
    {
        return json_encode($venta);
    }

    public function Equals($pizzaA, $pizzaB) :bool
    {
        if($pizzaA->tipo === $pizzaB->tipo && $pizzaA->sabor=== $pizzaB->sabor)
        {
            return true;
        }

        return false;
    }

    
    public function ValidateEmptyParameters($codigoBarra, $nombre, $tipo, $stock, $email): MiError
    {
      $mensaje = "Se debe ingresar los siguientes campos, por favor: \n";
      $error = new MiError($mensaje);
      if(empty($nombre))
      {
          $error->isError = true;
          $error->message = $error->message. "Nombre\n";
      }
  
      if(empty($codigoBarra))
      {
          $error->isError = true;
          $error->message = $error->message."Codigo barra\n";
      }
  
      if(empty($tipo))
      {
          $error->isError = true;
          $error->message = $error->message."Tipo\n";
      }
  
      if(empty($stock))
      {
          $error->isError = true;
          $error->message = $error->message."Stock\n";
      }
  
      if(empty($email))
      {
          $error->isError = true;
          $error->message = $error->message."email\n";
      }
  
       return $error;
    }

}
?>