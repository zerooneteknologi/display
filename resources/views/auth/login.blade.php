{{-- header --}}
@include('partials.header')

<body>
    <!-- container -->
    <main class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none ">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>

                </a>
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="../assets/images/brand/logo/logo-2.svg"
                                    class="mb-2 text-inverse" alt="Image"></a>
                            <p class="mb-6">Form isian login akun</p>
                        </div>
                        <!-- Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email')}}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email address" required>
                                @error('email')
                                <div class="invalid-feedback" id="email">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" value="{{ old('password')}}"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="**************" required>
                                @error('password')
                                <div class="invalid-feedback" id="password">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Checkbox -->
                            <div class="d-lg-flex justify-content-between align-items-center
                    mb-4">
                                <div class="form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{
                                        old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember
                                        me</label>
                                </div>

                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Sign
                                        in</button>
                                </div>

                                <div class="d-md-flex justify-content-between mt-4">
                                    {{-- <div class="mb-2 mb-md-0">
                                        <a href="sign-up.html" class="fs-5">Create An
                                            Account </a>
                                    </div> --}}

                                    {{-- <div>
                                        <a href="forget-password.html" class="text-inherit fs-5">Forgot your
                                            password?</a>
                                    </div> --}}

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Scripts -->
    @include('partials.footer')