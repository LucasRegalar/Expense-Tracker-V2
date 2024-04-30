<?php

use core\App;
use core\Database;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve(Database::class);

$results = $db->query("SELECT * from transactions where user_id = :id ORDER BY date DESC" ,
[
    "id" => $userId,
    ])->get();

$totalBalance = calcTotalBalance($results);


view("transactions.view.php", [
    "results" => $results,
    "totalBalance" => $totalBalance
]);