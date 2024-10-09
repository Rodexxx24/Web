<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $noTel = $_POST['noTel'];

    echo "
      <script>
        alert('Username : $username, Email : $email, No Telp : $noTel');
      </script>
    ";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Posttest 3</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav class="navbar">
      <div class="navbar-left">
        <a href="#hero" class="logo-resto">RoboTech</a>
        <input class="searchBar" type="text" placeholder="Cari komponen" />
      </div>
      <ul class="opsi">
        <li>
          <a href="#kategori">Kategori</a>
        </li>
        <li>
          <a href="#terlaris">Top saller</a>
        </li>
        <li>
          <a href="#tentang">Tentang kami</a>
        </li>
        <li class="login">Sign in</li>
      </ul>
      <div class="btn-container">
        <button class="btn mode">
          <img src="twemoji--full-moon.svg" alt="opsi" />
        </button>
        <button class="btn tombol">
          <img class="hamburger" src="charm--menu-hamburger.svg" alt="opsi" />
        </button>
      </div>
    </nav>
    <div class="kontainer hero" id="hero">
      <h1 class="heading">Komponen robotik terbaru dan terlengkap</h1>
      <p class="subheading">
        Kami menyediakan berbagai macam komponen robotik yang anda butuhkan
      </p>
    </div>

    <div class="kontainer grid-container" id="katalog">
      <div class="kategori" id="kategori">
        <h2>Kategori</h2>
        <div class="katekon">
          <div class="etalase">
            <img src="Arduino.png" alt="microcontroller" />
            <p class="detail">Microcontroller</p>
          </div>
          <div class="etalase">
            <img src="Baterai.png" alt="power-supply" />
            <p class="detail">Power supply</p>
          </div>
          <div class="etalase">
            <img src="Sensor.png" alt="sensor" />
            <p class="detail">Sensor</p>
          </div>
          <div class="etalase">
            <img src="Breadboard.png" alt="sirkuit-elektronik" />
            <p class="detail">Sirkuit eletronik</p>
          </div>
        </div>
      </div>
      <div id="terlaris">
        <h2>Terlaris</h2>
        <div class="topkontainer">
          <div class="topitem">
            <div class="topitemgambar">
              <img src="Arduino.png" alt="top1" />
            </div>
            <p class="topitemjudul">Ardian Uno</p>
            <div class="rating">
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
            </div>
            <p class="harga">Rp. 40.000</p>
            <p class="detail">Beli sekarang</p>
          </div>
          <div class="topitem">
            <div class="topitemgambar">
              <img src="Sensor.png" alt="top1" />
            </div>
            <p class="topitemjudul">Sensor</p>
            <div class="rating">
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
            </div>
            <p class="harga">Rp. 10.000</p>
            <p class="detail">Beli sekarang</p>
          </div>
          <div class="topitem">
            <div class="topitemgambar">
              <img src="Baterai.png" alt="top1" />
            </div>
            <p class="topitemjudul">Baterai</p>
            <div class="rating">
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
              <span>⭐</span>
            </div>
            <p class="harga">Rp. 80.000</p>
            <p class="detail">Beli sekarang</p>
          </div>
        </div>
      </div>
    </div>

    <div class="wishlist">
        <div class="wishlist-form">
          <h2>Wishlist</h2>
          <p>Singkat saja, kalau punya duit beli. Paham!</p>
          <form action="" method="POST">
            <div class="form-input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan nama" required>
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-input">
                <label for="noTel">No Telp</label>
                <input type="tel" name="noTel" id="noTel" placeholder="Masukkan Nomor Telepon" required>
            </div>
            <button class="btn" type="submit">Kirim</button>
          </form>
        </div>
        <div class="wishlist-image">
          <img src="elHomesick.jpg" alt="ifnu">
        </div>
      </div>

    <div class="tentang" id="tentang">
      <div class="kontainer profile">
        <div class="profile-image">
          <img src="profile.jpeg" alt="Photo Profile" />
        </div>
        <div class="profile-detail">
          <div class="profile-name">Raymond Thymotimannuel</div>
          <div class="profile-nim">2309106067</div>
          <div class="profile-name">Informatika B1'23</div>
          <div class="profile-nim">Universitas Mulawarman</div>
        </div>
      </div>
      <footer class="kontainer footer">
        <div class="social-media">
          <a href="https://www.facebook.com/Raymondzero123" target="_blank">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1em"
              height="1em"
              viewBox="0 0 512 512"
            >
              <path
                fill="currentColor"
                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48c27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256"
              />
            </svg>
          </a>
          <a
            href="https://www.instagram.com/raymond_thymotimannuel/"
            target="_blank"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1em"
              height="1em"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="M13.61 12.243a1.6 1.6 0 1 1-1.56-1.63a1.62 1.62 0 0 1 1.56 1.63"
              />
              <path
                fill="currentColor"
                d="M14.763 7.233H9.338a2.024 2.024 0 0 0-2.024 2.024v5.547a2.024 2.024 0 0 0 2.024 2.024h5.425a2.024 2.024 0 0 0 2.024-2.024V9.267a2.026 2.026 0 0 0-2.024-2.034m-2.713 7.723a2.703 2.703 0 1 1 2.642-2.703a2.67 2.67 0 0 1-2.642 2.703m2.936-5.405a.496.496 0 0 1-.496-.506a.506.506 0 1 1 1.012 0a.496.496 0 0 1-.557.506z"
              />
              <path
                fill="currentColor"
                d="M12.05 2a10 10 0 1 0-.1 20a10 10 0 0 0 .1-20m6.073 12.702a3.39 3.39 0 0 1-3.41 3.411H9.389a3.39 3.39 0 0 1-3.411-3.41V9.378a3.39 3.39 0 0 1 3.41-3.411h5.325a3.39 3.39 0 0 1 3.41 3.41z"
              />
            </svg>
          </a>
          <a href="https://github.com/Rodexxx24" target="_blank">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1em"
              height="1em"
              viewBox="0 0 64 64"
            >
              <path
                fill="currentColor"
                d="M32 0C14 0 0 14 0 32c0 21 19 30 22 30c2 0 2-1 2-2v-5c-7 2-10-2-11-5c0 0 0-1-2-3c-1-1-5-3-1-3c3 0 5 4 5 4c3 4 7 3 9 2c0-2 2-4 2-4c-8-1-14-4-14-15q0-6 3-9s-2-4 0-9c0 0 5 0 9 4c3-2 13-2 16 0c4-4 9-4 9-4c2 7 0 9 0 9q3 3 3 9c0 11-7 14-14 15c1 1 2 3 2 6v8c0 1 0 2 2 2c3 0 22-9 22-30C64 14 50 0 32 0"
              />
            </svg>
          </a>
          <a
            href="https://classroom.google.com/c/NzEwMjM1MTUyNDc0/a/NzE3NjMyMDI5MTM4/details"
            target="_blank"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1em"
              height="1em"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20zM10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28S5.71 12 5.71 11.29m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28s-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16s2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71"
              />
            </svg>
          </a>
        </div>
        <a
          href="https://classroom.google.com/c/NzEwMjM1MTUyNDc0/a/NzE3NjMyMDI5MTM4/details"
          target="_blank"
          >Posttest3</a
        >
      </footer>
    </div>
    <script src="logika.js"></script>
  </body>
</html>
