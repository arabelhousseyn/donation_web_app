<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\stateController;
use App\Http\Controllers\donationController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\favoritsController;
use App\Http\Controllers\reportController;


Route::get('/',[homeController::class,'index'])->name('home');
Route::get('/index',[homeController::class,'index'])->name('home');

Route::get('/checkAuth',[homeController::class,'checkAuth'])->name("checkAuth");

Route::get('/alert',[homeController::class,'alertGretting'])->name('alertGretting');

Route::get('/language',[homeController::class,'checkLanguage'])->name('checkLanguage');

Route::get('/states',[stateController::class,'getAllstatesByIdCountry'])->name('states');


///////// register user

Route::post('/register',[userController::class,'register'])->name('register');

Route::get('/verification',[userController::class,'verification'])->name('verification');

Route::post('/vercode',[userController::class,'verifcationCode'])->name('verifcationCode');


Route::get('/resendCode',[userController::class,'resendCode'])->name('resendcode');

//////////////// login

Route::post('/login',[userController::class,'login'])->name('login');

///////user information


Route::get('/userInformation',[userController::class,'getUserById'])->name('getUserById');

Route::get('/logout',[userController::class,'logout'])->name('logout');

///// change language

Route::get('/en',[homeController::class,'en'])->name('en');
Route::get('/fr',[homeController::class,'fr'])->name('fr');
Route::get('/ar',[homeController::class,'ar'])->name('ar');

////////////// donations

Route::get('/donations',[donationController::class,'getAll'])->name('donations');

//////////////posts

Route::post('/addPost',[postsController::class,'addPost'])->name('addPost');

Route::get('/getAllPosts',[postsController::class,'getAll'])->name('getAll');

Route::post('/likePost',[favoritsController::class,'LikePost'])->name('LikePost');


Route::get('/allReports',[reportController::class,'getAllReports'])->name('getAllReports');

Route::post('/addReport',[reportController::class,'report'])->name('report');

Route::post('/postSession',[postsController::class,'postSession'])->name('postSession');


Route::get('/{title}',[postsController::class,'posts'])->name('posts');

Route::post('/getPostByName',[postsController::class,'getpostByname'])->name('getPostByName');

Route::post('/getRelatedPosts',[postsController::class,'getRelatedPosts'])->name('getRelatedPosts');

///////////////////// profile section

Route::get('/profile/{profile}',[homeController::class,'profile'])->name('profile');

Route::post('profile/profile/userinfomarion',[userController::class,'getUserByUsername'])->name('getUserByUsername');
Route::get('profile/profile/language',[homeController::class,'checkLanguage'])->name('languageProfile');
Route::post('profile/profile/getPosts',[postsController::class,'getPostsByUser'])->name('getPostsByUser');
Route::post('profile/profile/getFavorits',[favoritsController::class,'getAllFavoritsByUser'])->name('getAllFavoritsByUser');
Route::get('profile/profile/checkAuth',[homeController::class,'checkAuth'])->name('prauth');

Route::post('profile/profile/checkUsername',[homeController::class,'checkUsername'])->name('checkUsername');

Route::post('profile/profile/removeDonationFromUser',[donationController::class,'removeDonation'])->name('removeDonation');
Route::post('profile/profile/dislike',[favoritsController::class,'unlike'])->name('dislike');


////////////settings


Route::get('profile/{profile}/settings',[userController::class,'settings'])->name('settings');

Route::post('profile/profile/changeUserInformation',[userController::class,'changeUserInformation'])->name('changeUserInformation');

Route::post('profile/profile/changePassword',[userController::class,'changePassword'])->name('changePassword');

//// forget password


Route::get('forget/checkpoint',[homeController::class,'checkpoint'])->name('checkpoint');

Route::post('checkpointUsername/',[homeController::class,'checkPointUsername'])->name('checkPointUsername');

Route::get('forget/recover/',[homeController::class,'recover'])->name('recover');

Route::post('verifyy/',[homeController::class,'verifyCode'])->name('verifyCode');

Route::post('changePassword/',[homeController::class,'changePassword'])->name('changePassword');

////////////about


