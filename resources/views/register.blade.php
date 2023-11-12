<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"> -->
    <title>Daftar</title>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #fafafa">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6" style="background-color:aliceblue">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="d-flex">
                          <a href="#" style="width: 50%;" class="btn border border-success">Masuk</a>
                          <a href="#" style="width: 50%;" class="btn btn-success border border-success">Daftar</a>    
                        </div>
                      <div class="text-center mt-2">
                        <img src="https://icon-library.com/images/liver-icon/liver-icon-21.jpg"style="height: 80px;" alt="logo">
                        <h4 class="mt-1 mb-2">Daftar</h4>
                      </div>
                      <form>
                        <div class="mb-2">
                          <label class="form-label" for="name">Nama Lengkap</label>
                          <input type="text" id="name" name="name" class="form-control border border-success"/>
                        </div>
                        <div class="mb-2">
                          <label class="form-label" for="email" >Email</label>
                          <input type="email" id="email" name="email" class="form-control border border-success"/>
                        </div>
                        <div class="mb-2">
                          <label class="form-label" for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control border border-success" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="password">Konfirmasi Password</label>
                          <input type="password" id="password" name="password" class="form-control border border-success" />
                        </div>
                        <div>
                          <input type="hidden" name="token" id="token" value="">
                        </div>
                        <div class="mb-1">
                        <button type="submit" class="btn btn-success container">Daftar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center bg-success">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                        <h3>Lorem</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, autem porro ipsum, hic doloribus reiciendis culpa in sit, excepturi labore ex nesciunt dolores? Alias, debitis? Enim consequatur asperiores magnam inventore est nam esse animi hic? Ipsam dignissimos nisi cumque quis?</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</body>
</html>