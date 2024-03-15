<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>@yield('title') | </title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />

    <!-- Include Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>




</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2"  src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2"  src="{{asset('images/logo.png')}}" alt="logo"/>
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <h6 id="Name"></h6>
                        <hr class="user-dropdown-divider  p-0"/>
                    </div>
                    <a href="{{url('/userProfile')}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <button  onclick="logout()" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sideNavRef" class="side-nav-open">

    <a href="{{url("/admin-dashboard")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>


    <a href="{{url("/Employer-Page")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Companies</span>
    </a>

    <a href="{{url("/candidate-Page")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Candidate</span>
    </a>

    <a href="{{url("/job-list-page")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Jobs</span>
    </a>

    <li class="mt-3 mx-3" style="list-style-type: none !important">
        <a href="#homeSection" style="list-style-type: none" data-bs-toggle="collapse">
            <i style="font-size: 20px" class="bi-align-top"></i>
            <span style="color:black;font-weight:700;font-size: 20px">Modify ALL Page</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="homeSection">
            <ul class="nav-second-level">
                <li style="list-style-type: none !important">
                    <a href="{{url("/Home-Page")}}" style="list-style-type: none" class="side-bar-item">
                        <i class="bi-house-door-fill"></i>
                                <span class="side-bar-item-caption">Home Page</span>
                     </a>
                </li>
                <li style="list-style-type: none !important">
                
    <a href="{{url("/Companie-heading")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Companies Heading</span>
    </a>                                    
                </li>
                <li style="list-style-type: none !important">
                    <a href="{{url("/Companie-Page")}}" style="list-style-type: none" class="side-bar-item">
                        <i class="bi-building"></i>
                                <span class="side-bar-item-caption">Home Companie Page</span>
                     </a>
                </li>
                <li style="list-style-type: none !important">
                    <a href="{{url("/AboutHome-Page")}}" style="list-style-type: none" class="side-bar-item">
                        <i class="bi-building"></i>
                                <span class="side-bar-item-caption">About Home Page</span>
                     </a>                                    
                </li>
                <li style="list-style-type: none !important">
                    <a href="{{url("/Companie-History-Page")}}" style="list-style-type: none" class="side-bar-item">
                        <i class="bi-building"></i>
                                <span class="side-bar-item-caption">About Companie History Page</span>
                     </a>
                </li>
            </ul>
        </div>
    </li>

    <a href="#permission" data-bs-toggle="collapse" class="side-bar-item">
        <i class="bi-person-bounding-box"></i>
        <span class="side-bar-item-caption">Roles And Permission</span>
        <i class="bi-arrow-down-short"></i>
{{--        <span class="menu-arrow"></span>--}}
    </a>
    <a href="{{url("/permission-page")}}" class="collapse" id="permission">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">All Permission</span>
        <span class="menu-arrow"></span>
    </a><br>
    <a href="{{url("/role-page")}}" class="collapse" id="permission">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">All Role</span>
        <span class="menu-arrow"></span>
    </a><br>
    <a href="{{url("/role-in-permission-page")}}" class="collapse" id="permission">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Role In Permission</span>
        <span class="menu-arrow"></span>
    </a>

</div>


<div id="contentRef" class="content">
    @yield('content')
</div>



<script>
    $('#summernote').summernote({
      placeholder: 'Content',
      tabsize: 2,
      height: 110
    });
  </script>

<script>
    $('#Updatesummernote').summernote({
      placeholder: 'Update Content',
      tabsize: 2,
      height: 100
    });
  </script>


<script>
    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }

    getProfile();

async function getProfile() {
    try {
        showLoader();
        let res = await axios.get("/user-profile", HeaderToken());
        hideLoader();
        document.getElementById('Name').innerText = res.data['firstName'];

    } catch (e) {
        unauthorized(e.response.status)
    }
}

    async function logout() {

        try {
            let res = await axios.get("/logout", HeaderToken());
            localStorage.clear();
            sessionStorage.clear();
            window.location.href = "/userLogin";
        } catch (e) {
            errorToast(res.data['message']);
        }
    }


</script>



</body>
</html>
