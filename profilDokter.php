<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    /> -->
    <title>Profil Dokter</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>
    <?php
      include 'db_connection.php';
      $id = $_GET['id'];
      $query = "SELECT * FROM dokter where id = '$id'";
      $result = mysqli_query($conn, $query);
      $row2 = mysqli_fetch_assoc($result);
    ?>

    <!-- <div class="nama-obat">
      <h3>Panadol</h3>
    </div> -->
    <div class="container-profil">
      <div class="isi-profil">
      <?php
            echo $row2['profil'];
      ?>
        
      </div>

      <div class="container-card">
          <!-- <div class="card-dokter">
              <img src="img/dokter/dokter.jpg" alt="dokter" />
              <h4>drg. Adeline Clarissa, Sp.KG</h4>
              <p>Endodontis (Spesialis Konservasi Gigi)</p>
            </div> -->
            <?php
          //     include 'db_connection.php';
          //     $nama = $_GET['nama'];
          //     $query = "SELECT * FROM dokter where nama = '$nama'";
          // $result = mysqli_query($conn, $query);
          // while($row = mysqli_fetch_array($result)){

            echo "<div class='card-dokter'>";
            echo "<img src='" . $row2['foto'] . "' alt='dokter' />";
            echo "<h4>" . $row2['nama'] . "</h4>";
            echo "<p>" . $row2['spesialisasi'] . "</p>";
            echo "</div>";
          // }
            ?>

        <button class="btn btn-primary" type="submit" id="button-ask">Tanya dokter</button>
        </div>
    </div>

    <!-- footer -->
    <?php include 'include/footer.php';?>
    <!-- <div>
      <hr style="border: 300px; color:red;">  
    </div> -->
  </body>
</html>
