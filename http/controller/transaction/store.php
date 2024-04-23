<?php

use core\App;
use core\Database;
use http\forms\TransForm;
use core\Session;

$db = App::resolve(Database::class);
$form = new TransForm();


//Rose fragen, ob sicher ?
$title = $_POST["title"];
$amount = $_POST["amount"];
$date = $_POST["date"];
$category = $_POST["category"];
$description = $_POST["description"];
$type = $_POST["type"];
$userId = $_SESSION["user"]["id"] ?? null;


if(!$form->validate($title, $amount, $date, $category, $description)) {
        Session::flash("errors", $form->getErrors());
        Session::flash("old", [
            "title"=> $title,
            "amount" => $amount,
            "date" => $date,
            "category"=> $category,
            "description"=> $description,
        ]);
        redirect("/{$type}s");
}

$db->query("
INSERT INTO `expensetracker`.`transactions` (`date`, `amount`, `title`, `type`, `description`, `user_id`, `category`) 
VALUES (:date, :amount, :title, :type, :description, :userId, :category)", [
    "date" => $date,
    "amount" => $amount,
    "title" => $title,
    "type" => $type,
    "description" => $description,
    "userId" => $userId,
    "category" => $category,
]);

redirect("/{$type}s");