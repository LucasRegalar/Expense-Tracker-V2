<?php

$router->get("/", "index.php");
$router->get("/transactions", "transactions.php");
$router->get("/incomes", "incomes.php");
$router->get("/expenses", "expenses.php");

$router->post("/expenses","transaction/store.php");
$router->delete("/expenses", "transaction/destroy.php");

$router->get("/login", "session/create.php");
$router->post("/session", "session/store.php");
$router->delete("/session", "session/destroy.php");

$router->get("/register","registration/create.php");
