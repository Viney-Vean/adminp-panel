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
              <strong>{{ $t('cruds.accountProduct.title') }}</strong>
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

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.accountProduct.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.accountProduct.fields.branch',
          field: 'branch',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.account_product_title',
          field: 'account_product_title',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.chart_of_account',
          field: 'chart_of_account.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.currency',
          field: 'currency',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.account_product_type',
          field: 'account_product_type.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.account_type',
          field: 'account_type.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_rate',
          field: 'interest_rate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.charged_rate',
          field: 'charged_rate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.tax_rate',
          field: 'tax_rate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.balance_define',
          field: 'balance_define',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_day_basis',
          field: 'interest_day_basis',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_accrual_basis',
          field: 'interest_accrual_basis',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_capitalization',
          field: 'interest_capitalization',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.dormant_day',
          field: 'dormant_day',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_expense_coa',
          field: 'interest_expense_coa',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_payable_coa',
          field: 'interest_payable_coa',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_income_coa',
          field: 'interest_income_coa',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.accountProduct.fields.interest_receivable_coa',
          field: 'interest_receivable_coa',
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
        module: 'AccountProductsIndex',
        route: 'account_products',
        permission_prefix: 'account_product_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('AccountProductsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('AccountProductsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
