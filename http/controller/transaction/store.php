<?php

use core\App;
use core\Database;
use http\forms\addTransForm;
use core\Session;

$db = App::resolve(Database::class);
$Form = new addTransForm();

//Rose fragen, ob sicher ?
$title = $_POST["title"];
$amount = $_POST["amount"];
$date = $_POST["date"];
$category = $_POST["category"];
$description = $_POST["description"];

//Hardcode for now
$userId = 1;

if(!$Form->validate($title, $amount, $date, $category, $description)) {
        Session::flash("errors", $Form->getErrors());
        Session::flash("old", [
            "title"=> $title,
            "amount" => $amount,
            "date" => $date,
            "category"=> $category,
            "description"=> $description,
        ]);
        redirect("/expenses");
}

$db->query("
INSERT INTO `expensetracker`.`transactions` (`date`, `amount`, `title`, `type`, `description`, `user_id`, `category`) 
VALUES (:date, :amount, :title, :type, :description, :userId, :category)", [
    "date" => $date,
    "amount" => $amount,
    "title" => $title,
    "type" => $_SERVER["REQUEST_URI"] === "/expenses" ? "expense" : "income",
    "description" => $description,
    "userId" => $userId,
    "category" => $category,
]);

redirect("/expenses");