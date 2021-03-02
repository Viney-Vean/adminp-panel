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
              <strong>{{ $t('cruds.writeOff.title') }}</strong>
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
          title: 'cruds.writeOff.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.writeOff.fields.branch',
          field: 'branch.branch',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.contract',
          field: 'contract',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.customer',
          field: 'customer',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.customer_name',
          field: 'customer_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.currency',
          field: 'currency.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.dd_account',
          field: 'dd_account.account_name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.approve_amount',
          field: 'approve_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.disburse_amount',
          field: 'disburse_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.balance',
          field: 'balance',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.accrue_interest_current_installment',
          field: 'accrue_interest_current_installment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.principal_due',
          field: 'principal_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.interest_due',
          field: 'interest_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.charge_due',
          field: 'charge_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.penalty_due',
          field: 'penalty_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.orig_balance',
          field: 'orig_balance',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title:
            'cruds.writeOff.fields.orig_accrue_interest_current_installment',
          field: 'orig_accrue_interest_current_installment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.orig_charge',
          field: 'orig_charge',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.orig_principal_due',
          field: 'orig_principal_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.orig_interest_due',
          field: 'orig_interest_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.orig_charge_due',
          field: 'orig_charge_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.orig_penalty_due',
          field: 'orig_penalty_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.write_off_date',
          field: 'write_off_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.writeOff.fields.description',
          field: 'description',
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
        module: 'WriteOffsIndex',
        route: 'write_offs',
        permission_prefix: 'write_off_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('WriteOffsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('WriteOffsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
