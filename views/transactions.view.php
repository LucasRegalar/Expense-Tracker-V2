<?php 
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");

$totalBalanceColor = $totalBalance < 0 ? "red-text" : "green-text";
$totalPlusOrMinus = $totalBalance < 0 ? "" : "+";

?>


<section id="transactions-sctn">
    <div class="card">
        <div>
            <h2>Transaction Overview</h2>
            <div class="inner-card inner-card__big-header">
                <h2>Total Balance:</h2>
                <p class="<?= $totalBalanceColor ?>" id="overview-total-balance"><?= $totalPlusOrMinus . $attributes["totalBalance"] ?>€</p>
            </div>
            <div class="inner-card__transaction-overview-list" id="transaction-overview-list">
            <?php
                    foreach ($attributes["results"] as $trans) {
                        require base_path("views/partials/list_items/transOverviewItem.php");
                    }
                    ?>
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php") ?>