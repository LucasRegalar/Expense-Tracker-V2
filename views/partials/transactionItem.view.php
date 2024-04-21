<?php
use http\html\Icons;

$dotColor = $trans["type"] === "expense" ? "dot--red" : "dot--green";
$iconHTML = (new Icons)->find($trans["category"]);
echo "
    <div class='inner-card inner-card__transaction-item-container'>
                <div class='inner-card__transaction-item-container__icon-container'>
                    $iconHTML
                    <div class='inner-card__transaction-item-container__icon-container__inner-container'>
                        <div class='inner-card__transaction-list__item-heading'>
                            <div class='dot $dotColor'></div>
                            <p>{$trans['title']}</p>
                        </div>
                        <div>
                            <p>{$trans['amount']}€</p>
                            <span>
                                <i class='fa-regular fa-calendar i--less-margin'></i>
                                <p>{$trans['date']}</p>
                            </span>
                            <span>
                                <i class='fa-regular fa-comment i--less-margin'></i>
                                <p>{$trans['description']}</p>
                            </span>
                        </div>
                    </div>
                </div>
                
                <form action='/expenses' method='POST' class='delete-form'>
                    <input type='hidden' name='_method' value='DELETE'>
                    <input type='hidden' name='id' value='{$trans['id']}'>
                    <button class='delete-btn' id='delete-btn-{$trans['id']}'>
                        <i class='fa-regular fa-trash-can'></i>
                    </button>
                </form>

            </div>
    ";






