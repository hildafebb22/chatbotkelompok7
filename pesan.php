<?php
    //persiapan koneksi database
    $koneksi = mysqli_connect("localhost","root","","chatbot") or die("database Error");

    //ambil pesan dari ajax
    $pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);

    //cek pertanyaan kedlm tabel
    $cek_data = mysqli_query($koneksi, "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE '%$pesan%' ");

    //jika pertanyaan/data ditemukan,maka tampilkan jawaban
    if (mysqli_num_rows($cek_data) > 0) {
        //hasil query tampung kedalam variabel data
        $data = mysqli_fetch_assoc($cek_data);
        //tampung jawaban kedalam variabel untuk dikirim kembali ke ajax
        $balasan = $data['jawaban'];
        echo $balasan;
    }else{
        echo "maaf, saya belum menemukan jawaban yang kamu maksud, :(";
    }
?>
