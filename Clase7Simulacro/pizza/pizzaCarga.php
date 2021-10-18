<?php
include_once "pizza.php";
include_once "pizzaService.php";

if(($_SERVER["REQUEST_METHOD"] === "GET")
    && isset($_GET["sabor"])
    && isset($_GET["precio"])
    && isset($_GET["tipo"])
    && isset($_GET["cantidad"]))
{
    $pizza = new Pizza();
    $pizza->ToPizzaFromRequest($_GET["sabor"],$_GET["precio"], $_GET["tipo"], $_GET["cantidad"]);
    $pizzaService = new PizzaService();
    // $pizzaService->GenerarArchivoVacio($pizza);
    $pizzaService->SaveFile($pizza);

}
else
{
    echo "Falta algun  parametro de entrada";
}


?>