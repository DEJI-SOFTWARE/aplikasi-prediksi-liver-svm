<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"> -->
    <title>Login</title>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #fafafa">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6" style="background-color: aliceblue;">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="d-flex">
                            <a href="#" style="width: 50%;" class="btn btn-success border border-success">Login</a>
                            <a href="#" style="width: 50%;" class="btn border border-success">Register</a>
                        
                        </div>
                      <div class="text-center mt-2">
                        <img src="https://icon-library.com/images/liver-icon/liver-icon-21.jpg"style="height: 80px;" alt="logo">
                        <h4 class="mt-1 mb-2">Login</h4>
                      </div>
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="email" >Email</label>
                          <input type="email" id="email" name="email" class="form-control border border-success"/>
                        </div>
                        <div class="mb-2">
                          <label class="form-label" for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control border border-success" />
                          <div class="form-check mt-1">
                            <input class="form-check-input bg-success" type="checkbox" id="form-checkbox" onclick="showHide()">
                            <label class="form-check-label" for="form-checkbox">Tampilkan Password</label>
                          </div>
                        </div>
                        <div class="mt-2 mb-1">
                          <a href="#" class="text-success">Lupa Password?</a>
                        </div>
                        <div class="mb-3">
                        <button type="submit" class="btn btn-success container">Login</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center bg-success">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4 text-center">
                        <h3 class="mb-5">Selamat datang di Aplikasi Prediksi Penyakit Liver</h3>
                        <p>
                          Dengan melakukan login, Anda memasuki pintu akses ke prediksi penyakit liver menggunakan teknologi canggih algoritma Support Vector Machine (SVM). Kami berkomitmen untuk menyediakan informasi yang bermutu dan membantu Anda dalam upaya menjaga kesehatan hati Anda.
                          <br>
                          Terima kasih atas kepercayaan Anda. Mari bersama-sama menjaga kesehatan hati Anda!

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
</body>
</html>