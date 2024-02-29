<!-- Navbar Start -->
<section id="main_nav">
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{asset('front-end/assets/image/nav-logo/Job_Pulse_Logo.webp')}}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav m-auto mb-3  mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/job')}}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact')}}">Contact</a>
                    </li>
                </ul>
                <div class="navbar_btn">
                    <a href="#" class="signup-button" onclick="LoginModal()">Login</a>
                    <a href="#" class="signup-button" onclick="SingModal()">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
</section>
<!-- Navbar End -->

{{-- Sing Up Modal start --}}
<div id="myModal" class="modal">
    <div class="box-system">
        <div class="box">
            <div class="header">
                <h2>Sign Up Options</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="content">
                <a href="{{url('/employer-registration')}}">Sign Up Employer</a>
                <a href="{{url('/candidate-registration')}}">Sign Up Candidate</a>
            </div>
        </div>
    </div>
</div>
{{-- Sing Up Modal end --}}

{{-- Login Modal start --}}
<div id="LoginModal" class="modal">
    <div class="box-system">
        <div class="box">
            <div class="header">
                <h2>Login Up Options</h2>
                <span class="close" onclick="closeModals()">&times;</span>
            </div>
            <div class="content">
                <a href="{{url('/employer-login')}}">Login Employer</a>
                <a href="{{url('/candidate-login')}}">Login Candidate</a>
            </div>
        </div>
    </div>
</div>
{{-- Login Modal end --}}
