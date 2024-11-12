<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestine Day 2025</title>
    <link href="{{ asset('assets/images/logo_palestine_day.png') }}" rel="icon" type="image/jpg">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css?v=').time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"  type='text/css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
</head>

<body>
    <div>
        <main>
            @if ($message = Session::get('success'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                <div class="alert alert-success alert-block">	
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @endif
      
            @if ($message = Session::get('error'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                <div class="alert alert-danger alert-block" aria-label="close">	
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @endif
      
          @if ($message = Session::get('warning'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">  
                <div class="alert alert-warning alert-block">	
                    <strong>{{ $message }}</strong>
                </div>
            </div>
          @endif
      
          @if ($message = Session::get('info'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">  
                <div class="alert alert-info alert-block">	
                    <strong>{{ $message }}</strong>
                </div>
            </div>
          @endif
      
          @if ($errors->any())
            <div class="alert alert-danger">	
              Please check the form below for errors
          </div>
          @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
