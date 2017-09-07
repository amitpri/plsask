<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('password', 'Auth\UpdatePasswordController@password'); 
Route::post('password', 'Auth\UpdatePasswordController@update');

Route::get('/topicname', 'HomeController@topicname'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard'); 

Route::get('/profile', 'HomeController@profile');
Route::get('/profile/profiledefault', 'HomeController@profiledefault');
Route::get('/profile/editprofile/{param}', 'HomeController@editprofile'); 
Route::post('/profile/imageupload', 'HomeController@imageupload'); 

Route::get('/mypictures', 'HomeController@mypictures');

Route::get('/settings', 'HomeController@settings');
Route::get('/settings/{param}', 'HomeController@settingsedit'); 

Route::get('/profiles', 'ProfileController@profiles');
Route::get('/profiles/profiledefault', 'ProfileController@default');
Route::get('/profiles/addprofilerow', 'ProfileController@add');
Route::get('/profiles/profilesave', 'ProfileController@save');
Route::get('/profiles/profiledelete', 'ProfileController@delete');
Route::get('/profiles/profilecancel', 'ProfileController@cancel');
Route::get('/profiles/profilefiltered', 'ProfileController@filtered'); 
Route::get('/profiles/upload', 'ProfileController@upload'); 
Route::post('/profiles/upload/uploadexcel', 'ProfileController@uploadexcel'); 

Route::get('/groups', 'GroupController@groups');
Route::get('/groups/groupdefault', 'GroupController@default');
Route::get('/groups/addgrouprow', 'GroupController@add');
Route::get('/groups/groupsave', 'GroupController@save');
Route::get('/groups/groupdelete', 'GroupController@delete');
Route::get('/groups/groupcancel', 'GroupController@cancel');
Route::get('/groups/groupfiltered', 'GroupController@filtered'); 

Route::get('/groups/{id}/addprofile', 'GroupProfileController@index');
Route::get('/groups/{id}/addprofile/defaultadded', 'GroupProfileController@defaultadded');
Route::get('/groups/{id}/addprofile/defaultavailable', 'GroupProfileController@defaultavailable');
Route::get('/groups/{id}/addprofile/add', 'GroupProfileController@add');  
Route::get('/groups/{id}/addprofile/delete', 'GroupProfileController@delete'); 
Route::get('/groups/{id}/addprofile/filtered1', 'GroupProfileController@filtered1');
Route::get('/groups/{id}/addprofile/filtered2', 'GroupProfileController@filtered2');

Route::get('/topics', 'TopicController@topics');
Route::get('/topics/getmytopic', 'TopicController@getmytopic');
Route::get('/topics/savetopic', 'TopicController@savetopic'); 
Route::get('/topics/saveedittopic', 'TopicController@saveedittopic'); 
Route::get('/topics/delete', 'TopicController@delete'); 
Route::get('/topics/sendtopic', 'TopicController@sendtopic'); 
Route::get('/topics/recipiententer', 'TopicController@recipiententer');
Route::get('/topics/{id}/send', 'TopicController@send');
Route::get('/topics/filtered', 'TopicController@filtered');
Route::get('/topics/sendmail', 'TopicController@sendmail');
Route::get('/topics/senddefault', 'TopicController@senddefault');

Route::get('/reviews', 'HomeController@reviews');
Route::get('/reviews/default', 'HomeController@reviewsdefault');
Route::get('/reviews/filtered', 'HomeController@reviewsfiltered');
Route::get('/reviews/topics/{id}', 'HomeController@reviewstopics'); 
Route::get('/reviewstopics/default', 'HomeController@reviewstopicsdefault');

Route::get('/feedback/default', 'FeedbackController@feedbackdefault');
Route::get('/feedback/draftfeedback', 'FeedbackController@draftfeedback');
Route::get('/feedback/savefeedback', 'FeedbackController@savefeedback');
Route::get('/feedback/{key}', 'FeedbackController@feedback');

Route::get('/showreviews', 'ShowreviewsController@index');
Route::get('/showreviews/default', 'ShowreviewsController@default');
Route::get('/showreviews/getmore', 'ShowreviewsController@getmore');
Route::get('/showreviews/filtered', 'ShowreviewsController@filtered');

Route::get('/showtopics', 'ShowtopicsController@index');
Route::get('/showtopics/default', 'ShowtopicsController@default');
Route::get('/showtopics/getmore', 'ShowtopicsController@getmore');
Route::get('/showtopics/filtered', 'ShowtopicsController@filtered');
Route::get('/showtopics/messages', 'ShowtopicsController@messages');
Route::get('/showtopics/postfeedback', 'ShowtopicsController@postfeedback'); 
Route::get('/showtopics/showdetails', 'ShowtopicsController@showdetails'); 

Route::get('/showtopics/{id}', 'ShowtopicsController@show');

Route::get('/confirm/{key}', 'IndexController@confirm');
Route::get('/help', 'HelpController@index');
Route::get('/help/submit', 'HelpController@submit');

Route::get('/viewprofile/details', 'IndexController@profiledetails');
Route::get('/viewprofile/{id}', 'IndexController@viewprofile');

Route::get('/download/profiles', 'DownloadController@profiles');



