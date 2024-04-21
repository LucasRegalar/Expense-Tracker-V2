<?php

namespace http\html;
class Icons {

    protected $icons = [
        //icome-categories
        "salary" => '<i class="fa-solid fa-sack-dollar i--big"></i>',
        "freelancing" => '<i class="fa-solid fa-hand-holding-dollar i--big"></i>',
        "investments" => '<i class="fa-solid fa-piggy-bank i--big"></i>',
        "stocks" => '<i class="fa-solid fa-money-bill-trend-up i--big"></i>',
        "bitcoin" => '<i class="fa-brands fa-btc i--big"></i>',
        "bank-transfer" => '<i class="fa-solid fa-money-check-dollar i--big"></i>',
        "youtube" => '<i class="fa-brands fa-youtube i--big"></i>',
        "other" => '<i class="fa-solid fa-coins i--big"></i>',
        //expense-categories
        "education" => '<i class="fa-solid fa-user-graduate i--big"></i>',
        "groceries" => '<i class="fa-solid fa-cart-shopping i--big"></i>',
        "health" => '<i class="fa-solid fa-notes-medical i--big"></i>',
        "subsribtions" => '<i class="fa-solid fa-circle-dollar-to-slot i--big"></i>',
        "takeaways" => '<i class="fa-solid fa-circle-dollar-to-slot i--big"></i>',
        "clothings" => '<i class="fa-solid fa-shirt i--big"></i>',
        "travelling" => '<i class="fa-solid fa-plane-departure i--big"></i>',
        //default
        "error" => '<i class="fa-solid fa-notdef i--big i--big"></i>',
    ];

    public function find($key) {
        if (array_key_exists($key, $this->icons)) {
            return $this->icons[$key];
        } else {
            return $this->icons["error"];
        }
    }
    
}