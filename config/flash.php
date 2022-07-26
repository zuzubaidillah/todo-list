<?php
// membuat fungsi flash(....didalam kurung namanya arguments)
// ($class="red") ini maksutnya yaitu kita menambahkan nilai default red jika argument ke 3 dari fungsi flas tidak dicantumkan
function flash($name = "", $message = "", $class = "error__Gagal")
{
    // tanda ! dibaca tidak
    // empty brty ksosong
    // $name ini adalah variabel
    if (!empty($name)) {
        // jika tidak kosong
        // tanda && berrty kedua nilai variabel harus bernilai sama
        if (!empty($name) && !empty($message)) {
            // jika keduanya tidak kosong
            // $_SESSION[$name] membuat session dengan name secara custom
            // $message nilai dari sebuah session pesannya bisa secara custom
            $_SESSION[$name] = $message;
            $pecah_class = explode('__', $class);
            $_SESSION["icon"] = $pecah_class[0];
            $_SESSION["title"] = $pecah_class[1];
        } elseif (isset($_SESSION[$name]) && isset($_SESSION["icon"]) && isset($_SESSION["title"])) { // else kecuali if jika
            // echo menampilkan nilai pesan errorya
            echo "<script>
                Swal.fire({
                    icon: '" . $_SESSION["icon"] . "',
                    title: '" . $_SESSION["title"] . "',
                    text: '" . $_SESSION[$name] . "'
                })
            </script>";

            // unset menghapus session secara spesifik. menghapus sesuai name session nya
            unset($_SESSION[$name]);
            unset($_SESSION["icon"]);
            unset($_SESSION["title"]);
        }
    }
}