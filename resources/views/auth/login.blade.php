<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Dealer System</title>
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

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }

    .container-fluid {
      padding-left: 15px;
      padding-right: 15px;
    }

    .alert {
      margin-top: 20px;
    }

    .vh-100 {
      height: 100%;
    }

    .img-fluid {
      max-width: 100%;
      height: auto;
    }

    .form-outline {
      position: relative;
    }

    .form-control {
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .form-label {
      position: absolute;
      top: 50%;
      left: 16px;
      transform: translateY(-50%);
      background-color: #fff;
      padding: 0 5px;
      color: #007bff;
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

    .login_form {
      background: "#000"
    } 
  </style>
</head>
<body class="img js-fullheight" style="background: #000;">
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://i.ibb.co/XbJXcNF/421016418-715029424063482-4527315973780585630-n.jpg"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="{{ url('login') }}" method="post">
            {{ csrf_field() }}
            <p class="lead font-weight-bold mb-4 me-3 ">Sign in to Dealer Flow</p>
            <?php $session = true; ?>
            @if (!$session)
            <div class="alert alert-warning">
              You have been auto-logged out due to inactivity. Please sign in again.
            </div>
            @endif

            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
            @include(' _message')
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control form-control-lg" name="email"
                placeholder="Enter a valid email address" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Enter password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-danger btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ url('register')}}"
                  class="link-danger">Register</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5"
      style="background-color: #000;">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright © 2023. All rights reserved.
      </div>
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Made by Justin Jandayan
      </div>
    </div>
  </section>

  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>