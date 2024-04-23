<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<section id="incomes-sctn">
    <div class="card">
        <div>
            <h2>Incomes</h2>
            <div class="inner-card inner-card__big-header">
                <h2>Total Income:</h2>
                <p class="green-text" id="total-income"><?= $totalInc ?>€</p>
            </div>

            <div class="card--split-2-clmns">
                <form class="form" id="income-form" action="/incomes" method="POST">
                    <input type="hidden" name="type" value="income">
                    <label for="title" hidden>Salary Title</label>
                    <input name="title" class="inner-card--outer-card-styling salary-title" type="text" minlength="1"
                        placeholder="Salary Title" autocomplete="off"
                    <?= isset($_SESSION["_flash"]["old"]["title"]) ? "value='{$_SESSION['_flash']['old']['title']}'" : '' ?>
                    />
                    <label for="amount" hidden>Salary Amount</label>
                    <input name="amount" class="inner-card--outer-card-styling salary-amount" type="number"
                        placeholder="Salary Amount" required min="0" step="0.01" 
                        <?= isset($_SESSION["_flash"]["old"]["amount"]) ? "value='{$_SESSION['_flash']['old']['amount']}'" : '' ?>
                        />
                    <label for="date" hidden>Salary Date (DD-MM-YYYY)</label>
                    <input name="date" class="inner-card--outer-card-styling salary-date" type="text"
                        placeholder="Enter A Date" required max="9999-12-31" onfocus="(this.type='date')"
                        onblur="(this.value == '' ? this.type='text' : this.type='date')" 
                        <?= isset($_SESSION["_flash"]["old"]["date"]) ? "value='{$_SESSION['_flash']['old']['date']}'" : '' ?>
                        />
                    <div class="align-right">
                        <label for="option" hidden>Salary Option</label>
                        <select name="category" class="inner-card--outer-card-styling salary-option" required>
                            <option value="" selected disabled hidden>Select Option</option>
                            <!-- ugly as hell but a foreach loop didnt work -->
                            <option value="salary"
                            <?= old("category") === "salary" ? "selected" : "" ?>
                            >Salary</option>
                            <option value="freelancing"
                            <?= old("category") === "freelancing" ? "selected" : "" ?>
                            >Freelancing</option>
                            <option value="investments"
                            <?= old("category") === "investments" ? "selected" : "" ?>
                            >Investment</option>
                            <option value="stocks"
                            <?= old("category") === "stocks" ? "selected" : "" ?>
                            >Stocks</option>
                            <option value="bitcoin"
                            <?= old("category") === "bitcoin" ? "selected" : "" ?>
                            >Bitcoin</option>
                            <option value="bank-transfer"
                            <?= old("category") === "bank-transfer" ? "selected" : "" ?>
                            >Bank Transfer</option>
                            <option value="youtube"
                            <?= old("category") === "youtube" ? "selected" : "" ?>
                            >Youtube</option>
                            <option value="other"
                            <?= old("category") === "other" ? "selected" : "" ?>
                            >Other</option>
                        </select>
                    </div>
                    <label for="description" hidden>Salary Description</label>
                    <textarea name="description" class="inner-card--outer-card-styling"
                        placeholder="Add a Referenz" required minlength="1" maxlength="30" rows="4"><?= isset($_SESSION["_flash"]["old"]["description"]) ? "{$_SESSION['_flash']['old']['description']}" : '' ?></textarea>
                    <button class="add-btn" type="submit" id="add-income-btn">Add Income </button>
                    <p class="red-text small" style="margin-top: 1rem">
                        <?= $errors["body"] ?? "" ?>
                    </p>
                </form>

                <div class="inner-card__transaction-list" id="incomes-list">
                    <?php
                    foreach ($attributes["results"] as $trans) {
                        require base_path("views/partials/list_items/transactionItem.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php") ?>