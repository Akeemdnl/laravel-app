<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/">Student Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Add Student") ? 'active' : '' }}" href="/add">Add Student</a>
                </li>
                <li>
                    <a class="nav-link {{ ($title === "Logout") ? 'active' : '' }}" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Login") ? 'active' : '' }}" href="/login">Login</a>
                </li>
            @endif
  
        </ul>
        </div>
    </div>
 </nav>