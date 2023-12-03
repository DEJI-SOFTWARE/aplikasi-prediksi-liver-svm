<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <title>{{$title}}</title>
</head>

<body>
    @error('login_failed')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal Login!</strong> {{$errors->first()}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Akun Berhasil Dibuat !!!</strong> {{session('success')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <section class="h-100 gradient-form" style="background-color: #fafafa">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6" style="background-color: aliceblue;">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="d-flex">
                                        <a href="/login" style="width: 50%;"
                                            class="btn @if($title === 'Login') btn-success @endif border border-success">Login</a>
                                        <a href="/register" style="width: 50%;"
                                            class="btn @if($title === 'Register') btn-success @endif border border-success">Register</a>
                                    </div>
                                    @yield('containers')
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center bg-success">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4 text-center">
                                    <h3 class="mb-5">Selamat datang di Aplikasi Prediksi Penyakit Liver</h3>
                                    <p>
                                        Dengan melakukan login, Anda memasuki pintu akses ke prediksi penyakit liver
                                        menggunakan teknologi canggih algoritma Support Vector Machine (SVM). Kami
                                        berkomitmen untuk menyediakan informasi yang bermutu dan membantu Anda dalam
                                        upaya menjaga kesehatan hati Anda.
                                        <br>
                                        Terima kasih atas kepercayaan Anda. Mari bersama-sama menjaga kesehatan hati
                                        Anda!

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showHide(){
      var password = document.getElementById("password");
      if(password.type == "password")
      {
         password.type = "text";
      }else{
         password.type = "password";
      }
      }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
