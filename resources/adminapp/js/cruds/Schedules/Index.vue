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
              <strong>{{ $t('cruds.schedule.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
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
          title: 'cruds.schedule.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.schedule.fields.branch',
          field: 'branch.branch',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.loan',
          field: 'loan.code',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.no',
          field: 'no',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.collection_date',
          field: 'collection_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.principal',
          field: 'principal',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.interest',
          field: 'interest',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.charge',
          field: 'charge',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.penalty',
          field: 'penalty',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.balance',
          field: 'balance',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.num_day',
          field: 'num_day',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.total_amount',
          field: 'total_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.paid_amount',
          field: 'paid_amount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.waive_interest',
          field: 'waive_interest',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.waive_charge',
          field: 'waive_charge',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.waive_penalty',
          field: 'waive_penalty',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.schedule.fields.status',
          field: 'status',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.schedule.fields.schedule_saved',
          field: 'schedule_saved',
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
        module: 'SchedulesIndex',
        route: 'schedules',
        permission_prefix: 'schedule_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('SchedulesIndex', ['data', 'total', 'loading'])
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
    ...mapActions('SchedulesIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
