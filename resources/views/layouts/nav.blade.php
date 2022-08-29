<header x-data="{ open: false }" class="main-header clearfix" role="header">
    <div class="logo">
        <a href="#"><em>Great</em> Academy  </a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <x-navbar :href="route('home')" :active="request()->routeIs('home')">
                Home
            </x-navbar>
            <x-navbar :href="'sections'" :active="request()->routeIs('dashboard')">
                Sections
            </x-navbar>
            <x-navbar :href="route('home')" :active="request()->routeIs('dashboard')">
                Courses
            </x-navbar>
            <x-navbar :href="route('home')" :active="request()->routeIs('dashboard')">
                Workshops
            </x-navbar>
            <x-navbar :href="route('home')" :active="request()->routeIs('dashboard')">
                About Us
            </x-navbar>
            <x-navbar :href="route('home')" :active="request()->routeIs('dashboard')">
                Countact US
            </x-navbar>
        </ul>
    </nav>
</header>
