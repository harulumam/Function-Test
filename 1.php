<?php
class Terbilang
{
    private $angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];

    public function konversi($number)
    {
        if ($number < 12) {
            return $this->angka[$number];
        } elseif ($number < 20) {
            return $this->konversi($number - 10) . " Belas";
        } elseif ($number < 100) {
            return $this->konversi(intval($number / 10)) . " Puluh " . $this->konversi($number % 10);
        } elseif ($number < 200) {
            return "Seratus " . $this->konversi($number - 100);
        } elseif ($number < 1000) {
            return $this->konversi(intval($number / 100)) . " Ratus " . $this->konversi($number % 100);
        } elseif ($number < 2000) {
            return "Seribu " . $this->konversi($number - 1000);
        } elseif ($number < 1000000) {
            return $this->konversi(intval($number / 1000)) . " Ribu " . $this->konversi($number % 1000);
        } elseif ($number < 1000000000) {
            return $this->konversi(intval($number / 1000000)) . " Juta " . $this->konversi($number % 1000000);
        } elseif ($number < 1000000000000) {
            return $this->konversi(intval($number / 1000000000)) . " Milyar " . $this->konversi($number % 1000000000);
        } else {
            return "Angka terlalu besar";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Angka ke Terbilang</title>
</head>
<body>
    <h2>Masukkan Angka</h2>
    <form method="post">
        <input type="number" name="angka" required>
        <button type="submit">Konversi</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["angka"])) {
        $angka = (int)$_POST["angka"];
        $terbilang = new Terbilang();
        $hasil = strtoupper(trim($terbilang->konversi($angka)));
        echo "<p><strong>Hasil:</strong> $hasil</p>";
    }
    ?>
</body>
</html>
