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

Route::get('/', ['uses'=>'UserController@index']);
Route::any('budadmin',['uses'=>'AdminController@login']);
Route::any('admin/index',['uses'=>'AdminController@admin_index']);
Route::any('quit',['uses'=>'AdminController@quit']);


Route::any('admin',['uses'=>'AdminController@admin']);
Route::any('admin/add',['uses'=>'AdminController@admin_add']);
Route::any('admin/update/{id}',['uses'=>'AdminController@admin_update']);
Route::any('admin/delete/{id}',['uses'=>'AdminController@admin_delete']);

Route::any('users/index',['uses'=>'UserinfoController@user_index']);
Route::any('users/add',['uses'=>'UserinfoController@user_add']);
Route::any('users/detail/{id}',['uses'=>'UserinfoController@user_detail']);
Route::any('users/detail1/{id}',['uses'=>'UserinfoController@user_detail1']);
Route::any('users/update/{id}',['uses'=>'UserinfoController@user_update']);
Route::any('users/delete/{id}',['uses'=>'UserinfoController@user_delete']);

Route::any('vo/index',['uses'=>'UserinfoController@vo_index']);
Route::any('vo/add',['uses'=>'UserinfoController@vo_add']);
Route::any('vo/update/{id}',['uses'=>'UserinfoController@vo_update']);
Route::any('vo/delete/{id}',['uses'=>'UserinfoController@vo_delete']);

Route::any('Ucheck/index',['uses'=>'CheckController@Ucheck_index']);
Route::any('user/pass/{id}',['uses'=>'CheckController@user_pass']);
Route::any('user/delete/{id}',['uses'=>'CheckController@user_delete']);

Route::any('Acheck/index',['uses'=>'CheckController@Acheck_index']);
Route::any('Acheck/edit',['uses'=>'CheckController@edit']);
Route::any('Acheck/setup/{id}',['uses'=>'CheckController@setup']);
Route::any('Acheck/pass/{id}',['uses'=>'CheckController@article_pass']);
Route::any('Acheck/refuse/{id}',['uses'=>'CheckController@refuse']);
Route::any('Acheck/delete/{id}',['uses'=>'CheckController@delete']);


Route::any('article/index',['uses'=>'ArticleController@article_index']);
Route::any('article/add',['uses'=>'ArticleController@article_add']);
Route::any('article/update/{id}',['uses'=>'ArticleController@article_update']);
Route::any('article/delete/{id}',['uses'=>'ArticleController@article_delete']);
Route::any('article/recommend/{id}',['uses'=>'ArticleController@article_recommend']);
Route::any('article/top/{id}',['uses'=>'ArticleController@article_top']);

Route::any('cate/index',['uses'=>'CategoryController@cate_index']);
Route::any('cate/add',['uses'=>'CategoryController@cate_add']);
Route::any('cate/update/{id}',['uses'=>'CategoryController@cate_update']);
Route::any('cate/delete/{id}',['uses'=>'CategoryController@cate_delete']);

Route::any('nav/index',['uses'=>'NavController@nav_index']);
Route::any('nav/add',['uses'=>'NavController@nav_add']);
Route::any('nav/update/{id}',['uses'=>'NavController@nav_update']);
Route::any('nav/delete/{id}',['uses'=>'NavController@nav_delete']);

Route::any('panel/index',['uses'=>'NewNavController@index']);
Route::any('panel/add',['uses'=>'NewNavController@add']);
Route::any('panel/add/{id}',['uses'=>'NewNavController@add1']);
Route::any('panel/update/{id}',['uses'=>'NewNavController@update']);
Route::any('panel/delete/{id}',['uses'=>'NewNavController@delete']);

Route::any('pic/index',['uses'=>'PictureController@pic_index']);
Route::any('pic/add',['uses'=>'PictureController@pic_add']);
Route::any('pic/update/{id}',['uses'=>'PictureController@pic_update']);
Route::any('pic/delete/{id}',['uses'=>'PictureController@pic_delete']);

Route::any('info/index/{id}',['uses'=>'InfoController@info_index']);
Route::any('info/add',['uses'=>'InfoController@info_add']);
Route::any('info/edit/{id}',['uses'=>'InfoController@info_edit']);
Route::any('info/update/{id}',['uses'=>'InfoController@info_update']);
Route::any('info/delete/{id}',['uses'=>'InfoController@info_delete']);
Route::any('founder',['uses'=>'InfoController@founder']);

Route::any('inform/index',['uses'=>'InformController@inform_index']);
Route::any('inform/add',['uses'=>'InformController@inform_add']);
Route::any('inform/update/{id}',['uses'=>'InformController@inform_update']);
Route::any('inform/delete/{id}',['uses'=>'InformController@inform_delete']);
Route::any('inform/lists',['uses'=>'InformController@lists']);

Route::any('page/index',['uses'=>'AdminController@page_index']);
Route::any('page/add',['uses'=>'AdminController@page_add']);
Route::any('page/detail',['uses'=>'AdminController@page_detail']);
Route::any('page/update/{id}',['uses'=>'AdminController@page_update']);
Route::any('page/delete/{id}',['uses'=>'AdminController@page_delete']);

Route::any('com/index',['uses'=>'AdminController@com_index']);
Route::any('com/add',['uses'=>'AdminController@com_add']);
Route::any('com/update',['uses'=>'AdminController@com_update']);

