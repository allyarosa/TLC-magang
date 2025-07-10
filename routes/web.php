<?php

use App\Http\Controllers\Asesi\ExamControllerC;
use App\Http\Controllers\Asesor\LevelBGradedController;
use App\Models\Testimonial;
use App\Exports\AsesiExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\AsesorExport;
use App\Exports\ResultExamsAExport;
use App\Exports\RiwayatPenilaianBExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\ResultExamsA;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Asesi\ExamController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Admin\LevelAController;
use App\Http\Controllers\Admin\LevelCController;
use App\Http\Controllers\Asesi\LevelBController;
use App\Http\Controllers\Asesi\ProfileController;
use App\Http\Controllers\Asesi\SertifikasiController;
use App\Http\Controllers\Asesi\TransactionController;
use App\Http\Controllers\Admin\ResultExamsAController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\LevelSettingsController;
use App\Http\Controllers\Admin\PaymentDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Asesi\AsesiDashboardController;
use App\Http\Controllers\Asesor\AsesorDashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;

Route::get('register2', function () {
    return view('register2');
})->name('register2');

Route::get('sertifikat', function () {
    return view('sertifikat');
})->name('sertifikat');

// SETELAH PRODUCTION JANGAN LUPA DIHAPUS ROUTE INI 
Route::get('/permission', function () {
    return view('permission');
})->middleware(['auth'])->name('permission');

// SETELAH PRODUCTION JANGAN LUPA DIHAPUS ROUTE INI 
Route::post('/permission', function (Request $request) {
    $permission = $request->input('permission');
    $user = Auth::user();

    if (!$user->hasPermissionTo($permission)) {
        $user->givePermissionTo($permission);
    }
    Alert::success("Permission '$permission' diberikan.");

    if (Auth::user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } else if (Auth::user()->hasRole('asesor')) {
        return redirect()->route('asesor.dashboard');
    } else if (Auth::user()->hasRole('asesi')) {
        return redirect()->route('asesi.dashboard');
    }
})->middleware(['auth'])->name('assign.permission');

// GUEST
Route::middleware('guest')->group(function () {
    // Route::get('/', fn() => view('welcome'));
    Route::get('/', [WelcomeController::class, 'index'])->name('home');
    Route::get('/newsDetail/{slug}', [WelcomeController::class, 'show'])->name('newsDetail');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.post');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('forgot.password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot.password.store');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'view'])->name('forgot.password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'view'])->name('forgot.password.reset');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'view'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'update'])->name('forgot.password.reset.update');
});

// GOOGLE SSO LOGIN/REGISTER
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect'); //ROUTE LOGIN SSO
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']); //ROUTE CALLBACK SSO
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth'); //ROUTE LOGOUT


