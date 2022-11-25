
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
    <title>Artikel</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>

    <section class="artikel">
      <span>
        <p>Artikel</p>
      </span>
      <!-- pencarian -->
      <div class="search">
        <form action="">
          <!-- <div ></div>
        <i class="fa fa-search"></i> -->
          <input
            type="text"
            placeholder="cari artikel di sini..."
            name="search"
            
          />
          <button type="submit">Cari</button>
        </form>
      </div>
    </section>


    <!-- Hasil Pencarian -->
    <!-- <div class="text-keyword">
      <p>hasil pencarian “<?php echo $_GET['search'];?>”</p>
    </div> -->

    <!-- <div class="hasil-pencarian"> -->
      <?php
        include 'db_connection.php';
        
        $search = "";
        if(isset($_GET['new'])){
          $query = "SELECT * FROM artikel ORDER BY artikel.waktu DESC LIMIT 6 ";
        }else{
          $search = $_GET['search'];
          $katapencarian = explode(" ", $search);
          $querykategori = "SELECT id FROM kategori WHERE nama LIKE '%$search%'";
          foreach($katapencarian as $kata){
            $querykategori = $querykategori . "OR nama LIKE '%$kata%'";
          }
          $resultkategori = mysqli_query($conn, $querykategori);

          $query = "SELECT * FROM artikel WHERE judul LIKE '%$search%'";
          foreach($katapencarian as $kata){
            $query = $query . "OR judul LIKE '%$kata%'";
          }
          while($rowkategori = mysqli_fetch_assoc($resultkategori)){
            $query = $query . "OR kategori_id =" .$rowkategori['id']." ";
          }
        }
        
        // if($katapencarian.length > 1){
        //   $query = $query . "OR judul LIKE '%$katapencarian[0] "." $katapencarian[2]%'";
        //   $query = $query . "OR judul LIKE '%$katapencarian[1] "." $katapencarian[2]%'";
        // }
        

        
        //$query = "SELECT * FROM artikel WHERE judul LIKE '%$search%'";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        $counter = 0;
        echo "<div class='text-keyword'>";
        if(!isset($_GET['new'])){
         
          if($num_rows == 0){
            echo " <p>hasil pencarian \"".$_GET['search']."\" tidak ditemukan</p>";
          }else{
            echo "<p>hasil pencarian \"".$_GET['search']."\"</p>";
          }
          
        }
        echo "</div>";
        
        
        while ($row = mysqli_fetch_assoc($result)) {
          
          // if((floor($counter/3) == floor($num_rows/3)) && $counter%3 == 0){
          //   echo "<div class='hasil-pencarian-test'>";
          // }else if($counter%3 == 0){
          //   echo "<div class='hasil-pencarian'>";
          // }
          if($counter%3 == 0){
            echo "<div class='hasil-pencarian container'>";
            echo "<div class='row'>";
          }
          
          // $hariini = new DateTime("now");
          // $waktuartikel =  new DateTime($row['waktu']);
          //$interval = $hariini->diff($waktuartikel);
          $hariini = date_create("now");
          $waktuartikel =  date_create($row['waktu']);
          $interval = date_diff($hariini, $waktuartikel);
          $query2 = "SELECT * FROM kategori WHERE id = ". $row['kategori_id'] ."";
          $result2 = mysqli_query($conn, $query2);
          $row2 = $result2->fetch_assoc();
          
          echo "<div class='col-4'>";
          echo "<div class='hasil-artikel'>";
          echo "<a href='halamanArtikel.php?id=".$row['id']."'>";
          echo "<img src='" . $row['foto'] . "' alt='Avatar'>";
          echo "<h3>" . $row['judul'] . "</h3>";
          echo "</a>";
          // <h3>12 Gejala Kanker yang Perlu Anda Waspadai Sedini Mungkin</h3>
          echo "<div class='grup-detail'>";
          echo "<p>" . $row2['nama'] . "</p>";
          echo "<p>&#9679;</p>";
          // <p>1 hari yang lalu</p>
          if($interval->format("%a") == 0){
            echo "<p>baru saja</p>";  
          }else if($interval->format("%a") >= 30){
            $bulan = floor($interval->format("%a") / 30);
            echo "<p>" . $bulan  . " bulan yang lalu</p>";
          }else{
            echo "<p>" . $interval->format("%a")  . " hari yang lalu</p>";
          }

          echo "</div>";
          echo "</div>";
          echo "</div>";
        // echo "</div>";
        if($counter%3 == 2 || $counter == $num_rows-1){
          echo "</div>";
          echo "</div>";
          // echo "</div>";
        }
          $counter++;
        }
        
        
      ?>

    <!-- </div> -->
    
    
    
    <!-- footer -->
    <?php include 'include/footer.php';?>
    <!-- <div>
      <hr style="border: 300px; color:red;">  
    </div> -->


   

    
  </body>
</html>
