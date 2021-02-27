import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import AccountsIndex from './cruds/Accounts'
import AccountsSingle from './cruds/Accounts/single'
import RecoveriesIndex from './cruds/Recoveries'
import RecoveriesSingle from './cruds/Recoveries/single'
import BranchesIndex from './cruds/Branches'
import BranchesSingle from './cruds/Branches/single'
import AccountProductsIndex from './cruds/AccountProducts'
import AccountProductsSingle from './cruds/AccountProducts/single'
import AccountProductTypesIndex from './cruds/AccountProductTypes'
import AccountProductTypesSingle from './cruds/AccountProductTypes/single'
import PositionsIndex from './cruds/Positions'
import PositionsSingle from './cruds/Positions/single'
import WriteOffsIndex from './cruds/WriteOffs'
import WriteOffsSingle from './cruds/WriteOffs/single'
import AccountEntriesIndex from './cruds/AccountEntries'
import AccountEntriesSingle from './cruds/AccountEntries/single'
import OfficersIndex from './cruds/Officers'
import OfficersSingle from './cruds/Officers/single'
import SchedulesIndex from './cruds/Schedules'
import SchedulesSingle from './cruds/Schedules/single'
import CollateralsIndex from './cruds/Collaterals'
import CollateralsSingle from './cruds/Collaterals/single'
import JournalsIndex from './cruds/Journals'
import JournalsSingle from './cruds/Journals/single'
import ProvisionsIndex from './cruds/Provisions'
import ProvisionsSingle from './cruds/Provisions/single'
import CollectionSettingsIndex from './cruds/CollectionSettings'
import CollectionSettingsSingle from './cruds/CollectionSettings/single'
import CustomersIndex from './cruds/Customers'
import CustomersSingle from './cruds/Customers/single'
import LoanProductsIndex from './cruds/LoanProducts'
import LoanProductsSingle from './cruds/LoanProducts/single'
import LoanProductProvisionsIndex from './cruds/LoanProductProvisions'
import LoanProductProvisionsSingle from './cruds/LoanProductProvisions/single'
import CompaniesIndex from './cruds/Companies'
import CompaniesSingle from './cruds/Companies/single'
import ContractsIndex from './cruds/Contracts'
import ContractsSingle from './cruds/Contracts/single'
import ChartOfAccountsIndex from './cruds/ChartOfAccounts'
import ChartOfAccountsSingle from './cruds/ChartOfAccounts/single'
import AccountTypesIndex from './cruds/AccountTypes'
import AccountTypesSingle from './cruds/AccountTypes/single'
import CurrenciesIndex from './cruds/Currencies'
import CurrenciesSingle from './cruds/Currencies/single'
import ApplicationsIndex from './cruds/Applications'
import ApplicationsSingle from './cruds/Applications/single'
import SystemDatesIndex from './cruds/SystemDates'
import SystemDatesSingle from './cruds/SystemDates/single'
import SystemSettingsIndex from './cruds/SystemSettings'
import SystemSettingsSingle from './cruds/SystemSettings/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    AccountsIndex,
    AccountsSingle,
    RecoveriesIndex,
    RecoveriesSingle,
    BranchesIndex,
    BranchesSingle,
    AccountProductsIndex,
    AccountProductsSingle,
    AccountProductTypesIndex,
    AccountProductTypesSingle,
    PositionsIndex,
    PositionsSingle,
    WriteOffsIndex,
    WriteOffsSingle,
    AccountEntriesIndex,
    AccountEntriesSingle,
    OfficersIndex,
    OfficersSingle,
    SchedulesIndex,
    SchedulesSingle,
    CollateralsIndex,
    CollateralsSingle,
    JournalsIndex,
    JournalsSingle,
    ProvisionsIndex,
    ProvisionsSingle,
    CollectionSettingsIndex,
    CollectionSettingsSingle,
    CustomersIndex,
    CustomersSingle,
    LoanProductsIndex,
    LoanProductsSingle,
    LoanProductProvisionsIndex,
    LoanProductProvisionsSingle,
    CompaniesIndex,
    CompaniesSingle,
    ContractsIndex,
    ContractsSingle,
    ChartOfAccountsIndex,
    ChartOfAccountsSingle,
    AccountTypesIndex,
    AccountTypesSingle,
    CurrenciesIndex,
    CurrenciesSingle,
    ApplicationsIndex,
    ApplicationsSingle,
    SystemDatesIndex,
    SystemDatesSingle,
    SystemSettingsIndex,
    SystemSettingsSingle
  },
  strict: debug
})
