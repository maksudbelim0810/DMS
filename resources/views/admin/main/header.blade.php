@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .form-control1 {
            display: block;
            width: 100%;
            padding: -0.5rem .9rem !important;
            font-size: .8125rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--vz-body-color);
            background-color: var(--vz-input-bg);
            background-clip: padding-box;
            border: 1px solid var(--vz-input-border);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        }
    </style>
@endsection
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header" style="height: 46px;">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ route('home') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            CNC
                        </span>
                        <span class="logo-lg">
                            HOME
                        </span>
                    </a>

                    <a href="{{ route('home') }}" class="logo logo-light">
                        <span class="logo-sm">
                            CNC
                        </span>
                        <span class="logo-lg">
                           HOME
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-flex align-items-center">
                
                  <b style="font-size: 15px;"> {{ date('d/m/Y',strtotime(Session::get('default_login_date')))  }} </b>

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>



                <div class="dropdown ms-sm-3 header-item topbar-user" style="height: 45px;">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('admin/assets/images/users/user-dummy-img.jpg') }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}!</h6>
                        {{-- <a class="dropdown-item" href="pages-profile.html"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a> --}}

                        <form action="{{ URL::to('/logout') }}" method="post">
                            @csrf

                            <button type="submit" class="dropdown-item" id="logout_submit"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Logout</span></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> --}}
    <script type="text/javascript">
        $('#date').on('change', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('session_date') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "_method": "POST",
                    'date': $(this).val(),
                },

                success: function(data) {
                    // location.reload();
                    return data;
                }
            });

            return false;
        });
        $(document).keydown(function(event) {
            if (event.ctrlKey && event.key === "q") {
                $('#logout_submit').click();
            }
        });
        
        //         $("#date").on('change',function() {
        //     // alert('okk')
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('session_date') }}",
        //         data:{
        //             date:$(this).val(),
        //             _token:"{{ csrf_token() }}"
        //         }
        //         // data: $(this).serialize(),
        //         success: function() {
        //             location.reload();
        //         }
        //     });

        //     return false;
        // });
    </script>
@endsection
