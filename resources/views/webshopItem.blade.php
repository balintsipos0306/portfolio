<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/shop.css">
    <link rel="stylesheet" href="../../css/shopItem.css">
    <link rel="stylesheet" href="../../css/scrollbar.css">
    <title>Sipos Bálint - Szerkesztő felület</title>
</head>
<body id="page">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="js/hamburger.js"></script>
  <script src="js/adminLogin.js"></script>

  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      @if (!empty(Auth()->user()->name))
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kilépés</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="/webshop/logout" method="POST" id="logout">
            @csrf
            @method('DELETE')
            <button id="signout" type="submit" class="btn btn-primary">Kijelentkezés</button>
          </form>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vissza</button>
      </div>
      @else
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Belépés</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/webshop/login" method="POST">
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Felhasználónév</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name" name="name">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Jelszó</label>
        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="password" name="password">
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-primary">Belépés</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vissza</button>
      </div>
      @endif
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="cart" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Kosár</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  @if (!empty(Auth()->user()->name))
    <div>
      Itt található meg a kosár tartalma
    </div>
  @else
    <p>Kosár használatához, először lépj be</p>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Belépés</button>
  @endif
  </div>
</div>

  <header id="myheader">
    <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
    </div>
    <div class= "logoholder">
      <img id = "logo" src="../../webp/tinywow_Logó.webp" alt="">
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
            @if (!empty(Auth()->user()->name))
              <p id="username">{{Auth()->user()->name}}</p>
            @endif
            <a data-bs-toggle="modal" data-bs-target="#login"><img id="icon" src="../../webp/user.png" alt=""></a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="offcanvas" href="#cart" role="button" aria-controls="offcanvasExample"><img id="icon" src="../../webp/shopping-cart.png" alt=""></a>
        </li>
        </ul>
    </div>
  </header>

  <main>
    <div class="container">
        <div class="nav">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Keresés" aria-label="Keresés">
                <button class="btn btn-outline-success" type="submit">Keresés</button>
            </form>
        </div>
        
        <div class="items">
            @php
                $item = DB::table('webshop')->where('id', $id)->first();
                $allItems = DB::table('webshop')->get();
            @endphp

            <div class="row">
                <div class="col">
                <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="...">
                </div>
                <div class="col">
                    <a href="/shop" ><img src="../../webp/back-button.png" id="backIcon" alt=""></a>
                    <p id="price">{{$item->price}} Ft</p>
                    <div class="content">
                        <h2>{{$item->name}}</h2>
                        <section>
                            {{$item->text}}
                        </section>
                    </div>
                    @if (!empty(Auth()->user()->name))
                        <button type="button" class="btn btn-light" id="cartbutton">
                            <img src="../../webp/shopping-cart.png" id="icon" alt="">
                            <i>Kosárba</i>
                        </button>
                    @else
                        <button type="button" class="btn btn-light" id="cartbutton" disabled>
                            <img src="../../webp/shopping-cart.png" id="icon" alt="">
                            <i>Kosárba</i>
                        </button>
                        <i id="cartAlert">A kosárhoz előbb lépj be</i>
                    @endif
                </div>
            </div>

            <h2><u>További termékek</u></h2>

            <div class="row d-flex flex-nowrap" id="felsorolas">
                @foreach ($allItems as $items)
                    @if ($items->name != $item->name)                    
                    <div class="col">
                        <div class="card" aria-hidden="true">
                            <img src="{{ asset('storage/' . $items->image_path) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                <span>{{$items->name}}</span>
                                </h5>
                                <p class="card-text" id="szoveg">{{$items->text}}...</p>
                                <a class="btn btn-primary col-6" href="{{ route('item.open', ['id' => $items->id]) }}">Megnyitás</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

        </div>

    </div>


  </main>

</body>
</html>