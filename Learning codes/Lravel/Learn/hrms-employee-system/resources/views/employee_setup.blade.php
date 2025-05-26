<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Employee Setup</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">

    <style>
        .error {
            color: red;
            font-size: 0.875em;
        }

        .modal-content {
            padding: 20px;
        }
    </style>

    <!-- Add SweetAlert2 CSS & JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-popup {
            font-size: 1.6rem !important;
        }
    </style>

    <!-- Add Flasher assets -->
    @flasher_render
</head>

<body class="bg-light">
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>


    <div class="container-fluid py-4 mt-5">

        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a class="btn btn-success" href="/">Home</a>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Employee Management</h3>
                <button class="btn btn-primary" id="addEmployeeBtn">Add Employee</button>
            </div>
            <div class="card-body">
                <table id="employeesTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Employee Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="employeeForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Employee Form</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">
                            <!-- Personal Info -->
                            <!-- <h5>Personal Information</h5> -->

                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">Employee Name *</label>
                                    <input type="text" name="EmployeeName" class="form-control">
                                    <div class="error EmployeeName_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date of Birth *</label>
                                    <input type="date" name="DOB" class="form-control">
                                    <div class="error DOB_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gender *</label>
                                    <select name="Gender" class="form-select">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>

                                <!-- Existing fields -->
                                <div class="mb-3">
                                    <label class="form-label">Father's Name *</label>
                                    <input type="text" name="FatherName" class="form-control">
                                    <div class="error FatherName_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mother's Name *</label>
                                    <input type="text" name="MotherName" class="form-control">
                                    <div class="error MotherName_error"></div>
                                </div>

                            </div>

                            <!-- <h5>Work Information</h5> -->

                            <!-- Work Info -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Employee Type *</label>
                                    <select name="Employee_Type_No_FK" class="form-select" id="employeeTypeSelect"></select>
                                    <div class="error Employee_Type_No_FK_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Contact Number *</label>
                                    <input type="tel" name="Contact_Number" class="form-control">
                                    <div class="error Contact_Number_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="Email_Address" class="form-control">
                                    <div class="error Email_Address_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Designation *</label>
                                    <input type="text" name="Designation" class="form-control">
                                    <div class="error Designation_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="Remarks" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status *</label>
                                    <select name="Status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        // Page loader
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('pageLoader').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('pageLoader').style.display = 'none';
                }, 500);
            }, 1000);
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            // Initialize DataTable
            let table = $('#employeesTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: false,
                ajax: "{{ route('employees.index') }}",
                columns: [{
                        data: 'Employee_UID'
                    },
                    {
                        data: 'EmployeeName'
                    },
                    {
                        data: 'age'
                    }, // Uses accessor from model
                    {
                        data: 'Contact_Number'
                    },
                    {
                        data: 'Email_Address'
                    },
                    {
                        data: 'employee_type.type_name'
                    },
                    {
                        data: 'Designation'
                    },
                    {
                        data: 'Status',
                        render: function(data) {
                            return data == 1 ? '<span class="badge bg-success">Active</span>' :
                                '<span class="badge bg-danger">Inactive</span>';
                        }
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `
                            <button class="btn btn-sm btn-warning editBtn" data-id="${data.Employee_No_PK}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteBtn" data-id="${data.Employee_No_PK}">Delete</button>
                        `;
                        }
                    }
                ]
            });

            // Load Employee Types in Dropdown
            $.get('/employees/types', function(types) {
                $('#employeeTypeSelect').empty().append(
                    types.map(type =>
                        `<option value="${type.Employee_Type_No}">${type.type_name}</option>`
                    )
                );
            });

            // Add Employee Modal
            $('#addEmployeeBtn').click(function() {
                $('#employeeForm')[0].reset();
                $('#employeeModal').modal('show');
            });

            // Form Validation Rules
            $('#employeeForm').validate({
                rules: {
                    EmployeeName: "required",
                    DOB: "required",
                    Contact_Number: {
                        required: true,
                        digits: true,
                        minlength: 10
                    },
                    Email_Address: {
                        required: true,
                        email: true
                    },
                    Employee_Type_No_FK: "required"
                },
                messages: {
                    EmployeeName: "Please enter employee name",
                    DOB: "Please select date of birth",
                    Contact_Number: {
                        required: "Contact number is required",
                        digits: "Only numbers allowed",
                        minlength: "Minimum 10 digits required"
                    },
                    Email_Address: {
                        required: "Email is required",
                        email: "Invalid email format"
                    }
                },
                submitHandler: function(form) {
                    let formData = $(form).serializeArray();
                    let url = '/employees';
                    let method = 'POST';

                    // If editing
                    if ($('#employeeId').length) {
                        url = `/employees/${$('#employeeId').val()}`;
                        method = 'PUT';
                    }

                    $.ajax({
                        url: url,
                        method: method,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // ✅ Include CSRF token
                        },
                        success: function(response) {
                            table.ajax.reload();
                            $('#employeeModal').modal('hide');
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON.errors;
                            for (let key in errors) {
                                $(`.${key}_error`).html(errors[key][0]);
                            }
                        }
                    });
                }
            });

            // Edit Employee
            $(document).on('click', '.editBtn', function() {
                let id = $(this).data('id');
                $.get(`/employees/${id}`, function(employee) {
                    $('#employeeForm').prepend(`<input type="hidden" id="employeeId" name="id" value="${employee.Employee_No_PK}">`);
                    for (let key in employee) {
                        $(`[name="${key}"]`).val(employee[key]);
                    }
                    $('#employeeModal').modal('show');
                });
            });

            // Delete Employee
            $(document).on('click', '.deleteBtn', function() {
                if (confirm('Are you sure?')) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: `/employees/${id}`,
                        method: 'DELETE',
                        success: function() {
                            table.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>