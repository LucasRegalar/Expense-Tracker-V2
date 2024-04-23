<?php

$textColor = $trans["type"] === "expense" ? "red-text" : "green-text";
$plusOrMinus = $trans["type"] === "expense" ? "-" : "+";

echo "
        <div class='inner-card inner-card__recent-history-item $textColor'>
            <p>$trans[title]</p>
            <p>$plusOrMinus$trans[amount]€</p>
        </div>
";