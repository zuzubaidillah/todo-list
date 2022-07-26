<?php
include 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo-List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Daftar Tugas 2022</h1>
        <form method="POST" action="api/proses_tambah_tugas.php" id="new-task-form">
            <input name="txttugas" tabindex="1" type="text" id="new-task-input" placeholder="Apa yang kamu rencanakan?">
            <input tabindex="2" type="submit" id="new-task-submit" value="Tambah Tugas">
        </form>
    </header>
    <main>
        <section class="task-list">
            <h2>Tugas saya</h2>
            <div id="tasks" class="">
                <?php
                // code sql mengambil data pada tabel tugas
                $sql = "SELECT * FROM tugas ORDER BY tgl_buat DESC";
                $query_tugas = mysqli_query($conn, $sql);
                // num rows: hitung data
                $hitung_data_tabel_barang = mysqli_num_rows($query_tugas);
                if ($hitung_data_tabel_barang != 0) {
                    while ($dt = mysqli_fetch_assoc($query_tugas)) {
                        echo '<div class="task">
                            <div class="content">
                                <input type="text" class="text" id="txtketerangan_' . $dt['id'] . '" value="' . $dt['keterangan'] . '" readonly>
                            </div>
                            <div class="action">
                                <button id="btnedit_' . $dt['id'] . '" class="edit" onclick="click_edit(event)" data-id="' . $dt['id'] . '">Edit</button>
                                <button onclick="click_hapus(\'' . $dt['id'] . '\')" id="btndelete_' . $dt['id'] . '" class="delete">Hapus</button>
                            </div>
                        </div>';
                    }
                }
                ?>
                <!-- code ddibawah ini akan dilakukan LOOPing sesuai data -->
                <!-- <div class="task">
                    <div class="content">
                        <input type="text" class="text" value="daftar tugas saya" readonly>
                    </div>
                    <div class="action">
                        <button class="edit">Edit</button>
                        <button class="delete">Hapus</button>
                    </div>
                </div> -->
            </div>
        </section>
    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>