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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #3730a3;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --background-light: #f9fafb;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --card-shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header-section {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title i {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .btn-modern {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            text-transform: none;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color) 0%, #6366f1 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
            color: white;
        }

        .btn-success-modern {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-success-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .data-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .data-card:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .card-header-modern {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .table-container {
            padding: 0;
            overflow-x: auto;
            width: 100%;
        }

        .table-modern {
            margin: 0;
            font-size: 0.875rem;
            /* Add this */
            width: 100% !important;
            table-layout: auto;
        }

        .table-modern thead th {
            background: #f8fafc;
            color: var(--text-primary);
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            border: none;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
            min-width: 120px;
        }

        .table-modern thead th:nth-child(1) {
            min-width: 100px;
        }

        /* UID */
        .table-modern thead th:nth-child(2) {
            min-width: 180px;
        }

        /* Name */
        .table-modern thead th:nth-child(3) {
            min-width: 50px;
        }

        /* Age */
        .table-modern thead th:nth-child(4) {
            min-width: 120px;
        }

        /* Contact */
        .table-modern thead th:nth-child(5) {
            min-width: 150px;
        }

        /* Email */
        .table-modern thead th:nth-child(6) {
            min-width: 100px;
        }

        /* Type */
        .table-modern thead th:nth-child(7) {
            min-width: 100px;
        }

        /* Designation */
        .table-modern thead th:nth-child(8) {
            min-width: 100px;
        }

        /* Status */
        .table-modern thead th:nth-child(9) {
            min-width: 160px;
        }

        /* Actions */

        .table-modern tbody td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
            white-space: nowrap;
        }

        .table-modern tbody td:nth-child(2),
        .table-modern tbody td:nth-child(5) {
            white-space: normal;
            word-break: break-word;
        }

        .table-modern tbody tr {
            transition: background-color 0.2s ease;
        }

        .table-modern tbody tr:hover {
            background-color: #f9fafb;
        }

        .badge-modern {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .badge-success-modern {
            background: #dcfce7;
            color: #166534;
        }

        .badge-danger-modern {
            background: #fef2f2;
            color: #dc2626;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: nowrap;
        }

        .btn-sm-modern {
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            border-radius: 6px;
            font-weight: 500;
            border: 1px solid;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-warning-modern {
            background: #fef3c7;
            color: #92400e;
            border-color: #f59e0b;
        }

        .btn-warning-modern:hover {
            background: var(--warning-color);
            color: white !important;
            border-color: var(--warning-color);
            transform: translateY(-1px);
        }

        .btn-danger-modern {
            background: #fef2f2;
            color: #dc2626;
            border-color: var(--danger-color);
        }

        .btn-danger-modern:hover {
            background: var(--danger-color);
            color: white !important;
            border-color: var(--danger-color);
            transform: translateY(-1px);
        }

        .modal-content-modern {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .modal-header-modern {
            background: linear-gradient(135deg, var(--primary-color) 0%, #6366f1 100%);
            color: white;
            border-radius: 16px 16px 0 0;
            border: none;
            padding: 1.5rem 2rem;
        }

        .modal-title-modern {
            font-weight: 600;
            font-size: 1.25rem;
        }

        .btn-close-modern {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        .form-label-modern {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-control-modern,
        .form-select-modern {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .form-control-modern:focus,
        .form-select-modern:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .error {
            color: var(--danger-color);
            font-size: 0.75rem;
            margin-top: 0.25rem;
            font-weight: 500;
        }

        .dataTables_wrapper {
            width: 100%;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin: 1rem 0;
            padding: 0 1rem;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid var(--border-color);
            border-radius: 6px;
            padding: 0.5rem;
        }

        .dataTables_wrapper .dataTables_filter {
            text-align: right;
        }

        .dataTables_wrapper .dataTables_length {
            text-align: left;
        }

        @media (max-width: 768px) {

            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_length {
                text-align: center;
                margin: 0.5rem 0;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                max-width: 200px;
            }
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-link {
            color: var(--primary-color);
            border-radius: 6px;
            margin: 0 2px;
            border: 1px solid var(--border-color);
        }

        .swal2-popup {
            font-size: 1rem !important;
            border-radius: 16px !important;
        }

        @media (max-width: 1400px) {
            .main-container {
                max-width: 100%;
                padding: 1.5rem;
            }
        }

        @media (max-width: 1200px) {
            .table-modern {
                min-width: 1000px;
            }

            .table-modern thead th {
                padding: 1rem 1.25rem;
                font-size: 0.75rem;
            }

            .table-modern tbody td {
                padding: 1rem 1.25rem;
            }
        }

        @media (max-width: 992px) {
            .main-container {
                padding: 1rem;
            }

            .table-modern {
                min-width: 900px;
            }

            .data-card {
                margin: 0 -15px;
                border-radius: 0;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 0.5rem;
            }

            .header-content {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .page-title {
                font-size: 1.5rem;
                justify-content: center;
            }

            .table-modern {
                min-width: 800px;
                font-size: 0.8rem;
            }

            .table-modern thead th {
                padding: 0.75rem 1rem;
                font-size: 0.7rem;
            }

            .table-modern tbody td {
                padding: 0.75rem 1rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.25rem;
                align-items: stretch;
            }

            .btn-sm-modern {
                font-size: 0.7rem;
                padding: 0.4rem 0.6rem;
            }

            .data-card {
                border-radius: 8px;
                margin: 0;
            }

            .header-section {
                border-radius: 8px;
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .table-modern {
                min-width: 700px;
            }

            .btn-modern {
                padding: 0.6rem 1rem;
                font-size: 0.875rem;
            }

            .modal-dialog {
                margin: 0.5rem;
            }
        }
    </style>

    <!-- Add SweetAlert2 CSS & JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Add Flasher assets -->
    @flasher_render
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>

    <div class="main-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="header-content">
                <div>
                    <h1 class="page-title">
                        <i class="fas fa-users"></i>
                        Employee Management
                    </h1>
                    <p class="text-muted mb-0">Manage your team members and their information</p>
                </div>
                <div class="d-flex gap-3">
                    <a class="btn btn-success-modern" href="/">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <button class="btn btn-primary-modern" id="addEmployeeBtn">
                        <i class="fas fa-plus"></i>
                        Add Employee
                    </button>
                </div>
            </div>
        </div>

        <!-- Data Table Card -->
        <div class="data-card">
            <div class="card-header-modern">
                <h5 class="mb-0 text-muted">
                    <i class="fas fa-table me-2"></i>
                    Employee Directory
                </h5>
            </div>
            <div class="table-container">
                <table id="employeesTable" class="table table-modern" style="width:100px">
                    <thead>
                        <tr>
                            <th><i class="fas fa-id-badge me-1"></i>UID</th>
                            <th><i class="fas fa-user me-1"></i>Name</th>
                            <th><i class="fas fa-birthday-cake me-1"></i>Age</th>
                            <th><i class="fas fa-phone me-1"></i>Contact</th>
                            <th><i class="fas fa-envelope me-1"></i>Email</th>
                            <th><i class="fas fa-tag me-1"></i>Type</th>
                            <th><i class="fas fa-briefcase me-1"></i>Designation</th>
                            <th><i class="fas fa-toggle-on me-1"></i>Status</th>
                            <th><i class="fas fa-cogs me-1"></i>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Employee Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-content-modern">
                <form id="employeeForm">
                    <div class="modal-header modal-header-modern">
                        <h4 class="modal-title modal-title-modern">
                            <i class="fas fa-user-plus me-2"></i>
                            Employee Information
                        </h4>
                        <button type="button" class="btn-close btn-close-modern" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <div class="row g-4">
                            <!-- Personal Info -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-user me-1"></i>Employee Name *
                                    </label>
                                    <input type="text" name="EmployeeName" class="form-control form-control-modern" placeholder="Enter full name">
                                    <div class="error EmployeeName_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-calendar-alt me-1"></i>Date of Birth *
                                    </label>
                                    <input type="date" name="DOB" class="form-control form-control-modern">
                                    <div class="error DOB_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-venus-mars me-1"></i>Gender *
                                    </label>
                                    <select name="Gender" class="form-select form-select-modern">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-male me-1"></i>Father's Name *
                                    </label>
                                    <input type="text" name="FatherName" class="form-control form-control-modern" placeholder="Enter father's name">
                                    <div class="error FatherName_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-female me-1"></i>Mother's Name *
                                    </label>
                                    <input type="text" name="MotherName" class="form-control form-control-modern" placeholder="Enter mother's name">
                                    <div class="error MotherName_error"></div>
                                </div>
                            </div>

                            <!-- Work Info -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-user-tag me-1"></i>Employee Type *
                                    </label>
                                    <select name="Employee_Type_No_FK" class="form-select form-select-modern" id="employeeTypeSelect"></select>
                                    <div class="error Employee_Type_No_FK_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-phone me-1"></i>Contact Number *
                                    </label>
                                    <input type="tel" name="Contact_Number" class="form-control form-control-modern" placeholder="Enter contact number">
                                    <div class="error Contact_Number_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-envelope me-1"></i>Email Address *
                                    </label>
                                    <input type="email" name="Email_Address" class="form-control form-control-modern" placeholder="Enter email address">
                                    <div class="error Email_Address_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-briefcase me-1"></i>Designation *
                                    </label>
                                    <input type="text" name="Designation" class="form-control form-control-modern" placeholder="Enter designation">
                                    <div class="error Designation_error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-sticky-note me-1"></i>Remarks
                                    </label>
                                    <textarea name="Remarks" class="form-control form-control-modern" rows="3" placeholder="Enter any remarks (optional)"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label form-label-modern">
                                        <i class="fas fa-toggle-on me-1"></i>Status *
                                    </label>
                                    <select name="Status" class="form-select form-select-modern">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding: 1.5rem 2rem; border-top: 1px solid var(--border-color);">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Close
                        </button>
                        <button type="submit" class="btn btn-primary-modern">
                            <i class="fas fa-save me-1"></i>Save Employee
                        </button>
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
                            return data == 1 ? '<span class="badge badge-modern badge-success-modern">Active</span>' :
                                '<span class="badge badge-modern badge-danger-modern">Inactive</span>';
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return `
                                <div class="action-buttons">
                                    <button type="button" class="btn btn-sm-modern btn-warning-modern editBtn" data-id="${data.Employee_No_PK}" title="Edit Employee">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-sm-modern btn-danger-modern deleteBtn" data-id="${data.Employee_No_PK}" title="Delete Employee">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
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