Route::any('web/index',['uses'=>'WebsiteController@web_index']);
Route::any('index/info',['uses'=>'InfoController@index_info']);
Route::any('index/info_edit',['uses'=>'InfoController@index_info_edit']);
Route::any('save1',['uses'=>'InfoController@save1']);

Route::any('friend/index',['uses'=>'FriendController@index']);
Route::any('friend/add',['uses'=>'FriendController@add']);
Route::any('friend/update/{id}',['uses'=>'FriendController@update']);
Route::any('friend/delete/{id}',['uses'=>'FriendController@delete']);

Route::any('assort/index/{id}',['uses'=>'FenleiController@index']);
Route::any('assort/{id}',['uses'=>'FenleiController@assort']);
Route::any('assort/add/{id}',['uses'=>'FenleiController@add']);
Route::any('assort/update/{id}',['uses'=>'FenleiController@update']);
Route::any('assort/delete/{id}',['uses'=>'FenleiController@delete']);
Route::any('assort/recommend/{id}',['uses'=>'FenleiController@recommend']);
Route::any('assort/top/{id}',['uses'=>'FenleiController@top']);

Route::any('search/articles',['uses'=>'SearchController@all_articles']);
Route::any('search/article/delete/{id}',['uses'=>'SearchController@article_delete']);
Route::any('search/article/recommend/{id}',['uses'=>'SearchController@article_recommend']);
Route::any('search/article/top/{id}',['uses'=>'SearchController@article_top']);

Route::any('search/menu/{id}',['uses'=>'SearchController@menu']);
Route::any('search/menu/delete/{menu_id}/{id}',['uses'=>'SearchController@menu_delete']);
Route::any('search/menu/recommend/{menu_id}/{id}',['uses'=>'SearchController@menu_recommend']);
Route::any('search/menu/top/{menu_id}/{id}',['uses'=>'SearchController@menu_top']);
Route::any('search/menu/update/{menu_id}/{id}',['uses'=>'SearchController@menu_update']);
Route::any('search/menu/save/{id}',['uses'=>'SearchController@menu_save']);

Route::any('search/assort/index/{id}',['uses'=>'SearchController@assortindex']);
Route::any('search/assort/update/{id}',['uses'=>'SearchController@assortupdate']);
Route::any('search/assort/delete/{id}',['uses'=>'SearchController@assortdelete']);
Route::any('search/assort/recommend/{id}',['uses'=>'SearchController@assortrecommend']);
Route::any('search/assort/top/{id}',['uses'=>'SearchController@assorttop']);



Route::any('menu/{id}',['uses'=>'MenuController@menu']);
Route::any('menu/add/{id}',['uses'=>'MenuController@menu_add']);
Route::any('menu/add2/{id}',['uses'=>'MenuController@menu_add2']);
Route::any('menu/update/{id}',['uses'=>'MenuController@menu_update']);
Route::any('assort/update/{id}/{assortid}',['uses'=>'MenuController@assort_update']);
Route::any('menu/delete/{id}',['uses'=>'MenuController@menu_delete']);
Route::any('assort/delete/{id}/{type}',['uses'=>'MenuController@assort_delete']);
Route::any('save',['uses'=>'MenuController@save']);
Route::any('menu/save/{id}',['uses'=>'MenuController@menu_save']);
Route::any('assort/save/{type}',['uses'=>'MenuController@assort_save']);
Route::any('save2',['uses'=>'MenuController@save2']);

Route::any('menu/recommend/{id}',['uses'=>'MenuController@menu_recommend']);
Route::any('menu/top/{id}',['uses'=>'MenuController@menu_top']);
Route::any('assort/recommend/{id}/{type}',['uses'=>'MenuController@assort_recommend']);
Route::any('assort/top/{id}/{type}',['uses'=>'MenuController@assort_top']);

Route::any('feedback/index',['uses'=>'FeedbackController@feedback_index']);
Route::any('feedback/delete/{id}',['uses'=>'FeedbackController@feedback_delete']);

Route::any('index',function(){
    return redirect("/");
});
Route::any('layout1',['uses'=>'UserController@layout1']);
Route::any('info/{id}',['uses'=>'UserController@info']);
Route::any('userlogin',['uses'=>'UserController@userlogin']);
Route::any('register',['uses'=>'UserController@register']);

Route::any('model/{alias}','UserController@model');
Route::any('detail/{id}','UserController@detail');
Route::any('inform/{id}','UserController@inform');
Route::any('project_list/{id}','UserController@project_list');
Route::any('project_detail/{id}','UserController@project_detail');
Route::any('feedback','UserController@feedback');
Route::any('email','UserController@email');

Route::any('layout','UserController@layout');
Route::any('search','UserController@search');
Route::any('create/article','UserController@create_article');
Route::any('update/article/{key}','UserController@update_article');
Route::any('publish/article/{key}','UserController@publish_article');
Route::any('delete/article/{key}','UserController@delete_article');
Route::any('pwd','UserController@pwd');
Route::any('record','UserController@record');
Route::any('setup','UserController@setup');
Route::any('user/index','UserController@userindex');
Route::any('userindex',function(){
    return redirect('user/index');
});
Route::any('out','UserController@out');

Route::any('postAcceptor','UploadImageController@store');