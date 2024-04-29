<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<section id="expenses-sctn">
    <div class="card">
        <div>
            <h2>Expenses</h2>
            <div class="inner-card inner-card__big-header">
                <h2>Total Expenses:</h2>
                <p class="red-text" id="total-expenses">-<?= $totalExp ?>€</p>
            </div>

            <div class="card--split-2-clmns">
                <form class="form" id="expense-form" action="/expenses" method="POST">
                    <input type="hidden" name="type" value="expense">
                    <label for="title" hidden>Expense Title</label>
                    <input name="title" class="inner-card--outer-card-styling" type="text" placeholder="Expense Title"
                        autocomplete="off" minlength="1" required
                        <?= isset($_SESSION["_flash"]["old"]["title"]) ? "value='{$_SESSION['_flash']['old']['title']}'" : '' ?>
                        />
                    <label for="amount" hidden>Expense Amount</label>
                    <input name="amount" class="inner-card--outer-card-styling" type="number"
                        placeholder="Expense Amount" required min="0" step="0.01" 
                        <?= isset($_SESSION["_flash"]["old"]["amount"]) ? "value='{$_SESSION['_flash']['old']['amount']}'" : '' ?>
                        />
                    <label for="date" hidden>Expense Date (DD-MM-YYYY)</label>
                    <input name="date" class="inner-card--outer-card-styling" type="text" placeholder="Enter A Date"
                        required max="9999-12-31" onfocus="(this.type='date')"
                        onblur="(this.value == '' ? this.type='text' : this.type='date')" 
                        <?= isset($_SESSION["_flash"]["old"]["date"]) ? "value='{$_SESSION['_flash']['old']['date']}'" : '' ?>
                        />
                    <div class="align-right">
                        <label for="category" hidden>Salary Option</label>
                        <select name="category" class="inner-card--outer-card-styling expense-option" required>
                            <option value="" selected disabled hidden>Select Option</option>
                            <option value="education"
                            <?= old("category") === "education" ? "selected" : "" ?>
                            >Education</option>
                            <option value="groceries"
                            <?= old("category") === "groceries" ? "selected" : "" ?>
                            >Groceries</option>
                            <option value="health"
                            <?= old("category") === "health" ? "selected" : "" ?>
                            >Health</option>
                            <option value="subsriptions"
                            <?= old("category") === "subscriptions" ? "selected" : "" ?>
                            >Subsribtions</option>
                            <option value="takeaways"
                            <?= old("category") === "takeaways" ? "selected" : "" ?>
                            >Takeaways</option>
                            <option value="clothings"
                            <?= old("category") === "clothings" ? "selected" : "" ?>
                            >Clothings</option>
                            <option value="travelling"
                            <?= old("category") === "travelling" ? "selected" : "" ?>
                            >Travelling</option>
                            <option value="other"
                            <?= old("category") === "other" ? "selected" : "" ?>
                            >Other</option>
                        </select>
                    </div>
                    <label for="description" hidden>Expense Description</label>
                    <textarea name="description" class="inner-card--outer-card-styling" placeholder="Add a Referenz"
                        required minlength="1" maxlength="30" rows="4"><?= isset($_SESSION["_flash"]["old"]["description"]) ? "{$_SESSION['_flash']['old']['description']}" : '' ?></textarea>
                    <button class="add-btn" type="submit" id="add-expense-btn">Add Expense </button>
                    <p class="red-text small" style="margin-top: 1rem">
                        <?= $errors["body"] ?? "" ?>
                    </p>
                </form>

                <div class="inner-card__transaction-list" id="expenses-list">
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