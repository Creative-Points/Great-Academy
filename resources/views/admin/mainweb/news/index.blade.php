<x-admin-layout>
    @section('title', 'Manage News | Great Academy')
    @role('Admin')
        @php $routeName='dashboard'; @endphp
        @elserole('Employee')
        @php $routeName='emp'; @endphp
        @elserole('instructor')
        @php $routeName='ins'; @endphp
    @endrole
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
                        <div class="dataTables_length">
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
                            @role('Admin')
                                <button class="dt-button add-new btn btn-primary" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasAddUser">
                                    <span>
                                        <i class="bx bx-plus me-0 me-sm-2"></i>
                                        <span class="d-none d-lg-inline-block">Add News</span>
                                    </span>
                                </button>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
            <table class="table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>News Text</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)
                        <tr class="odd">
                            <td class=" control" tabindex="0" style="">{{ $item->id }}</td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="avatar-wrapper">
                                        {{-- <div class="avatar avatar-sm me-3">
                                            <img src="/uploads/section/{{ $item->image }}" alt="{{ $item->name }}"
                                                class="rounded-circle">
                                        </div> --}}
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a
                                            class="text-body text-truncate">
                                            <span class="fw-semibold">
                                                {{ $item->text }}
                                            </span>
                                        </a>
                                        {{-- <small class="text-muted">{{ $item->count }} Courses & {{ $item->workshops }}
                                            Workshops</small> --}}
                                    </div>
                                </div>
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
                                    <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        {{-- <a href="{{ route($routeName . '.news.view', $item->slug) }}"
                                            class="dropdown-item">View</a> --}}
                                        @role('Admin')
                                            @if ($item->status == 3 || $item->status == 2)
                                                <a href="{{ route($routeName . '.layouts.news.active', $item->id) }}"
                                                    class="dropdown-item">Active</a>
                                            @else
                                                <a href="{{ route($routeName . '.layouts.news.inactive', $item->id) }}"
                                                    class="dropdown-item">Inactive</a>
                                            @endif

                                            <div class="dropdown-divider"></div>
                                            <form class="" method="POST"
                                                action="{{ route($routeName . '.layouts.news.delete', $item->id) }}"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="dropdown-item text-danger delete-record">Delete</button>
                                            </form>
                                        @endrole
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
            {{ $news->links() }}
        </div>
        <!-- Offcanvas to add new section -->
        @role('Admin')
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add News</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-user pt-0" method="POST"
                        action="{{ route($routeName . '.layouts.news.add') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="add-course-name">News Text</label>
                            <input type="text" class="form-control" id="add-course-name"
                                placeholder="Type your news text .." name="text" required>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                        <button type="reset" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
        @endrole
    </div>

</x-admin-layout>
