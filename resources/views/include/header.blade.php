<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-list-task me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 1 .5-.5h.5V2h1v.5h.5a.5.5 0 0 1 0 1h-.5V4h-1V3.5h-.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h.5V6h1v.5h.5a.5.5 0 0 1 0 1h-.5V8h-1V7.5h-.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h.5v-.5h1v.5h.5a.5.5 0 0 1 0 1h-.5V12h-1v-.5h-.5a.5.5 0 0 1-.5-.5zM5 3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 5 3zm0 4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 5 7zm0 4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
            </svg>
            Your TaskManager
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a> </li>
                <li class="nav-item"> <a class="nav-link active" href="{{route('logout')}}">Logout</a> </li>
            </ul>
            <a class="btn btn-outline-success" href="{{ route('tasks.add') }}">Add Tasks</a>
        </div>
    </div>
  </nav>
</header>

