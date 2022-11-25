<header>
    <a href="index.php">
        <div class="logo">
            <span id="halo">Halo</span>
            <span id="sehat">Sehat</span>
        </div>
    </a>
      <ul class="nav">
        <li>
          <a href="index.php" id="home">Beranda</a>
        </li>
        <li>
          <a href="artikel.php" id="artikel-kategori">Artikel</a>
        </li>
        <li>
          <a href="pencarianObat.php" id="obat">Obat</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropbtn" id="dokter">Dokter</a>
          <div class="dropdown-content">
            <a href="pencarianDokter.php">Daftar Dokter</a>
            <a href="">Tanya Dokter</a>
          </div>
        </li>
       
        <li>
          <a href="diskusi.php" id="diskusi">Diskusi</a>
        </li>
      </ul>
      <ul class="login">
        <li>
          <!-- <a href="#">Daftar</a> -->
          <button id="daftar">Daftar</button>
        </li>
        <li>
          <!-- <a href="#">Masuk</a> -->
          <button id="masuk">Masuk</button>
        </li>
      </ul>
  </header>



  <script>
      // function activeMenu() {
        // var menu = document.getElementById("");
        const activeMenu = window.location.pathname;
        console.log(activeMenu);
        //var active = true;
        const navLinks = document.querySelectorAll('ul li a').forEach((link => {
        // const navLinks = document.getElementById("menu").forEach((link => {
          // console.log(link);
          
         // if (activeMenu !== "/skripsi-71180375/") {
            // if (link.href.includes(`${activeMenu}`)) {
            //   link.classList.add('active');            
            // }
            var menuName = link.id.toLowerCase();
            var temp = link.id.toLowerCase().split("-");
            var activeMenuName = activeMenu.toLowerCase();
            if ((activeMenuName === "/skripsi-71180375/" || activeMenuName === "/skripsi-71180375/index.php") && menuName === "home") {
              link.classList.add('active');
            }
            if(temp.length > 1){
              if(activeMenuName.includes(temp[0])) {
                link.classList.add('active');
              }else if(activeMenuName.includes(temp[1])){
                link.classList.add('active');
              }
            }else{
              if(activeMenuName.includes(menuName)) {
                link.classList.add('active');
              }
            }
            
            // if(active){
            //   if (activeMenu.includes("Artikel") || activeMenu.includes("Obat") || activeMenu.includes("Dokter")){
            //     console.log(activeMenu);
            //     link.classList.add('active');            
            //   }
            //   active = false;
            // }
            // if (link.href.includes("#") && activeMenu.indexOf("Dokter") == -1) {
            //   link.classList.remove('active');
            // }
         // }
          
        }));
      // }
    </script>