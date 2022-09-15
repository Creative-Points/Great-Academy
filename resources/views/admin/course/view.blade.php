@section('title', 'View Course | Great Academy')
<x-admin-layout>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Courses / {{ $course->name }} /</span> View
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
                            <img class="img-fluid rounded my-4" src="/uploads/course/{{ $course->image }}" height="110"
                                width="110" alt="User avatar">
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ $course->name }}</h4>
                                <span class="badge bg-label-primary">
                                    {{ $course->section_name }}
                                </span>
                                @if ($course->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($course->status == 2)
                                    <span class="badge bg-label-danger">Inactive</span>
                                @endif
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
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Name:</span>
                                <span>{{ $course->name }}</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-bold me-2">Description:</span><br>
                                <span>{{ $course->description }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Levels:</span>
                                <span>{{ $course->level }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Hours:</span>
                                <span>{{ $course->hours }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Price:</span>
                                <span>{{ $course->price }}</span>
                            </li>
                            {{-- <li class="mb-3">
                                <span class="fw-bold me-2">Faculty Of:</span>
                                <span>{{ $course->name }}</span>
                            </li> --}}
                        </ul>
                        <div class="d-flex justify-content-center pt-3">
                            @if ($course->status == 1)
                                <a href="{{ route('dashboard.course.inactive', $course->slug) }}" class="btn btn-label-danger suspend-user">Inactive</a>
                            @elseif($course->status == 2)
                                <a href="{{ route('dashboard.course.active', $course->slug) }}" class="btn btn-label-success suspend-user">Active</a>
                            @endif
                        </div>
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
                    {{-- <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-course" aria-controls="navs-pills-justified-security"
                            aria-selected="false"><i class='bx bxs-graduation me-1'></i>Courses</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-workshop" aria-selected="false">
                            <i class='bx bx-chalkboard me-1'></i>Workshops</button>
                    </li> --}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-account" role="tabpanel">

                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        <div class="text-center mb-4">
                            <h3>Edit Course Information</h3>
                            <p>Updating Course details will receive a privacy audit.</p>
                        </div>
                        <form method="POST" class="row g-3" action="{{ route('dashboard.course.update', $course->slug) }}">
                            @method('PUT')
                            @csrf
                            {{-- <div class="col-12 col-md-12">
                                <label class="form-label" for="add-course-image">Image <span class="text-warning">(Leave it blank if you don't want to change it)</span></label>
                                <input type="file" class="form-control" id="add-course-image"
                                    placeholder="Select image .." name="image">
                            </div> --}}
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="add-course-name">Name</label>
                                <input type="text" class="form-control" id="add-course-name"
                                    placeholder="Type name of course" name="name" value="{{ $course->name }}" required>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="add-course-describe">Description</label>
                                <textarea 
                                    class="form-control" 
                                    name="desc" 
                                    placeholder="Describe your course" 
                                    id="add-course-describe" 
                                    cols="30" 
                                    rows="10" 
                                    required>{{ $course->description }}</textarea>
                                
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="add-course-level">levels</label>
                                <input type="number" id="add-course-level" class="form-control"
                                    placeholder="Type count of course levels " name="level" value="{{ $course->level }}" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="add-course-hours">Hours</label>
                                <input type="number" id="add-course-hours" class="form-control"
                                    placeholder="Type count of course hours " name="hours" value="{{ $course->hours }}" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="add-course-price">Price</label>
                                <input type="number" id="add-course-price" class="form-control"
                                    placeholder="Type course price " name="price" value="{{ $course->price }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="status" class="form-select"
                                    aria-label="Default select example">
                                    <option selected="">Status</option>
                                    <option value="1" @if($course->status == 1)selected @endif>Active</option>
                                    <option value="2" @if($course->status == 2)selected @endif>Inactive</option>
                                    <option value="3" @if($course->status == 3)selected @endif>Suspended</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="add-course-section">Section</label>
                                <select id="add-course-section" name="section" class="form-select"
                                    aria-label="Default select example">
                                    <option></option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" @if($course->section_id == $section->id)selected @endif>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route('dashboard.course.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                        <div class="text-center mb-4">
                            <h3>Edit Course Image</h3>
                        </div>
                        <form method="POST" class="row g-3" enctype="multipart/form-data" action="{{ route('dashboard.course.image', $course->slug) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="add-course-image">Image</label>
                                <input type="file" class="form-control" id="add-course-image"
                                    placeholder="Select image .." name="image" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                                <a href="{{ route('dashboard.course.manage') }}"
                                    class="btn btn-label-secondary">Cancel</a>
                            </div>
                        </form>
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
