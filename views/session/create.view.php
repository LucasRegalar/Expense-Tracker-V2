<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<section id="expenses-sctn">
    <div class="card pt-5">
        <div class="inner-card inner-card--tight">
            <div class="flex jc-center mb-4">
                <h1>Enter your account data</h1>
            </div>

            <div class="card--split-2-clmns">
                <form class="form" action="/session" method="POST">
                    <label for="email" type="email" hidden>E-Mail</label>
                    <input name="email" class="inner-card--outer-card-styling" type="email" placeholder="E-Mail"
                        autocomplete="off" required
                        <?= isset($_SESSION["_flash"]["old"]["email"]) ? "value='{$_SESSION['_flash']['old']['email']}'" : '' ?>
                        />
                    <label for="password" hidden> Password</label>
                    <input name="password" class="inner-card--outer-card-styling mb-2" type="password"
                        placeholder="Password" required />
                        <p class="red-text small" >
                            <?= $errors["body"] ?? "" ?>
                        </p>
                        <button class="add-btn add-btn--green margin-inline-auto" style="margin-top: 2rem" type="submit">Log In</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php") ?>