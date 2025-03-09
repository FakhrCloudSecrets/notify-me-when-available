<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notify Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

@if(auth()->user() && auth()->user()->hasRole('user'))
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Site</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
        <form action="{{route('logout')}}" method="get">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
    </div>
  </div>
</nav>
@endif

@if(auth()->user() && auth()->user()->hasRole('admin'))
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
        <form action="{{route('logout')}}" method="get">
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
    </div>
  </div>
</nav>
@endif

@yield('content')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@stack('scripts')
</body>
</html>
