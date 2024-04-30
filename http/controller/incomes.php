<?php

use core\App;
use core\Database;
use core\Session;

$userId = $_SESSION["user"]["id"] ?? null;


$db = App::resolve(Database::class);

$results = $db->query("SELECT * from transactions where user_id = :id and type = :type ORDER BY date DESC" ,
[
    "id" => $userId,
    "type" => "income"
    ])->get();
    
$totalInc = calcTotalAmount($results);


view("incomes.view.php", [
    "results" => $results,
    "errors" => Session::get("errors"),
    "totalInc" => $totalInc,
]);