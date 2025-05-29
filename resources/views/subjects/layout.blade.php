<html>
<head>
    <title>School Management System </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-warning bg-warning">
        <div class="container">
            <a class="navbar-brand text-dark" href="{{ url('/') }}">School Management System</a>
            <a class="navbar-brand text-dark" href="{{ url('/')}}" >Teacher</a>
            <a class="navbar-brand text-dark" href="{{ url('/students')}}">Student</a>
            <a class="navbar-brand text-dark" href="{{ url('/subjects')}}" >Subject</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
