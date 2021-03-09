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
              <strong>{{ $t('cruds.collateral.title') }}</strong>
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
          title: 'cruds.collateral.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.collateral.fields.customer',
          field: 'customer.customer_name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.description',
          field: 'description',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.collateral',
          field: 'collateral',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.collateral_type',
          field: 'collateral_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.currency',
          field: 'currency',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.purchase_price',
          field: 'purchase_price',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.valuation_price',
          field: 'valuation_price',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.valuer',
          field: 'valuer',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.issued_date',
          field: 'issued_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.issued_place',
          field: 'issued_place',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.issued_by',
          field: 'issued_by',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.collateral_number',
          field: 'collateral_number',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.province',
          field: 'province',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.district',
          field: 'district',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.commune',
          field: 'commune',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.village',
          field: 'village',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.received_date',
          field: 'received_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collateral.fields.withdrawal_date',
          field: 'withdrawal_date',
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
        module: 'CollateralsIndex',
        route: 'collaterals',
        permission_prefix: 'collateral_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CollateralsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('CollateralsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
