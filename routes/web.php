<?php

use App\Events\MyEvent;
use App\Events\testing;
use App\Livewire\Forum;
use App\Models\Testimonial;
use App\Exports\AsesiExport;

// Events
use App\Exports\UsersExport;
use Illuminate\Http\Request;

// Livewire
use App\Exports\AsesorExport;
use App\Exports\ResultExamsAExport;

// Models
use Illuminate\Support\Facades\Auth;

// Exports
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Exports\RiwayatPenilaianBExport;
use App\Exports\RiwayatPenilaianCExport;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\PaymentController;

// Controllers - Auth
use App\Http\Controllers\WelcomeController;
use App\Livewire\Asesi\CertificationDetail;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\NewsController;

// Controllers - General
use App\Http\Controllers\Asesi\ExamController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Asesi\ExamControllerC;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\TestimonialController;

// Controllers - Asesi
use App\Http\Controllers\Admin\LevelAController;
use App\Http\Controllers\Admin\LevelCController;
use App\Http\Controllers\Asesi\LevelBController;
use App\Http\Controllers\Asesi\ProfileController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\ExamScoreImportController;
use App\Http\Controllers\Admin\AsesiScoreController;

// Controllers - Asesor
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Asesi\SertifikasiController;

// Controllers - Admin
use App\Http\Controllers\Asesi\TransactionController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Admin\ResultExamsAController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\LevelSettingsController;
use App\Http\Controllers\Admin\PaymentDetailController;
use App\Http\Controllers\Asesor\LevelBGradedController;
use App\Http\Controllers\Asesor\LevelCGradedController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Asesi\AsesiDashboardController;
use App\Http\Controllers\Admin\ExamMonitoringAController;
use App\Http\Controllers\Asesor\AsesorDashboardController;
use App\Http\Controllers\Admin\SurveySubmissionAController;
use App\Http\Controllers\Admin\HasilPenilaianAController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// =========================================================================
// PUBLIC ROUTES
// =========================================================================

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/newsDetail/{slug}', [WelcomeController::class, 'show'])->name('newsDetail');

// Region API (Public)
Route::get('/regencies/{provinceId}', [IndoRegionController::class, 'getRegencies']);
Route::get('/districts/{regencyId}', [IndoRegionController::class, 'getDistricts']);
Route::get('/villages/{districtId}', [IndoRegionController::class, 'getVillages']);

// Featured Testimonials API
Route::get('/featured-testimonials', function () {
    return response()->json(
        Testimonial::with(['user', 'category'])
            ->where('is_approved', true)
            ->where('is_featured', true)
            ->orderBy('approved_at', 'desc')
            ->limit(10)
            ->get()
    );
});

// Certificate Preview & Download (Public)
Route::get('/certificate/preview-pdf/{id}', [SertifikasiController::class, 'previewCertificate'])->name('certificate.preview.pdf');
Route::get('/certificate/preview/{id}', [SertifikasiController::class, 'previewCertificateHTML'])->name('certificate.preview');
Route::get('/certificate/download/{id}', [SertifikasiController::class, 'downloadCertificate'])->name('certificate.download');


// =========================================================================
// AUTHENTICATION ROUTES (GUEST)
// =========================================================================

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');

    // Register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.post');

    // Password Reset
    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('forgot.password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot.password.store');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'view'])->name('forgot.password.reset'); // Note: duplicated name in original, kept 'view' logic
    Route::post('/reset-password', [ForgotPasswordController::class, 'view'])->name('forgot.password.reset.post'); // Renamed to avoid duplicate name
    Route::get('/reset-password-form/{token}', [ForgotPasswordController::class, 'view'])->name('password.reset'); // Renamed URL to avoid conflict if needed, or kept same
    Route::post('/reset-password-update', [ForgotPasswordController::class, 'update'])->name('forgot.password.reset.update');

    // Google SSO
    Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

