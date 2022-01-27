<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


// Route::get('usersie', ['uses'=>'UserController@index', 'as'=>'users.index']);
Route::get('/datatable', 'AjaxController@datatable')->name('datatable');
Route::get('/ajax', 'AjaxController@ajax')->name('ajax');
Route::auth();
Route::get('/dass', 'DashboardController@index');
Route::get('chart','ChartController@index');
Route::get('/superadmin', 'SaController@index');

Route::post('/home', 'HomeController@upload')->name('avatar.upload');
Route::get('images/{filename}', 'HomeController@displayImage')->name('image.displayImage');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/registerPost', 'Auth\RegisterController@registerPost');
Route::get('/searching', 'CariController@index');

Route::get('query', 'CariController@index');
Route::get('/testt', 'CariController@index');
Route::group(['middleware' => ['auth']], function () {

    /**
     * Main
     */
    /**FUCKING TASK*/
    // Route::get('/taskrep', function (Request $request) {
    //     $countries = DB::table('projects')
    //     ->get();
    //     $states = DB::table('tasks')
    //     ->where('project_id', $request->country_id)
    //     ->get();
    
    // if (count($states) > 0) {
    //     return response()->json($states);
    // }
    
    //     $product = DB::table('tasks')->where( function($query) use($request){
    //                      return $request->price_id ?
    //                             $query->from('activities')->where('source_id', $request->price_id) : '';
    //                 })->where(function($query) use($request){
    //                      return $request->color_id ?
    //                             $query->from('activities')->where('text', 'like', '%' . $request->color_id . '%') : '';
    //                 })
    //                 ->where(function($query) use($request){
    //                     return $request->from ?
    //                     $query->from('activities')->whereBetween('created_at', [$request->from, $request->to]) : '';
    //                })
    //                 //->with('prices','colors')
    //                 ->get();
         
    //     $selected_id = [];
    //     $selected_id['source_id'] = $request->price_id;
    //     $selected_id['causer_id'] = $request->color_id;
    //     $selected_id['created_at'] = $request->from;
    //     $selected_id['created_at'] = $request->to;
    //     return view('test',compact('product','selected_id', 'countries'));
    
    // })->name('filter');
    Route::get('/filtermenu','NewmenuController@index2');

    Route::get('/menuss','NewmenuController@index')->name('filteringg');
Route::get('get-states', 'DropdownController@getStates')->name('getStates');
Route::get('/digitalrep', 'DigitalrepController@test')->name('filterrep');

    Route::get('/test', 'OverController@test')->name('filter');
    Route::get('/overdue', 'OverController@overdue')->name('filtering');
    Route::get('/testsup', 'OversupController@test')->name('filter');
    Route::get('/overduesup', 'OversupController@overdue')->name('filtering');

    Route::get('/div', 'DivController@index');
    Route::get('/div/tambah', 'DivController@tambah');
    Route::post('/div/store', 'DivController@store');
    Route::post('/div/update', 'DivController@update');
    Route::get('/tasks/edit/{id}', 'DivController@edit');

    Route::post('/labels/update', 'TasksController@update')-> name('label.update');

    Route::get('/div/edit/{id}', 'DivController@edit');
    Route::get('/div/hapus/{id}', 'DivController@delete');
    Route::resource('crud', 'CrudsController');
    Route::resource('labels', 'LabelController');

    Route::get('/pegawa', 'PegawaController@index');
    Route::get('/pegawa/tambah', 'PegawaController@tambah');
    Route::post('/pegawa/store', 'PegawaController@store');
    Route::get('/pegawa/edit/{user_id}', 'PegawaController@edit');
    Route::get('/pegawa/hapus/{user_id}', 'PegawaController@delete');
    Route::get('/pegawai', 'PegawaiController@index');
    Route::get('/pegawai/tambah', 'PegawaiController@tambah');
    Route::post('/pegawai/store', 'PegawaiController@store');
    Route::get('/pegawai/edit/{id}', 'PegawaiController@edit');
    Route::put('/pegawai/update/{id}', 'PegawaiController@update');
    Route::get('/pegawai/hapus/{id}', 'PegawaiController@delete');
    Route::resource('colors','ListcolorController');
    Route::resource('usercrud','UsercrudController');
    // Route::delete('/usercrud/{id}/destroy', 'UsercrudController@destroy')->name('users.destroy');
    Route::resource('comments','CommentController');


    Route::resource('userr','UserrController');
        Route::resource('taskss', 'TaskssController');
        ## View
    Route::get('/subjects', 'SubjectsController@index')->name('subjects');
    ## Create
    Route::get('/subjects/create', 'SubjectsController@create')->name('subjects.create');
    Route::post('/subjects/store', 'SubjectsController@store')->name('subjects.store');

    ## Update
    Route::get('/subjects/store/{id}', 'SubjectsController@edit')->name('subjects.edit');
    Route::post('/subjects/update/{id}', 'SubjectsController@update')->name('subjects.update');

    ## Delete
    Route::get('/subjects/delete/{id}', 'SubjectsController@destroy')->name('subjects.delete');

    Route::resource('productss', 'ProductController');
    Route::resource('roless', 'RoleuserController');
    Route::resource('productis', 'ProductiController');

    Route::get('/getcomm', 'CommentlogController@getComment');
    Route::get('/', 'PagesController@dashboard');
    Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');
    Route::get('report', 'ExcelController@importExportView')->name('report');
    Route::get('exportExcel/{type}', 'ExcelController@exportExcel')->name('exportExcel');
    Route::get('exportExcelcalc/{type}', 'ExcelController@exportExcel2')->name('exportExcel2');
    Route::get('add-to-log', 'HomeController@myTestAddToLog');
    Route::get('logActivity', 'HomeController@logActivity');
    
    Route::get('importExportView', 'DigitalController@importExportView')->name('importExportView');
    // Route for export/download tabledata to .csv, .xls or .xlsx
    Route::get('exportExcel/{type}', 'DigitalController@exportExcel')->name('exportExcel');
    // Route for import excel data to database.
    // Route::post('importExcel', [DigitalController::class, 'importExcel'])->name('importExcel');
    Route::post('importExcel', 'DigitalController@importExcel')->name('importExcel');
    /**
     * Users
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/data', 'UsersController@anyData')->name('users.data');
        Route::get('/taskdata/{id}', 'UsersController@taskData')->name('users.taskdata');
        Route::get('/leaddata/{id}', 'UsersController@leadData')->name('users.leaddata');
        Route::get('/clientdata/{id}', 'UsersController@clientData')->name('users.clientdata');
        Route::get('/users', 'UsersController@users')->name('users.users');
        Route::get('/calendar-users', 'UsersController@calendarUsers')->name('users.calendar');
    });
    Route::resource('users', 'UsersController');

    /**
    * Roles
    */

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/data', 'RolesController@indexData')->name('roles.data');
        Route::patch('/update/{external_id}', 'RolesController@update');
    });
    Route::resource('roles', 'RolesController', ['except' => [
            'update'
        ]]);
    /**
     * Clients
     */
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/data', 'ClientsController@anyData')->name('clients.data');
        Route::get('/taskdata/{external_id}', 'ClientsController@taskDataTable')->name('clients.taskDataTable');
        Route::get('/projectdata/{external_id}', 'ClientsController@projectDataTable')->name('clients.projectDataTable');
        Route::get('/leaddata/{external_id}', 'ClientsController@leadDataTable')->name('clients.leadDataTable');
        Route::get('/invoicedata/{external_id}', 'ClientsController@invoiceDataTable')->name('clients.invoiceDataTable');
        Route::post('/create/cvrapi', 'ClientsController@cvrapiStart');
        Route::post('/upload/{external_id}', 'DocumentsController@upload')->name('document.upload');
        Route::patch('/updateassign/{external_id}', 'ClientsController@updateAssign');
        Route::post('/updateassign/{external_id}', 'ClientsController@updateAssign');
    });
    Route::resource('clients', 'ClientsController');
    Route::get('document/{external_id}', 'DocumentsController@view')->name('document.view');
    Route::get('document/download/{external_id}', 'DocumentsController@download')->name('document.download');
    Route::resource('documents', 'DocumentsController');


    /**
     * Tasks
     */
    Route::group(['prefix' => 'tasks'], function () {
        // Route::post('/tasks/store', 'TasksController@store')->name('tasks.store');
        Route::get('/data', 'TasksController@anyData')->name('tasks.data');
        Route::patch('/updatestatus/{external_id}', 'TasksController@updateStatus')->name('task.update.status');
        Route::patch('/updatelabel/{external_id}', 'TasksController@updateLabel')->name('task.update.label');
        Route::patch('/updateassign/{external_id}', 'TasksController@updateAssign')->name('task.update.assignee');
        Route::post('/updatelabel/{external_id}', 'TasksController@updateLabel');
        Route::post('/updatestatus/{external_id}', 'TasksController@updateStatus');
        Route::post('/updateassign/{external_id}', 'TasksController@updateAssign');
        Route::post('/invoice/{external_id}', 'TasksController@invoice')->name('task.invoice');
        Route::patch('/update-deadline/{external_id}', 'TasksController@updateDeadline')->name('task.update.deadline');
        Route::get('/create/{client_external_id}', 'TasksController@create')->name('client.task.create');
        Route::get('/create/{client_external_id}/{project_external_id}', 'TasksController@create')->name('client.project.task.create');
        Route::post('/updateproject/{external_id}', 'TasksController@updateProject')->name('tasks.update.project');
    });
    Route::resource('tasks', 'TasksController');

    /**
     * Leads
     */
    Route::group(['prefix' => 'leads'], function () {
        Route::get('/all-leads-data', 'LeadsController@allLeads')->name('leads.all');
        Route::get('/data', 'LeadsController@leadsJson')->name('leads.data');
        Route::patch('/updateassign/{external_id}', 'LeadsController@updateAssign')->name('lead.update.assignee');
        Route::patch('/updatestatus/{external_id}', 'LeadsController@updateStatus')->name('lead.update.status');
        Route::patch('/updatefollowup/{external_id}', 'LeadsController@updateFollowup')->name('lead.followup');
        Route::post('/updateassign/{external_id}', 'LeadsController@updateAssign');
        Route::post('/updatestatus/{external_id}', 'LeadsController@updateStatus');
        Route::get('/create/{client_external_id}', 'LeadsController@create')->name('client.lead.create');
        Route::delete('/{lead}/json', 'LeadsController@destroyJson');
    });
    Route::resource('leads', 'LeadsController');
     Route::post('{type}/{external_id}', 'CommentController@store')->name('comments.create');
    Route::delete('/{comment}', 'CommentController@destroy')->name('comments.destroy');



    /**
     * Products
     */
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductsController@index')->name('products.index');
        Route::delete('/{product}', 'ProductsController@destroy')->name('products.destroy');
        Route::get('/creator/{external_id?}', 'ProductsController@productCreator')->name('products.creator');
        Route::post('/{external_id?}', 'ProductsController@update')->name('products.update');
        Route::get('/data', 'ProductsController@allProducts')->name('products.data');
    });

    /**
     * Projects
     */
    Route::group(['prefix' => 'projects'], function () {
        Route::get('/data', 'ProjectsController@indexData')->name('projects.index.data');
        
        Route::patch('/updatestatus/{external_id}', 'ProjectsController@updateStatus')->name('project.update.status');
        Route::patch('/updateassign/{external_id}', 'ProjectsController@updateAssign')->name('project.update.assignee');
        Route::post('/updatestatus/{external_id}', 'ProjectsController@updateStatus');
        Route::post('/updateassign/{external_id}', 'ProjectsController@updateAssign');
        Route::patch('/update-deadline/{external_id}', 'ProjectsController@updateDeadline')->name('project.update.deadline');
        Route::get('/create/{client_external_id}', 'ProjectsController@create')->name('project.client.create');
    });
    Route::resource('projects', 'ProjectsController');
    /**
     * Settings
     */
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'SettingsController@index')->name('settings.index');
        Route::patch('/overall', 'SettingsController@updateOverall')->name('settings.update');
        Route::post('/first-steps', 'SettingsController@updateFirstStep')->name('settings.update.first_step');
        Route::get('/business-hours', 'SettingsController@businessHours')->name('settings.business_hours');
        Route::get('/date-formats', 'SettingsController@dateFormats')->name('settings.date_formats');
    });

    /**
     * Departments
     */
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/indexData', 'DepartmentsController@indexData')->name('departments.indexDataTable');
    });
    Route::resource('departments', 'DepartmentsController');

    /**
     * Integrations
     */
    Route::group(['prefix' => 'integrations'], function () {
        Route::post('/revokeAccess', 'IntegrationsController@revokeAccess')->name('integration.revoke-access');
        Route::post('/sync/dinero', 'IntegrationsController@dineroSync')->name('sync.dinero');
    });
    Route::resource('integrations', 'IntegrationsController');

    /**
     * Notifications
     */
    Route::group(['prefix' => 'notifications'], function () {
        Route::post('/markread', 'NotificationsController@markRead')->name('notification.read');
        Route::get('/markall', 'NotificationsController@markAll');
        Route::get('/{id}', 'NotificationsController@markRead');
    });

    /**
     * Invoices
     */
    Route::group(['prefix' => 'invoices'], function () {
        Route::post('/sentinvoice/{external_id}', 'InvoicesController@updateSentStatus')->name('invoice.sent');
        Route::post('/newitem/{external_id}', 'InvoicesController@newItem')->name('invoice.new.item');
        Route::get('/overdue', 'InvoicesController@overdue')->name('invoices.overdue');
        Route::get('/{invoice}', 'InvoicesController@show')->name('invoices.show');
        Route::get('/payments-data/{invoice}', 'InvoicesController@paymentsDataTable')->name('invoice.paymentsDataTable');
    });

    Route::get('/money-format', 'InvoicesController@moneyFormat')->name('money.format');
    Route::post('/invoice/create/offer/{lead}', 'OffersController@create')->name('create.offer');
    Route::post('/invoice/create/invoiceLine/{invoice}', 'InvoicesController@newItems')->name('create.invoiceLine');

    /**
     * Invoice Lines
     */
    Route::delete('/invoice-lines/{invoiceLine}', 'InvoiceLinesController@destroy')->name('invoiceLine.destroy');

    /**
     * Payment
     */
    Route::group(['prefix' => 'payment'], function () {
        Route::delete('/{payment}', 'PaymentsController@destroy')->name('payment.destroy');
        Route::post('/add-payment/{invoice}', 'PaymentsController@addPayment')->name('payment.add');
    });

    /**
     * Offers
     */
    Route::group(['prefix' => 'offer'], function () {
        Route::post('/won', 'OffersController@won')->name('offer.won');
        Route::post('/lost', 'OffersController@lost')->name('offer.lost');
        Route::post('/{offer}/update', 'OffersController@update')->name('offer.update');
        Route::get('/{offer}/invoice-lines/json', 'OffersController@getOfferInvoiceLinesJson');
    });

    /**
     * Documents
     */
    Route::get('/add-documents/{external_id}/{type}', 'DocumentsController@uploadFilesModalView');
    Route::post('/uploaToTask/{external_id}', 'DocumentsController@uploadToTask')->name('document.task.upload');
    Route::post('/uploaToProject/{external_id}', 'DocumentsController@uploadToProject')->name('document.project.upload');
    Route::get('/search/{query}/{type?}', 'SearchController@search')->name('search');

    /**
     * Appointments
     */
    Route::group(['prefix' => 'appointments'], function () {
        Route::get('/calendar', 'AppointmentsController@calendar')->name('appointments.calendar');
        Route::get('/data', 'AppointmentsController@appointmentsJson')->name('appointments.data.json');
        Route::post('/update/{appointment}', 'AppointmentsController@update')->name('appointments.update');
        Route::post('/', 'AppointmentsController@store')->name('appointments.store');
        Route::delete('/{appointment}', 'AppointmentsController@destroy')->name('appointments.destroy');
    });

    /**
     * Absence
     */
    Route::group(['prefix' => 'absences'], function () {
        Route::get('/data', 'AbsenceController@indexData')->name('absence.data');
        Route::get('/', 'AbsenceController@index')->name('absence.index');
        Route::get('/create', 'AbsenceController@create')->name('absence.create');
        Route::post('/', 'AbsenceController@store')->name('absence.store');
        Route::delete('/{absence}', 'AbsenceController@destroy')->name('absence.destroy');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dropbox-token', 'CallbackController@dropbox')->name('dropbox.callback');
    Route::get('/googledrive-token', 'CallbackController@googleDrive')->name('googleDrive.callback');
});
