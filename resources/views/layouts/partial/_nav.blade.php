    <div id="app">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm" id="nbr">
            <div class="container-fluid collapse navbar-collapse">
                <a class="navbar-brand  text-black-50" href="{{ url('/home') }}">
                <img src="{{URL::asset('/images/win.png')}}" height="25" width="25">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link text-black-50" href="{{ route('home') }}">{{__('home')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-black-50" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               {{__('products')}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('products.index') }}" a>{{__('All products')}}</a>
                                <a class="dropdown-item" href="{{ route('card') }}">{{__('Cards products')}}</a>
                                <a class="dropdown-item disabled" href="{{ route('products.create') }}">{{__('Add product')}}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-black-50" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('categories')}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(App\Categorie::all()->sortBy('nom') as $categorie)
                                    <a class="dropdown-item" href="{{ route('category',['nom'=>$categorie->nom]) }}">{{ $categorie->nom }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link  text-black-50" href="{{ route('contact') }}">{{__('contact us')}}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link  text-black-50" href="{{ route('cart.index') }}">your cart <span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0 input-group w-100 d-flex" action="{{ route('search') }}" method="get">
                                <input class="form-control mr-2" type="search" placeholder="Search a product here" aria-label="Search" name="query" required id='search'>
                                <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i> Search</button>
                            </form>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link  text-black-50" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link  text-black-50" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth()->user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>
                                    <a href="#" class="dropdown-item text-center">Mon Profil</a>

                                    <a href="{{route('order.index')}}" class="dropdown-item text-center">Mes Commandes</a>

                                    <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="mt-2">
                                <a href="">
                                    <img src="{{ asset('images/FK.png') }}">
                                </a>
                                <a href="">
                                    <img src="{{ asset('images/FR.png') }}">
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $("#search").keyup(function()
        {
            _this = this;
            $.each($("#table tbody tr"), function()
            {
                if($(this).text().toLowerCase().indexOf($(_this).val()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>

