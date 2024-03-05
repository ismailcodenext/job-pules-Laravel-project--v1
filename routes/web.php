<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerJobController;
use App\Http\Controllers\CandidateProfileController;


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


//Admin Back-end Route
Route::view('Employer-Page','pages.dashboard.admin-dashboard.companies-page');
Route::view('candidate-Page','pages.dashboard.admin-dashboard.candidate-page.candidate');
Route::view('/job-list-page','pages.dashboard.admin-dashboard.job-page');


//----------------Admin Dashboard Work End---------------------------//


//----------------Employer Dashboard Work Start---------------------------//


//employer front-page in dashboard
Route::view('/employer-profile','pages.dashboard.employer-page.employer');

//employer job create dashboard
Route::view('/employer-job-list','pages.dashboard.employer-page.employer-job');

//Employer Job CRUD Api Route
Route::post("/create-job",[EmployerJobController::class,'jobCreate'])->middleware('auth:sanctum');
Route::get("/list-job",[EmployerJobController::class,'jobList'])->middleware('auth:sanctum');
Route::post("/job-by-id",[EmployerJobController::class,'jobById'])->middleware('auth:sanctum');
Route::post("/update-job",[EmployerJobController::class,'jobUpdate'])->middleware('auth:sanctum');
Route::post("/delete-job",[EmployerJobController::class,'jobDelete'])->middleware('auth:sanctum');



//----------------Employer Dashboard Work End---------------------------//


//----------------Candidate Dashboard Work Start---------------------------//

Route::post("/create-profile",[CandidateProfileController::class,'ProfileCreate'])->middleware('auth:sanctum');
Route::get("/list-profile",[CandidateProfileController::class,'ProfileList'])->middleware('auth:sanctum');
Route::post("/profile-by-id",[CandidateProfileController::class,'ProfileById'])->middleware('auth:sanctum');
Route::post("/update-profile",[CandidateProfileController::class,'ProfileUpdate'])->middleware('auth:sanctum');
Route::post("/delete-profile",[CandidateProfileController::class,'ProfileDelete'])->middleware('auth:sanctum');


//candidate dashboard
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


//Front-End Api Route Start

Route::get("/list-job-data",[JobController::class,'index']);


