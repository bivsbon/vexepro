<?php
if (!array_key_exists('name', $_SESSION)) {
    require_once 'login_form.php';
} else {
    print '<p>Welcome, '.$_SESSION['name'].'</p><br>';
    print '<a href="/vexepro/user/logout">Log out</a>';
}
?>
<hr>
<a href="/vexepro/util/tripseeding">SEED</a>