// AUTH ASESI
Route::middleware(['auth', 'role:asesi', 'last_seen'])->prefix('asesi')->group(function () {
    Route::get('/dashboard', [AsesiDashboardController::class, 'index'])->name('asesi.dashboard');
    Route::get('/testimonials/featured', [AsesiDashboardController::class, 'getFeaturedTestimonials'])->name('asesi.testimonials.featured');
    // Route::get('/sertifikat/{id}', [SertifikasiController::class, 'mySertifikat'])->name('asesi.sertifikat');
    // Routes
    Route::get('/sertifikasi', [SertifikasiController::class, 'index'])->name('asesi.sertifikasi');
    Route::get('/sertifikat-a/{id}', [SertifikasiController::class, 'sertifikatA'])->name('asesi.sertifikat.a');
    Route::get('/sertifikat-b/{id}', [SertifikasiController::class, 'sertifikatB'])->name('asesi.sertifikat.b');
    Route::get('/sertifikat-c/{id}', [SertifikasiController::class, 'sertifikatC'])->name('asesi.sertifikat.c');
    Route::get('/sertifikat/download/{id}', [SertifikasiController::class, 'downloadCertificate'])->name('asesi.downloadCertificate');
    Route::get('/nilai', [SertifikasiController::class, 'nilai'])->name('asesi.nilai');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('asesi.transaksi');
    Route::get('/register/2', [AuthController::class, 'registerStepTwo'])->name('asesi.registerStepTwo');
    Route::get('/registeraddtional', [AuthController::class, 'registeraddtional'])->name('registeraddtional');
    Route::post('/registeraddtional', [AuthController::class, 'registeraddtionalpost'])->name('registeraddtionalpost');

    // EXAM CONTROLLER
    Route::post('/sertifikasi/level/a/instruction', [ExamController::class, 'instruction'])->name('asesi.sertifikasi.level.a.instruction');
    Route::get('/sertifikasi/level/a/{exam}/show', [ExamController::class, 'show'])->name('asesi.sertifikasi.level.a.show');
    Route::post('/sertifikasi/level/a/start', [ExamController::class, 'start'])->name('asesi.sertifikasi.level.a.start');
    Route::post('/sertifikasi/level/a/{exam}/finish', [ExamController::class, 'finish'])->name('asesi.sertifikasi.level.a.finish');
    Route::post('/sertifikasi/level/a/{exam}/answer', [ExamController::class, 'answer'])->name('asesi.sertifikasi.level.a.answer');
    Route::get('/sertifikasi/level/a/{exam}/result', [ExamController::class, 'result'])->name('asesi.sertifikasi.level.a.result');
    Route::get('/sertifikasi/level/a/{exam}/continue', [ExamController::class, 'continue'])->name('asesi.sertifikasi.level.a.continue');

    // LEVEL B ASESI
    Route::post('/sertifikasi/level/b/instruction', [LevelBController::class, 'instruction'])->name('asesi.sertifikasi.level.b.instruction');
    Route::get('/sertifikasi/level/b/ppt', [LevelBController::class, 'formPPT'])->name('asesi.sertifikasi.level.b.ppt');
    Route::get('/sertifikasi/level/b/modul', [LevelBController::class, 'formModulAjar'])->name('asesi.sertifikasi.level.b.modulajar');
    Route::post('/sertifikasi/level/b/modul/store', [LevelBController::class, 'storeSubmission'])->name('asesi.sertifikasi.level.b.store');

    // LEVEL C ASESI
    Route::post('/sertifikasi/level/c/instruction', [LevelCController::class, 'instruction'])->name('asesi.sertifikasi.level.c.instruction');
    Route::get('/sertifikasi/level/c/essay', [LevelCController::class, 'formEssay'])->name('asesi.sertifikasi.level.c.essay');
    Route::get('/sertifikasi/level/c/video', [LevelCController::class, 'formVideoUpload'])->name('asesi.sertifikasi.level.c.video');
    Route::post('/sertifikasi/level/c/essay/store', [LevelCController::class, 'storeSubmission'])->name('asesi.sertifikasi.level.c.store');

    // EXAM LEVEL C
    Route::prefix('essay')->name('exam.')->group(function () {
        Route::get('/', [ExamControllerC::class, 'index'])->name('index');
        Route::get('/question/{number}', [ExamControllerC::class, 'show'])->name('question');
        Route::post('/question/{number}', [ExamControllerC::class, 'store'])->name('store');
        Route::get('/summary', [ExamControllerC::class, 'summary'])->name('summary');
        Route::post('/complete', [ExamControllerC::class, 'complete'])->name('complete');
        Route::get('/completed', [ExamControllerC::class, 'completed'])->name('completed');
    });
});




Route::middleware(['auth'])->prefix('asesi')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/finish/{id}', [PaymentController::class, 'finish'])->name('payments.finish');
    Route::get('/payments/pending', [PaymentController::class, 'pending'])->name('payments.pending');
    Route::get('/payments/eror', [PaymentController::class, 'eror'])->name('payments.eror');
    Route::get('/payments/{id}/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{id}/checkout', [PaymentController::class, 'checkout'])->name('payments.checkout');
    Route::get('/payments/{id}', [PaymentController::class, 'detail'])->name('payments.detail');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('asesi.profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('asesi.profile.update');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('asesi.profile.upload');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('asesi.password.change');

    // API routes untuk location cascade
    Route::get('/api/cities/{provinceId}', [ProfileController::class, 'getCities'])->name('asesi.api.cities');
    Route::get('/api/districts/{cityId}', [ProfileController::class, 'getDistricts'])->name('asesi.api.districts');
    Route::get('/api/villages/{districtId}', [ProfileController::class, 'getVillages'])->name('asesi.api.villages');
});

