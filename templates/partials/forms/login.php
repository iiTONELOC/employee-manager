<?php
  // our verification logic
    include_once('lib/utils/verify-login.php');
?>

<section class="login">
    <h1 class="mb-5">Login</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username">
        <?php $usernameErr && displayError($usernameErr)?>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <?php $passwordErr && displayError($passwordErr)?>
    </div>

    <input type="submit" class="login-btn mt-5" value="Login">
    </form>
</section>
