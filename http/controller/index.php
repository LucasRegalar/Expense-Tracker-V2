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

$totalBalance = calcTotalBalance($results);
$totalInc = calcTotalAmount($incomes);
$totalExp = calcTotalAmount($expenses);

$minInc = minimumAmount($incomes);
$maxInc = maximumAmount($incomes);

$minExp = minimumAmount($expenses);
$maxExp = maximumAmount($expenses);


view("index.view.php", [
    "results" => $results,
    "expenses" => $expenses,
    "incomes" => $incomes,
    "totalBalance" => $totalBalance,
    "totalInc" => $totalInc,
    "totalExp" => $totalExp,
    "minInc" => $minInc,
    "maxInc" => $maxInc,
    "minExp" => $minExp,
    "maxExp" => $maxExp,
]);