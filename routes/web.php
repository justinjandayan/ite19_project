<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasePartsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\VerificationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/yawa', function () {
 phpinfo();
});
Route::get('/', [AuthController::class,'login'] );
Route::post('login', [AuthController::class,'Authlogin'] );
Route::get('/login', [AuthController::class, 'AuthLogin'])->name('post.login');
Route::get('logout', [AuthController::class,'logout'] );
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
Route::get('forgot-password', [AuthController::class,'forgotpassword'] );
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword'] );
Route::get('reset/{token}', [AuthController::class, 'reset'] ); 
Route::post('reset/{token}', [AuthController::class, 'PostReset'] );
Route::get('verify/{token}', [AuthController::class, 'verify'] );
Route::get('/check-login', [AuthController::class, 'checkLogin'])->middleware('auth');


Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard',[DashboardController::class,'dashboard'] );
    Route::get('admin/admin/list',[AdminController::class,'list'] );
    Route::get('admin/admin/add',[AdminController::class,'add'] );
    Route::post('admin/admin/add',[AdminController::class,'insert'] );
    Route::get('admin/admin/show/{id}',[AdminController::class, 'show'] );
    Route::get('admin/admin/edit/{id}',[AdminController::class, 'edit'] );
    Route::post('admin/admin/edit/{id}',[AdminController::class, 'update'] );
    Route::get('admin/admin/delete/{id}',[AdminController::class, 'delete'] );

   
    Route::get('admin/account',[UserController::class, 'MyAccount'] );
    Route::post('admin/account',[UserController::class, 'UpdateMyAccountAdmin'] );

    Route::get('admin/change_password',[UserController::class, 'change_password'] );
    Route::post('admin/change_password',[UserController::class, 'update_change_password'] );


    //student

    Route::get('admin/student/list',[StudentController::class,'list'] );
    Route::get('admin/student/add',[StudentController::class,'add'] );
    Route::post('admin/student/add',[StudentController::class,'insert'] );
    Route::get('admin/student/show/{id}',[StudentController::class,'show'] );
    Route::get('admin/student/edit/{id}',[StudentController::class,'edit'] );
    Route::post('admin/student/edit/{id}',[StudentController::class,'update'] );
    Route::get('admin/student/delete/{id}',[StudentController::class, 'delete'] );

      //dealer

      Route::get('admin/dealer/list',[DealerController::class,'list'] );
      Route::get('admin/dealer/add',[DealerController::class,'add'] );
      Route::post('admin/dealer/add',[DealerController::class,'insert'] );
      Route::get('admin/dealer/show/{id}',[DealerController::class,'show'] );
      Route::get('admin/dealer/edit/{id}',[DealerController::class,'edit'] );
      Route::post('admin/dealer/edit/{id}',[DealerController::class,'update'] );
      Route::get('admin/dealer/delete/{id}',[DealerController::class, 'delete'] );


       //supplier

       Route::get('admin/supplier/list',[SupplierController::class,'list'] );
       Route::get('admin/supplier/add',[SupplierController::class,'add'] );
       Route::post('admin/supplier/add',[SupplierController::class,'insert'] );
       Route::get('admin/supplier/show/{id}',[SupplierController::class,'show'] );
       Route::get('admin/supplier/edit/{id}',[SupplierController::class,'edit'] );
       Route::post('admin/supplier/edit/{id}',[SupplierController::class,'update'] );
       Route::get('admin/supplier/delete/{id}',[SupplierController::class, 'delete'] );

   //Parts
   Route::get('admin/parts/list',[PartsController::class, 'adminlist'] );
   Route::get('admin/parts/add',[PartsController::class, 'adminadd'] );
   Route::post('admin/parts/add',[PartsController::class, 'admininsert'] );
   Route::get('admin/parts/edit/{id}',[PartsController::class, 'adminedit'] );
   Route::post('admin/parts/edit/{id}',[PartsController::class, 'adminupdate'] );
   Route::get('admin/parts/delete/{id}',[PartsController::class, 'admindelete'] );

   //Purchase Parts
   Route::get('admin/purchase_parts/list',[PurchasePartsController::class,'adminlist'] );
   Route::get('admin/purchase_parts/accept/{id}',[PurchasePartsController::class, 'adminaccept'] );
   Route::get('admin/purchase_parts/decline/{id}',[PurchasePartsController::class, 'admindecline'] );
   Route::get('admin/purchase_parts/delete/{id}',[PurchasePartsController::class, 'admindelete'] );

    //Cars
    Route::get('admin/cars/list',[CarController::class, 'adminlist'] );
    Route::get('admin/cars/add',[CarController::class, 'adminadd'] );
    Route::post('admin/cars/add',[CarController::class, 'admininsert'] );
    Route::get('admin/cars/edit/{id}',[CarController::class, 'adminedit'] );
    Route::post('admin/cars/edit/{id}',[CarController::class, 'adminupdate'] );
    Route::get('admin/cars/delete/{id}',[CarController::class, 'admindelete'] );

    //Purchase Car
    Route::get('admin/purchase/list',[PurchaseController::class,'adminlist'] );
    Route::get('admin/purchase/edit/{id}',[PurchaseController::class,'adminedit'] );
    Route::get('admin/purchase/accept/{id}',[PurchaseController::class, 'adminaccept'] );
    Route::get('admin/purchase/decline/{id}',[PurchaseController::class, 'admindecline'] );
    Route::get('admin/purchase/delete/{id}',[PurchaseController::class, 'admindelete'] );

    


});

Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard',[DashboardController::class,'dashboard'] );


    //My Account
    Route::get('student/account',[UserController::class, 'MyAccount'] );
    Route::post('student/account',[UserController::class, 'UpdateMyAccountStudent'] );


    //Cars
    Route::get('student/cars/list',[CarController::class,'customerlist'] );
    Route::get('student/class/delete/{id}',[ClassController::class, 'facultydelete'] );

    //Purchase Car
    Route::get('student/notpurchase/list',[PurchaseController::class,'notpurchaselist'] );
    Route::get('student/purchase/list',[PurchaseController::class,'purchaselist'] );
    Route::get('student/cars/purchase/{id}',[CarController::class,'customerpurchase'] );
    Route::post('student/cars/purchase/{id}',[CarController::class,'customerpurchasestore'] );



        //Parts
    Route::get('student/parts/list',[PartsController::class, 'customerlist'] );

     //Purchase Pars
     Route::get('student/purchase_parts/list',[PurchasePartsController::class,'purchaselist'] );
     Route::get('student/parts/purchase/{id}',[PartsController::class,'customerpurchase'] );
     Route::post('student/parts/purchase/{id}',[PartsController::class,'customerpurchasestore'] );
    

    Route::get('student/change_password',[UserController::class, 'change_password'] );
    Route::post('student/change_password',[UserController::class, 'update_change_password'] );

    

});

