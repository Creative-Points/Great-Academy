<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path
                            d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                            id="path-1"></path>
                        <path
                            d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                            id="path-3"></path>
                        <path
                            d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                            id="path-4"></path>
                        <path
                            d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                            id="path-5"></path>
                    </defs>
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <mask id="mask-2" fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                    <g id="Path-3" mask="url(#mask-2)">
                                        <use fill="#696cff" xlink:href="#path-3"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                    </g>
                                    <g id="Path-4" mask="url(#mask-2)">
                                        <use fill="#696cff" xlink:href="#path-4"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                    </g>
                                </g>
                                <g id="Triangle"
                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text h3 menu-text fw-bolder ms-2 mt-4">Great Academy</span>
        </a>

        @role('Admin')
            @php $routeName='dashboard'; @endphp
        @elserole('Employee')
            @php $routeName='emp'; @endphp
        @elserole('instructor')
            @php $routeName='ins'; @endphp
        @endrole
        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <!-- Layouts -->
        @role('Admin')
            <li class="menu-item @if(request()->routeIs($routeName.'.home') == route($routeName.'.home')) active @endif ">
                <a href="{{route($routeName.'.home')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>
            @php
                $stmt =  request()->routeIs($routeName.'.employee.manage') == route($routeName.'.employee.manage')
                        || request()->routeIs($routeName.'.instructor.manage') == route($routeName.'.instructor.manage')
                        || request()->routeIs($routeName.'.student.view', 1) == route($routeName.'.student.view', 1)
                        || request()->routeIs($routeName.'.instructor.view', 1) == route($routeName.'.instructor.view', 1)
                        || request()->routeIs($routeName.'.employee.view', 1) == route($routeName.'.employee.view', 1)
                        || request()->routeIs($routeName.'.student.manage') == route($routeName.'.student.manage');
                $stu = request()->routeIs($routeName.'.student.manage') == route($routeName.'.student.manage')
                        || request()->routeIs($routeName.'.student.view', 1) == route($routeName.'.student.view', 1);
                $emp = request()->routeIs($routeName.'.employee.manage') == route($routeName.'.employee.manage')
                        || request()->routeIs($routeName.'.employee.view', 1) == route($routeName.'.employee.view', 1);
                $ins = request()->routeIs($routeName.'.instructor.manage') == route($routeName.'.instructor.manage')
                        || request()->routeIs($routeName.'.instructor.view', 1) == route($routeName.'.instructor.view', 1);
            @endphp
            <li class="menu-item @if($stmt) active open @endif">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    {{-- <i class="menu-icon fas fa-user-tie"></i> --}}
                    <div>Users</div>
                </a>

                <ul class="menu-sub open">
                    <li class="menu-item @if($emp) active @endif">
                        <a href="{{ route($routeName.'.employee.manage') }}" class="menu-link">
                            <div>Employees</div>
                        </a>
                    </li>
                    <li class="menu-item @if($ins) active @endif">
                        <a href="{{ route($routeName.'.instructor.manage') }}" class="menu-link">
                            <div >Instructors</div>
                        </a>
                    </li>
                    <li class="menu-item @if($stu) active @endif">
                        <a href="{{ route($routeName.'.student.manage') }}" class="menu-link">
                            <div >Students</div>
                        </a>
                    </li>
                </ul>
            </li>
            @php
                $ord =  request()->routeIs($routeName.'.order.course.manage') == route($routeName.'.order.course.manage')
                        || request()->routeIs($routeName.'.order.workshop.manage') == route($routeName.'.order.workshop.manage')
                        || request()->routeIs($routeName.'.order.course.view', 1) == route($routeName.'.order.course.view', 1)
                        || request()->routeIs($routeName.'.order.workshop.view', 1) == route($routeName.'.order.workshop.view', 1);
                $cord = request()->routeIs($routeName.'.order.course.manage') == route($routeName.'.order.course.manage')
                        || request()->routeIs($routeName.'.order.course.view', 1) == route($routeName.'.order.course.view', 1);
                $word = request()->routeIs($routeName.'.order.workshop.manage') == route($routeName.'.order.workshop.manage')
                        || request()->routeIs($routeName.'.order.workshop.view', 1) == route($routeName.'.order.workshop.view', 1);
            @endphp
            <li class="menu-item @if($ord) active open @endif">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-briefcase-alt"></i>
                    {{-- <i class="menu-icon fas fa-user-tie"></i> --}}
                    <div>Orders</div>
                </a>

                <ul class="menu-sub open">
                    <li class="menu-item @if($word) active @endif">
                        <a href="{{ route($routeName.'.order.workshop.manage') }}" class="menu-link">
                            <div>Workshop</div>
                        </a>
                    </li>
                    <li class="menu-item @if($cord) active @endif">
                        <a href="{{ route($routeName.'.order.course.manage') }}" class="menu-link">
                            <div >Course</div>
                        </a>
                    </li>
                </ul>
            </li>
            @php
                $cor = request()->routeIs($routeName.'.course.manage') == route($routeName.'.course.manage')
                        || request()->routeIs($routeName.'.course.view', 1) == route($routeName.'.course.view', 1)
            @endphp
            <li class="menu-item @if($cor) active @endif ">
                <a href="{{route($routeName.'.course.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-graduation"></i>
                    <div>Courses</div>
                </a>
            </li>
            @php
                $wor = request()->routeIs($routeName.'.workshop.manage') == route($routeName.'.workshop.manage')
                        || request()->routeIs($routeName.'.workshop.view', 1) == route($routeName.'.workshop.view', 1)
            @endphp
            <li class="menu-item @if($wor) active @endif ">
                <a href="{{route($routeName.'.workshop.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                    <div>Workshops</div>
                </a>
            </li>
            @php
                $sec = request()->routeIs($routeName.'.section.manage') == route($routeName.'.section.manage')
                        || request()->routeIs($routeName.'.section.view', 1) == route($routeName.'.section.view', 1)
            @endphp
            <li class="menu-item @if($sec) active @endif ">
                <a href="{{route($routeName.'.section.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-category"></i>
                    <div>Sections</div>
                </a>
            </li>
            @php
                $mat = request()->routeIs($routeName.'.material.manage') == route($routeName.'.material.manage')
                        || request()->routeIs($routeName.'.material.display', 1) == route($routeName.'.material.display', 1)
            @endphp
            <li class="menu-item @if($mat) active @endif ">
                <a href="{{route($routeName.'.material.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                    <div>Materials</div>
                </a>
            </li>
        @endrole

        @role('Employee')
            <li class="menu-item @if(request()->routeIs('emp.home') == route('emp.home')) active @endif ">
                <a href="{{route('emp.home')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>
            @php
                $stmt =  request()->routeIs('emp.instructor.manage') == route('emp.instructor.manage')
                        || request()->routeIs('emp.student.view', 1) == route('emp.student.view', 1)
                        || request()->routeIs('emp.instructor.view', 1) == route('emp.instructor.view', 1)
                        || request()->routeIs('emp.student.manage') == route('emp.student.manage');
                $stu = request()->routeIs('emp.student.manage') == route('emp.student.manage')
                        || request()->routeIs('emp.student.view', 1) == route('emp.student.view', 1);
                $ins = request()->routeIs('emp.instructor.manage') == route('emp.instructor.manage')
                        || request()->routeIs('emp.instructor.view', 1) == route('emp.instructor.view', 1);
            @endphp
            <li class="menu-item @if($stmt) active open @endif">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    {{-- <i class="menu-icon fas fa-user-tie"></i> --}}
                    <div>Users</div>
                </a>

                <ul class="menu-sub open">
                    <li class="menu-item @if($ins) active @endif">
                        <a href="{{ route('emp.instructor.manage') }}" class="menu-link">
                            <div >Instructors</div>
                        </a>
                    </li>
                    <li class="menu-item @if($stu) active @endif">
                        <a href="{{ route('emp.student.manage') }}" class="menu-link">
                            <div >Students</div>
                        </a>
                    </li>
                </ul>
            </li>
            @php
                $ord =  request()->routeIs('emp.order.course.manage') == route('emp.order.course.manage')
                        || request()->routeIs('emp.order.workshop.manage') == route('emp.order.workshop.manage')
                        || request()->routeIs('emp.order.course.view', 1) == route('emp.order.course.view', 1)
                        || request()->routeIs('emp.order.workshop.view', 1) == route('emp.order.workshop.view', 1);
                $cord = request()->routeIs('emp.order.course.manage') == route('emp.order.course.manage')
                        || request()->routeIs('emp.order.course.view', 1) == route('emp.order.course.view', 1);
                $word = request()->routeIs('emp.order.workshop.manage') == route('emp.order.workshop.manage')
                        || request()->routeIs('emp.order.workshop.view', 1) == route('emp.order.workshop.view', 1);
            @endphp
            <li class="menu-item @if($ord) active open @endif">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-briefcase-alt"></i>
                    {{-- <i class="menu-icon fas fa-user-tie"></i> --}}
                    <div>Orders</div>
                </a>

                <ul class="menu-sub open">
                    <li class="menu-item @if($word) active @endif">
                        <a href="{{ route('emp.order.workshop.manage') }}" class="menu-link">
                            <div>Workshop</div>
                        </a>
                    </li>
                    <li class="menu-item @if($cord) active @endif">
                        <a href="{{ route('emp.order.course.manage') }}" class="menu-link">
                            <div >Course</div>
                        </a>
                    </li>
                </ul>
            </li>
            @php
                $cor = request()->routeIs('emp.course.manage') == route('emp.course.manage')
                        || request()->routeIs('emp.course.view', 1) == route('emp.course.view', 1)
            @endphp
            <li class="menu-item @if($cor) active @endif ">
                <a href="{{route('emp.course.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-graduation"></i>
                    <div>Courses</div>
                </a>
            </li>
            @php
                $wor = request()->routeIs('emp.workshop.manage') == route('emp.workshop.manage')
                        || request()->routeIs('emp.workshop.view', 1) == route('emp.workshop.view', 1)
            @endphp
            <li class="menu-item @if($wor) active @endif ">
                <a href="{{route('emp.workshop.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                    <div>Workshops</div>
                </a>
            </li>
            @php
                $sec = request()->routeIs('emp.section.manage') == route('emp.section.manage')
                        || request()->routeIs('emp.section.view', 1) == route('emp.section.view', 1)
            @endphp
            <li class="menu-item @if($sec) active @endif ">
                <a href="{{route('emp.section.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-category"></i>
                    <div>Sections</div>
                </a>
            </li>
            @php
                $mat = request()->routeIs('emp.material.manage') == route('emp.material.manage')
                        || request()->routeIs('emp.material.display', 1) == route('emp.material.display', 1)
            @endphp
            <li class="menu-item @if($mat) active @endif ">
                <a href="{{route('emp.material.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                    <div>Materials</div>
                </a>
            </li>
        @endrole

        @role('instructor')
            <li class="menu-item @if(request()->routeIs($routeName.'.home') == route($routeName.'.home')) active @endif ">
                <a href="{{route($routeName.'.home')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>
            
            @php
                $cor = request()->routeIs($routeName.'.course.manage') == route($routeName.'.course.manage')
                        || request()->routeIs($routeName.'.course.view', 1) == route($routeName.'.course.view', 1)
            @endphp
            <li class="menu-item @if($cor) active @endif ">
                <a href="{{route($routeName.'.course.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-graduation"></i>
                    <div>Courses</div>
                </a>
            </li>
            @php
                $wor = request()->routeIs($routeName.'.workshop.manage') == route($routeName.'.workshop.manage')
                        || request()->routeIs($routeName.'.workshop.view', 1) == route($routeName.'.workshop.view', 1)
            @endphp
            <li class="menu-item @if($wor) active @endif ">
                <a href="{{route($routeName.'.workshop.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                    <div>Workshops</div>
                </a>
            </li>
            @php
                $mat = request()->routeIs($routeName.'.material.manage') == route($routeName.'.material.manage')
                        || request()->routeIs($routeName.'.material.display', 1) == route($routeName.'.material.display', 1)
            @endphp
            <li class="menu-item @if($mat) active @endif ">
                <a href="{{route($routeName.'.material.manage')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                    <div>Materials</div>
                </a>
            </li>
        @endrole

        {{-- <li class="menu-item ">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li> --}}
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">More Links</span></li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div>Settings</div>
            </a>
        </li>

        <li class="menu-item @if(request()->routeIs($routeName.'.my.account') == route($routeName.'.my.account'))active @endif">
            <a href="{{ route($routeName.'.my.account') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>My Profile</div>
            </a>
        </li>
    </ul>
</aside>
