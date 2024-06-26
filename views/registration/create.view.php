<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>

<section id="expenses-sctn">
    <div class="card pt-5">
        <div class="inner-card inner-card--tight">
            <div class="flex jc-center mb-4">
                <h1>Register a new account</h1>
            </div>

            <div class="card--split-2-clmns">
                <form id="form" class="form">
                    <label for="email" hidden >E-Mail</label>
                    <input value="lucas@gmail.com" name="email" type="email" class="inner-card--outer-card-styling" placeholder="E-Mail" autocomplete="off"
                        required <?= isset($_SESSION["_flash"]["old"]["email"]) ? "value='{$_SESSION['_flash']['old']['email']}'" : '' ?> />
                    <label for="username" hidden>Username</label>
                    <input value="testvalue" name="username" type="text" class="inner-card--outer-card-styling" placeholder="Username"
                        required <?= isset($_SESSION["_flash"]["old"]["username"]) ? "value='{$_SESSION['_flash']['old']['username']}'" : '' ?> />
                    <label for="password" hidden> Password</label>
                    <input value="testvalue.de" name="password" class="inner-card--outer-card-styling mb-2" type="password"
                        placeholder="Password" required />
                    <p class="red-text small">
                        <?= $errors["body"] ?? "" ?>
                    </p>
                    <button id="register-btn" class="add-btn add-btn--green margin-inline-auto" style="margin-top: 2rem">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php") ?>
<script src="assets/js/registration/create.js"></script>