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
              <strong>{{ $t('cruds.company.title') }}</strong>
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
import DatatableAttachments from '@components/Datatables/DatatableAttachments'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.company.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.company.fields.branch',
          field: 'branch.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.company.fields.name_en',
          field: 'name_en',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.name_lc',
          field: 'name_lc',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.business_type',
          field: 'business_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.industry',
          field: 'industry',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.title',
          field: 'title',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.contact_person',
          field: 'contact_person',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.job_title',
          field: 'job_title',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.office_phone',
          field: 'office_phone',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.mobile_phone_1',
          field: 'mobile_phone_1',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.mobile_phone_2',
          field: 'mobile_phone_2',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.email',
          field: 'email',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.fax',
          field: 'fax',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.website',
          field: 'website',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.facebook',
          field: 'facebook',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.address_en',
          field: 'address_en',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.address_lc',
          field: 'address_lc',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.description',
          field: 'description',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.contact_person_email',
          field: 'contact_person_email',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.registration_number',
          field: 'registration_number',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.tax_regime',
          field: 'tax_regime',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.company.fields.vat',
          field: 'vat',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.company.fields.logo',
          field: 'logo',
          thComp: TranslatedHeader,
          tdComp: DatatableAttachments
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
        module: 'CompaniesIndex',
        route: 'companies',
        permission_prefix: 'company_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CompaniesIndex', ['data', 'total', 'loading'])
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
    ...mapActions('CompaniesIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
