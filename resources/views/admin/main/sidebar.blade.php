<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                CNC
            </span>
            <span class="logo-lg">
                HOME
            </span>
        </a>
        <!-- Light Logo-->
        <br>
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                CNC
            </span>
            <span class="logo-lg">
                <h4 class="text-white">HOME</h4>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end
            btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu"></span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('home') }}">
                        <i class="ri-dashboard-line"></i> <span data-key="t-widgets">Report Viewer</span>
                    </a>
                </li>
                @can('user-list')
                    <li>
                        <a class="nav-link menu-link" href="{{ route('users.index') }}">
                            <i class="ri-dashboard-line"></i> <span data-key="t-widgets">Manage Users</span>
                        </a>
                    </li>
                @endcan
                @can('role-list')
                    <li>
                        <a class="nav-link menu-link" href="{{ route('roles.index') }}">
                            <i class="ri-dashboard-line"></i> <span data-key="t-widgets">Manage Role</span>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts2">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Category</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts2">
                        <ul class="nav nav-sm flex-column">
                            @can('part_type_category-list')
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('part_type_category.index') }}">
                                        <span data-key="t-widgets">Part Type
                                            Category</span>
                                    </a>
                                </li>
                            @endcan
                            @can('part_category-list')
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('part_category.index') }}">
                                        <span data-key="t-widgets">Part Category</span>
                                    </a>
                                </li>
                            @endcan
                            @can('vendor_category-list')
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('vendor_category.index') }}">
                                        <span data-key="t-widgets">Vendor Category</span>
                                    </a>
                                </li>
                            @endcan

                            @can('break_down_category-list')
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('break_down_category.index') }}">
                                        <span data-key="t-widgets">Break Down
                                            Category</span>
                                    </a>
                                </li>
                            @endcan
                            @can('employee_category-list')
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('employee_category.index') }}">
                                        <span data-key="t-widgets">Employee Category</span>
                                    </a>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('machine_category.index') }}">
                                    <span data-key="t-widgets">Machine Category</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @can('master_category-list')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Master</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLayouts">
                            <ul class="nav nav-sm flex-column">
                                @can('location-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('location.index') }}">
                                            <span data-key="t-widgets">Location</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('machine_entry-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('machine_entry.index') }}">
                                            <span data-key="t-widgets">Machine Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('setup-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('setup.index') }}">
                                            <span data-key="t-widgets">Setup Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('shift_entry-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('shift_entry.index') }}">
                                            <span data-key="t-widgets">Shift Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('batch_number-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('batch_number.index') }}">
                                            <span data-key="t-widgets">Batch Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('part_entry-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('part_entry.index') }}">
                                            <span data-key="t-widgets">Part Master</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('customer-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('customer.index') }}">
                                            <span data-key="t-widgets">Customer Master</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('vendor_entry-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('vendor_entry.index') }}">
                                            <span data-key="t-widgets">Vendor Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('employee_bio_data-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('employee_bio_data.index') }}">
                                            <span data-key="t-widgets">Employee Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('insert_entry-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('insert_entry.index') }}">
                                            <span data-key="t-widgets">Insert
                                                Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('machine_opration-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('machine_opration.index') }}">
                                            <span data-key="t-widgets">Mc. Opration Master</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan



                @can('transactions-list')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts1" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarLayouts1">
                            <i class="ri-layout-3-line"></i> <span data-key="t-layouts"> Transections</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLayouts1">
                            <ul class="nav nav-sm flex-column">
                                @can('cnc_production-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('cnc_production.index') }}">
                                            <span data-key="t-widgets">CNC Production</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('dispatch_advice-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('dispatch_advice.index') }}">
                                            <span data-key="t-widgets">Dispatch Advice</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('mpi_production-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('mpi_production.index') }}">
                                            <span data-key="t-widgets">MPI Production</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('insert_consumption_entry-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('insert_consumption_entry.index') }}">
                                            <span data-key="t-widgets">Insert Consumption Entry</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('rejection_disposition-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('rejection_disposition.index') }}">
                                            <span data-key="t-widgets">Rejection
                                                Disposition</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('visual_packing-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('visual_packing.index') }}">
                                            <span data-key="t-widgets">Visual & Packing</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('grade_sorting_report-list')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ route('grade_sorting_report.index') }}">
                                            <span data-key="t-widgets">Grade Sorting Report</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts4" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts4">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts"> Reports</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('cnc_production.daily_cnc_report_view') }}">
                                    <span data-key="t-widgets">daily_cnc_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('mpi_production.daily_mpi_report_view') }}">
                                    <span data-key="t-widgets">daily_mpi_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('batch_number.generatePDF_view') }}">
                                    <span data-key="t-widgets">batch_number_nos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('dispatch_advice.Daily_dispatch_report_view') }}">
                                    <span data-key="t-widgets">Daily_dispatch_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('grade_sorting_report.daily_grade_sorting_report_view') }}">
                                    <span data-key="t-widgets">daily_grade_sorting_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_visual_and_pack_report_view') }}">
                                    <span data-key="t-widgets">daily_visual_and_pack_report</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit1_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit1_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit2_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit2_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit3_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit3_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit4_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit4_report</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit5_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit5_report</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit6_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit6_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('visual_packing.daily_packing_unit7_report_view') }}">
                                    <span data-key="t-widgets">daily_packing_unit7_report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link"
                                    href="{{ route('batch_number.batchwise_cnc_prod_report') }}">
                                    <span data-key="t-widgets">batchwise_cnc_prod_report</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts3" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts3">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts"> Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts3">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('company_info') }}">
                                    <span data-key="t-widgets">Company Info</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
