<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";

Route::middleware(['web'])
->name($shop_prefix)
->prefix($shop_prefix)->group(function () {

});

/**
 * 회원(로그인) 사용자 링크
 */
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/shop/user', [
        \Jiny\Shop\Http\Controllers\User\UserDashboardController::class,
        "index"]);

    Route::get('/shop/user/profile', [
        \Jiny\Shop\Http\Controllers\User\UserProfileController::class,
        "index"]);

    Route::get('/shop/user/password/change', [
        \Jiny\Shop\Http\Controllers\User\UserPasswordChangeController::class,
        "index"]);
});



/**
 * 관리자
 */
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::resource('/shop/admin/bank',
        \Jiny\Shop\Http\Controllers\Admin\AdminBankController::class);


        Route::resource('/shop/admin/user/grade',
        \Jiny\Shop\Http\Controllers\Admin\AdminUserGradeController::class);

    // 적립금
    Route::get('/shop/admin/user/money', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserMoneyController::class,
        "index"]);

    Route::get('/shop/admin/user/money/{userid}', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserMoneyHistoryController::class,
        "index"]);

    // 예치금
    Route::get('/shop/admin/user/cash', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserCashController::class,
        "index"]);

    Route::get('/shop/admin/user/cash/{userid}', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserCashHistoryController::class,
        "index"]);


    // 포인트
    Route::get('/shop/admin/user/point', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserPointController::class,
        "index"]);
    Route::get('/shop/admin/user/point/{userid}', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserPointHistoryController::class,
        "index"]);


    Route::get('/shop/admin/user/address', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserAddressController::class,
        "index"]);

    Route::get('/shop/admin/user/phone', [
        \Jiny\Shop\Http\Controllers\Admin\AdminUserPhoneController::class,
        "index"]);
});
