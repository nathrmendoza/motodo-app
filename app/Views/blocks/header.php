<?php if (strtok($_SERVER['REQUEST_URI'], '?') === '/login' || strtok($_SERVER['REQUEST_URI'], '?') === '/register') { ?>
<header class="auth-header">
    THE AUTH HEADER
</header>
<?php } else {?>
<header class="default-header">
    THE DEFAULT HEADER
</header>
<?php } ?>