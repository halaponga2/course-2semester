<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Course-2</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel = "stylesheet" type="text/css" href = "/storage/css/style.css">
    </head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="/"><img src="/storage/images/header_logo.png" alt="header logo"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="width:100%">
                  <li class="nav-item">
                    <a class="nav-link" href="/">Главная</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/goods">Товары</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about">О нас</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="/createGoods"  >Добавить товар</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          
    </header>
    @yield('content')
    <footer class="d-flex flex-wrap justify-content-between align-items-center">
      <p>© Официальный сайт магазина продуктов "Ваша цена"</p>
      <p>г.Москва 2021</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>