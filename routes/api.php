<?php

// TODO: API auch normal mit Middleware oder?

$router->get("/api/transactions", "transaction/api/all.php")->only("auth");
$router->post("/api/register","registration/api/store.php")->only("guest");

