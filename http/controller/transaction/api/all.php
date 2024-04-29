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
$expenses = filter($results, "expense");
$incomes = filter($results, "income");

$data = [
    "results" => $results,
    "expenses" => $expenses,
    "incomes" => $incomes
];

header("Content-Type: application/json");
echo json_encode($data);