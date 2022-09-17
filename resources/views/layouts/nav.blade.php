<header x-data="{ open: false }" class="main-header clearfix" role="header">
    <div class="logo">
        <a href="#"><em>Great</em> Academy </a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">

            @role('student')
                {{-- <x-navbar :href="route('home')" :part="'m'" :active="request()->routeIs('home')">
                    الصفحه الرئيسية
                </x-navbar> --}}
                <x-navbar :href="route('student.dashboard')" :part="'m'" :active="request()->routeIs('student.dashboard')">
                    لوحة التحكم
                </x-navbar>
                <li style="@if(request()->routeIs('sections') == route('sections') || request()->routeIs('section', 1) == route('section', 1))background: #008510; @endif">
                    <a href="{{ route('sections') }}">
                        الاقسام
                    </a>
                </li>
                <li style="@if(request()->routeIs('courses') == route('courses') || request()->routeIs('course', 1) == route('course', 1))background: #008510; @endif">
                    <a href="{{ route('courses') }}">
                        كورسات
                    </a>
                </li>
                <li style="@if(request()->routeIs('workshops') == route('workshops') || request()->routeIs('workshop', 1) == route('workshop', 1))background: #008510; @endif">
                    <a href="{{ route('workshops') }}">
                        ورش العمل
                    </a>
                </li>
                <x-navbar :href="route('contact-us')" :part="'m'" :active="request()->routeIs('contact-us')">
                    بروفايل
                </x-navbar>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">
                            خروج
                        </a>
                    </form>
                </li>
            @else
                <x-navbar :href="route('home')" :part="null" :active="request()->routeIs('home')">
                    الصفحة الرئيسية
                </x-navbar>
                <li style="@if(request()->routeIs('sections') == route('sections') || request()->routeIs('section', 1) == route('section', 1))background: #008510; @endif">
                    <a href="{{ route('sections') }}">
                        الاقسام
                    </a>
                </li>
                <li style="@if(request()->routeIs('courses') == route('courses') || request()->routeIs('course', 1) == route('course', 1))background: #008510; @endif">
                    <a href="{{ route('courses') }}">
                        كورسات
                    </a>
                </li>
                <li style="@if(request()->routeIs('workshops') == route('workshops') || request()->routeIs('workshop', 1) == route('workshop', 1))background: #008510; @endif">
                    <a href="{{ route('workshops') }}">
                        ورش العمل
                    </a>
                </li>
                <x-navbar :href="route('about')" :part="null" :active="request()->routeIs('about')">
                    عن الأكاديمية
                </x-navbar>

                <x-navbar :href="route('contact-us')" :part="null" :active="request()->routeIs('contact-us')">
                    اتصل بنا
                </x-navbar>

                <x-navbar :href="route('login')" :part="null" :active="request()->routeIs('login')">
                    دخول
                </x-navbar>
            @endrole
        </ul>
    </nav>
</header>