// AUTH ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard/asesi', [AdminDashboardController::class, 'asesiIndex'])->name('admin.asesi.index');
    Route::get('/dashboard/asesi/export', function () {
        return Excel::download(new AsesiExport, 'Asesi.xlsx');
    })->name('dashboard.asesi.export');
    Route::get('/dashboard/asesi/create', [AdminDashboardController::class, 'asesiCreate'])->name('admin.asesi.create');
    Route::get('/dashboard/asesi/edit/{id}', [AdminDashboardController::class, 'asesiEdit'])->name('admin.asesi.edit');
    Route::post('/dashboard/asesi/store', [AdminDashboardController::class, 'asesiStore'])->name('admin.asesi.store');
    Route::get('/dashboard/asesi/{id}', [AdminDashboardController::class, 'asesiShow'])->name('admin.asesi.show');
    Route::put('/dashboard/asesi/update/{id}', [AdminDashboardController::class, 'asesiUpdate'])->name('admin.asesi.update');
    Route::delete('/dashboard/asesi/delete/{id}', [AdminDashboardController::class, 'asesiDestroy'])->name('admin.asesi.destroy');

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

    Route::get('/dashboard/admins', [AdminDashboardController::class, 'adminsIndex'])->name('admin.admins.index');
    Route::get('/dashboard/admins/create', [AdminDashboardController::class, 'adminsCreate'])->name('admin.admins.create');
    Route::post('/dashboard/admins/store', [AdminDashboardController::class, 'adminsStore'])->name('admin.admins.store');
    Route::delete('/dashboard/admins/delete/{id}', [AdminDashboardController::class, 'adminsDestroy'])->name('admin.admins.destroy');
    Route::get('/dashboard/admins/{id}', [AdminDashboardController::class, 'adminsShow'])->name('admin.admins.show');
    Route::get('/dashboard/admins/{id}/edit', [AdminDashboardController::class, 'adminsEdit'])->name('admin.admins.edit');
    Route::put('/dashboard/admins/{id}', [AdminDashboardController::class, 'adminsUpdate'])->name('admin.admins.update');

    Route::get('/dashboard/level', [AdminDashboardController::class, 'level'])->name('admin.level.index');
    Route::get('/dashboard/level/create', [AdminDashboardController::class, 'levelCreate'])->name('admin.level.create');
    Route::post('/dashboard/level/store', [AdminDashboardController::class, 'levelStore'])->name('admin.level.store');
    Route::delete('/dashboard/level/delete/{id}', [AdminDashboardController::class, 'levelDestroy'])->name('admin.level.destroy');
    Route::get('/dashboard/level/{id}/edit', [AdminDashboardController::class, 'levelEdit'])->name('admin.level.edit');
    Route::put('/dashboard/level/{id}', [AdminDashboardController::class, 'levelUpdate'])->name('admin.level.update');

    Route::get('/dashboard/categories', [AdminDashboardController::class, 'categories'])->name('admin.categories.index');
    Route::get('/dashboard/categories/create', [AdminDashboardController::class, 'categoriesCreate'])->name('admin.categories.create');
    Route::post('/dashboard/categories/store', [AdminDashboardController::class, 'categoriesStore'])->name('admin.categories.store');
    Route::delete('/dashboard/categories/delete/{id}', [AdminDashboardController::class, 'categoriesDestroy'])->name('admin.categories.destroy');
    Route::get('/dashboard/categories/{id}/edit', [AdminDashboardController::class, 'categoriesEdit'])->name('admin.categories.edit');
    Route::put('/dashboard/categories/{id}', [AdminDashboardController::class, 'categoriesUpdate'])->name('admin.categories.update');

    Route::get('/dashboard/questions', [AdminDashboardController::class, 'questions'])->name('admin.questions.index');
    Route::get('/dashboard/questions/create', [AdminDashboardController::class, 'questionsCreate'])->name('admin.questions.create');
    Route::post('/dashboard/questions/store', [AdminDashboardController::class, 'questionsStore'])->name('admin.questions.store');
    Route::delete('/dashboard/questions/delete/{id}', [AdminDashboardController::class, 'questionsDestroy'])->name('admin.questions.destroy');
    Route::get('/dashboard/questions/{id}/edit', [AdminDashboardController::class, 'questionsEdit'])->name('admin.questions.edit');
    Route::put('/dashboard/questions/{id}', [AdminDashboardController::class, 'questionsUpdate'])->name('admin.questions.update');

    // Route Level A
    Route::get('/dashboard/level/a', [LevelAController::class, 'index'])->name('admin.level.a.index');
    Route::get('/dashboard/level/a/category', [LevelAController::class, 'categoriesIndex'])->name('admin.categories.a.index');
    Route::get('/dashboard/level/a/category/{id}/edit', [LevelAController::class, 'categoriesEdit'])->name('admin.categories.a.edit');
    Route::get('/dashboard/level/a/category/show/{id}', [LevelAController::class, 'categoriesShow'])->name('admin.categories.a.show');
    Route::put('/dashboard/level/a/category/update/{id}', [LevelAController::class, 'categoriesUpdate'])->name('admin.categories.a.update');

    Route::get('/dashboard/level/a/question', [LevelAController::class, 'bankSoalIndex'])->name('admin.question.a.index');
    Route::get('/dashboard/level/a/question/create', [LevelAController::class, 'bankSoalCreate'])->name('admin.question.a.create');
    Route::get('/dashboard/level/a/question/{id}/show', [LevelAController::class, 'bankSoalShow'])->name('admin.question.a.show');
    Route::post('/dashboard/level/a/question/store', [LevelAController::class, 'bankSoalStore'])->name('admin.question.a.store');
    Route::get('/dashboard/level/a/question/{id}/edit', [LevelAController::class, 'bankSoalEdit'])->name('admin.question.a.edit');
    Route::put('/dashboard/level/a/question/{id}/update', [LevelAController::class, 'bankSoalUpdate'])->name('admin.question.a.update');
    Route::delete('/dashboard/level/a/question/{id}/delete', [LevelAController::class, 'bankSoalDestroy'])->name('admin.question.a.destroy');

    // Route Level B
    Route::get('/dashboard/level/b', [LevelBController::class, 'index'])->name('admin.level.b.index');

    // Route Level C
    Route::get('/dashboard/level/c', [LevelCController::class, 'index'])->name('admin.level.c.index');

    // Route Level Settings
    Route::get('/dashboard/level/settings/index', [LevelSettingsController::class, 'index'])->name('admin.level.settings.index');

    Route::get('/dashboard/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/dashboard/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::get('/dashboard/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('/dashboard/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/dashboard/news/{id}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::put('/dashboard/news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/dashboard/news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    Route::get('/payments', [PaymentDetailController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/{id}', [PaymentDetailController::class, 'show'])->name('admin.payments.show');
    Route::get('/payments-export', [PaymentDetailController::class, 'export'])->name('admin.payments.export');
    Route::delete('/payments/{id}', [PaymentDetailController::class, 'destroy'])->name('admin.payments.destroy');
    Route::patch('/payments/{id}/status', [PaymentDetailController::class, 'updateStatus'])->name('admin.payments.updateStatus');

    Route::get('/profile', [AdminSettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::patch('/profile', [AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::delete('/profile', [AdminSettingsController::class, 'destroy'])->name('admin.settings.destroy');
    Route::put('profile', [AdminSettingsController::class, 'updatePassword'])->name('admin.password.update');

    Route::get('/result-exams-a', [ResultExamsAController::class, 'index'])->name('admin.resulta.index');
    Route::get('/result-exams-a/export', function () {
        return Excel::download(new ResultExamsAExport, 'Result Exams A.xlsx');
    })->name('admin.resulta.export');

    Route::get('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])
        ->name('admin.testimonials.index');

    Route::post('/testimonials/{testimonial}/approve', [\App\Http\Controllers\Admin\TestimonialController::class, 'approve'])
        ->name('admin.testimonials.approve');

    Route::post('/testimonials/{testimonial}/feature', [\App\Http\Controllers\Admin\TestimonialController::class, 'feature'])
        ->name('admin.testimonials.feature');

    Route::delete('/testimonials/{testimonial}', [\App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])
        ->name('admin.testimonials.destroy');
});

// AUTH ASESOR
// Route::middleware(['auth', 'role:asesor'])->prefix('asesor')->group(function () {
//     Route::get('/dashboard', [AsesorDashboardController::class, 'index'])->name('asesor.dashboard');
// });

Route::middleware(['auth', 'role:asesor'])->prefix('asesor')->group(function () {
    Route::get('/dashboard', [AsesorDashboardController::class, 'index'])->name('asesor.dashboard');
    Route::get('/list-asesi', [AsesorDashboardController::class, 'listAsesi'])->name('asesor.list-asesi');

    Route::get('/list-asesi/grade/{id}', [LevelBGradedController::class, 'showGradingPage'])->name('asesor.gradeB.asesi');
    Route::get('/list-asesi/grade/show/{id}', [LevelBGradedController::class, 'ShowGradeDetail'])->name('asesor.gradeB.show');
    Route::post('/list-asesi/grade/{id}', [LevelBGradedController::class, 'storeAssessmentAsesi'])->name('asesor.gradeB.store');

    Route::get('/notifikasi', [AsesorDashboardController::class, 'notifikasi'])->name('asesor.notifikasi');
    Route::get('/form-penilaian', [AsesorDashboardController::class, 'formPenilaian'])->name('asesor.form-penilaian');
    Route::get('/riwayat-penilaian', [AsesorDashboardController::class, 'riwayatPenilaian'])->name('asesor.riwayat-penilaian');
    Route::get('/riwayat-penilaian/detail/{id}', [AsesorDashboardController::class, 'riwayatPenilaianDetail'])->name('asesor.riwayat-penilaian-detail');
    Route::get('/riwayat-penilaian/export', function () {
        return Excel::download(new RiwayatPenilaianBExport, 'Riwayat Penilaian B.xlsx');
    })->name('asesor.riwayat-penilaian-b.export');
    Route::get('/riwayat-aktifitas', [AsesorDashboardController::class, 'riwayatAktifitas'])->name('asesor.riwayat-aktifitas');
    Route::get('/download-nilai', [AsesorDashboardController::class, 'downloadNilai'])->name('asesor.download-nilai');
    Route::get('/profile-setting', [AsesorDashboardController::class, 'profileSetting'])->name('asesor.profile-setting');

    // Route::get('/profile-setting', [AsesorDashboardController::class, 'profileSetting'])->name('asesor.profile-setting');
    Route::post('/profile-setting/update', [AsesorDashboardController::class, 'updateProfile'])->name('asesor.profile-setting.update');
    Route::post('/profile-setting/update-password', [AsesorDashboardController::class, 'updatePassword'])->name('asesor.profile-setting.update-password');
    Route::post('/profile-setting/update-photo', [AsesorDashboardController::class, 'updatePhoto'])->name('asesor.profile-setting.update-photo');
});

// INDOREGION
Route::get('/regencies/{provinceId}', [IndoRegionController::class, 'getRegencies']);
Route::get('/districts/{regencyId}', [IndoRegionController::class, 'getDistricts']);
Route::get('/villages/{districtId}', [IndoRegionController::class, 'getVillages']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Testimonial routes
    // Route::get('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])
    //     ->name('testimonials.index');

    // Route::post('/testimonials/{testimonial}/approve', [\App\Http\Controllers\Admin\TestimonialController::class, 'approve'])
    //     ->name('testimonials.approve');

    // Route::post('/testimonials/{testimonial}/feature', [\App\Http\Controllers\Admin\TestimonialController::class, 'feature'])
    //     ->name('testimonials.feature');

    // Route::delete('/testimonials/{testimonial}', [\App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])
    //     ->name('testimonials.destroy');
});

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

// Auth
Route::get('/login', function () {
    return view('auth.loginPage');
})->name('login');

Route::get('/user-dashboard', function () {
    return view('user.userDashboard.index');
})->name('userDashboard');

Route::get('/sertifikasi', function () {
    return view('user.sertifikasi.index');
})->name('userSertifikasi');

// userDashboard
Route::get('/index', function () {
    return view('userDashboard.index');
})->name('index');

Route::get('/sertifikasi', function () {
    return view('userDashboard.sertifikasi');
})->name('sertifikasi');

Route::get('/viewslama', function () {
    return view('viewslamaDA');
})->name('viewslama');

Route::get('/transaksi', function () {
    return view('userDashboard.transaksi');
})->name('transaksi');

// admin dan asesor
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');

Route::get('/asesor', function () {
    return view('admin.asesor');
})->name('asesor');

Route::get('/real', function () {
    return view('real');
})->name('real');

Route::get('/iseng', function () {
    return view('iseng');
})->name('iseng');

require __DIR__ . '/auth.php';
