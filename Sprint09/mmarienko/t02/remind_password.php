<?php

$user = $users->find($_POST['login']);

if (mail($user['email'], "Password reminder", "Your password: $user[password]")) {
   print_r('success');
} else {
   print_r('error');
}