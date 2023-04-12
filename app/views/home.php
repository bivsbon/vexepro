<?php
if (!array_key_exists('userObj', $_SESSION)) {
    require_once 'login_form.php';
} else {
    print '<p>Welcome, '.$_SESSION['userObj']->name.'</p><br>';
    print '<a href="/vexepro/user/logout">Log out</a>';
}
?>
<hr>
<a href="/vexepro/util/tripseeding">SEED</a>

<form action="home/add">
    <label>
        <input type="text" name="name">
        <input type="submit">
    </label>
</form>
<br>

<?php
foreach ($data as $province) {
    echo $province->province.'<br>';
}