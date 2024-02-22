<!DOCTYPE html>
<html lang="en">
<head>
  <title>DEALER FLOW</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

  <style>
    .heading-section {
      font-family: 'Bebas Neue', cursive;
      font-size: 36px;
      color: #fff;
      letter-spacing: 2px;
    }

    body {
      margin: 0;
      overflow: auto;
    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .content-container {
      position: relative;
      z-index: 1;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .form-check-input {
      margin-right: 5px;
    }

    .btn-primary {
      background-color: #007bff;
      color: #fff;
      padding-left: 2.5rem;
      padding-right: 2.5rem;
    }

    .link-danger {
      color: #dc3545;
    }

    .vh-100 {
      height: 100%;
    }

    .img-fluid {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body class="img js-fullheight" style="background: #000;">
  <section class="ftco-section vh-100">
    <div class="container-fluid content-container">
    <div class="col-md-9 col-lg-6 col-xl-5">
      <div class="row justify-content-center">
        <div class="d-flex flex-row col-md-6 text-center mb-5">
          <img src="https://i.ibb.co/XbJXcNF/421016418-715029424063482-4527315973780585630-n.jpg"
            class="img-fluid" alt="Sample image">
        </div>
          <h2 class="heading-section">DEALER FLOW</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <h3 class="mb-4 text-center">Register your Account</h3>

            @if ($errors->any())
              <div>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('post.register') }}" method="post">
              @include(' _message')
              {{ csrf_field() }}

              <div class="form-group">
                <label for="user_type">Register As:</label>
                <select name="user_type" id="user_type" class="form-control">
                  <option value="2">Customer</option>
                  <option value="3">Dealer</option>
                  <option value="4">Supplier</option>
                </select>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="First Name" required>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
              </div>

              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
              </div>

              <div class="form-group">
                <input id="password-field" type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>

              <div class="form-group">
                <input id="password-field" type="password" class="form-control" name="password_confirmation" id="password" placeholder="Retype Password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>

              <div class="form-group">
                <button type="submit" class="form-control btn btn-danger submit px-3" style="background-color: #EC0000;">Register</button>
              </div>

              <div class="form-group d-md-flex">
                <div class="w-50">
                  <a href="{{ url('/') }}" style="color: #fff">Click to Login</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/css/js/popper.js') }}"></script>
  <script src="{{ asset('frontend/css/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/css/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/particle.js') }}"></script>
</body>
</html>

