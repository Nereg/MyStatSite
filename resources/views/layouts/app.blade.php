<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129486253-3"></script>
  @if (null !== function (){return yield('CssFile');})
      <!-- own css selected from page -->
  <style src="{{url('/')}}/css/@yield('CssFile')"></style>
  @endif

<!-- Icon -->
<link rel="shortcut icon" href="{{url('/').'/icon.ico'}}">
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129486253-3');
</script>

  <title>@yield('pageTitle') - MyStat by Oleg Kusil</title>
</head>
<body>
    <!--Main Navigation-->
    <div>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="{{url('/')}}">Главная</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/GroupTop')}}">
                            Таблица лидеров класса
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/ClassTop')}}">
                                Таблица лидеров потока
                            </a>
                    </li>
                </ul>
                <!-- Links -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/DiscordServer')}}" target="_blank"><i class="fab fa-discord"></i></a>
                    </li>
                </ul>
            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->
    </div>
     @yield('content')
</body>
</html>