// =========================================================================
// AUTHENTICATED ROUTES (COMMON)
// =========================================================================

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Email Verification
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::post('/email/verification-notification', [VerificationController::class, 'send'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');

    // Permission Management (Secret & Assign)
    Route::get('/permission/xqjmtlrbavse', [PermissionController::class, 'index'])->name('permission');
    Route::post('/permission', [PermissionController::class, 'store'])->name('assign.permission');

    // General Certificate View
    Route::get('sertifikat', function () {
        return view('sertifikat');
    })->name('sertifikat');
});

// =========================================================================
// ASESI ROUTES
// =========================================================================

Route::middleware(['auth', 'role:asesi', 'last_seen', 'verified'])->prefix('asesi')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AsesiDashboardController::class, 'index'])->name('asesi.dashboard');
    Route::get('/testimonials/featured', [AsesiDashboardController::class, 'getFeaturedTestimonials'])->name('asesi.testimonials.featured');

    // Registration Steps
    Route::get('/register/2', [AuthController::class, 'registerStepTwo'])->name('asesi.registerStepTwo');
    Route::get('/registeraddtional', [AuthController::class, 'registeraddtional'])->name('registeraddtional');
    Route::post('/registeraddtional', [AuthController::class, 'registeraddtionalpost'])->name('registeraddtionalpost');

    // Sertifikasi & Sertifikat
    Route::get('/sertifikasi', [SertifikasiController::class, 'index'])->name('asesi.sertifikasi');
    Route::get('/sertifikat-a/{id}', [SertifikasiController::class, 'sertifikatA'])->name('asesi.sertifikat.a');
    Route::get('/sertifikat-b/{id}', [SertifikasiController::class, 'sertifikatB'])->name('asesi.sertifikat.b');
    Route::get('/sertifikat-c/{id}', [SertifikasiController::class, 'sertifikatC'])->name('asesi.sertifikat.c');
    Route::get('/sertifikasi/riwayat/{level}', CertificationDetail::class)->name('asesi.sertifikat.riwayat');
    Route::get('/sertifikasi/survey', \App\Livewire\Asesi\SurveyForm::class)->name('asesi.sertifikasi.survey');
    Route::get('/sertifikat/download/{id}', [SertifikasiController::class, 'downloadCertificate'])->name('asesi.downloadCertificate');
    Route::get('/nilai', [SertifikasiController::class, 'nilai'])->name('asesi.nilai');

    // Exams - Level A
    Route::post('/sertifikasi/level/a/instruction', [ExamController::class, 'instruction'])->name('asesi.sertifikasi.level.a.instruction');
    Route::get('/sertifikasi/level/a/{exam}/show', [ExamController::class, 'show'])->name('asesi.sertifikasi.level.a.show');
    Route::post('/sertifikasi/level/a/start', [ExamController::class, 'start'])->name('asesi.sertifikasi.level.a.start');
    Route::post('/sertifikasi/level/a/{exam}/finish', [ExamController::class, 'finish'])->name('asesi.sertifikasi.level.a.finish');
    Route::post('/sertifikasi/level/a/{exam}/answer', [ExamController::class, 'answer'])->name('asesi.sertifikasi.level.a.answer');
    Route::get('/sertifikasi/level/a/{exam}/result', [ExamController::class, 'result'])->name('asesi.sertifikasi.level.a.result');
    Route::get('/sertifikasi/level/a/{exam}/continue', [ExamController::class, 'continue'])->name('asesi.sertifikasi.level.a.continue');

    // Exams - Level B
    Route::post('/sertifikasi/level/b/instruction', [LevelBController::class, 'instruction'])->name('asesi.sertifikasi.level.b.instruction');
    Route::get('/sertifikasi/level/b/ppt', [LevelBController::class, 'formPPT'])->name('asesi.sertifikasi.level.b.ppt');
    Route::get('/sertifikasi/level/b/modul', [LevelBController::class, 'formModulAjar'])->name('asesi.sertifikasi.level.b.modulajar');
    Route::post('/sertifikasi/level/b/store', [LevelBController::class, 'storeSubmission'])->name('asesi.sertifikasi.level.b.store');

    // Exams - Level C
    Route::post('/sertifikasi/level/c/instruction', [LevelCController::class, 'instruction'])->name('asesi.sertifikasi.level.c.instruction');
    Route::get('/sertifikasi/level/c/essay', [LevelCController::class, 'formEssay'])->name('asesi.sertifikasi.level.c.essay');
    Route::get('/sertifikasi/level/c/video', [LevelCController::class, 'formVideoUpload'])->name('asesi.sertifikasi.level.c.video');
    Route::post('/sertifikasi/level/c/essay/store', [LevelCController::class, 'storeSubmission'])->name('asesi.sertifikasi.level.c.store');

    Route::prefix('essay')->name('exam.')->group(function () {
        Route::get('/', [ExamControllerC::class, 'index'])->name('index');
        Route::get('/question/{number}', [ExamControllerC::class, 'show'])->name('question');
        Route::post('/question/{number}', [ExamControllerC::class, 'store'])->name('store');
        Route::get('/summary', [ExamControllerC::class, 'summary'])->name('summary');
        Route::post('/complete', [ExamControllerC::class, 'complete'])->name('complete');
        Route::get('/completed', [ExamControllerC::class, 'completed'])->name('completed');
    });
    
    // Transactions
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('asesi.transaksi');
});

