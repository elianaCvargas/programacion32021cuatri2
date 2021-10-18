<?php
 include_once "pizza.php";
include_once "pizzaService.php";

    if( isset($_POST["sabor"])
    && isset($_POST["tipo"]))
    {
        $pizza = new Pizza();
        $pizza->ToPizzaFromRequestQuery($_POST["sabor"], $_POST["tipo"]);
        $pizzaService = new PizzaService();

        if($pizzaService->BuscarPorSaBorTipo($pizza))
        {
            echo "Si hay";
        }
        else echo "No existe";

    }
    else
    {
        echo "Falta algun  parametro de entrada";
    }



// $caso = $_SERVER['REQUEST_METHOD'];

// switch ($caso) 
// {
//   case "GET":
//         switch (key($_GET)) {
//           case 'cargarpizzaget':
//                 include "Funciones/PizzaCargar.php";
//                 break;
// 	case 'listadodeimagenes':
//                 include "Funciones/ListadoDeImagenes.php";
//                 break;
// }


?>