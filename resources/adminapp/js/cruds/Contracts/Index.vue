<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.table') }}
              <strong>{{ $t('cruds.contract.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'create')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                <datatable
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <global-search :query="query" class="pull-left" />
                  <header-settings :columns="columns" class="pull-right" />
                </datatable>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableActions from '@components/Datatables/DatatableActions'
import TranslatedHeader from '@components/Datatables/TranslatedHeader'
import HeaderSettings from '@components/Datatables/HeaderSettings'
import GlobalSearch from '@components/Datatables/GlobalSearch'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableEnum from '@components/Datatables/DatatableEnum'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.contract.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.contract.fields.branch',
          field: 'branch.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.code',
          field: 'code',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.application',
          field: 'application.code',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.dd_account',
          field: 'dd_account.account_name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.currency',
          field: 'currency.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.loan_product',
          field: 'loan_product.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.approve_amount',
          field: 'approve_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.disburse_amount',
          field: 'disburse_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.outstanding',
          field: 'outstanding',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.balance',
          field: 'balance',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.transaction_date',
          field: 'transaction_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.maturity_date',
          field: 'maturity_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.interest_rate',
          field: 'interest_rate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.repayment_method',
          field: 'repayment_method',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.contract.fields.repayment_frequency',
          field: 'repayment_frequency',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.contract.fields.frequency',
          field: 'frequency',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.term',
          field: 'term',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.installment',
          field: 'installment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.first_collection_date',
          field: 'first_collection_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.contract_type',
          field: 'contract_type',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.contract.fields.more_than_one_year',
          field: 'more_than_one_year',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.contract.fields.provision_class',
          field: 'provision_class.class',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.officer',
          field: 'officer.given_name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.total_interest',
          field: 'total_interest',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_interest_per_day',
          field: 'accrue_interest_per_day',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.interest_income_earn',
          field: 'interest_income_earn',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_interest_receivable',
          field: 'accrue_interest_receivable',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_interest_current_installment',
          field: 'accrue_interest_current_installment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_interest_current_month',
          field: 'accrue_interest_current_month',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_interest_previous_month',
          field: 'accrue_interest_previous_month',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_regular_fee_per_day',
          field: 'accrue_regular_fee_per_day',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_regular_fee_receivable',
          field: 'accrue_regular_fee_receivable',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_regular_fee_current_installment',
          field: 'accrue_regular_fee_current_installment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_regular_fee_current_month',
          field: 'accrue_regular_fee_current_month',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.accrue_regular_fee_prev_month',
          field: 'accrue_regular_fee_prev_month',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.admin_fee_earn',
          field: 'admin_fee_earn',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.admin_fee_unearn',
          field: 'admin_fee_unearn',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.admin_fee_per_day',
          field: 'admin_fee_per_day',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.next_run_date',
          field: 'next_run_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.principal_due',
          field: 'principal_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.interest_due',
          field: 'interest_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.charge_due',
          field: 'charge_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.penalty_due',
          field: 'penalty_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.total_overdue',
          field: 'total_overdue',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.num_day_due',
          field: 'num_day_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.provision_amount',
          field: 'provision_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.contract.fields.provision_amount_lcy',
          field: 'provision_amount_lcy',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'global.actions',
          thComp: TranslatedHeader,
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      query: { sort: 'id', order: 'desc', limit: 100, s: '' },
      xprops: {
        module: 'ContractsIndex',
        route: 'contracts',
        permission_prefix: 'contract_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('ContractsIndex', ['data', 'total', 'loading'])
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  methods: {
    ...mapActions('ContractsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
