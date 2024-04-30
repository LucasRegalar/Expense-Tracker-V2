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

    $balance = $totalInc - $totalExp;

    return number_format($balance,2,".","");

}

//not really needed anymore, because it is better to order within the MySQL query
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

function minimumAmount($transactions) {
    
    if(count($transactions) < 1) {
        return 0;
    }
    
    return array_reduce($transactions , function($carry, $item) {
        if ($carry === INF || $item["amount"] < $carry) {
            return $item["amount"];
        } 
    
        return $carry;
    });
}


function maximumAmount($transactions) {
    
    if(count($transactions) < 1) {
        return 0;
    }
    
    return array_reduce($transactions , function($carry, $item) {
        if ($carry === 0 || $item["amount"] > $carry) {
            return $item["amount"];
        } 
    
        return $carry;
    });
}