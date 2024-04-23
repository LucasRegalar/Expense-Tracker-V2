<?php

use core\App;
use core\Database;
use core\Session;

//ist das nicht easy hackable? Oder nicht wegen dem Session file?
$userId = $_SESSION["user"]["id"] ?? null;



$db = App::resolve(Database::class);

$results = $db->query("SELECT * from transactions where user_id = :id and type = :type" ,
[
    "id" => $userId,
    "type" => "expense"
    ])->get();

$results = sortByDate($results);
$totalExp = calcTotalAmount($results);


view("expenses.view.php", [
    "results" => $results,
    "errors" => Session::get("errors"),
    "totalExp" => $totalExp,
]);