@section('title', 'View Section | Great Academy')
<x-admin-layout>
    @role('Admin')
        @php $routeName='dashboard'; @endphp
    @elserole('Employee')
        @php $routeName='emp'; @endphp
    @elserole('instructor')
        @php $routeName='ins'; @endphp
    @endrole
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sections / {{ $section->name }} /</span> View
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
                            <img class="img-fluid rounded my-4" src="/uploads/section/{{ $section->image }}" height="110"
                                width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ $section->name }}</h4>
                                {{-- <span class="badge bg-label-primary">
                                    {{ $section->count }} Courses
                                </span>
                                <span class="badge bg-label-primary">
                                    {{ $section->workshops }} Workshops
                                </span> --}}
                                @if ($section->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($section->status == 2)
                                    <span class="badge bg-label-danger">Inactive</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap my-3 py-3">
                        <div class="d-flex align-items-start me-1 mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-check bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">{{ $section->count }}</h5>
                                <span>Courses</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-2 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='bx bx-customize bx-sm'></i></span>
                            <div>
                                <h5 class="mb-0">{{ $section->workshops }}</h5>
                                <span>Workshops</span>
                            </div>
                        </div>
                    </div>
                    {{-- <h5 class="pb-2 border-bottom mb-4">Status</h5> --}}
                    <div class="info-container">
                        {{-- <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ $section->name }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Courses:</span>
                                <span>{{ $section->count }}</span>
                            </li>
                        </ul> --}}
                        @role('Admin')
                        <div class="d-flex justify-content-center pt-3">
                            @if ($section->status == 1)
                                <a href="{{ route($routeName.'.section.inactive', $section->slug) }}" class="btn btn-label-danger suspend-user">Inactive</a>
                            @elseif($section->status == 2)
                                <a href="{{ route($routeName.'.section.active', $section->slug) }}" class="btn btn-label-success suspend-user">Active</a>
                            @endif
                        </div>
                        @endrole
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
                    @role('Admin')
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-account" aria-controls="navs-pills-justified-account"
                            aria-selected="true">
                            <i class="bx bx-edit-alt me-1"></i>
                            Information
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-security"
                            aria-controls="navs-pills-justified-security" aria-selected="false"><i
                                class="bx bxs-image me-1"></i>Image</button>
                    </li>
                    @endrole
                    <li class="nav-item">
                        <button type="button" class="nav-link {{ !auth()->user()->hasRole('Admin') ? 'active' : '' }}" role="tab" data-bs-toggle="tab"
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
                    @role('Admin')
                    <div class="tab-pane fade show active" id="navs-pills-justified-account" role="tabpanel">

                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        <div class="text-center mb-4">
                            <h3>Edit Section Information</h3>
                            <p>Updating Section details will receive a privacy audit.</p>
                        </div>
                        <form method="POST" class="row g-3" action="{{ route($routeName.'.section.update', $section->slug) }}">
                            @method('PUT')
                            @csrf
                            {{-- <div class="col-12 col-md-12">
                                <label class="form-label" for="add-course-image">Image <span class="text-warning">(Leave it blank if you don't want to change it)</span></label>
                                <input type="file" class="form-control" id="add-course-image"
                                    placeholder="Select image .." name="image">
                            </div> --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-section-name">Name</label>
                                <input type="text" class="form-control" id="add-section-name"
                                    placeholder="Type name of section" name="name" value="{{ $section->name }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="status" class="form-select"
                                    aria-label="Default select example">
                                    {{-- <option></option> --}}
                                    <option value="1" @if($section->status == 1)selected @endif>Active</option>
                                    <option value="2" @if($section->status == 2)selected @endif>Inactive</option>
                                    {{-- <option value="3" @if($section->status == 3)selected @endif>Suspended</option> --}}
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route($routeName.'.section.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                        <div class="text-center mb-4">
                            <h3>Edit Section Image</h3>
                        </div>
                        <form method="POST" class="row g-3" enctype="multipart/form-data" action="{{ route($routeName.'.section.image', $section->slug) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="add-section-image">Image</label>
                                <input type="file" class="form-control" id="add-section-image"
                                    placeholder="Select image .." name="image" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route($routeName.'.section.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    @endrole
                    <div class="tab-pane fade {{ !auth()->user()->hasRole('Admin') ? 'show active' : '' }}" id="navs-pills-justified-course" role="tabpanel">
                        <!-- Project table -->
                        <div class=" mb-4">
                            <h5 class="card-header">Section's Courses List</h5>
                            <div class="table-responsive mb-3">
                                <table class="table datatable-project border-top">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Name</th>
                                            <th>Levels</th>
                                            <th>Price</th>
                                            <th>Hours</th>
                                            {{-- <th>Section</th> --}}
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $item)
                                            <tr class="odd">
                                                <td class=" control" tabindex="0" style="">{{ $item->id }}</td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3">
                                                                <img src="/uploads/course/{{ $item->image }}" alt="{{ $item->name }}" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="{{ route($routeName.'.course.view', $item->id) }}" class="text-body text-truncate">
                                                                <span class="fw-semibold">
                                                                    {{ $item->name }}
                                                                </span>
                                                            </a>
                                                            <a href="{{ route($routeName.'.section.view', $item->section_id) }}">
                                                                <small class="text-muted">{{ $item->section_name }}</small>
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
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-label-success">Active</span>
                                                    @elseif ($item->status == 2)
                                                        <span class="badge bg-label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <button
                                                            class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="{{ route($routeName.'.course.view', $item->slug) }}" id='confirm-color' class="dropdown-item">View</a>
                                                            @role('Admin')
                                                            @if ($item->status == 3 || $item->status == 2)
                                                                <a href="{{ route($routeName.'.course.active', $item->slug) }}" class="dropdown-item">Active</a>
                                                            @else
                                                                <a href="{{ route($routeName.'.course.inactive', $item->slug) }}" class="dropdown-item">Inactive</a>
                                                            @endif
                    
                                                            <div class="dropdown-divider"></div>
                                                            <form class="" method="POST"
                                                                action="{{ route($routeName.'.course.delete', $item->slug) }}"
                                                                {{-- onsubmit="return confirm('Are you sure?');" --}}
                                                                >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="dropdown-item text-danger delete-record" id="confirm-color">Delete</button>
                                                            </form>
                                                            @endrole
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /Project table -->
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-workshop" role="tabpanel">
                        <!-- Project table -->
                        <div class=" mb-4">
                            <h5 class="card-header">Section's Workshops List</h5>
                            <div class="table-responsive mb-3">
                                <table class="table datatable-project border-top">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Name</th>
                                            <th>Levels</th>
                                            <th>Price</th>
                                            <th>Hours</th>
                                            {{-- <th>Section</th> --}}
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($workshops as $item)
                                            <tr class="odd">
                                                <td class=" control" tabindex="0" style="">{{ $item->id }}</td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3">
                                                                <img src="/uploads/workshop/{{ $item->image }}" alt="{{ $item->name }}" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="{{ route($routeName.'.workshop.view', $item->id) }}" class="text-body text-truncate">
                                                                <span class="fw-semibold">
                                                                    {{ $item->name }}
                                                                </span>
                                                            </a>
                                                            <a href="{{ route($routeName.'.section.view', $item->section_id) }}">
                                                                <small class="text-muted">{{ $item->section_name }}</small>
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
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-label-success">Active</span>
                                                    @elseif ($item->status == 2)
                                                        <span class="badge bg-label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <button
                                                            class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="{{ route($routeName.'.workshop.view', $item->slug) }}" id='confirm-color' class="dropdown-item">View</a>
                                                            @role('Admin')
                                                            @if ($item->status == 3 || $item->status == 2)
                                                                <a href="{{ route($routeName.'.workshop.active', $item->slug) }}" class="dropdown-item">Active</a>
                                                            @else
                                                                <a href="{{ route($routeName.'.workshop.inactive', $item->slug) }}" class="dropdown-item">Inactive</a>
                                                            @endif
                    
                                                            <div class="dropdown-divider"></div>
                                                            <form class="" method="POST"
                                                                action="{{ route($routeName.'.workshop.delete', $item->slug) }}"
                                                                {{-- onsubmit="return confirm('Are you sure?');" --}}
                                                                >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="dropdown-item text-danger delete-record" id="confirm-color">Delete</button>
                                                            </form>
                                                            @endrole
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
