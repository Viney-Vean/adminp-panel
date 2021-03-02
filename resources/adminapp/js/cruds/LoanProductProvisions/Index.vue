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
              <strong>{{ $t('cruds.loanProductProvision.title') }}</strong>
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
          title: 'cruds.loanProductProvision.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.loanProductProvision.fields.branch',
          field: 'branch.branch',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.product',
          field: 'product.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.class',
          field: 'class.class_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.outstanding_coa',
          field: 'outstanding_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.air_coa',
          field: 'air_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.int_income_coa',
          field: 'int_income_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.interest_in_suspend_coa',
          field: 'interest_in_suspend_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.provision_expense_coa',
          field: 'provision_expense_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.provision_reserve_coa',
          field: 'provision_reserve_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.penalty_coa',
          field: 'penalty_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.income_charge_coa',
          field: 'income_charge_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.in_suspend_charge_coa',
          field: 'in_suspend_charge_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.charge_receivable_coa',
          field: 'charge_receivable_coa.account_title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.provision_booking',
          field: 'provision_booking',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.loanProductProvision.fields.more_than_one_year',
          field: 'more_than_one_year',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title:
            'cruds.loanProductProvision.fields.interest_income_recognition',
          field: 'interest_income_recognition',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
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
        module: 'LoanProductProvisionsIndex',
        route: 'loan_product_provisions',
        permission_prefix: 'loan_product_provision_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('LoanProductProvisionsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('LoanProductProvisionsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
