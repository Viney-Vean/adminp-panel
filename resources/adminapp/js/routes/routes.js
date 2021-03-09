import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'company-management',
        name: 'company_management',
        component: View,
        redirect: { name: 'branches.index' },
        children: [
          {
            path: 'branches',
            name: 'branches.index',
            component: () => import('@cruds/Branches/Index.vue'),
            meta: { title: 'cruds.branch.title' }
          },
          {
            path: 'branches/create',
            name: 'branches.create',
            component: () => import('@cruds/Branches/Create.vue'),
            meta: { title: 'cruds.branch.title' }
          },
          {
            path: 'branches/:id',
            name: 'branches.show',
            component: () => import('@cruds/Branches/Show.vue'),
            meta: { title: 'cruds.branch.title' }
          },
          {
            path: 'branches/:id/edit',
            name: 'branches.edit',
            component: () => import('@cruds/Branches/Edit.vue'),
            meta: { title: 'cruds.branch.title' }
          },
          {
            path: 'companies',
            name: 'companies.index',
            component: () => import('@cruds/Companies/Index.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'companies/create',
            name: 'companies.create',
            component: () => import('@cruds/Companies/Create.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'companies/:id',
            name: 'companies.show',
            component: () => import('@cruds/Companies/Show.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'companies/:id/edit',
            name: 'companies.edit',
            component: () => import('@cruds/Companies/Edit.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'positions',
            name: 'positions.index',
            component: () => import('@cruds/Positions/Index.vue'),
            meta: { title: 'cruds.position.title' }
          },
          {
            path: 'positions/create',
            name: 'positions.create',
            component: () => import('@cruds/Positions/Create.vue'),
            meta: { title: 'cruds.position.title' }
          },
          {
            path: 'positions/:id',
            name: 'positions.show',
            component: () => import('@cruds/Positions/Show.vue'),
            meta: { title: 'cruds.position.title' }
          },
          {
            path: 'positions/:id/edit',
            name: 'positions.edit',
            component: () => import('@cruds/Positions/Edit.vue'),
            meta: { title: 'cruds.position.title' }
          },
          {
            path: 'officers',
            name: 'officers.index',
            component: () => import('@cruds/Officers/Index.vue'),
            meta: { title: 'cruds.officer.title' }
          },
          {
            path: 'officers/create',
            name: 'officers.create',
            component: () => import('@cruds/Officers/Create.vue'),
            meta: { title: 'cruds.officer.title' }
          },
          {
            path: 'officers/:id',
            name: 'officers.show',
            component: () => import('@cruds/Officers/Show.vue'),
            meta: { title: 'cruds.officer.title' }
          },
          {
            path: 'officers/:id/edit',
            name: 'officers.edit',
            component: () => import('@cruds/Officers/Edit.vue'),
            meta: { title: 'cruds.officer.title' }
          }
        ]
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'system-setting-management',
        name: 'system_setting_management',
        component: View,
        redirect: { name: 'options.index' },
        children: [
          {
            path: 'options',
            name: 'options.index',
            component: () => import('@cruds/Options/Index.vue'),
            meta: { title: 'cruds.option.title' }
          },
          {
            path: 'options/create',
            name: 'options.create',
            component: () => import('@cruds/Options/Create.vue'),
            meta: { title: 'cruds.option.title' }
          },
          {
            path: 'options/:id',
            name: 'options.show',
            component: () => import('@cruds/Options/Show.vue'),
            meta: { title: 'cruds.option.title' }
          },
          {
            path: 'options/:id/edit',
            name: 'options.edit',
            component: () => import('@cruds/Options/Edit.vue'),
            meta: { title: 'cruds.option.title' }
          },
          {
            path: 'system-dates',
            name: 'system_dates.index',
            component: () => import('@cruds/SystemDates/Index.vue'),
            meta: { title: 'cruds.systemDate.title' }
          },
          {
            path: 'system-dates/create',
            name: 'system_dates.create',
            component: () => import('@cruds/SystemDates/Create.vue'),
            meta: { title: 'cruds.systemDate.title' }
          },
          {
            path: 'system-dates/:id',
            name: 'system_dates.show',
            component: () => import('@cruds/SystemDates/Show.vue'),
            meta: { title: 'cruds.systemDate.title' }
          },
          {
            path: 'system-dates/:id/edit',
            name: 'system_dates.edit',
            component: () => import('@cruds/SystemDates/Edit.vue'),
            meta: { title: 'cruds.systemDate.title' }
          },
          {
            path: 'collection-settings',
            name: 'collection_settings.index',
            component: () => import('@cruds/CollectionSettings/Index.vue'),
            meta: { title: 'cruds.collectionSetting.title' }
          },
          {
            path: 'collection-settings/create',
            name: 'collection_settings.create',
            component: () => import('@cruds/CollectionSettings/Create.vue'),
            meta: { title: 'cruds.collectionSetting.title' }
          },
          {
            path: 'collection-settings/:id',
            name: 'collection_settings.show',
            component: () => import('@cruds/CollectionSettings/Show.vue'),
            meta: { title: 'cruds.collectionSetting.title' }
          },
          {
            path: 'collection-settings/:id/edit',
            name: 'collection_settings.edit',
            component: () => import('@cruds/CollectionSettings/Edit.vue'),
            meta: { title: 'cruds.collectionSetting.title' }
          },
          {
            path: 'system-settings',
            name: 'system_settings.index',
            component: () => import('@cruds/SystemSettings/Index.vue'),
            meta: { title: 'cruds.systemSetting.title' }
          },
          {
            path: 'system-settings/create',
            name: 'system_settings.create',
            component: () => import('@cruds/SystemSettings/Create.vue'),
            meta: { title: 'cruds.systemSetting.title' }
          },
          {
            path: 'system-settings/:id',
            name: 'system_settings.show',
            component: () => import('@cruds/SystemSettings/Show.vue'),
            meta: { title: 'cruds.systemSetting.title' }
          },
          {
            path: 'system-settings/:id/edit',
            name: 'system_settings.edit',
            component: () => import('@cruds/SystemSettings/Edit.vue'),
            meta: { title: 'cruds.systemSetting.title' }
          }
        ]
      },
      {
        path: 'chart-of-account-management',
        name: 'chart_of_account_management',
        component: View,
        redirect: { name: 'currencies.index' },
        children: [
          {
            path: 'currencies',
            name: 'currencies.index',
            component: () => import('@cruds/Currencies/Index.vue'),
            meta: { title: 'cruds.currency.title' }
          },
          {
            path: 'currencies/create',
            name: 'currencies.create',
            component: () => import('@cruds/Currencies/Create.vue'),
            meta: { title: 'cruds.currency.title' }
          },
          {
            path: 'currencies/:id',
            name: 'currencies.show',
            component: () => import('@cruds/Currencies/Show.vue'),
            meta: { title: 'cruds.currency.title' }
          },
          {
            path: 'currencies/:id/edit',
            name: 'currencies.edit',
            component: () => import('@cruds/Currencies/Edit.vue'),
            meta: { title: 'cruds.currency.title' }
          },
          {
            path: 'account-types',
            name: 'account_types.index',
            component: () => import('@cruds/AccountTypes/Index.vue'),
            meta: { title: 'cruds.accountType.title' }
          },
          {
            path: 'account-types/create',
            name: 'account_types.create',
            component: () => import('@cruds/AccountTypes/Create.vue'),
            meta: { title: 'cruds.accountType.title' }
          },
          {
            path: 'account-types/:id',
            name: 'account_types.show',
            component: () => import('@cruds/AccountTypes/Show.vue'),
            meta: { title: 'cruds.accountType.title' }
          },
          {
            path: 'account-types/:id/edit',
            name: 'account_types.edit',
            component: () => import('@cruds/AccountTypes/Edit.vue'),
            meta: { title: 'cruds.accountType.title' }
          },
          {
            path: 'chart-of-accounts',
            name: 'chart_of_accounts.index',
            component: () => import('@cruds/ChartOfAccounts/Index.vue'),
            meta: { title: 'cruds.chartOfAccount.title' }
          },
          {
            path: 'chart-of-accounts/create',
            name: 'chart_of_accounts.create',
            component: () => import('@cruds/ChartOfAccounts/Create.vue'),
            meta: { title: 'cruds.chartOfAccount.title' }
          },
          {
            path: 'chart-of-accounts/:id',
            name: 'chart_of_accounts.show',
            component: () => import('@cruds/ChartOfAccounts/Show.vue'),
            meta: { title: 'cruds.chartOfAccount.title' }
          },
          {
            path: 'chart-of-accounts/:id/edit',
            name: 'chart_of_accounts.edit',
            component: () => import('@cruds/ChartOfAccounts/Edit.vue'),
            meta: { title: 'cruds.chartOfAccount.title' }
          },
          {
            path: 'account-product-types',
            name: 'account_product_types.index',
            component: () => import('@cruds/AccountProductTypes/Index.vue'),
            meta: { title: 'cruds.accountProductType.title' }
          },
          {
            path: 'account-product-types/create',
            name: 'account_product_types.create',
            component: () => import('@cruds/AccountProductTypes/Create.vue'),
            meta: { title: 'cruds.accountProductType.title' }
          },
          {
            path: 'account-product-types/:id',
            name: 'account_product_types.show',
            component: () => import('@cruds/AccountProductTypes/Show.vue'),
            meta: { title: 'cruds.accountProductType.title' }
          },
          {
            path: 'account-product-types/:id/edit',
            name: 'account_product_types.edit',
            component: () => import('@cruds/AccountProductTypes/Edit.vue'),
            meta: { title: 'cruds.accountProductType.title' }
          },
          {
            path: 'account-products',
            name: 'account_products.index',
            component: () => import('@cruds/AccountProducts/Index.vue'),
            meta: { title: 'cruds.accountProduct.title' }
          },
          {
            path: 'account-products/create',
            name: 'account_products.create',
            component: () => import('@cruds/AccountProducts/Create.vue'),
            meta: { title: 'cruds.accountProduct.title' }
          },
          {
            path: 'account-products/:id',
            name: 'account_products.show',
            component: () => import('@cruds/AccountProducts/Show.vue'),
            meta: { title: 'cruds.accountProduct.title' }
          },
          {
            path: 'account-products/:id/edit',
            name: 'account_products.edit',
            component: () => import('@cruds/AccountProducts/Edit.vue'),
            meta: { title: 'cruds.accountProduct.title' }
          },
          {
            path: 'accounts',
            name: 'accounts.index',
            component: () => import('@cruds/Accounts/Index.vue'),
            meta: { title: 'cruds.account.title' }
          },
          {
            path: 'accounts/create',
            name: 'accounts.create',
            component: () => import('@cruds/Accounts/Create.vue'),
            meta: { title: 'cruds.account.title' }
          },
          {
            path: 'accounts/:id',
            name: 'accounts.show',
            component: () => import('@cruds/Accounts/Show.vue'),
            meta: { title: 'cruds.account.title' }
          },
          {
            path: 'accounts/:id/edit',
            name: 'accounts.edit',
            component: () => import('@cruds/Accounts/Edit.vue'),
            meta: { title: 'cruds.account.title' }
          },
          {
            path: 'provisions',
            name: 'provisions.index',
            component: () => import('@cruds/Provisions/Index.vue'),
            meta: { title: 'cruds.provision.title' }
          },
          {
            path: 'provisions/create',
            name: 'provisions.create',
            component: () => import('@cruds/Provisions/Create.vue'),
            meta: { title: 'cruds.provision.title' }
          },
          {
            path: 'provisions/:id',
            name: 'provisions.show',
            component: () => import('@cruds/Provisions/Show.vue'),
            meta: { title: 'cruds.provision.title' }
          },
          {
            path: 'provisions/:id/edit',
            name: 'provisions.edit',
            component: () => import('@cruds/Provisions/Edit.vue'),
            meta: { title: 'cruds.provision.title' }
          },
          {
            path: 'loan-products',
            name: 'loan_products.index',
            component: () => import('@cruds/LoanProducts/Index.vue'),
            meta: { title: 'cruds.loanProduct.title' }
          },
          {
            path: 'loan-products/create',
            name: 'loan_products.create',
            component: () => import('@cruds/LoanProducts/Create.vue'),
            meta: { title: 'cruds.loanProduct.title' }
          },
          {
            path: 'loan-products/:id',
            name: 'loan_products.show',
            component: () => import('@cruds/LoanProducts/Show.vue'),
            meta: { title: 'cruds.loanProduct.title' }
          },
          {
            path: 'loan-products/:id/edit',
            name: 'loan_products.edit',
            component: () => import('@cruds/LoanProducts/Edit.vue'),
            meta: { title: 'cruds.loanProduct.title' }
          },
          {
            path: 'loan-product-provisions',
            name: 'loan_product_provisions.index',
            component: () => import('@cruds/LoanProductProvisions/Index.vue'),
            meta: { title: 'cruds.loanProductProvision.title' }
          },
          {
            path: 'loan-product-provisions/create',
            name: 'loan_product_provisions.create',
            component: () => import('@cruds/LoanProductProvisions/Create.vue'),
            meta: { title: 'cruds.loanProductProvision.title' }
          },
          {
            path: 'loan-product-provisions/:id',
            name: 'loan_product_provisions.show',
            component: () => import('@cruds/LoanProductProvisions/Show.vue'),
            meta: { title: 'cruds.loanProductProvision.title' }
          },
          {
            path: 'loan-product-provisions/:id/edit',
            name: 'loan_product_provisions.edit',
            component: () => import('@cruds/LoanProductProvisions/Edit.vue'),
            meta: { title: 'cruds.loanProductProvision.title' }
          },
          {
            path: 'account-entries',
            name: 'account_entries.index',
            component: () => import('@cruds/AccountEntries/Index.vue'),
            meta: { title: 'cruds.accountEntry.title' }
          },
          {
            path: 'account-entries/:id',
            name: 'account_entries.show',
            component: () => import('@cruds/AccountEntries/Show.vue'),
            meta: { title: 'cruds.accountEntry.title' }
          },
          {
            path: 'journals',
            name: 'journals.index',
            component: () => import('@cruds/Journals/Index.vue'),
            meta: { title: 'cruds.journal.title' }
          },
          {
            path: 'journals/:id',
            name: 'journals.show',
            component: () => import('@cruds/Journals/Show.vue'),
            meta: { title: 'cruds.journal.title' }
          }
        ]
      },
      {
        path: 'customer-management',
        name: 'customer_management',
        component: View,
        redirect: { name: 'customers.index' },
        children: [
          {
            path: 'customers',
            name: 'customers.index',
            component: () => import('@cruds/Customers/Index.vue'),
            meta: { title: 'cruds.customer.title' }
          },
          {
            path: 'customers/create',
            name: 'customers.create',
            component: () => import('@cruds/Customers/Create.vue'),
            meta: { title: 'cruds.customer.title' }
          },
          {
            path: 'customers/:id',
            name: 'customers.show',
            component: () => import('@cruds/Customers/Show.vue'),
            meta: { title: 'cruds.customer.title' }
          },
          {
            path: 'customers/:id/edit',
            name: 'customers.edit',
            component: () => import('@cruds/Customers/Edit.vue'),
            meta: { title: 'cruds.customer.title' }
          },
          {
            path: 'collaterals',
            name: 'collaterals.index',
            component: () => import('@cruds/Collaterals/Index.vue'),
            meta: { title: 'cruds.collateral.title' }
          },
          {
            path: 'collaterals/create',
            name: 'collaterals.create',
            component: () => import('@cruds/Collaterals/Create.vue'),
            meta: { title: 'cruds.collateral.title' }
          },
          {
            path: 'collaterals/:id',
            name: 'collaterals.show',
            component: () => import('@cruds/Collaterals/Show.vue'),
            meta: { title: 'cruds.collateral.title' }
          },
          {
            path: 'collaterals/:id/edit',
            name: 'collaterals.edit',
            component: () => import('@cruds/Collaterals/Edit.vue'),
            meta: { title: 'cruds.collateral.title' }
          }
        ]
      },
      {
        path: 'loan-management',
        name: 'loan_management',
        component: View,
        redirect: { name: 'applications.index' },
        children: [
          {
            path: 'applications',
            name: 'applications.index',
            component: () => import('@cruds/Applications/Index.vue'),
            meta: { title: 'cruds.application.title' }
          },
          {
            path: 'applications/create',
            name: 'applications.create',
            component: () => import('@cruds/Applications/Create.vue'),
            meta: { title: 'cruds.application.title' }
          },
          {
            path: 'applications/:id',
            name: 'applications.show',
            component: () => import('@cruds/Applications/Show.vue'),
            meta: { title: 'cruds.application.title' }
          },
          {
            path: 'applications/:id/edit',
            name: 'applications.edit',
            component: () => import('@cruds/Applications/Edit.vue'),
            meta: { title: 'cruds.application.title' }
          },
          {
            path: 'contracts',
            name: 'contracts.index',
            component: () => import('@cruds/Contracts/Index.vue'),
            meta: { title: 'cruds.contract.title' }
          },
          {
            path: 'contracts/create',
            name: 'contracts.create',
            component: () => import('@cruds/Contracts/Create.vue'),
            meta: { title: 'cruds.contract.title' }
          },
          {
            path: 'contracts/:id',
            name: 'contracts.show',
            component: () => import('@cruds/Contracts/Show.vue'),
            meta: { title: 'cruds.contract.title' }
          },
          {
            path: 'contracts/:id/edit',
            name: 'contracts.edit',
            component: () => import('@cruds/Contracts/Edit.vue'),
            meta: { title: 'cruds.contract.title' }
          },
          {
            path: 'schedules',
            name: 'schedules.index',
            component: () => import('@cruds/Schedules/Index.vue'),
            meta: { title: 'cruds.schedule.title' }
          },
          {
            path: 'schedules/:id',
            name: 'schedules.show',
            component: () => import('@cruds/Schedules/Show.vue'),
            meta: { title: 'cruds.schedule.title' }
          },
          {
            path: 'past-due-details',
            name: 'past_due_details.index',
            component: () => import('@cruds/PastDueDetails/Index.vue'),
            meta: { title: 'cruds.pastDueDetail.title' }
          },
          {
            path: 'past-due-details/create',
            name: 'past_due_details.create',
            component: () => import('@cruds/PastDueDetails/Create.vue'),
            meta: { title: 'cruds.pastDueDetail.title' }
          },
          {
            path: 'past-due-details/:id',
            name: 'past_due_details.show',
            component: () => import('@cruds/PastDueDetails/Show.vue'),
            meta: { title: 'cruds.pastDueDetail.title' }
          },
          {
            path: 'past-due-details/:id/edit',
            name: 'past_due_details.edit',
            component: () => import('@cruds/PastDueDetails/Edit.vue'),
            meta: { title: 'cruds.pastDueDetail.title' }
          }
        ]
      },
      {
        path: 'recovery-management',
        name: 'recovery_management',
        component: View,
        redirect: { name: 'recoveries.index' },
        children: [
          {
            path: 'recoveries',
            name: 'recoveries.index',
            component: () => import('@cruds/Recoveries/Index.vue'),
            meta: { title: 'cruds.recovery.title' }
          },
          {
            path: 'recoveries/create',
            name: 'recoveries.create',
            component: () => import('@cruds/Recoveries/Create.vue'),
            meta: { title: 'cruds.recovery.title' }
          },
          {
            path: 'recoveries/:id',
            name: 'recoveries.show',
            component: () => import('@cruds/Recoveries/Show.vue'),
            meta: { title: 'cruds.recovery.title' }
          },
          {
            path: 'recoveries/:id/edit',
            name: 'recoveries.edit',
            component: () => import('@cruds/Recoveries/Edit.vue'),
            meta: { title: 'cruds.recovery.title' }
          }
        ]
      },
      {
        path: 'write-off-management',
        name: 'write_off_management',
        component: View,
        redirect: { name: 'write_offs.index' },
        children: [
          {
            path: 'write-offs',
            name: 'write_offs.index',
            component: () => import('@cruds/WriteOffs/Index.vue'),
            meta: { title: 'cruds.writeOff.title' }
          },
          {
            path: 'write-offs/create',
            name: 'write_offs.create',
            component: () => import('@cruds/WriteOffs/Create.vue'),
            meta: { title: 'cruds.writeOff.title' }
          },
          {
            path: 'write-offs/:id',
            name: 'write_offs.show',
            component: () => import('@cruds/WriteOffs/Show.vue'),
            meta: { title: 'cruds.writeOff.title' }
          },
          {
            path: 'write-offs/:id/edit',
            name: 'write_offs.edit',
            component: () => import('@cruds/WriteOffs/Edit.vue'),
            meta: { title: 'cruds.writeOff.title' }
          }
        ]
      },
      {
        path: 'faq-management',
        name: 'faq_management',
        component: View,
        redirect: { name: 'faq_categories.index' },
        children: [
          {
            path: 'faq-categories',
            name: 'faq_categories.index',
            component: () => import('@cruds/FaqCategories/Index.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-categories/create',
            name: 'faq_categories.create',
            component: () => import('@cruds/FaqCategories/Create.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-categories/:id',
            name: 'faq_categories.show',
            component: () => import('@cruds/FaqCategories/Show.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-categories/:id/edit',
            name: 'faq_categories.edit',
            component: () => import('@cruds/FaqCategories/Edit.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-questions',
            name: 'faq_questions.index',
            component: () => import('@cruds/FaqQuestions/Index.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          },
          {
            path: 'faq-questions/create',
            name: 'faq_questions.create',
            component: () => import('@cruds/FaqQuestions/Create.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          },
          {
            path: 'faq-questions/:id',
            name: 'faq_questions.show',
            component: () => import('@cruds/FaqQuestions/Show.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          },
          {
            path: 'faq-questions/:id/edit',
            name: 'faq_questions.edit',
            component: () => import('@cruds/FaqQuestions/Edit.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
