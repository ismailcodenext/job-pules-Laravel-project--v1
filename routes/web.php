<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerJobController;
use App\Http\Controllers\CompanyHeadingController;
use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\Home\TopCompanieController;
use App\Http\Controllers\About\CompanieHistoryController;



//Admin Dashboard Work Start

//user employer Api route
Route::post('/user-employer-login',[UserController::class,'EmployerLogin']);
//user candidate Api route
Route::post('/user-candidate-login',[UserController::class,'CandidateLogin']);


// Robiul islam create this controller

// Employer Page Api Route
Route::get("/list-employer",[EmployerController::class,'employerList'])->middleware('auth:sanctum');
Route::post("/employer-by-id",[EmployerController::class,'employerById'])->middleware('auth:sanctum');
Route::post("/update-employer",[EmployerController::class,'employerUpdate'])->middleware('auth:sanctum');
Route::post("/delete-employer",[EmployerController::class,'employerDelete'])->middleware('auth:sanctum');


// Robiul islam create this controller

// Candidate Page Api Route
Route::get("/list-candidate",[CandidateController::class,'candidateList'])->middleware('auth:sanctum');
Route::post("/candidate-by-id",[CandidateController::class,'candidateById'])->middleware('auth:sanctum');
Route::post("/update-candidate",[CandidateController::class,'candidateUpdate'])->middleware('auth:sanctum');
Route::post("/delete-candidate",[CandidateController::class,'candidateDelete'])->middleware('auth:sanctum');

// Job Page Api Route
Route::get("/list-job-company",[JobController::class,'jobCompanyList'])->middleware('auth:sanctum');
Route::post("/job-company-by-id",[JobController::class,'jobCompanyById'])->middleware('auth:sanctum');
Route::post("/update-job-company",[JobController::class,'jobCompanyUpdate'])->middleware('auth:sanctum');
Route::post("/delete-job",[JobController::class,'jobDelete'])->middleware('auth:sanctum');

// Permission Page Api Route
Route::get("/list-permission",[RoleController::class,'permissionRoleList'])->middleware('auth:sanctum');
Route::post("/create-permission",[RoleController::class,'permissionCreate'])->middleware('auth:sanctum');
Route::post("/delete-permission",[RoleController::class,'permissionDelete'])->middleware('auth:sanctum');
Route::post("/permission-by-id",[RoleController::class,'permissionById'])->middleware('auth:sanctum');
Route::post("/update-permission",[RoleController::class,'permissionUpdate'])->middleware('auth:sanctum');

// Role Page Api Route
Route::get("/list-role",[RoleController::class,'roleList'])->middleware('auth:sanctum');
Route::post("/create-role",[RoleController::class,'roleCreate'])->middleware('auth:sanctum');
Route::post("/delete-role",[RoleController::class,'roleDelete'])->middleware('auth:sanctum');
Route::post("/role-by-id",[RoleController::class,'roleById'])->middleware('auth:sanctum');
Route::post("/update-role",[RoleController::class,'roleUpdate'])->middleware('auth:sanctum');

//Admin Back-end Route
Route::view('Employer-Page','pages.dashboard.admin-dashboard.companies-page');
Route::view('candidate-Page','pages.dashboard.admin-dashboard.candidate-page.candidate');
Route::view('/job-list-page','pages.dashboard.admin-dashboard.job-page');
Route::view('permission-page','pages.dashboard.admin-dashboard.permission-page.permission-page');
Route::view('role-page','pages.dashboard.admin-dashboard.role-page.role-page');
Route::view('role-in-permission-page','pages.dashboard.admin-dashboard.role-in-permission-page.role-in-permission-page');



// Home -> Hero Page Api Route
Route::get("/list-home",[HomeController::class,'HomeList'])->middleware('auth:sanctum');
Route::post("/create-home",[HomeController::class,'HomeCreate'])->middleware('auth:sanctum');
Route::post("/home-by-id",[HomeController::class,'HomeById'])->middleware('auth:sanctum');
Route::post("/update-home",[HomeController::class,'HomeUpdate'])->middleware('auth:sanctum');
Route::post("/delete-home",[HomeController::class,'HomeDelete'])->middleware('auth:sanctum');


// Home -> Companie Page Api Route
Route::get("/list-companie",[TopCompanieController::class,'CompanieList'])->middleware('auth:sanctum');
Route::post("/create-companie",[TopCompanieController::class,'CompanieCreate'])->middleware('auth:sanctum');
Route::post("/companie-by-id",[TopCompanieController::class,'CompanieById'])->middleware('auth:sanctum');
Route::post("/update-companie",[TopCompanieController::class,'CompanieUpdate'])->middleware('auth:sanctum');
Route::post("/delete-companie",[TopCompanieController::class,'CompanieDelete'])->middleware('auth:sanctum');

Route::get("/list-heading-companie",[CompanyHeadingController::class,'CompanieHeadingList'])->middleware('auth:sanctum');
Route::post("/create-heading-companie",[CompanyHeadingController::class,'CompanieHeadingCreate'])->middleware('auth:sanctum');
Route::post("/companie-heading-by-id",[CompanyHeadingController::class,'CompanieHeadingById'])->middleware('auth:sanctum');
Route::post("/update-heading-companie",[CompanyHeadingController::class,'CompanieHeadingUpdate'])->middleware('auth:sanctum');
Route::post("/delete-heading-companie",[CompanyHeadingController::class,'CompanieHeadingDelete'])->middleware('auth:sanctum');


