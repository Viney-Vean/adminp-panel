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
              <strong>{{ $t('cruds.pastDueDetail.title') }}</strong>
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
          title: 'cruds.pastDueDetail.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.pastDueDetail.fields.branch',
          field: 'branch.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.schedule',
          field: 'schedule.no',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.contract',
          field: 'contract.code',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.due_date',
          field: 'due_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.principal_due',
          field: 'principal_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.out_principal',
          field: 'out_principal',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.interest_due',
          field: 'interest_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.out_interest',
          field: 'out_interest',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.accrue_interest_out',
          field: 'accrue_interest_out',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.charge_due',
          field: 'charge_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.out_charge',
          field: 'out_charge',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.penalty_due',
          field: 'penalty_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.out_penalty',
          field: 'out_penalty',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.numday_due',
          field: 'numday_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.status_due',
          field: 'status_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.collect_penalty_amount',
          field: 'collect_penalty_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.collect_interest_amount',
          field: 'collect_interest_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.collect_charge_amount',
          field: 'collect_charge_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.waive_penalty_amount',
          field: 'waive_penalty_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.waive_interest_amount',
          field: 'waive_interest_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.pastDueDetail.fields.waive_charge_amount',
          field: 'waive_charge_amount',
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
        module: 'PastDueDetailsIndex',
        route: 'past_due_details',
        permission_prefix: 'past_due_detail_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('PastDueDetailsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('PastDueDetailsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
