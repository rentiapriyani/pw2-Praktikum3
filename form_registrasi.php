<?php 
require_once "proses_registrasi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Registrasi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin: 24px;">
  
  <form action="proses_registrasi.php" method="post">
    <div class="form-group row">
      <label for="nim" class="col-4 col-form-label">NIM</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-address-card"></i>
            </div>
          </div> 
          <input id="nim" name="nim" placeholder="Masukkan NIM Anda" type="text" class="form-control" required="required">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-address-book"></i>
            </div>
          </div> 
          <input id="nama" name="nama" placeholder="Masukkan Nama Anda" type="text" class="form-control" required="required">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-4">Jenis kelamin</label> 
      <div class="col-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input name="jenis_kelamin" id="jeni_kelamin_0" type="radio" class="custom-control-input" value="L"> 
          <label for="jeni_kelamin_0" class="custom-control-label">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input name="jenis_kelamin" id="jeni_kelamin_1" type="radio" class="custom-control-input" value="P"> 
          <label for="jeni_kelamin_1" class="custom-control-label">Perempuan</label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="prodi" class="col-4 col-form-label">Program Studi</label> 
      <div class="col-8">
        <select id="prodi" name="prodi" class="custom-select" required="required">
          <?php foreach ($ar_prodi as $k => $v) {
            echo "<option value=$k>$v</option>";
          }
            ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-4">Skill Web &amp; Programming</label> 
      <div class="col-8">
        <?php 
          $i = 0;
          foreach ($ar_skill as $k => $v) {
            ++$i;
        ?>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input name="skill[]" id="skill_<?= $i ?>" type="checkbox" class="custom-control-input" value="<?= $k ?>"> 
          <label for="skill_<?= $i ?>" class="custom-control-label"><?= $v ?></label>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="domisili" class="col-4 col-form-label">Tempat Domisili</label> 
      <div class="col-8">
        <select id="domisili" name="domisili" class="custom-select" required="required">
          <?php foreach ($ar_domisili as $v) {
             echo "<option value=$v>$v</option>";
          } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-4 col-form-label">Email</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-address-card"></i>
            </div>
          </div> 
          <input id="email" name="email" placeholder="Masukkan Email Anda" type="email" class="form-control" required="required">
        </div>
      </div>
    </div> 
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
  <hr>
  <?php  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nim = $_POST["nim"];          
    $nama = $_POST["nama"];          
    $jenis_kelamin = $_POST["jenis_kelamin"];          
    $prodi = $_POST["prodi"];          
    $skill = $_POST["skill"];          
    $domisili = $_POST["domisili"];          
    $email = $_POST["email"];  
    
    echo "NIM : $nim<br>";
    echo "Nama : $nama<br>";
    echo "Jenis Kelamin : $jenis_kelamin<br>";
    echo "Program Studi : $prodi<br>";
    echo "Domisili : $domisili<br>";
    echo "Skill : " . implode(',', $skill) . "<br>";
    echo "Email : $email<br>";
    echo "Kategori Skill : " . kategori_skill(skor_skill($skill, $ar_skill)); // Menampilkan kategori skill
  }
  ?>
</body>
</html>
