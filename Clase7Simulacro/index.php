<?php


switch($_SERVER["REQUEST_METHOD"])
{
    case "POST":
        switch (key($_POST)) 
        {
            case 'consultarPizza':
                include "./pizza/pizzaConsultar.php";
            break;
            case 'altaVenta':
                include "./venta/altaVenta.php";
            break;
        }
        break;
    case "GET":
        switch (key($_GET)) 
        {
            case 'cargarPizza':
                include "./pizza/pizzaCarga.php";
            break;
            // case 'consultarPizza':
            //     include "./pizza/pizzaConsultar.php";
            // break;
        }
        break;
}



?>