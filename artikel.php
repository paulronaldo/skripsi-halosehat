<?php
  include 'db_connection.php';
  
?>


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
        <form action="pencarianArtikel.php">
          <!-- <div ></div>
         -->
         <!-- <div class="search-bar"></div> -->
        <i class="fa fa-search search-icon"></i>
        <!-- <i class="fa fa-search"> -->
          <input
              type="text"
              class="search-bar"
              placeholder="cari artikel di sini..."
              name="search"
            />
        <!-- </i> -->
          <button type="submit">Cari</button>
        </form>
      </div>
    </section>

    <!-- kategori -->
    <div class="kategori">
      <p>Cari berdasarkan Kategori</p>
    </div>
    

  <!-- card kategori -->
  <!-- <div class="card-kategori"> -->
  <!-- <div class="container card-kategori"> -->
  <!-- <div class="row cards"> -->
    <?php
      include 'db_connection.php';
      $query = "SELECT * FROM kategori ORDER BY `kategori`.`nama` ASC";
      $result = mysqli_query($conn, $query);
       $counter = 0;
      $num_rows = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
       if($counter%6 == 0){
          //echo "<div class='card-kategori'>";
          echo "<div class='container card-kategori'>";
          echo "<div class='row cards'>";
        }

        // if((floor($counter/6) == floor($num_rows/6)) && $counter%6 == 0){
        //   echo "<div class='card-kategori-test'>";
        // }else if($counter%6 == 0){
        //   echo "<div class='card-kategori'>";
        // }
        // echo "<div class='container card-kategori'>";
        //echo "<div class='container card-kategori'>";
        
        echo "<div class='col-2'>";

        echo "<div class='card'>";
        echo "<a href='halamanKategori.php?cari=" . $row['nama'] . "'>";        
        echo "<img src='" . $row['gambar'] . "' alt='Avatar'>";
        echo "<div class='container-text'>";
        echo "<p>" . $row['nama'] . "</p>";
        echo "</div>";
        echo "</a>";
      echo "</div>";
      echo "</div>";
     // echo "</div>";
     
      // echo "</div>";
      if($counter%6 == 5 || $counter == $num_rows-1){
         echo "</div>";
          echo "</div>";
      }
      $counter++;
      }

    ?>    
<!-- </div> -->
<!-- </div> -->

    
    
    
    


   

    
  </body>
</html>
