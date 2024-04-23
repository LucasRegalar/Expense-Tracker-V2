<?php

use core\App;
use core\Database;


$userId = $_SESSION["user"]["id"] ?? null;
$transId = $_POST["id"];
$type = $_POST["type"];
$db = App::resolve(Database::class);


$task = $db->query("SELECT * from transactions WHERE id = :id", [
    "id" => $transId,
])->findOrFail();


if(!($task["user_id"] == $userId)) {
    abort(403);
}


$db->query("DELETE FROM transactions WHERE `id` = :id", [
    "id"=> $transId,
]);


redirect("/{$type}s");