<?php
$title = 'Register'; ?>
<section class="register-form">
    <div class="page-container">
        <form action="/register" method="POST" class="reg-form-sequence">
            <div class="panel-1">
                <h3>Hello, how should we call you?</h3>
                <input type="text" name="name" id="form_user_name" placeholder="Enter your name here...">
                <button type="button" class="btn-primary">NEXT</button>
            </div>
            <div class="panel-2">
                <h3>Account Details</h3>
                <p>Help us out by filling in some other requirements to get you started!</p>
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
                        <label for="form_user_confirm_password">Confirm Password:</label>
                        <input type="password" name="password" id="form_user_confirm_password">
                    </li>
                    <li>
                        <input type="submit" value="SUBMIT" class="btn-primary">
                    </li>
                </ul>
            </div>
        </form>
    </div>
</section>