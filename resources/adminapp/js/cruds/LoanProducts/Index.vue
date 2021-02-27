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
              <strong>{{ $t('cruds.loanProduct.title') }}</strong>
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
          title: 'cruds.loanProduct.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.loanProduct.fields.branch',
          field: 'branch.branch',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.description',
          field: 'description',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.currency',
          field: 'currency.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.repayment_method',
          field: 'repayment_method',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.day_basis_top_side',
          field: 'day_basis_top_side',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.day_basis_down_side',
          field: 'day_basis_down_side',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.minimum_age',
          field: 'minimum_age',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.maximum_age',
          field: 'maximum_age',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.min_interest_rate',
          field: 'min_interest_rate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.max_interest_rate',
          field: 'max_interest_rate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.minimum_amount',
          field: 'minimum_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.maximum_amount',
          field: 'maximum_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.minimum_term_monthly',
          field: 'minimum_term_monthly',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.maximum_term_monthly',
          field: 'maximum_term_monthly',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.minimum_term_weekly',
          field: 'minimum_term_weekly',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.maximum_term_weekly',
          field: 'maximum_term_weekly',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.minimum_term_daily',
          field: 'minimum_term_daily',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.maximum_term_daily',
          field: 'maximum_term_daily',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.reduce_base_on',
          field: 'reduce_base_on',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.loanProduct.fields.max_reduce_percentage',
          field: 'max_reduce_percentage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.penalty_reduction_base_on',
          field: 'penalty_reduction_base_on',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.loanProduct.fields.max_penalty_reduce_percentage',
          field: 'max_penalty_reduce_percentage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.admin_fee_base_on',
          field: 'admin_fee_base_on',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.loanProduct.fields.admin_fee_amount',
          field: 'admin_fee_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.admin_fee_accrual',
          field: 'admin_fee_accrual',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.loanProduct.fields.regular_fee_base_on',
          field: 'regular_fee_base_on',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.loanProduct.fields.regular_fee_amount',
          field: 'regular_fee_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.regular_fee_accual',
          field: 'regular_fee_accual',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.loanProduct.fields.fee_earn_coa',
          field: 'fee_earn_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProduct.fields.fee_unearn_coa',
          field: 'fee_unearn_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
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
        module: 'LoanProductsIndex',
        route: 'loan_products',
        permission_prefix: 'loan_product_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('LoanProductsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('LoanProductsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
