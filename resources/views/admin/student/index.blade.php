<x-admin-layout>


    <link rel="stylesheet" href="/admin/asset/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/select2/select2.css">
    <link rel="stylesheet" href="/admin/asset/vendor/libs/formvalidation/dist/css/formValidation.min.css">
    <!-- Users List Table -->
    <div class="card">
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
                                    <span class="d-none d-lg-inline-block">Add New Student</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="odd">
                            <td class=" control" tabindex="0" style="">{{ $user->id }}</td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="/admin/asset//img/avatars/2.png" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="app-user-view-account.html" class="text-body text-truncate">
                                            <span class="fw-semibold">{{ $user->name }}</span>
                                        </a>
                                        <small class="text-muted">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </td>

                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                    @if ($user_role->name == 'admin')
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                <span
                                                    class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2">
                                                    <i class="bx bx-cog bx-xs"></i>
                                                </span>
                                                {{ $user_role->name }}
                                            </span>
                                        </td>
                                    @elseif ($user_role->name == 'instructor')
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                <span
                                                    class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2">
                                                    <i class="bx bx-edit bx-xs"></i>
                                                </span>
                                                {{ $user_role->name }}
                                            </span>
                                        </td>
                                    @elseif ($user_role->name == 'student')
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                <span
                                                    class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">
                                                    <i class="bx bx-user bx-xs"></i>
                                                </span>
                                                {{ $user_role->name }}
                                            </span>
                                        </td>
                                    @endif
                                @endforeach
                            @endif
                            <td><span class="badge bg-label-success">Active</span></td>
                            {{-- <td><span class="badge bg-label-secondary">Inactive</span></td> --}}
                            {{-- <td><span class="badge bg-label-warning">Pending</span></td> --}}
                            <td>
                                <div class="d-inline-block"><button
                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end"><a href="app-user-view-account.html"
                                            class="dropdown-item">View</a><a href="javascript:;"
                                            class="dropdown-item">Suspend</a>
                                        <div class="dropdown-divider"></div><a href="javascript:;"
                                            class="dropdown-item text-danger delete-record">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Student</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0" id="addNewUserForm" method="POST" action="{{ route('dashboard.student.add') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="add-user-fullname" 
                            placeholder="Nabil Hamada"
                            name="name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input 
                            type="email" 
                            id="add-user-email" 
                            class="form-control"
                            placeholder="nabil.hamada@example.com" 
                            name="email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Phone</label>
                        <input 
                            type="text" 
                            id="add-user-contact" 
                            class="form-control phone-mask"
                            placeholder="01234567890"
                            name="phone"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-address">Address</label>
                        <input 
                            type="text" 
                            id="add-user-address" 
                            class="form-control" 
                            placeholder="Country, City, Street .."
                            name="address"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-university">University</label>
                        <input 
                            type="text" 
                            id="add-user-university" 
                            class="form-control" 
                            placeholder="Cairo University"
                            name="university"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-faculty">Faculty of</label>
                        <input 
                            type="text" id="add-user-company" 
                            class="form-control" 
                            placeholder="Country, City, Street .."
                            name="faculty"
                            required>
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
