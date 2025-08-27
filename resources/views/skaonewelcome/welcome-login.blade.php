@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Program
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
    <div class="g-bg-img-hero g-bg-pos-top-center"
        style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-pt-75 g-pb-100 g-pb-130--lg">
            <div class="g-pos-rel">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Heading -->
                        <div class="g-mb-40">
                            <h2 class="h1 mb-3">Sign in</h2>
                            <p>
                                By signing in you will be authorized to access your applications and web sites that use
                                the Sign in Service. Use is subject to but not limited to the policies and guidelines
                                listed below in <span class="g-color-primary">Policies and guidelines</span>.</p>
                        </div>
                        <!-- End Heading -->
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-md-6 col-lg-5 order-md-2 g-pos-abs--md g-top-0 g-right-0">
                        <!-- Contact Form -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Signin -->
                            <div id="signin">
                                <div class="u-shadow-v35 g-bg-white rounded g-px-40 g-py-50">
                                    <header class="text-center g-width-100x--md mx-auto g-mb-5">
                                        <div class="u-heading-v6-2 text-center text-uppercase g-mb-10">
                                            <h2
                                                class="h3 u-heading-v6__title g-brd-primary g-color-gray-dark-v2 g-font-weight-600">
                                                <span class="g-color-primary">Sign In</span>
                                            </h2>
                                        </div>
                                    </header>
                                    <div class="g-mb-20">
                                        <label class="g-color-text-light-v1 g-font-weight-500">Email</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-addon g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                                <i class="icon-education-166 u-line-icon-pro"></i>
                                            </span>
                                            <input
                                                class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12"
                                                type="email" value="{{ old('email') }}" id="email" name="email"
                                                placeholder="Enter Email" required autofocus autocomplete="username">
                                        </div>
                                    </div>

                                    <div class="g-mb-20">
                                        <label class="g-color-text-light-v1 g-font-weight-500">Password</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-addon g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                                <i class="icon-finance-135 u-line-icon-pro"></i>
                                            </span>
                                            <input
                                                class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12"
                                                type="password" id="password" value="{{ old('password') }}" name="password"
                                                placeholder="Enter password" required autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        @if (Route::has('password.request'))
                                            <a class="g-color-text-light-v1 g-font-size-default" id="forgot-password-link"
                                                href="#!">Forgot Password?</a>
                                        @endif
                                        <button type="submit"
                                            class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-font-size-default rounded g-px-25 g-py-7">Signin</button>
                                    </div>
                                </div>

                                <div class="text-center g-pt-30">
                                    <p class="g-color-text-light-v1 g-font-size-default mb-0">Do not have an account? <a
                                            class="g-font-size-default" id="signup-link" href="#!">Create
                                            Account</a>
                                    </p>
                                </div>
                            </div>
                            <!-- End Signin -->

                            <!-- Signup -->
                            @include('skaonewelcome.welcome-sign-up')
                            <!-- End Signup -->

                            <!-- Forgot Password -->
                            @include('skaonewelcome.welcome-forgot-password')
                            <!-- End Forgot Password -->
                        </form>
                        <!-- End Contact Form -->

                        <hr class="g-hidden-md-up g-my-60">
                    </div>

                    @include('skaonewelcome.welcome-media-kiri')
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/chosen/chosen.jquery.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.select.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.sticky-block.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of sticky blocks
            setTimeout(function() {
                $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
            }, 300);

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // Signin Tab
            $('#signin-link, #go-back-link').on('click', function(e) {
                e.preventDefault();
                $('#signin, #go-back-link').show();
                $('#signup').hide();
                $('#forgot-password').hide();
            });

            $('#signup-link').on('click', function(e) {
                e.preventDefault();
                $('#signup').show();
                $('#signin, #go-back-link').hide();
                $('#forgot-password').hide();
            });

            $('#forgot-password-link').on('click', function(e) {
                e.preventDefault();
                $('#forgot-password').show();
                $('#signin').hide();
                $('#signup').hide();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            })
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('status') }}',
                confirmButtonColor: '#3085d6'
            })
        </script>
    @endif
@endsection
