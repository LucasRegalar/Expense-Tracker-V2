<?php

$dotColor = $trans["type"] === "expense" ? "dot--red" : "dot--green";
$plusOrMinus = $trans["type"] === "expense" ? "-" : "+";
$textColor = $trans["type"] === "expense" ? "red-text" : "green-text";

echo
    "<div class='inner-card inner-card__transaction-item-container'>
        <div>
            <div>
                <div class='inner-card__transaction-list__item-heading'>
                    <div class='dot $dotColor'></div>
                    <p>$trans[title]</p>
                </div>
                <div>
                    <p>$trans[date]</p>
                    <p>$trans[description]</p>
                </div>
            </div>
        </div>
        <p class='$textColor font-size-500'>$plusOrMinus$trans[amount]€</p>
    </div>";