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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <!-- breadcrumb -->
    <div class="breadcrumb-nav">
      <nav
        style="--bs-breadcrumb-divider: '>'"
        aria-label="breadcrumb"
        ;
        aria-label="breadcrumb"
      >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
          <li class="breadcrumb-item"><a href="diskusi.php">Diskusi</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Berat Badan Ideal
          </li>
        </ol>
      </nav>
    </div>

    <!-- banner -->
    <div class="header-diskusi">
      <img
        src="img/komunitas/Banner - berat  bedan ideal.webp"
        id="header-diskusi"
        alt="banner"
      />
      <div class="title-header">
        <img
          src="img/komunitas/berat badan ideal.webp"
          id="avatar"
          alt="Avatar"
        />
        <div class="detail-header">
          <h4>Berat Badan Ideal</h4>
          <div class="detail">
            <div class="post">
              <h5><b>666</b> Postingan</h5>
            </div>
            <div class="topik">
              <h5><b>15</b> Topik</h5>
            </div>
            <div class="anggota">
              <h5><b>15k</b> Anggota</h5>
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-lg" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Gabung</button>
      </div>
    </div>

    <div class="about-forum-diskusi container">
      <div class="row">
        <div class="about-forum col-5">
          <h4>Tentang Forum</h4>
          <p>
            Menjaga berat badan bisa membuat Anda bugar, aktif, serta menurunkan
            risiko penyakit seperti penyakit jantung, stroke, tekanan darah tinggi,
            dan diabetes. Bergabunglah dengan komunitas Berat Badan Ideal dan
            bagikan pengalaman Anda, berbagi tips, dan temukan dukungan dalam
            komunitas.
          </p>
        </div>
        <!-- <div class="mulai-diskusi col-2">
        </div> -->
        <div class="mulai-diskusi col-7">
          <input type="text" placeholder="mulai diskusi"></input>
        </div>
      </div>      
    </div>
    


    
    
    <p>
      <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Link with href
      </a>
      <!-- <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Button with data-bs-target
      </button> -->
    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Halo!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Silakan masuk untuk bergabung.
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
