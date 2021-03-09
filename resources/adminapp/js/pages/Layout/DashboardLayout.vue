<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.companyManagement.title',
          icon: 'table_view',
          path: { name: 'company_management' },
          gate: 'company_management_access',
          children: [
            {
              title: 'cruds.branch.title',
              icon: 'table_view',
              path: { name: 'branches.index' },
              gate: 'branch_access'
            },
            {
              title: 'cruds.company.title',
              icon: 'table_view',
              path: { name: 'companies.index' },
              gate: 'company_access'
            },
            {
              title: 'cruds.position.title',
              icon: 'table_view',
              path: { name: 'positions.index' },
              gate: 'position_access'
            },
            {
              title: 'cruds.officer.title',
              icon: 'table_view',
              path: { name: 'officers.index' },
              gate: 'officer_access'
            }
          ]
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        },
        {
          title: 'cruds.systemSettingManagement.title',
          icon: 'table_view',
          path: { name: 'system_setting_management' },
          gate: 'system_setting_management_access',
          children: [
            {
              title: 'cruds.option.title',
              icon: 'table_view',
              path: { name: 'options.index' },
              gate: 'option_access'
            },
            {
              title: 'cruds.systemDate.title',
              icon: 'table_view',
              path: { name: 'system_dates.index' },
              gate: 'system_date_access'
            },
            {
              title: 'cruds.collectionSetting.title',
              icon: 'table_view',
              path: { name: 'collection_settings.index' },
              gate: 'collection_setting_access'
            },
            {
              title: 'cruds.systemSetting.title',
              icon: 'table_view',
              path: { name: 'system_settings.index' },
              gate: 'system_setting_access'
            },
            {
              title: 'cruds.nationality.title',
              icon: 'table_view',
              path: { name: 'nationalities.index' },
              gate: 'nationality_access'
            },
            {
              title: 'cruds.country.title',
              icon: 'table_view',
              path: { name: 'countries.index' },
              gate: 'country_access'
            },
            {
              title: 'cruds.province.title',
              icon: 'table_view',
              path: { name: 'provinces.index' },
              gate: 'province_access'
            },
            {
              title: 'cruds.district.title',
              icon: 'table_view',
              path: { name: 'districts.index' },
              gate: 'district_access'
            },
            {
              title: 'cruds.commune.title',
              icon: 'table_view',
              path: { name: 'communes.index' },
              gate: 'commune_access'
            },
            {
              title: 'cruds.village.title',
              icon: 'table_view',
              path: { name: 'villages.index' },
              gate: 'village_access'
            }
          ]
        },
        {
          title: 'cruds.chartOfAccountManagement.title',
          icon: 'table_view',
          path: { name: 'chart_of_account_management' },
          gate: 'chart_of_account_management_access',
          children: [
            {
              title: 'cruds.currency.title',
              icon: 'table_view',
              path: { name: 'currencies.index' },
              gate: 'currency_access'
            },
            {
              title: 'cruds.accountType.title',
              icon: 'table_view',
              path: { name: 'account_types.index' },
              gate: 'account_type_access'
            },
            {
              title: 'cruds.chartOfAccount.title',
              icon: 'table_view',
              path: { name: 'chart_of_accounts.index' },
              gate: 'chart_of_account_access'
            },
            {
              title: 'cruds.accountProductType.title',
              icon: 'table_view',
              path: { name: 'account_product_types.index' },
              gate: 'account_product_type_access'
            },
            {
              title: 'cruds.accountProduct.title',
              icon: 'table_view',
              path: { name: 'account_products.index' },
              gate: 'account_product_access'
            },
            {
              title: 'cruds.account.title',
              icon: 'table_view',
              path: { name: 'accounts.index' },
              gate: 'account_access'
            },
            {
              title: 'cruds.provision.title',
              icon: 'table_view',
              path: { name: 'provisions.index' },
              gate: 'provision_access'
            },
            {
              title: 'cruds.loanProduct.title',
              icon: 'table_view',
              path: { name: 'loan_products.index' },
              gate: 'loan_product_access'
            },
            {
              title: 'cruds.loanProductProvision.title',
              icon: 'table_view',
              path: { name: 'loan_product_provisions.index' },
              gate: 'loan_product_provision_access'
            },
            {
              title: 'cruds.accountEntry.title',
              icon: 'table_view',
              path: { name: 'account_entries.index' },
              gate: 'account_entry_access'
            },
            {
              title: 'cruds.journal.title',
              icon: 'table_view',
              path: { name: 'journals.index' },
              gate: 'journal_access'
            }
          ]
        },
        {
          title: 'cruds.customerManagement.title',
          icon: 'table_view',
          path: { name: 'customer_management' },
          gate: 'customer_management_access',
          children: [
            {
              title: 'cruds.customer.title',
              icon: 'table_view',
              path: { name: 'customers.index' },
              gate: 'customer_access'
            },
            {
              title: 'cruds.collateral.title',
              icon: 'table_view',
              path: { name: 'collaterals.index' },
              gate: 'collateral_access'
            }
          ]
        },
        {
          title: 'cruds.loanManagement.title',
          icon: 'table_view',
          path: { name: 'loan_management' },
          gate: 'loan_management_access',
          children: [
            {
              title: 'cruds.application.title',
              icon: 'table_view',
              path: { name: 'applications.index' },
              gate: 'application_access'
            },
            {
              title: 'cruds.contract.title',
              icon: 'table_view',
              path: { name: 'contracts.index' },
              gate: 'contract_access'
            },
            {
              title: 'cruds.schedule.title',
              icon: 'table_view',
              path: { name: 'schedules.index' },
              gate: 'schedule_access'
            },
            {
              title: 'cruds.pastDueDetail.title',
              icon: 'table_view',
              path: { name: 'past_due_details.index' },
              gate: 'past_due_detail_access'
            }
          ]
        },
        {
          title: 'cruds.recoveryManagement.title',
          icon: 'table_view',
          path: { name: 'recovery_management' },
          gate: 'recovery_management_access',
          children: [
            {
              title: 'cruds.recovery.title',
              icon: 'table_view',
              path: { name: 'recoveries.index' },
              gate: 'recovery_access'
            }
          ]
        },
        {
          title: 'cruds.writeOffManagement.title',
          icon: 'table_view',
          path: { name: 'write_off_management' },
          gate: 'write_off_management_access',
          children: [
            {
              title: 'cruds.writeOff.title',
              icon: 'table_view',
              path: { name: 'write_offs.index' },
              gate: 'write_off_access'
            }
          ]
        },
        {
          title: 'cruds.faqManagement.title',
          icon: 'table_view',
          path: { name: 'faq_management' },
          gate: 'faq_management_access',
          children: [
            {
              title: 'cruds.faqCategory.title',
              icon: 'table_view',
              path: { name: 'faq_categories.index' },
              gate: 'faq_category_access'
            },
            {
              title: 'cruds.faqQuestion.title',
              icon: 'table_view',
              path: { name: 'faq_questions.index' },
              gate: 'faq_question_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
