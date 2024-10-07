<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogController;

Route::post('/login', [LoginController::class, 'authenticate']);
Route::delete('/logout', [LoginController::class, 'destroy']);

Route::post('/mail', [MailController::class, 'sendMail']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gallery/nature', function () {
    return view('Gallery/gallery');
});

Route::get('/gallery/portraits', function () {
    return view('Gallery/gallery_second');
});

Route::get('/gallery/events', function () {
    return view('Gallery/gallery_third');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/blog', function(){
    return view('blog');
});

Route::middleware('CustomAuth') -> group(function (){
    Route::get('/admin', function (){
        return view('Admin/adminView');
    });

    Route::get('/admin/image-upload', function(){
        return view('Admin/imgupload');
    });

    Route::get('/admin/blog', function(){
        return view('Admin/blog-create');
    });
    
    Route::post('/upload', [GalleryController::class, 'store']);
    Route::post('/rm-image', [GalleryController::class, 'delete']);

    Route::post('/blog-upload', [BlogController::class, 'store']);
    Route::post('/blog-delete', [BlogController::class, 'delete']);
    Route::post('/blog-update', [BlogController::class, 'update']);


    Route::get('/blog/edit/{id}', function($id) {
        return view('Admin/blogEdit', ['id' => $id]);
    })->name('blog.edit');

});