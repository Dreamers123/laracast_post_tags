<?php




Route::get('/posts/create','PostsController@create');

Route::post('/posts','PostsController@store');

Route::get('/posts','PostsController@index');

Route::get('/posts/{post}','PostsController@show');

Route::get('/posts/tags/{tag}','TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');
//Route::post('/posts/{post}/tags', 'TagsController@store');
Route::get('/posts/{comment}/edit', 'CommentsController@edit');
Route::patch('/comments/{comments}', 'CommentsController@update');


Route::get('/admin/register','AdminController@create');
Route::post('/admin/register','AdminController@store');

Route::get('/admin/login','SessionController@create');
Route::post('/admin/login','SessionController@store');
Route::get('/admin/logout','SessionController@destroy');


















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>['web']], function () {

    Route::get('/begin', function () {
        Session()->flash('flash_message','Hello there');

        return redirect('/');

    });




    Route::get('/', function () {


        return view('welcome');

    });





});
