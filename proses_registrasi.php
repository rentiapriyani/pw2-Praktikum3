<?php  
require_once "opsi_registrasi.php";

function skor_skill($skills, $ar_skill) {
  $total_skor = 0;
  foreach ($skills as $skill) {
    if (array_key_exists($skill, $ar_skill)) {
      $total_skor += $ar_skill[$skill];
    }
  }
  return $total_skor;
}

function kategori_skill($total_skor) {
  if ($total_skor >= 100) {
    return "Sangat Baik";
  } elseif ($total_skor >= 60 && $total_skor <= 100) {
    return "Baik";
  } elseif ($total_skor >= 40 && $total_skor <= 60) {
    return "Cukup";
  } elseif ($total_skor >= 1 && $total_skor <= 40) {
    return "Kurang";
  } elseif ($total_skor >= 0 && $total_skor <= 1) {
    return "Sangat Kurang";
  } else {
    return "Tidak Diketahui";
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nim = $_POST["nim"];          
  $nama = $_POST["nama"];          
  $jenis_kelamin = $_POST["jenis_kelamin"];  // Ubah "jenis kelamin" menjadi "jenis_kelamin"      
  $prodi = $_POST["prodi"];          
  $skill = $_POST["skill"];          
  $domisili = $_POST["domisili"];          
  $email = $_POST["email"];
  
  $total_skor = skor_skill($skill, $ar_skill);
  $kategori = kategori_skill($total_skor);
            
  echo "NIM : $nim<br>";
  echo "Nama : $nama<br>";
  echo "Jenis Kelamin : $jenis_kelamin<br>"; // Ubah "jenis kelamin" menjadi "jenis_kelamin"      
  echo "Program Studi : $prodi<br>";
  echo "Domisili : $domisili<br>";
  echo "Skill : " . implode(',', $skill) . "<br>";
  echo "Email : $email<br>";
  echo "Skor Skill : $total_skor <br>";
  echo "Kategori Skill : $kategori"; // Menampilkan kategori skill
}
?>
