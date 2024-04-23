<div class="card card__side-navigation-card">
    <div>
        <div class="profile-information">
            <?php if ($_SESSION["logged_in"] ?? false): ?>
                <img class="profile-information__profile-image" src="Images/Polish_20230128_123908160.jpg"
                    alt="profil-picture" />
                <div class="profile-information__name">
                    <h3><?= $_SESSION["user"]["name"] ?? "Guest" ?></h3>
                    <p>Your Money</p>
                </div>
            <?php endif; ?>
        </div>
        <nav id="navigation">
            <ul>
                <?php if ($_SESSION["logged_in"] ?? false): ?>
                    <li>
                        <a href="/" class="button--styleless button--nav">
                            <i class="fa-solid fa-chart-line"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/transactions" class="button--styleless button--nav">
                            <i class="fa-solid fa-credit-card"></i>
                            View Transactions
                        </a>
                    </li>
                    <li>
                        <a href="/incomes" class="button--styleless button--nav">
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                            Incomes
                        </a>
                    </li>
                    <li>
                        <a href="/expenses" class="button--styleless button--nav">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            Expenses
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <?php if ($_SESSION["logged_in"] ?? false): ?>
        <form method="POST" action="/session">
            <input type="hidden" name="_method" value="DELETE">
            <button id="sign-out-btn" class="button--styleless"><i class="fa-solid fa-right-from-bracket"></i>Sign
                Out</button>
        </form>
    <?php endif; ?>
    <?php if (empty($_SESSION["logged_in"]) ?? false): ?>
        <ul>
            <li>
                <a href="/login" class="button--styleless button--nav">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Log In
                </a>
            </li>
            <li>
                <a href="/register" class="button--styleless button--nav">
                    <i class="fa-solid fa-user-plus"></i>
                    Register
                </a>
            </li>
        </ul>
        <?php endif; ?>
</div>

<div class="sections-contaner">