@section('title', 'Profile | Great Academy')
<x-admin-layout>
    @role('Admin')
        @php $routeName='dashboard'; @endphp
    @elserole('Employee')
        @php $routeName='emp'; @endphp
    @elserole('instructor')
        @php $routeName='ins'; @endphp
    @endrole
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Employee /</span> My Profile
    </h4>
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-4" src="/admin/asset/img/avatars/10.png" height="110"
                                width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ auth()->user()->name }}</h4>
                                <span class="badge bg-label-primary">
                                    @if (auth()->user()->roles)
                                        @foreach (auth()->user()->roles as $role)
                                            @if($role->name == 'Admin')
                                                Admin
                                            @elseif ($role->name == 'Employee')
                                                Employee
                                            @elseif ($role->name == 'instructor')
                                                Instructor
                                            @endif
                                        @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                        <div class="d-flex align-items-start me-4 mt-3 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-check bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">1.23k</h5>
                                <span>Tasks Done</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bx-customize bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">568</h5>
                                <span>Projects Done</span>
                            </div>
                        </div>
                    </div> --}}
                    <h5 class="pb-2 border-bottom mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ auth()->user()->name }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Email:</span>
                                <span>{{ auth()->user()->email }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                @if (auth()->user()->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif (auth()->user()->status == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @else
                                    <span class="badge bg-label-danger">Suspended</span>
                                @endif
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Contact:</span>
                                <span>{{ auth()->user()->phone }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Address:</span>
                                <span>{{ auth()->user()->address }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">University:</span>
                                <span>{{ auth()->user()->university }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Faculty Of:</span>
                                <span>{{ auth()->user()->faculty }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->


        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-account" aria-controls="navs-pills-justified-account"
                            aria-selected="true">
                            <i class="bx bx-user me-1"></i>
                            Account
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-security"
                            aria-controls="navs-pills-justified-security" aria-selected="false"><i
                                class="bx bx-lock-alt me-1"></i>Security</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-course" aria-controls="navs-pills-justified-security"
                            aria-selected="false"><i class='bx bxs-graduation me-1'></i>Courses</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-workshop" aria-selected="false">
                            <i class='bx bx-chalkboard me-1'></i>Workshops</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-account" role="tabpanel">

                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        <div class="text-center mb-4">
                            <h3>Edit User Information</h3>
                            <p>Updating Student details will receive a privacy audit.</p>
                        </div>
                        <form method="POST" class="row g-3" action="{{ route($routeName.'.my.update') }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-fullname">Full Name</label>
                                <input type="text" class="form-control" id="add-user-fullname"
                                    placeholder="Nabil Hamada" name="name" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-contact">Phone</label>
                                <input type="text" id="add-user-contact" class="form-control phone-mask"
                                    placeholder="01234567890" name="phone" value="{{ auth()->user()->phone }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-email">Email</label>
                                <input type="email" id="add-user-email" class="form-control"
                                    placeholder="nabil.hamada@example.com" name="email" value="{{ auth()->user()->email }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-address">Address</label>
                                <input type="text" id="add-user-address" class="form-control"
                                    placeholder="Country, City, Street .." name="address" value="{{ auth()->user()->address }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-university">University</label>
                                <input type="text" id="add-user-university" class="form-control"
                                    placeholder="Cairo University" name="university" value="{{ auth()->user()->university }}" >
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-faculty">Faculty of</label>
                                <input type="text" id="add-user-faculty" class="form-control"
                                    placeholder="IS" name="faculty" value="{{ auth()->user()->faculty }}" >
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route($routeName.'.home') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                        <!-- Change Password -->
                        <h5 class="card-header">Change Password</h5>
                        <div class="card-body">
                            <form id="formChangePassword" method="POST" action="{{ route($routeName.'.my.password') }}">
                                <div class="alert alert-warning" role="alert">
                                    <h6 class="alert-heading fw-bold mb-1">Ensure that these requirements are met
                                    </h6>
                                    <span>Minimum 8 characters long, uppercase & symbol</span>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                        <label class="form-label" for="newPassword">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input 
                                                class="form-control" 
                                                type="password" 
                                                id="newPassword"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                            <span class="input-group-text cursor-pointer">
                                                <i class="bx bx-hide"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                        <label class="form-label" for="confirmPassword">Confirm New
                                            Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" name="confirmPassword"
                                                id="confirmPassword"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-2">Change
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/ Change Password -->
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-course" role="tabpanel">
                        <!-- Project table -->
                        <div class=" mb-4">
                            <h5 class="card-header">Student's Courses List</h5>
                            <div class="table-responsive mb-3">
                                <table class="table datatable-project border-top">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th class="text-nowrap">Level</th>
                                            <th>Progress</th>
                                            <th>Hours</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /Project table -->
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-workshop" role="tabpanel">
                        <!-- Project table -->
                        <div class=" mb-4">
                            <h5 class="card-header">Student's Workshops List</h5>
                            <div class="table-responsive mb-3">
                                <table class="table datatable-project border-top">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th class="text-nowrap">Level</th>
                                            <th>Progress</th>
                                            <th>Hours</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /Project table -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ User Content -->
    </div>


</x-admin-layout>
