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
    <title>Diskusi</title>
  </head>
  <body>
    <!-- header -->
    <?php include 'include/header.php';?>

    <section class="artikel">
      <span>
        <p>Diskusi</p>
      </span>
      <!-- pencarian -->
      <div class="search">
        <form action="">
          <!-- <div ></div>
        <i class="fa fa-search"></i> -->
        <i class="fa fa-search search-icon"></i>
          <input
            type="text"
            class="search-bar"
            placeholder="cari diskusi di sini..."
            name="search"
          />
          <button type="submit">Cari</button>
        </form>
      </div>
    </section>


    <!-- Komunitas -->
    <!-- <div class="grup-diskusi"> -->
      <?php
        include 'db_connection.php';
        
        if(isset($_GET['search'])){
          $search = $_GET['search'];
          $query = "SELECT * FROM diskusi WHERE nama LIKE '$search%'";
        }
        else{
          $query = "SELECT * FROM diskusi";
        }
        
        // $query2 = "SELECT * FROM diskusi WHERE nama LIKE '$search%'";
        $result = mysqli_query($conn, $query);
        // $result2 = mysqli_query($conn, $query2);
        $counter = 0;
        // $num_rows = mysqli_num_rows($result);
        $num_rows = mysqli_num_rows($result);
        if($num_rows == 0){
          echo "<div class='text-keyword'>";
            echo " <p>hasil pencarian \"".$_GET['search']."\" tidak ditemukan</p>";
            echo "</div>";
        }
        while ($row = mysqli_fetch_assoc($result)){
          // if((floor($counter/4) == floor($num_rows/4)) && $counter%4 == 0){
          //   echo "<div class='grup-diskusi-test'>";
          // }else if($counter%4 == 0){
          //   echo "<div class='grup-diskusi'>";
          // }

          if($counter%4 == 0){
            echo "<div class='container grup-diskusi'>";
            echo "<div class='row'>";
          }
          // echo "<div class='grup-diskusi'>";
          echo "<div class='col-3'>";
          
          echo "<div class='diskusi'>";
          echo "<div class='banner-diskusi'>";
          echo "<img src='". $row['banner'] ."' alt=''>";
          echo "</div>";
          echo "<img src='". $row['avatar'] ."' alt='Avatar'>";
          echo "<h4>". $row['nama'] ."</h4>";
          // echo "<div class='detail'>";
          // echo "<div class='post'>";
          // echo "<h5>666</h5>";
          // echo "<p>Postingan</p>";
          // echo "</div>";
          // echo "<div class='topik'>";
          // echo "<h5>15</h5>";
          // echo "<p>Topik</p>";
          // echo "</div>";
          // echo "<div class='anggota'>";
          // echo "<h5>15k</h5>";
          // echo "<p>Anggota</p>";
          // echo "</div>";
          // echo "</div>";
          echo $row['detail'];
          echo "<div class='button'>";
          echo "<button type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'>Gabung</button>";
          echo "<a href='halamanDiskusi.php'><button type='button' id='detail'>Lihat</button></a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          if($counter%4 == 3 || $counter == $num_rows-1){
            echo "</div>";
            echo "</div>";
            // echo "</div>";
          }
            $counter++;

        }
      
      ?>
        
    <!-- </div> -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Halo!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Silakan masuk untuk melanjutkan.
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> -->
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Mengerti</button>
          </div>
        </div>
      </div>
    </div>
    
    
    
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


   

    
  </body>
</html>
