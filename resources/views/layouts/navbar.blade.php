  <header class="header-global">

   <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-6 navbar-dark navbar-theme-primary">
        <div class="container">
            <a class="navbar-brand d-none" href="./index.html">
                <img class="navbar-brand-dark common" src="./front/assets/img/brand/light.svg" height="35" alt="Logo light">
                <img class="navbar-brand-light common" src="./front/assets/img/brand/dark.svg" height="35" alt="Logo dark">
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="/">
                                <img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" height="35" alt="Logo larastack">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse"
                                data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover justify-content-center">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Larastack</a>
                    </li>
                    <li class="nav-item"> 
                        <a href="/pertanyaan/top"class="nav-link"><i class="fa fa-fire"></i> Top</a>
           
                    </li>
                    <li class="nav-item">
                             <a href="/pertanyaan/terbaru" class="nav-link"><i class="fas fa-paper-plane mr-2"></i> Pertanyaan terbaru</a>
                    </li>
                    <li class="nav-item">
                         <a href="/pertanyaan/tambah" class="nav-link"><i class="fa fa-question-circle"></i> Tanya</a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-block d-lg-none">
               <ul class="navbar-nav navbar-nav-hover justify-content-center"> 
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                   
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                            <span class="nav-link-inner-text"> {{ Auth::user()->name }}</span>
                            <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
                        </a>
                        <ul class="dropdown-menu" id="pages_submenu">
                            <li><a class="dropdown-item" href="/pertanyaan/tampil/{{Auth::id()}}">Pertanyaanku</a></li>
                            <li><a class="dropdown-item" href="/jawaban/tampil/{{Auth::id()}}">Jawabanku</a></li>
                            <li class="dropdown-item">Reputasiku : {{ Auth::user()->reputasi }} Poin </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            </li>
                        </ul>
                     
                    </li>
                     @endguest
                </ul>
          
            </div>
            <div class="d-flex d-lg-none align-items-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
            </div>
        </div>
    </nav>
    </header>