<?php

function calcTotalAmount(array $transactions) {
    $total = 0;
    foreach ($transactions as $trans) {
        $total += floatval($trans["amount"]);
    }
    return number_format($total,2,".","");
}

function calcTotalBalance(array $transactions) {
    $totalExp = 0;
    $totalInc = 0;

    $totalExp = calcTotalAmount(filter($transactions, "expense"));
    $totalInc = calcTotalAmount(filter($transactions, "income"));

    return $totalInc - $totalExp;

}

function sortByDate(array $transactions) {
    usort($transactions, function($a, $b) {
        return strtotime($b["date"]) - strtotime($a["date"]);
    });

    return $transactions;
}

function filter(array $transactions, $type) {

    return array_filter($transactions, function($item) use ($type){
        return $item["type"] === $type;
    });
}

function minimum($transactions) {
    return array_reduce($transactions , function($carry, $item) {
        if ($carry === null || $item["amount"] < $carry["amount"]) {
            return $item;
        } 
    
        return $carry;
    });
}


function maximum($transactions) {
    return array_reduce($transactions , function($carry, $item) {
        if ($carry === null || $item["amount"] > $carry["amount"]) {
            return $item;
        } 
    
        return $carry;
    });
}