// Asesi Routes that only require 'auth' (Not specifically 'role:asesi' in original, but grouped under 'asesi' prefix)
// Note: Original file had a separate group for this.
Route::middleware(['auth'])->prefix('asesi')->group(function () {
    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/finish/{id}', [PaymentController::class, 'finish'])->name('payments.finish');
    Route::get('/payments/pending', [PaymentController::class, 'pending'])->name('payments.pending');
    Route::get('/payments/eror', [PaymentController::class, 'eror'])->name('payments.eror');
    Route::get('/payments/{id}/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{id}/checkout', [PaymentController::class, 'checkout'])->name('payments.checkout');
    Route::get('/payments/{id}', action: [PaymentController::class, 'detail'])->name('payments.detail');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('asesi.profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('asesi.profile.update');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('asesi.profile.upload');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('asesi.password.change');

    // Location API (Cascade)
    Route::get('/api/cities/{provinceId}', [ProfileController::class, 'getCities'])->name('asesi.api.cities');
    Route::get('/api/districts/{cityId}', [ProfileController::class, 'getDistricts'])->name('asesi.api.districts');
    Route::get('/api/villages/{districtId}', [ProfileController::class, 'getVillages'])->name('asesi.api.villages');

    // Testimonials
    Route::post('/testimonials/show-form', [TestimonialController::class, 'showForm'])->name('testimonials.show-form');
    Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
});


// =========================================================================
// ASESOR ROUTES
// =========================================================================

Route::middleware(['auth', 'role:asesor'])->prefix('asesor')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AsesorDashboardController::class, 'index'])->name('asesor.dashboard');
    Route::get('/notifikasi', [AsesorDashboardController::class, 'notifikasi'])->name('asesor.notifikasi');
    Route::get('/riwayat-aktifitas', [AsesorDashboardController::class, 'riwayatAktifitas'])->name('asesor.riwayat-aktifitas');

    // List Asesi
    Route::get('/list-asesi', [AsesorDashboardController::class, 'listAsesi'])->name('asesor.list-asesi');
    Route::get('/list-asesi-c', [AsesorDashboardController::class, 'listAsesiC'])->name('asesor.list-asesi-c');

    // Grading Level B
    Route::get('/list-asesi/grade/{id}', [LevelBGradedController::class, 'showGradingPage'])->name('asesor.gradeB.asesi');
    Route::get('/list-asesi/grade/show/{id}', [LevelBGradedController::class, 'showGradingPage'])->name('asesor.gradeB.show');
    Route::post('/list-asesi/grade/{id}', [LevelBGradedController::class, 'storeAssessmentAsesi'])->name('asesor.gradeB.store');

    // Grading Level C
    Route::get('/list-asesi-c/grade/{id}', [LevelCGradedController::class, 'showGradingPage'])->name('asesor.gradeC.asesi');
    Route::get('/list-asesi-c/grade/show/{id}', [LevelCGradedController::class, 'showGradingPage'])->name('asesor.gradeC.show');
    Route::post('/list-asesi-c/grade/{id}', [LevelCGradedController::class, 'storeAssessmentAsesi'])->name('asesor.gradeC.store');

    // Grading History & Forms
    Route::get('/form-penilaian', [AsesorDashboardController::class, 'formPenilaian'])->name('asesor.form-penilaian');
    Route::get('/riwayat-penilaian', [AsesorDashboardController::class, 'riwayatPenilaian'])->name('asesor.riwayat-penilaian');
    Route::get('/riwayat-penilaian-c', [AsesorDashboardController::class, 'riwayatPenilaianC'])->name('asesor.riwayat-penilaian-c');
    Route::get('/riwayat-penilaian/detail/{id}', [AsesorDashboardController::class, 'riwayatPenilaianDetail'])->name('asesor.riwayat-penilaian-detail');
    Route::get('/riwayat-penilaian-c/detail/{id}', [AsesorDashboardController::class, 'riwayatPenilaianCDetail'])->name('asesor.riwayat-penilaian-c-detail');

    // Export History
    Route::get('/riwayat-penilaian/export', function () {
        return Excel::download(new RiwayatPenilaianBExport, 'Riwayat Penilaian B.xlsx');
    })->name('asesor.riwayat-penilaian-b.export');

    Route::get('/riwayat-penilaian-c/export', function () {
        return Excel::download(new RiwayatPenilaianCExport, 'Riwayat Penilaian C.xlsx');
    })->name('asesor.riwayat-penilaian-c.export');

    Route::get('/download-nilai', [AsesorDashboardController::class, 'downloadNilai'])->name('asesor.download-nilai');

    // Profile Settings
    Route::get('/profile-setting', [AsesorDashboardController::class, 'profileSetting'])->name('asesor.profile-setting');
    Route::post('/profile-setting/update', [AsesorDashboardController::class, 'updateProfile'])->name('asesor.profile-setting.update');
    Route::post('/profile-setting/update-password', [AsesorDashboardController::class, 'updatePassword'])->name('asesor.profile-setting.update-password');
    Route::post('/profile-setting/update-photo', [AsesorDashboardController::class, 'updatePhoto'])->name('asesor.profile-setting.update-photo');
});


