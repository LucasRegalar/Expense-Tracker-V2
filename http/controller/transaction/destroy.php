<?php

use core\App;
use core\Database;

//hardcode user for now
$userId = 1;

$transId = $_POST["id"];
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


redirect(("/expenses"));