<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");

$totalBalanceColor = $totalBalance < 0 ? "red-text" : "green-text";
$totalPlusOrMinus = $totalBalance < 0 ? "" : "+";

?>


<section id="dashboard-sctn">
    <div class="card card--split-2-clmns">
        <div class="card--split-2-clmns__left-clmn">
            <h2>All Transactions</h2>
            <div id="chart-container" class="inner-card inner-card__chart">
                <canvas id="dashboard-chart"></canvas>
            </div>
            <div class="inner-card__dashboard-total-card-flex-container">
                <div class="inner-card inner-card__dashboard-total-card">
                    <h3>Total Income</h3>
                    <p class="inner-card__dashboard-total-card__big-font" id="dashboard-total-income">
                        <?= $totalInc ?? 0 ?>€
                    </p>
                </div>
                <div class="inner-card inner-card__dashboard-total-card">
                    <h3>Total Expenses</h3>
                    <p class="inner-card__dashboard-total-card__big-font" id="dashboard-total-expenses">
                        -<?= $totalExp ?? 0 ?>€</p>
                </div>

                <div
                    class="inner-card inner-card__dashboard-total-card inner-card__dashboard-total-card--centered-text">
                    <h3>Total Balance</h3>
                    <p class="inner-card__dashboard-total-card__big-font <?= $totalBalanceColor ?>"
                        id="dashboard-total-balance"><?= $totalPlusOrMinus . $attributes["totalBalance"] ?>€</p>
                </div>

            </div>
        </div>
        <div class="card--split-2-clmns__right-clmn">
            <div class="dashboard-recent-history-list-container">
                <h3>Recent History</h3>
                <div id="dashboard-recent-history-list">
                    <?php
                    $count = 0;
                    foreach ($attributes["results"] as $trans) {
                        require base_path("views/partials/list_items/recentItem.php");

                        $count++;

                        if ($count >= 3) {
                            break;
                        }

                    }
                    ?>
                </div>
            </div>
            <div>
                <div class="card__min-max-heading">
                    <p>Min</p>
                    <h3>Salary</h3>
                    <p>Max</p>
                </div>
                <div class="inner-card inner-card__salary-expense-item">
                    <p id="dashboard-min-salary"><?= $minInc ?? 0 ?>€</p>
                    <p id="dashboard-max-salary"><?= $maxInc ?? 0 ?>€</p>
                </div>
            </div>
            <div>
                <div class="card__min-max-heading">
                    <p>Min</p>
                    <h3>Expense</h3>
                    <p>Max</p>
                </div>
                <div class="inner-card inner-card__salary-expense-item">
                    <p id="dashboard-min-expense"><?= $minExp ?? 0 ?>€</p>
                    <p id="dashboard-max-expense"><?= $maxExp ?? 0 ?>€</p>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require base_path("views/partials/footer.php") ?>
<?php /* require base_path("views/partials/chart.php") */ ?>
<script src="assets/js/chart.js"></script>