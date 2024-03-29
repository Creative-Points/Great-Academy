@section('title', 'View Student | Great Academy')
<x-admin-layout>
    @role('Admin')
        @php $routeName='dashboard'; @endphp
    @elserole('Employee')
        @php $routeName='emp'; @endphp
    @elserole('instructor')
        @php $routeName='ins'; @endphp
    @endrole
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Users / Student /</span> View
    </h4>
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @if (session('error'))
        <h6 class="alert alert-danger">{{ session('error') }}</h6>
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
                                <h4 class="mb-2">{{ $users->name }}</h4>
                                <span class="badge bg-label-secondary">Student</span>
                                @if ($users->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($users->status == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @else
                                    <span class="badge bg-label-danger">Suspended</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap my-3 py-3">
                        <div class="d-flex align-items-start me-1 mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bxs-graduation bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">{{ $c_courses }}</h5>
                                <span>Courses</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bx-chalkboard bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">{{ $c_workshops }}</h5>
                                <span>Workshops</span>
                            </div>
                        </div>
                    </div>
                    <h5 class="pb-2 border-bottom mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ $users->name }}</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-bold me-2">Email:</span>
                                <span>{{ $users->email }}</span>
                            </li>
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                @if ($users->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($users->status == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @else
                                    <span class="badge bg-label-danger">Suspended</span>
                                @endif
                            </li> --}}
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Role:</span>
                                <span>Student</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-bold me-2">Code:</span>
                                <span>{{ $users->code }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Contact:</span>
                                <span>{{ $users->phone }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Address:</span>
                                <span>{{ $users->address }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">University:</span>
                                <span>{{ $users->university }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Faculty Of:</span>
                                <span>{{ $users->faculty }}</span>
                            </li>
                        </ul>
                        @hasanyrole('Admin|Employee')
                            <div class="d-flex justify-content-center pt-3">
                                @if ($users->status == 1 || $users->status == 2)
                                    <a href="{{ route($routeName.'.student.suspended', $users->id) }}"
                                        class="btn btn-label-danger suspend-user">Suspended</a>
                                @elseif($users->status == 3)
                                    <a href="{{ route($routeName.'.student.active', $users->id) }}"
                                        class="btn btn-label-success suspend-user">Active</a>
                                @endif
                            </div>
                        @endhasanyrole
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
                        <form method="POST" class="row g-3"
                            action="{{ route($routeName.'.student.update', $users->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-fullname">Full Name</label>
                                <input type="text" class="form-control" id="add-user-fullname"
                                    placeholder="Nabil Hamada" name="name" value="{{ $users->name }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-contact">Phone</label>
                                <input type="text" id="add-user-contact" class="form-control phone-mask"
                                    placeholder="01234567890" name="phone" value="{{ $users->phone }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="add-user-email">Email</label>
                                <input type="email" id="add-user-email" class="form-control"
                                    placeholder="nabil.hamada@example.com" name="email"
                                    value="{{ $users->email }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="status" class="form-select"
                                    aria-label="Default select example">
                                    <option selected="">Status</option>
                                    <option value="1" @if ($users->status == 1) selected @endif>Active
                                    </option>
                                    <option value="2" @if ($users->status == 2) selected @endif>Inactive
                                    </option>
                                    <option value="3" @if ($users->status == 3) selected @endif>Suspended
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-address">Address</label>
                                <input type="text" id="add-user-address" class="form-control"
                                    placeholder="Country, City, Street .." name="address"
                                    value="{{ $users->address }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-university">University</label>
                                <input type="text" id="add-user-university" class="form-control"
                                    placeholder="Cairo University" name="university"
                                    value="{{ $users->university }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-faculty">Faculty of</label>
                                <input type="text" id="add-user-faculty" class="form-control" placeholder="IS"
                                    name="faculty" value="{{ $users->faculty }}" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route($routeName.'.student.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                        <!-- Change Password -->
                        <h5 class="card-header">Change Password</h5>
                        <div class="card-body">
                            <form id="formChangePassword" method="POST"
                                action="{{ route($routeName.'.student.password', $users->id) }}">
                                @csrf
                                <div class="alert alert-warning" role="alert">
                                    <h6 class="alert-heading fw-bold mb-1">Ensure that these requirements are met
                                    </h6>
                                    <span>Minimum 8 characters long, uppercase & symbol</span>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                        <label class="form-label" for="newPassword">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" id="newPassword"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
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
                                            <th>Price</th>
                                            <th>Hours</th>
                                            <th>Paid</th>
                                            <th>Remaining amount</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courses as $item)
                                            <tr class="odd">
                                                <td class=" control" tabindex="0" style="">
                                                    {{ $item->id }}</td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3">
                                                                <img src="/uploads/course/{{ $item->image }}"
                                                                    alt="{{ $item->name }}" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="{{ route($routeName.'.course.view', $item->slug) }}"
                                                                class="text-body text-truncate">
                                                                <span class="fw-semibold">
                                                                    {{ $item->name }}
                                                                </span>
                                                            </a>
                                                            <a
                                                                href="{{ route($routeName.'.section.view', $item->sslug) }}">
                                                                <small
                                                                    class="text-muted">{{ $item->section_name }}</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-history bx-xs"></i>
                                                        </span>
                                                        {{ $item->level }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-dollar bx-xs"></i>
                                                        </span>
                                                        {{ $item->price }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-time bx-xs"></i>
                                                        </span>
                                                        {{ $item->hours }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        {{-- <span
                                                        class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">
                                                        <i class="bx bx-time bx-xs"></i>
                                                    </span> --}}
                                                        {{ $item->is_paid == 0 ? 'No' : 'Yes' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-dollar bx-xs"></i>
                                                        </span>
                                                        {{ $item->price - $item->amount_paid }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($item->progress == 0)
                                                        <span class="badge bg-label-secondary">Not Studying</span>
                                                    @elseif ($item->progress == 1)
                                                        <span class="badge bg-label-info">Studying</span>
                                                    @elseif ($item->progress == 2)
                                                        <span class="badge bg-label-success">Complated</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="{{ route($routeName.'.order.course.view', $item->ocode) }}"
                                                                class="dropdown-item">View</a>
                                                            {{-- @if ($item->status == 3 || $item->status == 2)
                                                            <a href="{{ route($routeName.'.course.active', $item->slug) }}" class="dropdown-item">Active</a>
                                                        @else
                                                            <a href="{{ route($routeName.'.course.inactive', $item->slug) }}" class="dropdown-item">Inactive</a>
                                                        @endif --}}
                                                            @role('Admin')
                                                                {{-- <div class="dropdown-divider"></div>
                                                                <form class="" method="POST"
                                                                    action="{{ route($routeName.'.course.delete', $item->slug) }}"
                                                                    onsubmit="return confirm('Are you sure?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger delete-record"
                                                                        id="confirm-">Delete</button>
                                                                </form> --}}
                                                            @endrole
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="odd">
                                                <td class="text-muted text-center" colspan="9">No data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $courses->links() }}
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
                                            <th>Price</th>
                                            <th>Hours</th>
                                            <th>Paid</th>
                                            <th>Remaining amount</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($workshops as $item)
                                            <tr class="odd">
                                                <td class=" control" tabindex="0" style="">
                                                    {{ $item->id }}</td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3">
                                                                <img src="/uploads/workshop/{{ $item->image }}"
                                                                    alt="{{ $item->name }}" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="{{ route($routeName.'.course.view', $item->slug) }}"
                                                                class="text-body text-truncate">
                                                                <span class="fw-semibold">
                                                                    {{ $item->name }}
                                                                </span>
                                                            </a>
                                                            <a
                                                                href="{{ route($routeName.'.section.view', $item->sslug) }}">
                                                                <small
                                                                    class="text-muted">{{ $item->section_name }}</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-history bx-xs"></i>
                                                        </span>
                                                        {{ $item->level }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-dollar bx-xs"></i>
                                                        </span>
                                                        {{ $item->price }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-time bx-xs"></i>
                                                        </span>
                                                        {{ $item->hours }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        {{-- <span
                                                        class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">
                                                        <i class="bx bx-time bx-xs"></i>
                                                    </span> --}}
                                                        {{ $item->is_paid == 0 ? 'No' : 'Yes' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center">
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2">
                                                            <i class="bx bx-dollar bx-xs"></i>
                                                        </span>
                                                        {{ $item->price - $item->amount_paid }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($item->progress == 0)
                                                        <span class="badge bg-label-secondary">Not Studying</span>
                                                    @elseif ($item->progress == 1)
                                                        <span class="badge bg-label-info">Studying</span>
                                                    @elseif ($item->progress == 2)
                                                        <span class="badge bg-label-success">Complated</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="{{ route($routeName.'.order.workshop.view', $item->ocode) }}"
                                                                class="dropdown-item">View</a>
                                                            {{-- @if ($item->status == 3 || $item->status == 2)
                                                            <a href="{{ route($routeName.'.course.active', $item->slug) }}" class="dropdown-item">Active</a>
                                                        @else
                                                            <a href="{{ route($routeName.'.course.inactive', $item->slug) }}" class="dropdown-item">Inactive</a>
                                                        @endif --}}
                                                            @role('Admin')
                                                                {{-- <div class="dropdown-divider"></div>
                                                                <form class="" method="POST"
                                                                    action="{{ route($routeName.'.course.delete', $item->slug) }}"
                                                                    onsubmit="return confirm('Are you sure?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger delete-record"
                                                                        id="confirm-">Delete</button>
                                                                </form> --}}
                                                            @endrole
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="odd">
                                                <td class="text-muted text-center" colspan="9">No data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $workshops->links() }}
                        <!-- /Project table -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ User Content -->
    </div>


</x-admin-layout>
