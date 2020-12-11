<?php

Route::get('/','PagesController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/compliance/{id}','PagesController@getcompliantCountries');
Route::get('/present/{id}','PagesController@getpresentCountries');
Route::get('/country/{id}','PagesController@getcountrydetails');
/*middlware admin under kernell*/
Route::group(['middleware'=>['auth','admin']],function()
{
	//this points the login admin middlware to this path
	//Admin Role Routes::->
	Route::get('/dashboard',function(){
		return view('backend.dashboard');
	});
	//User/Dashboard routes			
	Route::get('/sendmail','backend\DashboardController@sendVerify');
	Route::get('/users-add','backend\DashboardController@usersadd');
	Route::post('/users-store','backend\DashboardController@usersstore');
	Route::get('/users-reg','backend\DashboardController@registered');
	Route::get('/users-edit/{id}','backend\DashboardController@useredit');
	Route::get('/users-view/{id}','backend\DashboardController@usershow');
	Route::put('/users-update/{id}','backend\DashboardController@usersupdate');
	Route::delete('/users-delete/{id}','backend\DashboardController@usersdelete');
	Route::put('/comparison-store/{id}','backend\DashboardController@comparisonrightstore');
	Route::put('/document-store/{id}','backend\DashboardController@documentrightstore');


	//*Country Routes*//
	Route::get('/countries-add','backend\CountriesController@countriesadd');
	Route::post('/countries-store','backend\CountriesController@countriesstore');
	Route::get('/countries-reg','backend\CountriesController@regcountries');
	Route::get('/countries-edit/{id}','backend\CountriesController@countriesedit');
	Route::put('/countries-update/{id}','backend\CountriesController@countriesupdate');
	Route::delete('/countries-delete/{id}','backend\CountriesController@countriesdelete');


	//*Institution Routes*
	Route::get('/institution-add','backend\InstitutionsController@institutionadd');
	Route::get('/institution-reg','backend\InstitutionsController@reginstitution');
	Route::get('/institution-edit/{id}','backend\InstitutionsController@institutionedit');
	Route::put('/institution-update/{id}','backend\InstitutionsController@institutionupdate');
	Route::delete('/institution-delete/{id}','backend\InstitutionsController@institutiondelete');


	//*organisation routes
	Route::get('/organisation-reg','backend\OrganisationController@organisationreg');
	Route::get('/organisation-add','backend\OrganisationController@organisationadd');
	Route::post('/organisation-store','backend\OrganisationController@organisationstore');
	Route::get('/organisation-edit/{id}','backend\OrganisationController@organisationedit');
	Route::put('/organisation-update/{id}','backend\OrganisationController@organisationupdate');
	Route::delete('/organisation-delete/{id}','backend\OrganisationController@organisationdelete');


	//Comparison Admin Routes.. 
	Route::get('/comparisonadmin-reg','backend\ComparisonAdminController@comparisonadminreg');
	Route::get('/comparisonadmin-add','backend\ComparisonAdminController@comparisonadminadd');
	Route::post('/comparisonadmin-store','backend\ComparisonAdminController@comparisonadminstore');
	Route::get('/comparisonadmin-edit/{id}','backend\ComparisonAdminController@comparisonadminedit');
	Route::post('/comparisonadmin-update/{id}','backend\ComparisonAdminController@comparisonadminupdate');
	Route::get('comparisonadmin-view/{id}','backend\ComparisonAdminController@comparisonadminshow');


	//*Master Acts Routes
	Route::get('/acts-reg','backend\MasteractsController@registered');
	Route::get('/acts-add','backend\MasteractsController@actsadd');
	Route::put('/acts-store','backend\MasteractsController@actsstore');
	Route::get('/acts-edit/{id}','backend\MasteractsController@actsedit');
	Route::put('/acts-update/{id}','backend\MasteractsController@actsupdate');
	Route::delete('/acts-delete/{id}','backend\MasteractsController@actsdelete');

	//*comparisonscope routes
	Route::get('/comparisonscope-reg','backend\ComparisonscopeController@regcomparisonscope');			
			
});
Route::group(['middleware'=>['auth','contributor']],function()
{

   // Contributor Role Routes::->
   Route::get('/contributor','frontend\ContributorController@contributorprofilecreate');
   Route::post('/contributorprofile-update','frontend\ContributorController@contributorprofileupdate');
   Route::get('/contributor-home','frontend\ContributorController@contributorhome');
   Route::get('/contributor-countryview/{id}','frontend\ContributorController@countryviewdocuments');
   Route::post('/country-countrydocdelete/{id}','/frontend\ContributorController@contributordocdelete');

   Route::get('/countries-edit/{id}','frontend\ContributorController@countriesedit');
   Route::post('/countries-update/{id}','frontend\ContributorController@countriesupdate');

   Route::post('/contributor-store','frontend\ContributorController@updateContributorProfile');


   //legislative document create and store..//comparisonadmincreateandstore...
   Route::get('/legistlativedocument-create/{id}','frontend\ContributorController@legislativedocumentcreate');
   
   Route::get('/comparisonadmindocument-create/{id}','frontend\ContributorController@comparisonadmindocumentcreate');		   		   
   Route::post('/storecontributordocument','frontend\ContributorController@storeContributorDocument');
   Route::post('/storecomparisonadmindocument','frontend\ContributorController@storecontributoradmindocument');
   Route::get('/comparisondocumentparts/{id}','frontend\ContributorController@comparisonfetchparts');


   Route::get('/titleText/{id}','frontend\ContributorController@getTitleText');
    Route::get('/chapterText/{id}','frontend\ContributorController@getChapterText');
    Route::get('/partText/{id}','frontend\ContributorController@getPartText');
    Route::get('/sectionText/{id}','frontend\ContributorController@getSectionText');
    Route::get('/subsectionText/{id}','frontend\ContributorController@getSubsectionText');
    Route::get('/articleText/{id}','frontend\ContributorController@getArticleText');
    Route::post('/document/saveText','frontend\ContributorController@levelSaveText')->name('document.saveText');


   //legislative document view
   Route::get('/document-view/{id}/{countryid}','frontend\ContributorController@docview');           
   Route::post('/title-store','frontend\ContributorController@titlestore');
   Route::post('/chapter-store','frontend\ContributorController@chapterstore');
   Route::post('/part-store','frontend\ContributorController@partstore');
   Route::post('/section-store','frontend\ContributorController@sectionstore');
   Route::post('/subsection-store','frontend\ContributorController@subsectionstore');
   Route::post('/article-store','frontend\ContributorController@articlestore');


   Route::post('/editeddocument-store','frontend\ContributorController@editeddocumentstore');
   Route::post('/contributorcomments-store','frontend\ContributorController@contributorcommentsstore'); 
  
  
   //send to reviewer publisher routes..the reviewerpublisher-send route is basically a post
   Route::post('/reviewerpubisher-send','frontend\ContributorController@reviewerpublishersend');
   //comments create and store

   Route::get('feedback-create/{id}','frontend\ContributorController@feedbackcreate');
   Route::post('/storefeedback','frontend\ContributorController@storefeedback');
});

Route::group(['middleware'=>['auth','reviewerpublisher']],function()
{
//Reviewerpublisher Role Routes::->
  Route::get('/reviewerpublisher','frontend\ReviewerpublisherController@reviewerpublisherprofilecreate');
  Route::post('reviewerpublisherprofile-store','frontend\ReviewerpublisherController@reviewerpublisherprofilestore');
  Route::get('/reviewerpublisher-home','frontend\ReviewerpublisherController@reviewerpublisherhome');


  Route::get('/reviewerpublisher-countryview/{id}','frontend\ReviewerpublisherController@reviewerpublisherviewdocuments');
  Route::get('/reviewerpublisherdocument-view/{id}','frontend\ReviewerpublisherController@reviewerpublisherdocview');   



});
