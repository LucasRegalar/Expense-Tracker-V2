<?php

$router->get("/", "index.php")->only("auth");
$router->get("/transactions", "transactions.php")->only("auth");
$router->get("/incomes", "incomes.php")->only("auth");
$router->get("/expenses", "expenses.php")->only("auth");

$router->post("/expenses","transaction/store.php")->only("auth");
$router->delete("/expenses", "transaction/destroy.php")->only("auth");

$router->post("/incomes","transaction/store.php")->only("auth");
$router->delete("/incomes", "transaction/destroy.php")->only("auth");

$router->get("/login", "session/create.php")->only("guest");
$router->post("/session", "session/store.php")->only("guest");
$router->delete("/session", "session/destroy.php")->only("auth");

$router->get("/register","registration/create.php")->only("guest");
$router->post("/register","registration/store.php")->only("guest");

