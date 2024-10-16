<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <title>Sipos Bálint - Szerkesztő felület</title>
</head>
<body id="page">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="js/hamburger.js"></script>
  <script src="js/adminLogin.js"></script>

  <header id="myheader">

    <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
    </div>

    <div class= "logoholder">
      <img id = "logo" src="webp/tinywow_Logó.webp" alt="">
    </div>

    <nav id = "navv">
      <ul class="nav justify-content-end" id="menu">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Kezdőlap</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gallery/nature">Galéria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Elérhetőségek</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/shop">Webshop</a>
        </li>
      </ul>
    </nav>
    <div class="container">
        <ul id="iconList" class="nav">
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#profile"><img id="icon" src="../webp/user.png" alt=""></a>
            <!-- <div class="collapse" id="profile">
                <div class="card card-body">
                    Belépés/Regisztráció
                </div>
            </div> -->
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#cart"><img id="icon" src="../webp/shopping-cart.png" alt=""></a>
            <!-- <div class="collapse" id="cart">
                <div class="card card-body">
                    Kosár tartalma
                </div>
            </div> -->
        </li>
        </ul>
    </div>
  </header>



    <!-- <header>  
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img id="logo" src="../webp/tinywow_Logó.webp" alt="">
                <button id="menubutton" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Kezdőlap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/gallery">Galéria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Elérhetőségek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/gallery">Blog</a>
                        </li>
                    </ul>
                </div>
                <ul id="iconList">
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#profile"><img id="icon" src="../webp/user.png" alt=""></a>
                            <div class="collapse" id="profile">
                                <div class="card card-body">
                                    Belépés/Regisztráció
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#cart"><img id="icon" src="../webp/shopping-cart.png" alt=""></a>
                            <div class="collapse" id="cart">
                                <div class="card card-body">
                                    Kosár tartalma
                                </div>
                            </div>
                        </li>
                </ul>
            </div>
        </nav>
    </header> -->

  <main>
    <div class="container">
        <div class="nav">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Keresés" aria-label="Keresés">
                <button class="btn btn-outline-success" type="submit">Keresés</button>
            </form>
        </div>
    </div>


  </main>

</body>
</html>