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
              <strong>{{ $t('cruds.collectionSetting.title') }}</strong>
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
          title: 'cruds.collectionSetting.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.collectionSetting.fields.branch',
          field: 'branch.branch',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.past_due',
          field: 'past_due',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.pre_grace',
          field: 'pre_grace',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.grace',
          field: 'grace',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.collection_order',
          field: 'collection_order',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.terminate_insufficient_fund',
          field: 'terminate_insufficient_fund',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.penalty_collection_option',
          field: 'penalty_collection_option',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.penalty_method',
          field: 'penalty_method',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.penalty_calculation_base',
          field: 'penalty_calculation_base',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.max_day_penalty_calculation',
          field: 'max_day_penalty_calculation',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.write_off_class',
          field: 'write_off_class',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.pd_collection_method',
          field: 'pd_collection_method',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.pre_termination_option',
          field: 'pre_termination_option',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.pre_termination_duration',
          field: 'pre_termination_duration',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.pre_terminationd_type',
          field: 'pre_terminationd_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.pre_termination_percentage',
          field: 'pre_termination_percentage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.amend_deduct_option',
          field: 'amend_deduct_option',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.amend_deduct_duration',
          field: 'amend_deduct_duration',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.amend_deductd_type',
          field: 'amend_deductd_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.collectionSetting.fields.amend_deduct_percentage',
          field: 'amend_deduct_percentage',
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
        module: 'CollectionSettingsIndex',
        route: 'collection_settings',
        permission_prefix: 'collection_setting_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CollectionSettingsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('CollectionSettingsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
