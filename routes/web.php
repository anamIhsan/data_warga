<?php

use App\Http\Controllers\DashboadrController;
use App\Http\Controllers\kelola_data\DataKkController;
use App\Http\Controllers\kelola_data\DataPendudukController;
use App\Http\Controllers\kelola_data\MemberController;
use App\Http\Controllers\kelola_surat\SuKetDomisiliController;
use App\Http\Controllers\kelola_surat\SuKetKelahiranController;
use App\Http\Controllers\kelola_surat\SuKetKematianController;
use App\Http\Controllers\kelola_surat\SuKetPendatangController;
use App\Http\Controllers\kelola_surat\SuKetPindahController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\sirkulasi_penduduk\DataLahirController;
use App\Http\Controllers\sirkulasi_penduduk\DataMeninggalController;
use App\Http\Controllers\sirkulasi_penduduk\DataPendatangController;
use App\Http\Controllers\sirkulasi_penduduk\DataPindahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Auth
Route::get('/', [LoginController::class, 'login'])
    ->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])
    ->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Dasboard

    Route::get('/dashboard', [DashboadrController::class, 'index'])
        ->name('dashboard');

    //                      <-- Kelola Data -->

    // Data Penduduk
    Route::prefix('kelola-data/data-penduduk')->group(function () {

        Route::get('/', [DataPendudukController::class, 'index'])
            ->name('kelola_data-data_penduduk');
        
        Route::get('/create', [DataPendudukController::class, 'create'])
            ->name('kelola_data-data_penduduk_create');
        Route::post('/store', [DataPendudukController::class, 'store'])
            ->name('kelola_data-data_penduduk_store');
        
        Route::get('/edit/{id}', [DataPendudukController::class, 'edit'])
            ->name('kelola_data-data_penduduk_edit');
        Route::put('/update/{id}', [DataPendudukController::class, 'update'])
            ->name('kelola_data-data_penduduk_update');

        Route::delete('/delete/{id}', [DataPendudukController::class, 'destroy'])
            ->name('kelola_data-data_penduduk_delete');

    });

    // Data Kartu Keluarga
    Route::prefix('kelola-data/data-kartu-keluarga')->group(function () {

        // Anggota keluarga
        Route::get('/anggota/{id}', [MemberController::class, 'index'])
            ->name('kelola_data-data_kartu_keluarga_anggota');
        Route::post('/anggota/{id}', [MemberController::class, 'store'])
            ->name('kelola_data-data_kartu_keluarga_anggota_store');
        Route::delete('/anggota/{id}', [MemberController::class, 'destroy'])
            ->name('kelola_data-data_kartu_keluarga_anggota_delete');

        Route::get('/', [DataKkController::class, 'index'])
            ->name('kelola_data-data_kartu_keluarga');
        
        Route::get('/create', [DataKkController::class, 'create'])
            ->name('kelola_data-data_kartu_keluarga_create');
        Route::post('/store', [DataKkController::class, 'store'])
            ->name('kelola_data-data_kartu_keluarga_store');
        
        Route::get('/edit/{id}', [DataKkController::class, 'edit'])
            ->name('kelola_data-data_kartu_keluarga_edit');
        Route::put('/update/{id}', [DataKkController::class, 'update'])
            ->name('kelola_data-data_kartu_keluarga_update');

        Route::get('/detail/{id}', [DataKkController::class, 'show'])
            ->name('kelola_data-data_kartu_keluarga_detail');

        Route::delete('/delete/{id}', [DataKkController::class, 'destroy'])
            ->name('kelola_data-data_kartu_keluarga_delete');

    });

    //                      <-- Sirkulasi Penduduk -->

    // Data Lahir
    Route::prefix('sirkulasi-penduduk/data-lahir')->group(function () {

        Route::get('/', [DataLahirController::class, 'index'])
            ->name('sirkulasi_penduduk-data_lahir');
        
        Route::get('/create', [DataLahirController::class, 'create'])
            ->name('sirkulasi_penduduk-data_lahir_create');
        Route::post('/store', [DataLahirController::class, 'store'])
            ->name('sirkulasi_penduduk-data_lahir_store');
        
        Route::get('/edit/{id}', [DataLahirController::class, 'edit'])
            ->name('sirkulasi_penduduk-data_lahir_edit');
        Route::put('/update/{id}', [DataLahirController::class, 'update'])
            ->name('sirkulasi_penduduk-data_lahir_update');

        Route::delete('/delete/{id}', [DataLahirController::class, 'destroy'])
            ->name('sirkulasi_penduduk-data_lahir_delete');

    });

    // Data Meninggal
    Route::prefix('sirkulasi-penduduk/data-meninggal')->group(function () {

        Route::get('/', [DataMeninggalController::class, 'index'])
            ->name('sirkulasi_penduduk-data_meninggal');
        
        Route::get('/create', [DataMeninggalController::class, 'create'])
            ->name('sirkulasi_penduduk-data_meninggal_create');
        Route::post('/store', [DataMeninggalController::class, 'store'])
            ->name('sirkulasi_penduduk-data_meninggal_store');
        
        Route::get('/edit/{id}', [DataMeninggalController::class, 'edit'])
            ->name('sirkulasi_penduduk-data_meninggal_edit');
        Route::put('/update/{id}', [DataMeninggalController::class, 'update'])
            ->name('sirkulasi_penduduk-data_meninggal_update');

        Route::delete('/delete/{id}', [DataMeninggalController::class, 'destroy'])
            ->name('sirkulasi_penduduk-data_meninggal_delete');

    });

    // Data Pendatang
    Route::prefix('sirkulasi-penduduk/data-pendatang')->group(function () {

        Route::get('/', [DataPendatangController::class, 'index'])
            ->name('sirkulasi_penduduk-data_pendatang');
        
        Route::get('/create', [DataPendatangController::class, 'create'])
            ->name('sirkulasi_penduduk-data_pendatang_create');
        Route::post('/store', [DataPendatangController::class, 'store'])
            ->name('sirkulasi_penduduk-data_pendatang_store');
        
        Route::get('/edit/{id}', [DataPendatangController::class, 'edit'])
            ->name('sirkulasi_penduduk-data_pendatang_edit');
        Route::put('/update/{id}', [DataPendatangController::class, 'update'])
            ->name('sirkulasi_penduduk-data_pendatang_update');
        
        Route::delete('/delete/{id}', [DataPendatangController::class, 'destroy'])
            ->name('sirkulasi_penduduk-data_pendatang_delete');

    });

    // Data Pindah
    Route::prefix('sirkulasi-penduduk/data-pindah')->group(function () {

        Route::get('/', [DataPindahController::class, 'index'])
            ->name('sirkulasi_penduduk-data_pindah');
        
        Route::get('/create', [DataPindahController::class, 'create'])
            ->name('sirkulasi_penduduk-data_pindah_create');
        Route::post('/store', [DataPindahController::class, 'store'])
            ->name('sirkulasi_penduduk-data_pindah_store');
        
        Route::get('/edit/{id}', [DataPindahController::class, 'edit'])
            ->name('sirkulasi_penduduk-data_pindah_edit');
        Route::put('/update/{id}', [DataPindahController::class, 'update'])
            ->name('sirkulasi_penduduk-data_pindah_update');

        Route::delete('/delete/{id}', [DataPindahController::class, 'destroy'])
            ->name('sirkulasi_penduduk-data_pindah_delete');

    });

    //                      <-- Kelola Surat -->

    // Surat Keterangan
    Route::prefix('surat-keterangan')->group(function () {

        // Domisili
        Route::get('/domisili', [SuKetDomisiliController::class, 'index'])
            ->name('surat_keterangan_domisili');
        
        Route::post('/domisili/print', [SuKetDomisiliController::class, 'print'])
            ->name('surat_keterangan_domisili_print');

        // Kelahiran
        Route::get('/kelahiran', [SuKetKelahiranController::class, 'index'])
            ->name('surat_keterangan_kelahiran');
        
        Route::post('/kelahiran/print', [SuKetKelahiranController::class, 'print'])
            ->name('surat_keterangan_kelahiran_print');

        // Kematian
        Route::get('/kematian', [SuKetKematianController::class, 'index'])
            ->name('surat_keterangan_kematian');
        
        Route::post('/kematian/print', [SuKetKematianController::class, 'print'])
            ->name('surat_keterangan_kematian_print');

        // Pendatang
        Route::get('/pendatang', [SuKetPendatangController::class, 'index'])
            ->name('surat_keterangan_pendatang');
        
        Route::post('/pendatang/print', [SuKetPendatangController::class, 'print'])
            ->name('surat_keterangan_pendatang_print');

        // Pindah
        Route::get('/pindah', [SuKetPindahController::class, 'index'])
            ->name('surat_keterangan_pindah');

        Route::post('/pindah/print', [SuKetPindahController::class, 'print'])
            ->name('surat_keterangan_pindah_print');

    });

    // Pengguna Sistem
    Route::prefix('pengguna')->group(function () {

        Route::get('/', [UserController::class, 'index'])
            ->name('pengguna');
        
        Route::get('/create', [UserController::class, 'create'])
            ->name('pengguna_create');
        Route::post('/store', [UserController::class, 'store'])
            ->name('pengguna_store');

        Route::get('/edit/{id}', [UserController::class, 'edit'])
            ->name('pengguna_edit');
        Route::put('/update/{id}', [UserController::class, 'update'])
            ->name('pengguna_update');

        Route::delete('/delete/{id}', [UserController::class, 'destroy'])
            ->name('pengguna_delete');

    });
});

Route::get('resident_export', [DataPendudukController::class, 'export'])
    ->name('resident.export');

Route::post('resident_import', [DataPendudukController::class, 'import'])
    ->name('resident.import');

// <!-- al-maidah / sa'ad al-gamidi / :18: -->