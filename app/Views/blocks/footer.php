<?php if (!(strtok($_SERVER['REQUEST_URI'], '?') === '/login')
        && !(strtok($_SERVER['REQUEST_URI'], '?') === '/register')) { ?>
<footer>
    THE FOOTER
</footer>
<?php } ?>