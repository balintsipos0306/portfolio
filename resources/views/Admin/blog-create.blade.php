<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Sipos Bálint - Szerkesztő felület</title>
</head>
<body id="page">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <header>  
    <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <div class="imgholder">
            <img id="logo" src="../webp/tinywow_Logó.webp" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menü</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Blog szerkesztés</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/image-upload">Képek feltöltése</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Webshop szerkesztése</a>
              </li>
            </ul>
            <form action="/logout" method="POST" id="logout">
            @csrf
            @method('DELETE')
            <button id="signout" type="submit" class="btn btn-primary">Kilépés</button>
        </form>
          </div>
        </div>
      </div>
    </nav>

  </header>

  <main>
    <h2>Blogok szerkesztése</h2>
  </main>

</body>
</html>