<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<section id="incomes-sctn">
    <div class="card">
        <div>
            <h2>Incomes</h2>
            <div class="inner-card inner-card__big-header">
                <h2>Total Income:</h2>
                <p class="green-text" id="total-income">0€</p>
            </div>

            <div class="card--split-2-clmns">
                <form class="form" id="income-form">
                    <label for="income-title" hidden>Salary Title</label>
                    <input id="income-title" class="inner-card--outer-card-styling salary-title" type="text"
                        placeholder="Salary Title" required minlength="5" autocomplete="off" />
                    <label for="income-amount" hidden>Salary Amount</label>
                    <input id="income-amount" class="inner-card--outer-card-styling salary-amount" type="number"
                        placeholder="Salary Amount" required min="0" step="0.1" />
                    <label for="income-date" hidden>Salary Date (DD-MM-YYYY)</label>
                    <input id="income-date" class="inner-card--outer-card-styling salary-date" type="text"
                        placeholder="Enter A Date" required max="9999-12-31" onfocus="(this.type='date')"
                        onblur="(this.value == '' ? this.type='text' : this.type='date')" />
                    <div class="align-right">
                        <label for="income-option" hidden>Salary Option</label>
                        <select id="income-option" class="inner-card--outer-card-styling salary-option" required>
                            <option value="" selected disabled hidden>Select Option</option>
                            <option value="salary">Salary</option>
                            <option value="freelancing">Freelancing</option>
                            <option value="investments">Investment</option>
                            <option value="stocks">Stocks</option>
                            <option value="bitcoin">Bitcoin</option>
                            <option value="bank-transfer">Bank Transfer</option>
                            <option value="youtube">Youtube</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <label for="income-description" hidden>Salary Description</label>
                    <textarea id="income-description" class="inner-card--outer-card-styling"
                        placeholder="Add a Referenz" required minlength="5" maxlength="30" rows="4"></textarea>
                    <button class="add-btn" type="submit" id="add-income-btn">Add Income </button>
                </form>

                <div class="inner-card__transaction-list" id="incomes-list">



                    <div class="inner-card inner-card__transaction-item-container">
                        <div class="inner-card__transaction-item-container__icon-container">
                            <i class="fa-solid fa-sack-dollar i--big"></i>
                            <div class="inner-card__transaction-item-container__icon-container__inner-container">
                                <div class="inner-card__transaction-list__item-heading">
                                    <div class="dot dot--green"></div>
                                    <p>From FreeLance</p>
                                </div>
                                <div>
                                    <p>1300€</p>
                                    <p>25/02/2023</p>
                                    <p>From freelance works.</p>
                                </div>
                            </div>
                        </div>
                        <button class="delete-btn">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>





                    <div class="inner-card inner-card__transaction-item-container">
                        <div>
                            <div>
                                <div class="inner-card__transaction-list__item-heading">
                                    <div class="dot dot--green"></div>
                                    <p>Shopify</p>
                                </div>
                                <div>
                                    <p>8000€</p>
                                    <p>21/02/2023</p>
                                    <p>My January Shopify.</p>
                                </div>
                            </div>
                        </div>
                        <button class="delete-btn">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>



                    </div>
                    <div class="inner-card inner-card__transaction-item-container">
                        <div>
                            <div>
                                <div class="inner-card__transaction-list__item-heading">
                                    <div class="dot dot--green"></div>
                                    <p>Youtube Adense</p>
                                </div>
                                <div>
                                    <p>1200€</p>
                                    <p>18/01/2023</p>
                                    <p>My January youtube earnings.</p>
                                </div>
                            </div>
                        </div>
                        <button class="delete-btn">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>



                    </div>
                    <div class="inner-card inner-card__transaction-item-container">
                        <div>
                            <div>
                                <div class="inner-card__transaction-list__item-heading">
                                    <div class="dot dot--green"></div>
                                    <p>Developer Salary</p>
                                </div>
                                <div>
                                    <p>6000€</p>
                                    <p>26/01/2023</p>
                                    <p>My January developer salary.</p>
                                </div>
                            </div>
                        </div>
                        <button class="delete-btn">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>



                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php") ?>