<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>


<section id="transactions-sctn">
    <div class="card">
        <div>
            <h2>Transaction Overview</h2>
            <div class="inner-card inner-card__big-header">
                <h2>Total Balance:</h2>
                <p class="green-text" id="overview-total-balance">0€</p>
            </div>
            <div class="inner-card__transaction-overview-list" id="transaction-overview-list">
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php") ?>