<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|ico|txt)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    include __DIR__ . '/index.php';
}