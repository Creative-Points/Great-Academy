<header x-data="{ open: false }" class="main-header clearfix" role="header">
    <div class="logo">
        <a href="#"><em>Great</em> Academy  </a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Home
            </x-nav-link>
            <x-nav-link :href="'sections'" :active="request()->routeIs('dashboard')">
                Sections
            </x-nav-link>
            <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                Courses
            </x-nav-link>
            <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                Workshops
            </x-nav-link>
            <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                About Us
            </x-nav-link>
            <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                Countact US
            </x-nav-link>
        </ul>
    </nav>
</header>
