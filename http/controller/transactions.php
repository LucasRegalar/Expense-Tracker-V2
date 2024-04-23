<?php

use core\App;
use core\Database;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve(Database::class);

$results = $db->query("SELECT * from transactions where user_id = :id" ,
[
    "id" => $userId,
    ])->get();

$results = sortByDate($results);
$totalBalance = calcTotalBalance($results);


view("transactions.view.php", [
    "results" => $results,
    "totalBalance" => $totalBalance
]);