// About -> Companie Page Api Route
Route::get("/list-companie-history",[CompanieHistoryController::class,'CompanieHistoryList'])->middleware('auth:sanctum');
Route::post("/create-companie-history",[CompanieHistoryController::class,'CompanieHistoryCreate'])->middleware('auth:sanctum');
Route::post("/companie-history-by-id",[CompanieHistoryController::class,'CompanieHistoryById'])->middleware('auth:sanctum');
Route::post("/update-companie-history",[CompanieHistoryController::class,'CompanieHistoryUpdate'])->middleware('auth:sanctum');
Route::post("/delete-companie-history",[CompanieHistoryController::class,'CompanieHistoryDelete'])->middleware('auth:sanctum');



// Admin Home page Route start
Route::view('Home-Page','pages.dashboard.admin-dashboard.home-page.home');
Route::view('Companie-Page','pages.dashboard.admin-dashboard.home-page.companie');
Route::view('Companie-heading','pages.dashboard.admin-dashboard.home-page.heading');



// Admin About page Route start
Route::view('Companie-History-Page','pages.dashboard.admin-dashboard.about-page.home');
// Route::view('Companie-Page','pages.dashboard.admin-dashboard.about-page.companie');

//----------------Admin Dashboard Work End---------------------------//


//----------------Employer Dashboard Work Start---------------------------//

//Employer Job CRUD Api Route
Route::post("/create-job",[EmployerJobController::class,'jobCreate'])->middleware('auth:sanctum');
Route::get("/list-job",[EmployerJobController::class,'jobList'])->middleware('auth:sanctum');
Route::post("/job-by-id",[EmployerJobController::class,'jobById'])->middleware('auth:sanctum');
Route::post("/update-job",[EmployerJobController::class,'jobUpdate'])->middleware('auth:sanctum');
Route::post("/delete-job",[EmployerJobController::class,'jobDelete'])->middleware('auth:sanctum');
Route::post("/jobdetails-Data",[EmployerJobController::class,'index'])->middleware('auth:sanctum');


//employer front-page in dashboard
Route::view('/employer-profile','pages.dashboard.employer-page.employer');
//employer job create dashboard
Route::view('/employer-job-list','pages.dashboard.employer-page.employer-job');
// employer dashboard page
Route::view('/employer-dashboard','pages.dashboard.employer-page.employer-dashboard');


//----------------Employer Dashboard Work End---------------------------//


//----------------Candidate Dashboard Work Start---------------------------//

Route::post("/create-profile",[CandidateProfileController::class,'ProfileCreate'])->middleware('auth:sanctum');
Route::get("/list-profile",[CandidateProfileController::class,'ProfileList'])->middleware('auth:sanctum');
Route::post("/profile-by-id",[CandidateProfileController::class,'ProfileById'])->middleware('auth:sanctum');
Route::post("/update-profile",[CandidateProfileController::class,'ProfileUpdate'])->middleware('auth:sanctum');
Route::post("/delete-profile",[CandidateProfileController::class,'ProfileDelete'])->middleware('auth:sanctum');


//candidate dashboard
Route::view('/candidate-dashboard','pages.dashboard.admin-dashboard.candidate-page.candidate-dashboard');
Route::view('/candidate-profile','pages.dashboard.candidate-page.candidate');


//----------------Candidate Dashboard Work End---------------------------//




// User Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');
// Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');
Route::get('/logout',[UserController::class,'UserLogout'])->middleware('auth:sanctum');
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware('auth:sanctum');
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware('auth:sanctum');


// front-end page Route
Route::view('/','pages.front-end-page.home-section.home-page');
Route::view('/about','pages.front-end-page.about-section.about-page');
Route::view('/job','pages.front-end-page.job-section.job-page');
Route::view('/contact','pages.front-end-page.contact-section.contact-page');

// Page Routes
Route::view('/userLogin','pages.auth.login-page')->name('login');
Route::view('/userRegistration','pages.auth.registration-page');
Route::view('/sendOtp','pages.auth.send-otp-page');
Route::view('/verifyOtp','pages.auth.verify-otp-page');
Route::view('/resetPassword','pages.auth.reset-pass-page');
Route::view('/userProfile','pages.dashboard.profile-page');
Route::view('/admin-dashboard','pages.dashboard.dashboard-page.dashboard');



//Company registration and login route -> Ismail Hossain
Route::view('/employer-registration','pages.front-end-page.company.registration');
Route::view('/candidate-registration','pages.front-end-page.candidate.registration');



// employer & candidate registration and login route -> Robiul
Route::view('/employer-login','pages.front-end-page.company.login');
Route::view('/candidate-login','pages.front-end-page.candidate.login');


//Front-End Home Page Data Api Route Start
Route::get("/company-heading-Data",[CompanyHeadingController::class,'Heading']);
Route::get("/top-company-data",[TopCompanieController::class,'index']);
Route::get("/list-job-data",[JobController::class,'index']);


