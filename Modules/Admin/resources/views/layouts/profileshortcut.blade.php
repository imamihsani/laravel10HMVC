<li class="nav-item dropdown">
    <a class="nav-link p-1" data-toggle="dropdown" href="#">
    <div class="image">
        <img src="{{ asset('images/profile_pictures/' . Auth::user()->pp) }}" class="img-circle elevation-2" alt="{{Auth::user()->pp}}" width="30" height="30">
    </div>
    </a>
    <div class="dropdown-menu p-0 m-0">
    <a class="btn btn-sm btn-link text-dark" type="button" href="{{ url('profile/profile') }}"><i class="fa fa-user"></i> Profile</a>
    <form method="POST" class="p-0 m-0" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link btn-sm text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
    </div>
</li>