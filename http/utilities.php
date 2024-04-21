<?php

function calcTotalAmount(array $transactions) {
    $total = 0;
    foreach ($transactions as $trans) {
        $total += floatval($trans["amount"]);
    }
    return number_format($total,2,".","");
}

function sortByDate(array $transactions) {
    usort($transactions, function($a, $b) {
        return strtotime($b["date"]) - strtotime($a["date"]);
    });

    return $transactions;
}