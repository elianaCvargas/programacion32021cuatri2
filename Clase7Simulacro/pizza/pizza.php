<?php
class Pizza{
    public $id;
    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;


    public function ToPizzaFromRequest($sabor, $precio, $tipo, $cantidad)
    {
        $this->sabor = $sabor;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    public function ToPizzaFromRequestQuery($sabor, $tipo)
    {
        $this->sabor = $sabor;
        $this->tipo = $tipo;
    }

    function setId($id)
    {
        $this->id = $id + 1;
    }

    function ToJson($pizza)
    {
        return json_encode($pizza);
    }

    public function Equals($pizzaA, $pizzaB) :bool
    {
        if($pizzaA->tipo === $pizzaB->tipo && $pizzaA->sabor=== $pizzaB->sabor)
        {
            return true;
        }

        return false;
    }

    public function SetCodigoBarra($codigoBarra)
    {
        if(strlen($codigoBarra) != 6 )
        {
            echo "El codigo de barras debe contener 6 digitos.";
            return;
        }

        if(intval($codigoBarra, 10) == 0)
        {
            echo "El codigo de barra son numeros de 6 caracteres maximo.";
            return;
        }

        $this->CodigoBarra = $codigoBarra;
    }

    
    public function ValidateEmptyParameters($codigoBarra, $nombre, $tipo, $stock, $precio): MiError
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
  
      if(empty($precio))
      {
          $error->isError = true;
          $error->message = $error->message."Precio\n";
      }
  
       return $error;
    }

}
?>