<header>
    <nav class="container navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('/')}}">CopyStar</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('about')}}">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('catalog')}}">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('where')}}">Где нас найти?</a>
                    </li>
                </ul>
                <div>
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                            <a href="{{ route('admin') }}" class="btn-outline-primary btn">Панель админа</a>
                        @else
                            <a href="{{route('basket')}}" class="btn-outline-primary btn">Корзина</a>
                            <a href="{{route('orders')}}" class="btn-outline-primary btn">Заказы</a>

                        @endif
                        <a href="{{ route('logout') }}" class="btn btn-danger">Выйти</a>
                    @endauth
                    @guest()
                        <a href="{{ route('auth') }}" class="btn btn-outline-primary">Вход</a>
                        <a href="{{ route('registr') }}" class="btn btn-primary">Регистрация</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>

