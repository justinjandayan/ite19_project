<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty ($header_title) ? $header_title : ''}} Car Dealer</title>
  <link rel="icon" href="{{ asset('dist/img/logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-AzjwefkQcUqjMypi+3b7FwflIXISBxJl9sZlqoT9z1ugxE5CCdh+HHRcdZc3Gp3p" crossorigin="anonymous">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset ('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset ('plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    body {
    margin: 0;
    font-family: 'Montserrat', sans-serif; /* Update to Montserrat font */
    font-size: var(--bs-body-font-size);
    font-weight: var(--bs-body-font-weight);
    line-height: var(--bs-body-line-height);
    color: var(--bs-body-color);
    text-align: var(--bs-body-text-align);
    background-color: var(--bs-body-bg);
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
}

.card {
    --bs-card-spacer-y: 1rem;
    --bs-card-spacer-x: 1rem;
    --bs-card-title-spacer-y: 0.5rem;
    --bs-card-title-color: inherit; /* Set to desired color */
    --bs-card-subtitle-color: inherit; /* Set to desired color */
    --bs-card-border-width: var(--bs-border-width);
    --bs-card-border-color: var(--bs-border-color-translucent);
    --bs-card-border-radius: var(--bs-border-radius);
    --bs-card-box-shadow: ; /* Set to desired box shadow */
    --bs-card-inner-border-radius: calc(var(--bs-border-radius) - (var(--bs-border-width)));
    --bs-card-cap-padding-y: 0.5rem;
    --bs-card-cap-padding-x: 1rem;
    --bs-card-cap-bg: rgba(var(--bs-body-color-rgb), 0.03);
    --bs-card-cap-color: inherit; /* Set to desired color */
    --bs-card-height: ; /* Set to desired height */
    --bs-card-color: inherit; /* Set to desired color */
    --bs-card-bg: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradient background */
    --bs-card-img-overlay-padding: 1rem;
    --bs-card-group-margin: 0.75rem;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    height: var(--bs-card-height);
    color: var(--bs-card-color);
    word-wrap: break-word;
    background-color: var(--bs-card-bg);
    background-clip: border-box;
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
    box-shadow: var(--bs-card-box-shadow);
}

    .main-sidebar {
        background: linear-gradient(to bottom, black, blue, violet);
    }


  .small-box.bg-success {
    background: linear-gradient(45deg, black, violet, blue);
  }


  </style>

</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper " >

    @include('layouts.header')
    


      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      
      <script>
        $(document).ready(function() {
          // Initialize DataTable with options
          var dataTable = $('#myTable').DataTable({
            "lengthChange": false, // Disable "Show X entries"
            "paging": false // Disable pagination
          });
      
          // Add event listener for the filter dropdown
          $('#requirementsFilter').on('change', function() {
            var selectedValue = $(this).val();
      
            // Use DataTables search API to filter based on the selected value
            dataTable.columns(2).search(selectedValue).draw();
          });
        });
      </script>
      
      <!-- Apply Stacktable to the table with ID 'myTable' -->
      <script>
        // Function to redirect to the logout URL
        function logout() {
            window.location.href = "{{ url('logout') }}";
        }
    
        // Function to check session timeout
        function checkSessionTimeout() {
        // Set the timeout duration in seconds (1 minute)
        var timeoutDuration = 1800;
    
            // Start a timer to check session timeout
            var timer = setInterval(function () {
                // Check if the user is still logged in (you can customize this based on your authentication setup)
                var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    
                if (!isLoggedIn) {
                    // User is not logged in, stop the timer
                    clearInterval(timer);
                }
    
                // Decrement the timeout duration
                timeoutDuration--;
    
                // Check if the timeout duration has reached zero
                if (timeoutDuration <= 0) {
                    // Session timeout reached, logout the user
                    logout();
                }
            }, 1000); // Check every second
        }
    
        // Call the checkSessionTimeout function when the page is loaded
        $(document).ready(function () {
            checkSessionTimeout();
        });
    </script>

    @yield('content')
    @include('layouts.footer')
  
</div>


<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset ('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset ('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset ('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset ('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset ('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.js') }}"></script>
<script src="{{ asset ('dist/js/pages/dashboard.js') }}"></script> 
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>

@yield('script')

</body>
</html>