Route::group(['middleware' => 'teacher'], function (){

    Route::get('dealer/dashboard',[DashboardController::class,'dashboard'] );


    //My Account
    Route::get('dealer/account',[UserController::class, 'MyAccount'] );
    Route::post('dealer/account',[UserController::class, 'UpdateMyAccountAdmin'] );

   

    //Cars
    Route::get('dealer/cars/list',[CarController::class, 'list'] );
    Route::get('dealer/cars/add',[CarController::class, 'add'] );
    Route::post('dealer/cars/add',[CarController::class, 'insert'] );
    Route::get('dealer/cars/edit/{id}',[CarController::class, 'edit'] );
    Route::post('dealer/cars/edit/{id}',[CarController::class, 'update'] );
    Route::get('dealer/cars/delete/{id}',[CarController::class, 'delete'] );

    //Purchase Car
    Route::get('dealer/purchase/list',[PurchaseController::class,'list'] );
    Route::get('dealer/purchase/edit/{id}',[PurchaseController::class,'edit'] );
    Route::get('dealer/purchase/accept/{id}',[PurchaseController::class, 'accept'] );
    Route::get('dealer/purchase/decline/{id}',[PurchaseController::class, 'decline'] );
    Route::get('dealer/purchase/delete/{id}',[PurchaseController::class, 'delete'] );


    Route::get('dealer/change_password',[UserController::class, 'change_password'] );
    Route::post('dealer/change_password',[UserController::class, 'update_change_password'] );

    

});

Route::group(['middleware' => 'supplier'], function (){

    Route::get('supplier/dashboard',[DashboardController::class,'dashboard'] );


    //My Account
    Route::get('supplier/account',[UserController::class, 'MyAccount'] );
    Route::post('supplier/account',[UserController::class, 'UpdateMyAccountAdmin'] );

   

    //Parts
    Route::get('supplier/parts/list',[PartsController::class, 'list'] );
    Route::get('supplier/parts/add',[PartsController::class, 'add'] );
    Route::post('supplier/parts/add',[PartsController::class, 'insert'] );
    Route::get('supplier/parts/edit/{id}',[PartsController::class, 'edit'] );
    Route::post('supplier/parts/edit/{id}',[PartsController::class, 'update'] );
    Route::get('supplier/parts/delete/{id}',[PartsController::class, 'delete'] );

    //Purchase Car
    Route::get('supplier/purchase/list',[PurchasePartsController::class,'list'] );
    Route::get('supplier/purchase/accept/{id}',[PurchasePartsController::class, 'accept'] );
    Route::get('supplier/purchase/decline/{id}',[PurchasePartsController::class, 'decline'] );
    Route::get('supplier/purchase/delete/{id}',[PurchasePartsController::class, 'delete'] );


    Route::get('supplier/change_password',[UserController::class, 'change_password'] );
    Route::post('supplier/change_password',[UserController::class, 'update_change_password'] );

    

});