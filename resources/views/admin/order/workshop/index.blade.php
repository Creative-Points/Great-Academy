<x-admin-layout>
    @section('title', 'Manage Workshop | Great Academy')

    <link rel="stylesheet" href="/admin/asset/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/select2/select2.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/formvalidation/dist/css/formValidation.min.css">
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
    <!-- Users List Table -->
    <div class="card">
        {{-- <div class="card-header border-bottom">
            <h5 class="card-title">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role">
                    <select id="UserRole" class="form-select text-capitalize">
                        <option value=""> Select Role </option>
                        <option value="admin">Admin</option>
                        <option value="Author">Instructor</option>
                        <option value="Editor">Student</option>
                    </select>
                </div>
                {{-- <div class="col-md-4 user_plan">
                    <select id="UserPlan" class="form-select text-capitalize">
                        <option value=""> Select Plan </option>
                        <option value="Basic">Basic</option>
                        <option value="Company">Company</option>
                        <option value="Enterprise">Enterprise</option>
                        <option value="Team">Team</option>
                    </select>
                </div> --}}
        {{-- <div class="col-md-4 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize">
                        <option value=""> Select Status </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select>
                </div> --
            </div>
        </div> --}}
        <div class="card-datatable table-responsive">
            <div class="row mx-2 py-2">
                <div class="col-md-2">
                    <div class="me-3">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <label>
                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                    class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div
                        class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control" placeholder="Search.."
                                    aria-controls="DataTables_Table_0" />
                            </label>
                        </div>
                        <div class="dt-buttons">
                            <button class="dt-button buttons-collection btn btn-label-secondary dropdown-toggle mx-3"
                                tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i class="bx bx-upload me-2"></i>Export</span>
                            </button>
                            <button class="dt-button add-new btn btn-primary" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasAddUser">
                                <span>
                                    <i class="bx bx-plus me-0 me-sm-2"></i>
                                    <span class="d-none d-lg-inline-block">Add New Workshop</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>Code</th>
                        <th>Workshop Name</th>
                        <th>Student Name</th>
                        <th>Price</th>
                        {{-- <th>Section</th> --}}
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $item)
                        <tr class="odd">
                            <td class=" control" tabindex="0" style="">{{ $item->oid }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('dashboard.order.workshop.view', $item->ocode) }}" class="text-body text-truncate">
                                            <span class="fw-semibold">
                                                {{ $item->ocode }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('dashboard.workshop.view', $item->slug) }}" class="text-body text-truncate">
                                            <span class="">
                                                {{ $item->name }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('dashboard.student.view', $item->uid) }}" class="text-body text-truncate">
                                            <span class="">
                                                {{ $item->username }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
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
                                @if ($item->ostatus == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif ($item->ostatus == 2)
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @elseif ($item->ostatus == 3)
                                        <span class="badge bg-label-danger">Suspend</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <button
                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('dashboard.order.workshop.view', $item->ocode) }}" id='confirm-color' class="dropdown-item">View</a>
                                        @if ($item->ostatus == 3 || $item->ostatus == 2)
                                            <a href="{{ route('dashboard.order.workshop.active', $item->ocode) }}" class="dropdown-item">Active</a>
                                        @else
                                            <a href="{{ route('dashboard.order.workshop.inactive', $item->ocode) }}" class="dropdown-item">Inactive</a>
                                        @endif

                                        <div class="dropdown-divider"></div>
                                        <form class="" method="POST"
                                            action="{{ route('dashboard.workshop.delete', $item->ocode) }}"
                                            {{-- onsubmit="return confirm('Are you sure?');" --}}
                                            >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="dropdown-item text-danger delete-record" id="confirm-color">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">There are no data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Offcanvas to add new workshop -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New Workshop</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0" enctype="multipart/form-data" method="POST" action="{{ route('dashboard.workshop.add') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="add-workshop-image">Select Image</label>
                        <input type="file" class="form-control" id="add-workshop-image"
                            name="image" accept=".gif, .jpg, .jpeg, .png" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-workshop-name">Name</label>
                        <input type="text" class="form-control" id="add-workshop-name" placeholder="Type your workshop name .."
                            name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-workshop-desc">Description</label>
                        <textarea name="desc" placeholder="Describe your workshop .." id="add-workshop-desc" class="form-control" cols="30" rows="10" required></textarea>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-workshop-price">Price</label>
                        <input type="number" id="add-workshop-price" class="form-control phone-mask"
                            placeholder="Type price here .." name="price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-workshop-level">Level</label>
                        <input type="number" id="add-workshop-level" class="form-control"
                            placeholder="Type level here .." name="level" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-workshop-hours">Hours</label>
                        <input type="number" id="add-workshop-hours" class="form-control"
                            placeholder="Type hours here .." name="hours" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label" for="add-user-password">Password</label>
                        <input type="password" id="add-user-password" class="form-control"
                            placeholder="Type Password here ..">
                    </div> --}}

                    <div class="mb-4">
                        <label class="form-label" for="workshop-section">Select Section</label>
                        <select id="workshop-section" name="section" class="form-select" required>
                            <option selected>Select Section</option>
                            {{-- @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary"
                        data-bs-dismiss="offcanvas">Cancel</button>
                </form>
            </div>
        </div>
    </div>



    <!-- Vendors JS -->
    <script src="/admin/asset/vendor/libs/moment/moment.js"></script>
    <script src="/admin/asset/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="/admin/asset/vendor/libs/jszip/jszip.js"></script>
    <script src="/admin/asset/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="/admin/asset/vendor/libs/datatables-buttons/buttons.print.js"></script>
    <script src="/admin/asset/vendor/libs/select2/select2.js"></script>
    <script src="/admin/asset/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="/admin/asset/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="/admin/asset/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="/admin/asset/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/admin/asset/vendor/libs/cleavejs/cleave-phone.js"></script>
    <!-- Page JS -->
    <script src="/admin/asset/js/app-user-list.js"></script>

</x-admin-layout>
