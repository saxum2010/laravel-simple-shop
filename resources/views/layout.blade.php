<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,400,700" rel="stylesheet">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
      <nav>
        <ul>
          <li><a href="/" title="Home"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/" class="active" title="Smartphones">Smartphones</a></li>
          <li><a href="/" title="About">About</a></li>
          <li>

            <div class="dropdown">
                <button type="button" class="btn btn-info btn-shopping-cart" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">
                        @if(session('cart')!==null)
                          {{ count((array)session('cart')) }}
                        @endif
                    </span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array)session('cart')) }}</span>
                        </div>

                        <?php $total = 0 ?>
                        @if(session('cart')!==null)
                        @foreach(session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
                        @endif

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart')!==null)
                    @foreach(session('cart') as $id => $details)
                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ $details['photo'] }}" />
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['name'] }}</p>
                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>

        </li>
    </ul>
</nav>
<header>
    <h1>Laravel simple shop</h1>
</header>
<div class="">
    @yield('content')
    @yield('scripts')
</div>
</div>
</body>
</html>

