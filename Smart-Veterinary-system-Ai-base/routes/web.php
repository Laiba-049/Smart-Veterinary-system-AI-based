<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Post;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\SellerDashboardController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/signup', [AuthController::class, 'signupPage'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])
        ->name('chat');

    Route::post('/chat', [ChatController::class, 'sendMessage'])
        ->middleware('throttle:5,1') // 5 requests per minute
        ->name('chat.send');
});

Route::get('/social', [PostController::class, 'index'])->name('social.feed');

// Appointment

Route::middleware('guest:doctor')->group(function () {
    Route::get('/doctor/login', [DoctorAuthController::class, 'showLogin'])->name('doctor.login');
    Route::post('/doctor/login', [DoctorAuthController::class, 'login'])->name('doctor.login.post');

    Route::get('/doctor/register', [DoctorAuthController::class, 'showRegister'])->name('doctor.register');
    Route::post('/doctor/register', [DoctorAuthController::class, 'register'])->name('doctor.register.post');
});

// doctor related routes
Route::middleware('auth:doctor')->group(function () {

    Route::get('/doctor/profile', [DoctorProfileController::class, 'index']);
    Route::post('/doctor/profile', [DoctorProfileController::class, 'update']);

    Route::post('/doctor/logout', [DoctorAuthController::class, 'logout']);
});
Route::post('/doctor/{id}/appointment', [AppointmentController::class, 'store']);
Route::get('/doctor/{id}', [DoctorController::class, 'show']);
//added today
Route::post('/doctor/appointment/{id}/approve', [AppointmentController::class, 'approve']);
Route::post('/doctor/appointment/{id}/reject', [AppointmentController::class, 'reject']);
Route::post('/doctor/appointment/{id}/respond', [AppointmentController::class, 'respond']);

// for seller to list product or all
Route::middleware(['auth', 'seller'])->group(function () {

    // Seller animal dashboard
    Route::get('/seller/animals', [AnimalController::class, 'index'])
        ->name('animals.index');

    Route::get('/seller/animals/create', [AnimalController::class, 'create'])
        ->name('animals.create');

    Route::post('/seller/animals', [AnimalController::class, 'store'])
        ->name('animals.store');

    // EDIT
    Route::get('/seller/animals/{animal}/edit', [AnimalController::class, 'edit'])
        ->name('animals.edit');

    // UPDATE
    Route::put('/seller/animals/{animal}', [AnimalController::class, 'update'])
        ->name('animals.update');

    // DELETE
    Route::delete('/seller/animals/{animal}', [AnimalController::class, 'destroy'])
        ->name('animals.destroy');
    Route::get('/seller/orders', [\App\Http\Controllers\Seller\OrderController::class, 'index'])
        ->name('seller.orders.index');
});

Route::get('/order/{order}/receipt', [CheckoutController::class, 'receipt'])
    ->middleware('auth')
    ->name('order.receipt');


//for cart and checkout
Route::middleware('auth')->group(function () {
    Route::get('/checkout/{animal}', [CheckoutController::class, 'showani'])
        ->name('checkout.show');

    Route::post('/checkout/{animal}', [CheckoutController::class, 'store'])
        ->name('checkout.store');
    Route::get('/order/{order}/success', [CheckoutController::class, 'success'])
        ->name('order.success');
    Route::post('/cart/add/{animal}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::delete('/cart/{cart}', [CartController::class, 'remove'])
        ->name('cart.remove');
});

// for showing animals cards and details page
Route::get('/animals', [AnimalController::class, 'publicIndex'])
    ->name('animals.public.index');

Route::get('/animals/{animal}', [AnimalController::class, 'show'])
    ->name('animals.show');


//base of the full project
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', function () {
        return view('about');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/price', function () {
        return view('price');
    });
    Route::get('/product', function () {
        return view('product');
    });
    Route::get('/service', function () {
        $posts = Post::with(['user', 'likes', 'comments.user'])
            ->latest()
            ->get();

        return view('service', compact('posts'));
    });
    Route::get('/team', [DoctorController::class, 'index']);

    Route::get('/blog', function () {
        return view('blog');
    });
    Route::get('/testimonial', function () {
        return view('testimonial');
    });
    Route::get('/detail', function () {
        return view('detail');
    });
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments']);
    Route::get('/appointment/{id}/prescription-pdf', [AppointmentController::class, 'prescriptionPdf']);
    //posts
    Route::get('/panel/posts', [PostController::class, 'myPosts'])->name('posts.panel');
    Route::get('/panel/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/panel/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/panel/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/panel/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/panel/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name("posts.like");
    Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('posts.comment');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
