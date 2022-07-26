<?php
// session_start();
// $base_url = "http://localhost/php/todo-list-pra/";
$conn = mysqli_connect('127.0.0.1', 'root', '', 'app_todo-list');
// cek koneksi db
if (!$conn) {
    echo "<script>
        alert(\"Database Tidak Terkoneksi\");
    </script>";
    exit();
}
include 'flash.php';