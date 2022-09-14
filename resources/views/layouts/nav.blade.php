<header x-data="{ open: false }" class="main-header clearfix" role="header">
    <div class="logo">
        <a href="#"><em>Great</em> Academy </a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">

            @role('student')
            <x-navbar :href="route('student.dashboard')" :active="request()->routeIs('student.dashboard')">
                Home
            </x-navbar>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Logout
                    </a>
                </form>
            </li>
            @else
            <x-navbar :href="route('home')" :active="request()->routeIs('home')">
                الصفحه الرئيسيه
            </x-navbar>
            <x-navbar :href="route('sections')" :active="request()->routeIs('sections')">
                الأقسام الدراسية
            </x-navbar>
            <x-navbar :href="route('courses')" :active="request()->routeIs('courses')">
                الكورسات
            </x-navbar>
            <x-navbar :href="route('workshops')" :active="request()->routeIs('workshops')">
                ورش العمل
            </x-navbar>
            <x-navbar :href="route('about')" :active="request()->routeIs('about')">
                عن الأكاديمية
            </x-navbar>
        
            <x-navbar :href="route('contact-us')" :active="request()->routeIs('contact-us')">
                اتصل بنا
            </x-navbar>

            <x-navbar :href="route('login-studetn')" :active="request()->routeIs('login-studetn')">
                تسجيل
            </x-navbar>
            @endrole
        </ul>
    </nav>
</header>