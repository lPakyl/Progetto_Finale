<nav class="navbar nav navbar-expand-lg  fixed-top fs-7 totalglass" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand mx-0" href="{{route('homepage')}}"><img src="/media/logo.png" class="logo" alt="">
        <a class="nav-link mx-0 home1 glow2 @if(Route::is('homepage')) d-none @else btn-link @endif" aria-current="page"  href="{{route('homepage')}}">Home</a>
      </a>
      <button id="bottone" class="navbar-toggler btnCategory" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          
          <li class="nav-item @if(Route::is('homepage')) d-none @endif">
            <a class="nav-link mx-2 @if(Route::is('announcement.create')) activeNav @else btn-link @endif" href="{{route('announcement.create')}}">{{__('ui.create')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 @if(Route::is('announcement.index')) activeNav @else btn-link @endif" href="{{route('announcement.index')}}">{{__('ui.allAnnounce')}}</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-2 @if(Route::is('categoryShow')) activeNav @else btn-link @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.categories')}}
            </a>
            <ul class="dropdown-menu background-accentC">
              @foreach ($categories as $category)
                @if(App::isLocale('it'))

                  <li><a class="text-white dropdown-item" href="{{route('categoryShow',compact('category'))}}">{{$category->name}}</a></li>

                @else

                  <li><a class="text-white dropdown-item" href="{{route('categoryShow',compact('category'))}}">{{__('ui.categories'. $category->id)}}</a></li>
                
                @endif  
              @endforeach
            </ul>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle btn-link mx-2 @if(Route::is('login')) activeNav @elseif(Route::is('register')) active  @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user-astronaut fa-lg"></i>
                @auth {{Auth::user()->name}} @endauth
              </a>
              @auth
            <ul class="dropdown-menu background-accentC">
              @if(Auth::user()->is_revisor)
                <li>
                  <a class="dropdown-item text-white" href="{{route('revisor.index')}}">Revisor ({{App\Models\Announcement::toBeRevisionedCount() ?? ''}})</a>
                </li>
              @endif
              <li><a class="dropdown-item text-white" href="{{route('user.profile')}}">{{__('ui.profileName')}} {{Auth::user()->name}}</a></li>
              <li><a class="dropdown-item text-white" href="{{route('user.like')}}">Annunci seguiti</a></li>

              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-white" href="#" onclick="event.preventDefault();document.querySelector('#form-logout').submit();">Logout</a>
                </li>
                <form id="form-logout" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>
              @else
              <ul class="dropdown-menu dropdaun background-accentC">
                <li><a class="dropdown-item text-white" href="{{route('login')}}">Log In</a></li>
                <li><a class="dropdown-item text-white" href="{{route('register')}}">{{__('ui.signIn')}}</a></li>
              @endauth
            
              </ul>
          </li>

          <li class="nav-item">
            <x-_locale lang="it" />
            <x-_locale lang="en" />
            <x-_locale lang="es" />
          </li>
        </ul>
        <form action="{{route('announcements.search')}}" method="GET" class="d-flex form-search" >
          <div class="box me-2">
            <input name="searched" class="background-blackC text-white" type="search" placeholder="{{__('ui.searchAnnounce')}}" aria-label="Search">
            <a class="text-gradient" type="submit"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
        </form>
      </div>
    </div>
  </nav>