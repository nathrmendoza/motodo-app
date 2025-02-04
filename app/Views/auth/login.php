<?php
$title = 'Login'; ?>
<section class="login-form">
    <div class="page-container">
        <form action="/login" method="POST" class="login-form-panel">
            <h3>Welcome back!</h3>
            <p>Please enter your credentials below.</p>
            <ul>
                <li>
                    <label for="form_user_email">Email Address:</label>
                    <input type="email" name="email" id="form_user_email">
                </li>
                <li>
                    <label for="form_user_password">Password:</label>
                    <input type="password" name="password" id="form_user_password">
                </li>
                <li>
                    <input type="submit" value="SUBMIT" class="btn-primary">
                </li>
            </ul>
        </form>
    </div>
</section>