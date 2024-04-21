<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

            
                
                    <section id="dashboard-sctn">
                        <div class="card card--split-2-clmns">
                            <div class="card--split-2-clmns__left-clmn">
                                <h2>All Transactions</h2>
                                <div class="inner-card inner-card__chart">
                                    <canvas id="dashboard-chart"></canvas>
                                </div>
                                <div class="inner-card__dashboard-total-card-flex-container">
                                    <div class="inner-card inner-card__dashboard-total-card">
                                        <h3>Total Income</h3>
                                        <p class="inner-card__dashboard-total-card__big-font" id="dashboard-total-income">0€</p>
                                    </div>
                                    <div class="inner-card inner-card__dashboard-total-card">
                                        <h3>Total Expenses</h3>
                                        <p class="inner-card__dashboard-total-card__big-font" id="dashboard-total-expenses">0€</p>
                                    </div>

                                        <div class="inner-card inner-card__dashboard-total-card inner-card__dashboard-total-card--centered-text">
                                            <h3>Total Balance</h3>
                                            <p class="inner-card__dashboard-total-card__big-font green-text" id="dashboard-total-balance">0€</p>
                                        </div>

                                </div>
                            </div>
                            <div class="card--split-2-clmns__right-clmn">
                                <div>
                                    <h3>Recent History</h3>
                                    <div id="dashboard-recent-history-list">
                                    </div>
                                </div>
                                <div>
                                    <div class="card__min-max-heading">
                                        <p>Min</p>
                                        <h3>Salary</h3>
                                        <p>Max</p>
                                    </div>
                                    <div class="inner-card inner-card__salary-expense-item">
                                        <p id="dashboard-min-salary">0€</p>
                                        <p id="dashboard-max-salary">0€</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="card__min-max-heading">
                                        <p>Min</p>
                                        <h3>Expense</h3>
                                        <p>Max</p>
                                    </div>
                                    <div class="inner-card inner-card__salary-expense-item">
                                        <p id="dashboard-min-expense">0€</p>
                                        <p id="dashboard-max-expense">0€</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                
                
<?php require base_path("views/partials/footer.php") ?>
