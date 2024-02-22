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
    /* Add this style to your existing styles or update the existing one */
    .heading-section {
      font-family: 'Bebas Neue', cursive; /* Use Bebas Neue or your preferred Fast and Furious style font */
      font-size: 36px; /* Adjust the font size as needed */
      color: #fff; /* Set the font color to match your design */
      letter-spacing: 2px; /* Adjust letter-spacing for a stylized look */
    }

    /* You might want to update other styles using Bebas Neue as well */
    body {
      margin: 0;
      overflow: auto;  /* Prevent scrollbars caused by particles overflow */
    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .content-container {
      position: relative;
      z-index: 1; /* Ensure the content is above the particles */
    }
  </style>
</head>
<body class="img js-fullheight" style="background-image: url(frontend/images/background_car.jpg);">
  <div id="particles-js"></div>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Car Dealership System</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Forgot Password</h3>

            @include(' _message')
    
		      	<form action="" method="post">
					{{ csrf_field() }}
		      		<div class="form-group">
		      			<input type="email" class="form-control" name="email" placeholder="Email" required>
		      		</div>
	          
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Forgot</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	
								<div class="w-50">
									<a href="{{ url('/') }}" style="color: #fff">Login</a>
								</div>
                <div class="w-50 text-md-right">
									<a href="{{ url('register')}}" style="color: #fff">Register</a>
								</div>
                
	            </div>
	          </form>
           
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/particle.js') }}"></script>

	</body>
</html>


