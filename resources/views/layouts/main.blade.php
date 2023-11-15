<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Visualisasi</title>
</head>
<body>
    <div class="sidebar ">
        <div class="logo"><img src="img/liver-white.png" alt="logo">
        <span class="logo-name">Prediksi Penyakit Liver</span>
        </div>
        <ul class="nav-list">
            <li>
                <a href="/dashboard">
                    <i class="fa-solid fa-gauge fs-5"></i>
                    <span class="link-name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Dashboard</span></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-brain fs-5"></i>
                    <span class="link-name">Data Training</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Data Training</span></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-microscope fs-5"></i>
                    <span class="link-name">Data Testing</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Data Testing</span></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-chart-simple fs-5"></i>
                    <span class="link-name">Prediksi</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Prediksi </span></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-eye fs-5"></i>
                    <span class="link-name">Visualisasi</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Visualisasi</span></li>
                </ul>
            </li>
            <li>
                <a href="/profile">
                    <i class="fa-solid fa-circle-user fs-5">
                    </i><span class="link-name">Profil</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Profil</span></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="home-section">
        <div class="home-content">    
            <button type="button" onclick="ToggleSidebar()" style="border: none; background-color:#14A44D;"><i class="fa-solid fa-bars bars"></i></button>
            <span class="text">Prediksi Penyakit Liver</span>
                    <div class="navbar">
                        <img src="img/blank-profile.png" class="rounded-circle me-2" alt="foto profil" style="height: 35px;">
                        <span class="username">Nama Pengguna</span>
                    </div>    
                </div>
        </div>        
    </div>
    <div class="content">
        @yield('container')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>