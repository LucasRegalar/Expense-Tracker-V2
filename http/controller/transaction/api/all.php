<?php

use core\App;
use core\Database;
use core\Responses;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve(Database::class);

$results = $db->query("SELECT * from transactions where user_id = :id ORDER BY date DESC" ,
[
    "id" => $userId,
    ])->get();

$expenses = filter($results, "expense");
$incomes = filter($results, "income");

$data = [
    "results" => $results,
    "expenses" => $expenses,
    "incomes" => $incomes
];

header("Content-Type: application/json");
http_response_code(Responses::OK->value);
echo json_encode($data);