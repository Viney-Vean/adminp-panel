<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Dashboard
    Route::get('dashboard', 'DashboardApiController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Contact Companies
    Route::resource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::resource('contact-contacts', 'ContactContactsApiController');

    // Crm Statuses
    Route::resource('crm-statuses', 'CrmStatusApiController');

    // Crm Customers
    Route::resource('crm-customers', 'CrmCustomerApiController');

    // Crm Notes
    Route::resource('crm-notes', 'CrmNoteApiController');

    // Crm Documents
    Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
    Route::resource('crm-documents', 'CrmDocumentApiController');

    // Faq Categories
    Route::resource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::resource('faq-questions', 'FaqQuestionApiController');

    // Content Categories
    Route::resource('content-categories', 'ContentCategoryApiController');

    // Content Tags
    Route::resource('content-tags', 'ContentTagApiController');

    // Content Pages
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::resource('content-pages', 'ContentPageApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::resource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::resource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::resource('products', 'ProductApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::resource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::resource('lessons', 'LessonsApiController');

    // Tests
    Route::resource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::resource('questions', 'QuestionsApiController');

    // Question Options
    Route::resource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::resource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::resource('test-answers', 'TestAnswersApiController');

    // Expense Categories
    Route::resource('expense-categories', 'ExpenseCategoryApiController');

    // Income Categories
    Route::resource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::resource('expenses', 'ExpenseApiController');

    // Incomes
    Route::resource('incomes', 'IncomeApiController');

    // Expense Reports
    Route::apiResource('expense-reports', 'ExpenseReportApiController', ['only' => ['index']]);

    // Dsfs
    Route::apiResource('dsfs', 'DsfApiController', ['only' => ['index']]);
});
