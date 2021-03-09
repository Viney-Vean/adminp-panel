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
              <strong>{{ $t('cruds.systemSetting.title') }}</strong>
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
          title: 'cruds.systemSetting.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.systemSetting.fields.branch',
          field: 'branch.branch_manager_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.principal_collection',
          field: 'principal_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.interest_collection',
          field: 'interest_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.admin_fee_collection',
          field: 'admin_fee_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.pd_principal_collection',
          field: 'pd_principal_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.pd_interest_collection',
          field: 'pd_interest_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.charge_collection',
          field: 'charge_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.penalty_collection',
          field: 'penalty_collection',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.loan_accrual_interest',
          field: 'loan_accrual_interest',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.amendment_add_principal',
          field: 'amendment_add_principal',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.amendment_duduct_principal',
          field: 'amendment_duduct_principal',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.terminate',
          field: 'terminate',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.write_off_charge',
          field: 'write_off_charge',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.write_off_penalty',
          field: 'write_off_penalty',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.write_off_interest',
          field: 'write_off_interest',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.write_off_principal',
          field: 'write_off_principal',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.waive_charge',
          field: 'waive_charge',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.systemSetting.fields.waive_penalty',
          field: 'waive_penalty',
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
        module: 'SystemSettingsIndex',
        route: 'system_settings',
        permission_prefix: 'system_setting_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('SystemSettingsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('SystemSettingsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
