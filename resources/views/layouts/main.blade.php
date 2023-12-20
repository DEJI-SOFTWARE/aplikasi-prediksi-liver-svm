<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="/img/liver-icon.png">
</head>

<body>
    <div class="sidebar">
        <div class="logo"><img src="/img/liver-white.png" alt="logo">
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
                <a href="/data/training">
                    <i class="fa-solid fa-brain fs-5"></i>
                    <span class="link-name">Data Training</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Data Training</span></li>
                </ul>
            </li>
            <li>
                <a href="/data/testing">
                    <i class="fa-solid fa-microscope fs-5"></i>
                    <span class="link-name">Data Testing</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Data Testing</span></li>
                </ul>
            </li>
            <li>
                <a href="/visualisasi">
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
                    </i><span class="link-name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Profile</span></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="home-section">
        <div class="home-content">
            <button type="button" onclick="ToggleSidebar()" style="border: none; background-color:#14A44D;"><i
                    class="fa-solid fa-bars bars"></i></button>
            <span class="text">Prediksi Penyakit Liver</span>
            <div class="navbar dropdown">
                <a class="dropdown-toggle text-white" style="text-decoration: none" href="#" role="button"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                        class="rounded-circle me-2 border border-1 border-light" alt="foto profile"
                        style="height: 33px; width: 33px; overflow:hidden;>
                    <span class="username">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu border border-success">
                    <li><a href="#" class="dropdown-item fw-bold">Profil</a></li>
                    <form action="/logout" method="post">
                        @method('delete')
                        @csrf
                        <li><button class="dropdown-item fw-bold">Logout</button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="content">
        @yield('container')
    </div>

    {{-- Modal Testing Page --}}
    <div class="modal fade" id="inputDataTesting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="inputDataTestingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="inputDataTestingLabel">Input Data Testing</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Testing Page --}}

    {{-- Modal Profil Page --}}
    <!-- Profile (Name & Username) -->
    <div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="profileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5 text-light" id="profileLabel">Ubah Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control"
                                style="border-color: #F4C430; border-width:3px;" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control"
                                style="border-color: #F4C430; border-width:3px;" id="email" name="email"
                                value="">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control"
                                style="border-color: #F4C430; border-width:3px;" id="nama" name="nama"
                                value="">
                        </div>
                    </div>
                    <div class="modal-footer bg-warning">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Password -->
    <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="changePasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="changePasswordLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="passOld" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" style="border-color: #F4C430; border-width:3px;"
                            id="passOld" name="passOld">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" style="border-color: #F4C430; border-width:3px;"
                            id="password" name="password">
                    </div>
                </div>
                <div class="modal-footer bg-warning">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Ubah Password</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Profil Page --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="/js/app.js"></script>

</html>
