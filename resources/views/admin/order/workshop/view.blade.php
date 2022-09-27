@section('title', 'View Student | Great Academy')
<x-admin-layout>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Orders / Workshop /</span> View
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
        <div class="col-xl-4 col-lg-4 col-md-4 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-4" src="/admin/asset/img/avatars/10.png" height="110"
                                width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ $order->username }}</h4>
                                <span class="badge bg-label-secondary">Student</span>
                                @if ($order->ustatus == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($order->ustatus == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @else
                                    <span class="badge bg-label-danger">Suspended</span>
                                @endif
                                @if ($order->progress == 2)
                                    <span class="badge bg-label-success">Graduation</span>
                                @elseif ($order->progress == 0)
                                    <span class="badge bg-label-secondary">Not Studying</span>
                                @else
                                    <span class="badge bg-label-info">Studying</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-around flex-wrap my-3 py-3">
                        <div class="d-flex align-items-start me-1 mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class='bx bxs-graduation bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">11</h5>
                                <span>Courses</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bx-chalkboard bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">0</h5>
                                <span>Workshops</span>
                            </div>
                        </div>
                    </div> --}}
                    <h5 class="pb-2 border-bottom mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ $order->name }}</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-bold me-2">Email:</span>
                                <span>{{ $order->email }}</span>
                            </li>
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                @if ($order->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($order->status == 2)
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
                                <span>{{ $order->code }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Contact:</span>
                                <span>{{ $order->phone }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Address:</span>
                                <span>{{ $order->address }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">University:</span>
                                <span>{{ $order->university }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Faculty Of:</span>
                                <span>{{ $order->faculty }}</span>
                            </li>
                        </ul>
                        {{-- <div class="d-flex justify-content-center pt-3">
                            @if ($order->ustatus == 1 || $order->ustatus == 2)
                                <a href="{{ route('dashboard.student.suspended', $order->uid) }}" class="btn btn-label-danger suspend-user">Suspended</a>
                            @elseif($order->ustatus == 3)
                                <a href="{{ route('dashboard.student.active', $order->uid) }}" class="btn btn-label-success suspend-user">Active</a>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- Workshop Sidebar -->
        <div class="col-xl-4 col-lg-4 col-md-4 order-1 order-md-0">
            <!-- workshop Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-2" src="/uploads/workshop/{{ $order->image }}"
                                height="110" width="190" alt="User avatar">
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ $order->name }}</h4>
                                <span class="badge bg-label-info">Workshop</span>
                                @if ($order->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($order->status == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @else
                                    <span class="badge bg-label-danger">Suspended</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-around flex-wrap my-3 py-3">
                        <div class="d-flex align-items-start me-1 mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class='bx bxs-graduation bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">11</h5>
                                <span>Courses</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bx-chalkboard bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">0</h5>
                                <span>Workshops</span>
                            </div>
                        </div>
                    </div> --}}
                    <h5 class="pb-2 border-bottom mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ $order->name }}</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-bold me-2">Description:</span><br>
                                <span style="white-space: pre">{{ $order->description }}</span>
                            </li>
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                @if ($order->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($order->status == 2)
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
                                <span class="fw-bold me-2">Price:</span>
                                <span>{{ $order->price }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Levels:</span>
                                <span>{{ $order->level }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Hours:</span>
                                <span>{{ $order->hours }}</span>
                            </li>
                        </ul>
                        {{-- <div class="d-flex justify-content-center pt-3">
                            @if ($order->ustatus == 1 || $order->ustatus == 2)
                                <a href="{{ route('dashboard.student.suspended', $order->uid) }}" class="btn btn-label-danger suspend-user">Suspended</a>
                            @elseif($order->ustatus == 3)
                                <a href="{{ route('dashboard.student.active', $order->uid) }}" class="btn btn-label-success suspend-user">Active</a>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- /workshop Card -->
        </div>
        <!--/ workshop Sidebar -->

        <!-- Order Sidebar -->
        <div class="col-xl-4 col-lg-4 col-md-4 order-1 order-md-0">
            <!-- Order Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            {{-- <img class="img-fluid rounded my-2" src="/uploads/workshop/{{ $order->image }}" height="110"
                                width="190" alt="User avatar"> --}}
                            <div class="user-info text-center">
                                <h4 class="mb-2">Order Details</h4>
                                <span class="badge bg-label-info">Order</span>
                                @if ($order->ostatus == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($order->ostatus == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @else
                                    <span class="badge bg-label-danger">Suspended</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-around flex-wrap my-3 py-3">
                        <div class="d-flex align-items-start me-1 mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class='bx bxs-graduation bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">11</h5>
                                <span>Courses</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bx-chalkboard bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">0</h5>
                                <span>Workshops</span>
                            </div>
                        </div>
                    </div> --}}
                    <h5 class="pb-2 border-bottom mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ $order->name }}</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-bold me-2">Code:</span>
                                <span>{{ $order->ocode }}</span>
                            </li>
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                @if ($order->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($order->status == 2)
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
                                <span class="fw-bold me-2">Paid?:</span>
                                <span>{{ $order->is_paid == 0 ? 'No' : 'Yes' }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Amount Paid:</span>
                                <span>{{ $order->amount_paid }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Remaining amount:</span>
                                <span>{{ $rem = $order->price - $order->amount_paid }}</span>
                            </li>
                        </ul>
                        <div class="divider">
                            <div class="divider-text">Order Pay</div>
                        </div>
                        <form method="POST" class="row g-3"
                            action="{{ route('dashboard.order.workshop.pay', $order->ocode) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-6">
                                <input type="hidden" name="rem" value="{{ $rem }}">
                                <label class="form-label" for="add-order-amount">Amount</label>
                                <input type="number" class="form-control" id="add-order-amount" placeholder="000"
                                    name="amount" value="{{ $rem }}" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Pay</button>
                                <a href="{{ route('dashboard.order.workshop.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                        <div class="divider">
                            <div class="divider-text">Student progression in this course</div>
                        </div>
                        <form method="POST" class="row g-3"
                            action="{{ route('dashboard.order.course.update', $order->ocode) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-6">
                                {{-- <input type="hidden" name="rem" value="{{ $rem }}"> --}}
                                <label class="form-label" for="add-order-progress">Progress</label>
                                {{-- <input type="radio" class="form-control" id="add-order-progress"
                                    placeholder="000" name="amount" value="" required> --}}
                                <div class="row">
                                    <div class="col-12 mb-md-0 mb-2">
                                        <div
                                            class="form-check custom-option custom-option-basic {{ $order->progress == 0 ? 'checked' : '' }}">
                                            <label class="form-check-label custom-option-content"
                                                for="customRadioTemp1">
                                                <input name="progress" class="form-check-input" type="radio"
                                                    value="0" id="customRadioTemp1" required
                                                    {{ $order->progress == 0 ? 'checked' : '' }}>
                                                <span class="custom-option-header">
                                                    <span class="h6 mb-0">Not Studying</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div
                                            class="form-check custom-option custom-option-basic {{ $order->progress == 1 ? 'checked' : '' }}">
                                            <label class="form-check-label custom-option-content"
                                                for="customRadioTemp2">
                                                <input name="progress" class="form-check-input" type="radio"
                                                    value="1" id="customRadioTemp2" required
                                                    {{ $order->progress == 1 ? 'checked' : '' }}>
                                                <span class="custom-option-header">
                                                    <span class="h6 mb-0">Studying</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div
                                            class="form-check custom-option custom-option-basic {{ $order->progress == 2 ? 'checked' : '' }}">
                                            <label class="form-check-label custom-option-content"
                                                for="customRadioTemp3">
                                                <input name="progress" class="form-check-input" type="radio"
                                                    value="2" id="customRadioTemp3" required
                                                    {{ $order->progress == 2 ? 'checked' : '' }}>
                                                <span class="custom-option-header">
                                                    <span class="h6 mb-0">Graduation</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route('dashboard.order.course.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                        <div class="divider">
                            <div class="divider-text">Order Status</div>
                        </div>
                        <div class="d-flex justify-content-center pt-3">
                            @if ($order->ostatus == 1)
                                <a href="{{ route('dashboard.order.workshop.suspend', $order->ocode) }}"
                                    class="btn btn-label-danger suspend-user">Suspended</a>
                                <a href="{{ route('dashboard.order.workshop.inactive', $order->ocode) }}"
                                    class="btn btn-label-secondary suspend-user">Inactive</a>
                            @elseif($order->ostatus == 2)
                                <a href="{{ route('dashboard.order.workshop.suspend', $order->ocode) }}"
                                    class="btn btn-label-danger suspend-user">Suspended</a>
                                <a href="{{ route('dashboard.order.workshop.active', $order->ocode) }}"
                                    class="btn btn-label-success suspend-user">Active</a>
                            @elseif($order->ostatus == 3)
                                <a href="{{ route('dashboard.order.workshop.inactive', $order->ocode) }}"
                                    class="btn btn-label-secondary suspend-user">Inactive</a>
                                <a href="{{ route('dashboard.order.workshop.active', $order->ocode) }}"
                                    class="btn btn-label-success suspend-user">Active</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Order Card -->
        </div>
        <!--/ Order Sidebar -->


        <!-- User Content -->
        {{-- <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-account" aria-controls="navs-pills-justified-account"
                            aria-selected="true">
                            <i class="bx bx-chalkboard me-1"></i>
                            Order
                        </button>
                    </li>
                    {{-- <li class="nav-item">
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
                    </li> --
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-account" role="tabpanel">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Edit User Information</h3>
                            <p>Updating Student details will receive a privacy audit.</p>
                        </div>
                        <form method="POST" class="row g-3" action="{{ route('dashboard.student.update', $order->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-fullname">Workshop Name</label>
                                <input type="text" class="form-control" id="add-user-fullname"
                                    placeholder="Nabil Hamada" name="name" value="{{ $order->name }}" disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-contact">Phone</label>
                                <input type="text" id="add-user-contact" class="form-control phone-mask"
                                    placeholder="01234567890" name="phone" value="{{ $order->phone }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="add-user-email">Email</label>
                                <input type="email" id="add-user-email" class="form-control"
                                    placeholder="nabil.hamada@example.com" name="email" value="{{ $order->email }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditordertatus">Status</label>
                                <select id="modalEditordertatus" name="status" class="form-select"
                                    aria-label="Default select example">
                                    <option selected="">Status</option>
                                    <option value="1" @if ($order->status == 1)selected @endif>Active</option>
                                    <option value="2" @if ($order->status == 2)selected @endif>Inactive</option>
                                    <option value="3" @if ($order->status == 3)selected @endif>Suspended</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-address">Address</label>
                                <input type="text" id="add-user-address" class="form-control"
                                    placeholder="Country, City, Street .." name="address" value="{{ $order->address }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-university">University</label>
                                <input type="text" id="add-user-university" class="form-control"
                                    placeholder="Cairo University" name="university" value="{{ $order->university }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-user-faculty">Faculty of</label>
                                <input type="text" id="add-user-faculty" class="form-control"
                                    placeholder="IS" name="faculty" value="{{ $order->faculty }}" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route('dashboard.student.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                        <!-- Change Password -->
                        <h5 class="card-header">Change Password</h5>
                        <div class="card-body">
                            <form id="formChangePassword" method="POST" action="{{ route('dashboard.student.password', $order->id) }}">
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
        </div> --}}
        <!--/ User Content -->
    </div>


</x-admin-layout>
