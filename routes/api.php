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

    // Accounts
    Route::resource('accounts', 'AccountApiController');

    // Recoveries
    Route::resource('recoveries', 'RecoveryApiController');

    // Branches
    Route::resource('branches', 'BranchesApiController');

    // Account Products
    Route::resource('account-products', 'AccountProductApiController');

    // Account Product Types
    Route::resource('account-product-types', 'AccountProductTypeApiController');

    // Positions
    Route::resource('positions', 'PositionApiController');

    // Write Offs
    Route::resource('write-offs', 'WriteOffApiController');

    // Account Entries
    Route::resource('account-entries', 'AccountEntryApiController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Officers
    Route::resource('officers', 'OfficerApiController');

    // Schedules
    Route::resource('schedules', 'ScheduleApiController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Collaterals
    Route::resource('collaterals', 'CollateralApiController');

    // Journals
    Route::resource('journals', 'JournalApiController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Provisions
    Route::resource('provisions', 'ProvisionApiController');

    // Collection Settings
    Route::resource('collection-settings', 'CollectionSettingApiController');

    // Customers
    Route::post('customers/media', 'CustomerApiController@storeMedia')->name('customers.storeMedia');
    Route::resource('customers', 'CustomerApiController');

    // Loan Products
    Route::resource('loan-products', 'LoanProductApiController');

    // Loan Product Provisions
    Route::resource('loan-product-provisions', 'LoanProductProvisionApiController');

    // Companies
    Route::resource('companies', 'CompanyApiController');

    // Contracts
    Route::resource('contracts', 'ContractApiController');

    // Chart Of Accounts
    Route::resource('chart-of-accounts', 'ChartOfAccountApiController', ['except' => ['destroy']]);

    // Account Types
    Route::resource('account-types', 'AccountTypeApiController');

    // Currencies
    Route::resource('currencies', 'CurrencyApiController');

    // Applications
    Route::resource('applications', 'ApplicationApiController');

    // System Dates
    Route::resource('system-dates', 'SystemDateApiController');

    // System Settings
    Route::resource('system-settings', 'SystemSettingApiController');
});
