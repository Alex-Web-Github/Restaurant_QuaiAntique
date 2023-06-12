<?php
function is_admin() {
    return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
}
