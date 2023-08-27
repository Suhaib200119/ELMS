<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">ELMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active"  href="{{ route("indexRequest_user") }}">my request</a>
          <a class="nav-link active" href="{{route("createRequest_user")}}">add request</a>
          <a class="nav-link active" href="{{route("roles_users.getRoles")}}">my roles</a>
          <form action="{{ route("logout") }}" method="post">
            @csrf
          <button type="submit" class="btn btn-danger">logout</button>
          </form>
        </div>
      </div>
    </div>
  </nav>