// =========================================================================
// ADMIN ROUTES
// =========================================================================

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // --- User Management ---

    // Asesi
    Route::get('/dashboard/asesi', [AdminDashboardController::class, 'asesiIndex'])->name('admin.asesi.index');
    Route::get('/dashboard/asesi/export', function () {
        return Excel::download(new AsesiExport, 'data_asesi.xlsx');
    })->name('dashboard.asesi.export');
    Route::get('/dashboard/asesi/import', [AdminDashboardController::class, 'showImportForm'])->name('dashboard.asesi.import');
    Route::post('/dashboard/asesi/import', [AdminDashboardController::class, 'importAsesi'])->name('dashboard.asesi.import.asesi');
    Route::get('/dashboard/asesi/create', [AdminDashboardController::class, 'asesiCreate'])->name('admin.asesi.create');
    Route::get('/dashboard/asesi/level-management/{id}', [AdminDashboardController::class, 'asesiLevelManagementIndex'])->name('admin.asesi.level-management');
    Route::get('/dashboard/asesi/edit/{id}', [AdminDashboardController::class, 'asesiEdit'])->name('admin.asesi.edit');
    Route::post('/dashboard/asesi/store', [AdminDashboardController::class, 'asesiStore'])->name('admin.asesi.store');
    Route::get('/dashboard/asesi/{id}', [AdminDashboardController::class, 'asesiShow'])->name('admin.asesi.show');
    Route::put('/dashboard/asesi/update/{id}', [AdminDashboardController::class, 'asesiUpdate'])->name('admin.asesi.update');
    Route::delete('/dashboard/asesi/delete/{id}', [AdminDashboardController::class, 'asesiDestroy'])->name('admin.asesi.destroy');
    Route::get('/dashboard/asesi/{id}/level-a', [AsesiScoreController::class, 'showLevelA'])->name('admin.asesi.level_a.show');
    // Route::get('/dashboard/asesi/{id}/level-a', [AdminDashboardController::class, 'asesiShow'])->name('admin.asesi.level_b.show');
    // Route::get('/dashboard/asesi/{id}/level-a', [AdminDashboardController::class, 'asesiShow'])->name('admin.asesi.level_c.show');

    // Asesor
    Route::get('/dashboard/asesor', [AdminDashboardController::class, 'asesorIndex'])->name('admin.asesor.index');
    Route::get('/dashboard/asesor/export', function () {
        return Excel::download(new AsesorExport, 'Asesor.xlsx');
    })->name('dashboard.asesor.export');
    Route::get('/dashboard/asesor/create', [AdminDashboardController::class, 'asesorCreate'])->name('admin.asesor.create');
    Route::post('/dashboard/asesor/store', [AdminDashboardController::class, 'asesorStore'])->name('admin.asesor.store');
    Route::delete('/dashboard/asesor/delete/{id}', [AdminDashboardController::class, 'asesorDestroy'])->name('admin.asesor.destroy');
    Route::get('/dashboard/asesor/{id}', [AdminDashboardController::class, 'asesorShow'])->name('admin.asesor.show');
    Route::get('/dashboard/asesor/{id}/edit', [AdminDashboardController::class, 'asesorEdit'])->name('admin.asesor.edit');
    Route::put('/dashboard/asesor/{id}', [AdminDashboardController::class, 'asesorUpdate'])->name('admin.asesor.update');

    // Admins
    Route::get('//admins', [AdminDashboardController::class, 'adminsIndex'])->name('admin.admins.index'); // Note: double slash in original
    Route::get('/dashboard/adminsdashboard/create', [AdminDashboardController::class, 'adminsCreate'])->name('admin.admins.create');
    Route::post('/dashboard/admins/store', [AdminDashboardController::class, 'adminsStore'])->name('admin.admins.store');
    Route::delete('/dashboard/admins/delete/{id}', [AdminDashboardController::class, 'adminsDestroy'])->name('admin.admins.destroy');
    Route::get('/dashboard/admins/{id}', [AdminDashboardController::class, 'adminsShow'])->name('admin.admins.show');
    Route::get('/dashboard/admins/{id}/edit', [AdminDashboardController::class, 'adminsEdit'])->name('admin.admins.edit');
    Route::put('/dashboard/admins/{id}', [AdminDashboardController::class, 'adminsUpdate'])->name('admin.admins.update');

    // --- Master Data ---

    // Levels
    Route::get('/dashboard/level', [AdminDashboardController::class, 'level'])->name('admin.level.index');
    Route::get('/dashboard/level/create', [AdminDashboardController::class, 'levelCreate'])->name('admin.level.create');
    Route::post('/dashboard/level/store', [AdminDashboardController::class, 'levelStore'])->name('admin.level.store');
    Route::delete('/dashboard/level/delete/{id}', [AdminDashboardController::class, 'levelDestroy'])->name('admin.level.destroy');
    Route::get('/dashboard/level/{id}/edit', [AdminDashboardController::class, 'levelEdit'])->name('admin.level.edit');
    Route::put('/dashboard/level/{id}', [AdminDashboardController::class, 'levelUpdate'])->name('admin.level.update');
    Route::get('/dashboard/level/settings/index', [LevelSettingsController::class, 'index'])->name('admin.level.settings.index');

    // Categories
    Route::get('/dashboard/categories', [AdminDashboardController::class, 'categories'])->name('admin.categories.index');
    Route::get('/dashboard/categories/create', [AdminDashboardController::class, 'categoriesCreate'])->name('admin.categories.create');
    Route::post('/dashboard/categories/store', [AdminDashboardController::class, 'categoriesStore'])->name('admin.categories.store');
    Route::delete('/dashboard/categories/delete/{id}', [AdminDashboardController::class, 'categoriesDestroy'])->name('admin.categories.destroy');
    Route::get('/dashboard/categories/{id}/edit', [AdminDashboardController::class, 'categoriesEdit'])->name('admin.categories.edit');
    Route::put('/dashboard/categories/{id}', [AdminDashboardController::class, 'categoriesUpdate'])->name('admin.categories.update');

    // Questions (General?)
    Route::get('/dashboard/questions', [AdminDashboardController::class, 'questions'])->name('admin.questions.index');
    Route::get('/dashboard/questions/create', [AdminDashboardController::class, 'questionsCreate'])->name('admin.questions.create');
    Route::post('/dashboard/questions/store', [AdminDashboardController::class, 'questionsStore'])->name('admin.questions.store');
    Route::delete('/dashboard/questions/delete/{id}', [AdminDashboardController::class, 'questionsDestroy'])->name('admin.questions.destroy');
    Route::get('/dashboard/questions/{id}/edit', [AdminDashboardController::class, 'questionsEdit'])->name('admin.questions.edit');
    Route::put('/dashboard/questions/{id}', [AdminDashboardController::class, 'questionsUpdate'])->name('admin.questions.update');

    //Exam Monitoring Level A
    Route::get('/dashboard/exam-monitoring-a', [ExamMonitoringAController::class, 'index'])->name('admin.exam.monitoring.a.index');
    

    // Level A
    Route::get('/dashboard/level/a', [LevelAController::class, 'index'])->name('admin.level.a.index');
    Route::get('/dashboard/level/a/category', [LevelAController::class, 'categoriesIndex'])->name('admin.categories.a.index'); //EDIT INI
    Route::get('/dashboard/level/a/category/{id}/edit', [LevelAController::class, 'categoriesEdit'])->name('admin.categories.a.edit');
    Route::get('/dashboard/level/a/category/show/{id}', [LevelAController::class, 'categoriesShow'])->name('admin.categories.a.show');
    Route::put('/dashboard/level/a/category/update/{id}', [LevelAController::class, 'categoriesUpdate'])->name('admin.categories.a.update');

    Route::get('/dashboard/level/a/question', [LevelAController::class, 'bankSoalIndex'])->name('admin.question.a.index'); // EDIT INI
    Route::get('/dashboard/level/a/question/create', [LevelAController::class, 'bankSoalCreate'])->name('admin.question.a.create');
    Route::get('/dashboard/level/a/question/{id}/show', [LevelAController::class, 'bankSoalShow'])->name('admin.question.a.show');
    Route::post('/dashboard/level/a/question/store', [LevelAController::class, 'bankSoalStore'])->name('admin.question.a.store');
    Route::get('/dashboard/level/a/question/{id}/edit', [LevelAController::class, 'bankSoalEdit'])->name('admin.question.a.edit');
    Route::put('/dashboard/level/a/question/{id}/update', [LevelAController::class, 'bankSoalUpdate'])->name('admin.question.a.update');
    Route::delete('/dashboard/level/a/question/{id}/delete', [LevelAController::class, 'bankSoalDestroy'])->name('admin.question.a.destroy');

    // Hasil Survey Level A
    Route::get('/dashboard/level/a/survey-result', [SurveySubmissionAController::class, 'index'])->name('admin.survey-result.a.index');

    // Hasil Penilaian Level A
    Route::get( '/dashboard/level/a/hasil-penilaian', [HasilPenilaianAController::class, 'index'] )->name('admin.level.a.hasil-penilaian');
    Route::get('/dashboard/level/a/hasil-penilaian/export', [HasilPenilaianAController::class, 'export'])->name('admin.level.a.hasil-penilaian.export');
    Route::get('/dashboard/level/a/hasil-penilaian/import', [HasilPenilaianAController::class, 'importForm'])->name('admin.level.a.hasil-penilaian.import-form');
    Route::get('/dashboard/level/a/hasil-penilaian/download-template', [HasilPenilaianAController::class, 'downloadTemplate'])->name('admin.level.a.hasil-penilaian.download-template');
    Route::match(['GET', 'POST'], '/dashboard/level/a/hasil-penilaian/preview-import', [HasilPenilaianAController::class, 'previewImport'])->name('admin.level.a.hasil-penilaian.preview-import');
    Route::post('/dashboard/level/a/hasil-penilaian/process-import', [HasilPenilaianAController::class, 'processImport'])->name('admin.level.a.hasil-penilaian.process-import');
    Route::get('/dashboard/level/a/hasil-penilaian/{id}/edit', [HasilPenilaianAController::class, 'edit'])->name('admin.level.a.hasil-penilaian.edit');
    Route::get('/dashboard/level/a/hasil-penilaian/user/{userId}/edit', [HasilPenilaianAController::class, 'editUser'])->name('admin.level.a.hasil-penilaian.edit-user');
    Route::put('/dashboard/level/a/hasil-penilaian/user/{userId}', [HasilPenilaianAController::class, 'updateUser'])->name('admin.level.a.hasil-penilaian.update-user');
    Route::put('/dashboard/level/a/hasil-penilaian/{id}', [HasilPenilaianAController::class, 'update'])->name('admin.level.a.hasil-penilaian.update');
    Route::delete('/dashboard/level/a/hasil-penilaian/{id}', [HasilPenilaianAController::class, 'destroy'])->name('admin.level.a.hasil-penilaian.destroy');

    // Level B
    Route::get('/dashboard/level/b', [App\Http\Controllers\Admin\LevelBController::class, 'index'])->name('admin.level.b.index');
    Route::get('/dashboard/level/b/category', [LevelBController::class, 'categoriesIndex'])->name('admin.categories.b.index');
    Route::get('/dashboard/level/b/category/{id}/edit', [LevelBController::class, 'categoriesEdit'])->name('admin.categories.b.edit');
    Route::get('/dashboard/level/b/category/show/{id}', [LevelBController::class, 'categoriesShow'])->name('admin.categories.b.show');
    Route::put('/dashboard/level/b/category/update/{id}', [LevelBController::class, 'categoriesUpdate'])->name('admin.categories.b.update');

    Route::get('/dashboard/level/b/question', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalIndex'])->name('admin.question.b.index');
    Route::get('/dashboard/level/b/question/create', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalCreate'])->name('admin.question.b.create');
    Route::get('/dashboard/level/b/question/{id}/show', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalShow'])->name('admin.question.b.show');
    Route::post('/dashboard/level/b/question/store', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalStore'])->name('admin.question.b.store');
    Route::get('/dashboard/level/b/question/{id}/edit', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalEdit'])->name('admin.question.b.edit');
    Route::put('/dashboard/level/b/question/{id}/update', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalUpdate'])->name('admin.question.b.update');
    Route::delete('/dashboard/level/b/question/{id}/delete', [App\Http\Controllers\Admin\LevelBController::class, 'bankSoalDestroy'])->name('admin.question.b.destroy');

    // Level C
    Route::get('/dashboard/level/c', [LevelCController::class, 'index'])->name('admin.level.c.index');
    Route::get('/dashboard/level/c/category', [LevelCController::class, 'categoriesIndex'])->name('admin.categories.c.index');
    Route::get('/dashboard/level/c/category/{id}/edit', [LevelCController::class, 'categoriesEdit'])->name('admin.categories.c.edit');
    Route::get('/dashboard/level/c/category/show/{id}', [LevelCController::class, 'categoriesShow'])->name('admin.categories.c.show');
    Route::put('/dashboard/level/c/category/update/{id}', [LevelCController::class, 'categoriesUpdate'])->name('admin.categories.c.update');

    Route::get('/dashboard/level/c/question', [LevelCController::class, 'bankSoalIndex'])->name('admin.question.c.index');
    Route::get('/dashboard/level/c/question/create', [LevelCController::class, 'bankSoalCreate'])->name('admin.question.c.create');
    Route::get('/dashboard/level/c/question/{id}/show', [LevelCController::class, 'bankSoalShow'])->name('admin.question.c.show');
    Route::post('/dashboard/level/c/question/store', [LevelCController::class, 'bankSoalStore'])->name('admin.question.c.store');
    Route::get('/dashboard/level/c/question/{id}/edit', [LevelCController::class, 'bankSoalEdit'])->name('admin.question.c.edit');
    Route::put('/dashboard/level/c/question/{id}/update', [LevelCController::class, 'bankSoalUpdate'])->name('admin.question.c.update');
    Route::delete('/dashboard/level/c/question/{id}/delete', [LevelCController::class, 'bankSoalDestroy'])->name('admin.question.c.destroy');

    // --- Other Admin Features ---

    // News
    Route::get('/dashboard/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/dashboard/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::get('/dashboard/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('/dashboard/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/dashboard/news/{id}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::put('/dashboard/news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/dashboard/news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    // Payments
    Route::get('/payments', [PaymentDetailController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/{id}', [PaymentDetailController::class, 'show'])->name('admin.payments.show');
    Route::get('/payments-export', [PaymentDetailController::class, 'export'])->name('admin.payments.export');
    Route::delete('/payments/{id}', [PaymentDetailController::class, 'destroy'])->name('admin.payments.destroy');
    Route::patch('/payments/{id}/status', [PaymentDetailController::class, 'updateStatus'])->name('admin.payments.updateStatus');

    // Profile / Settings
    Route::get('/profile', [AdminSettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::patch('/profile', [AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::delete('/profile', [AdminSettingsController::class, 'destroy'])->name('admin.settings.destroy');
    Route::put('profile', [AdminSettingsController::class, 'updatePassword'])->name('admin.password.update');

    // Import Scores
    Route::get('/import-scores', [ExamScoreImportController::class, 'showImportForm'])->name('admin.import.form');
    Route::post('/import-scores', [ExamScoreImportController::class, 'import'])->name('admin.import.scores');
    Route::get('/import-scores/template', [ExamScoreImportController::class, 'downloadTemplate'])->name('admin.import.template');

    // Result Exams A
    Route::get('/result-exams-a', [ResultExamsAController::class, 'index'])->name('admin.resulta.index');
    Route::get('/result-exams-a/export', function () {
        return Excel::download(new ResultExamsAExport, 'Result Exams A.xlsx');
    })->name('admin.resulta.export');

    // Site Info & Testimonials
    Route::get('/site-info', [SiteInfoController::class, 'index'])->name('admin.site-info.index');
    Route::put('/site-info/update', [SiteInfoController::class, 'update'])->name('admin.site-info.update');
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::post('/testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('admin.testimonials.approve');
    Route::post('/testimonials/{testimonial}/feature', [TestimonialController::class, 'feature'])->name('admin.testimonials.feature');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // Certificates
    Route::get('/dashboard/sertifikat/index', [CertificateController::class, 'index'])->name('admin.sertifikat.index');
    Route::get('/dashboard/sertifikat/download/{id}', [CertificateController::class, 'downloadSertifikat'])->name('admin.sertifikat.download');
});


// Test Notification Route
Route::get('/test-notification', function () {
    $user = Auth::user();
    if ($user) {
        $user->notify(new \App\Notifications\GeneralNotification(
            'Selamat! Anda telah berhasil mendapatkan Sertifikat Level A.',
            route('asesi.profile'), // Redirect ke profil
            '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>',
            'bg-green-100',
            'text-green-600'
        ));
        return "Notification sent!";
    }
    return "User not logged in!";
});

require __DIR__ . '/auth.php';