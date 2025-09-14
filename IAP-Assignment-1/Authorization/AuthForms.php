<?php
class AuthForms {

    // Registration form
    public function registerForm() {
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="p-3 border rounded">
            <fieldset>
                <legend class="fw-bold mb-3">Create Account</legend>

                <div class="mb-3">
                    <label for="reg_fullname" class="form-label">Full Name</label>
                    <input type="text" id="reg_fullname" name="user_fullname" class="form-control" placeholder="Your Name Here" required>
                </div>

                <div class="mb-3">
                    <label for="reg_email" class="form-label">Email</label>
                    <input type="email" id="reg_email" name="user_email" class="form-control" placeholder="example@domain.com" required>
                </div>

                <div class="mb-3">
                    <label for="reg_pass" class="form-label">Password</label>
                    <input type="password" id="reg_pass" name="user_pass" class="form-control" placeholder="Create a secure password" required>
                </div>

                <?php $this->createButton('Register', 'btn_register'); ?>

                <div class="mt-2">
                    <small>Are you a member? <a href="login.php">Login!</a></small>
                    
            </fieldset>
        </form>
        <?php
    }

    // Login form
    public function loginForm() {
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="p-3 border rounded">
            <fieldset>
                <legend class="fw-bold mb-3">Sign In</legend>

                <div class="mb-3">
                    <label for="login_email" class="form-label">Email Address</label>
                    <input type="email" id="login_email" name="login_email" class="form-control" placeholder="you@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="login_pass" class="form-label">Password</label>
                    <input type="password" id="login_pass" name="login_pass" class="form-control" placeholder="Enter password" required>
                </div>

                <?php $this->createButton('Login', 'btn_login'); ?>

                <div class="mt-2">
                    <small>Don't have an account? <a href="register.php">Create one here</a></small>
                    
                </div>
            </fieldset>
        </form>
        <?php
    }

    // Button creator
    private function createButton($text, $fieldName) {
        echo "<button type='submit' name='" . htmlspecialchars($fieldName) . "' class='btn btn-success'>" . htmlspecialchars($text) . "</button>";
    }
}
?>