
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>management application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">

      <a href="{{route('index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">management dashboard </span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{route('index')}}" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{route('employees.index')}}" class="nav-link">Employee</a></li>
        <li class="nav-item"><a href="{{route('departments.index')}}" class="nav-link">Department</a></li>
        
      </ul> 
      
    </header>
</div>
      

  @yield('content')


<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <span class="text-muted">© 2021 Company Management, Inc</span>
    </div>
    
  </footer>
</div>

</body>
</html>