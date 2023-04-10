<?php
$str = 'admin';
echo password_hash($str, PASSWORD_BCRYPT);