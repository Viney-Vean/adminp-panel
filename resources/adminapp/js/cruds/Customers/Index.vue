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
              <strong>{{ $t('cruds.customer.title') }}</strong>
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
          title: 'cruds.customer.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.customer.fields.branch',
          field: 'branch.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.given_name_en',
          field: 'given_name_en',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.surname_en',
          field: 'surname_en',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.given_name_lc',
          field: 'given_name_lc',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.surname_lc',
          field: 'surname_lc',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_type',
          field: 'customer_type.label',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.title',
          field: 'title',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.customer.fields.gender',
          field: 'gender.label',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.date_of_birth',
          field: 'date_of_birth',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.country_of_birth',
          field: 'country_of_birth.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.province_of_birth',
          field: 'province_of_birth.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.district_of_birth',
          field: 'district_of_birth.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.commune_of_birth',
          field: 'commune_of_birth.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.village_of_birth',
          field: 'village_of_birth.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.resident_status',
          field: 'resident_status.label',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.education_level',
          field: 'education_level.label',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.officer',
          field: 'officer.label',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.province',
          field: 'province.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.district',
          field: 'district.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.commune',
          field: 'commune.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.village',
          field: 'village.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.city',
          field: 'city',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.house_no',
          field: 'house_no',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.street',
          field: 'street',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.phone_1',
          field: 'phone_1',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.phone_2',
          field: 'phone_2',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.facebook',
          field: 'facebook',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.email',
          field: 'email',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_given_name_en',
          field: 'family_given_name_en',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_surname_en',
          field: 'family_surname_en',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_given_name_lc',
          field: 'family_given_name_lc',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_surname_lc',
          field: 'family_surname_lc',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_date_of_birth',
          field: 'family_date_of_birth',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_nationality',
          field: 'family_nationality',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_id_type',
          field: 'family_id_type.label',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_id_number',
          field: 'family_id_number',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_issue_place',
          field: 'family_issue_place',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_issue_date',
          field: 'family_issue_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_expiry_date',
          field: 'family_expiry_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_employment',
          field: 'spouse_employment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_phone_1',
          field: 'family_phone_1',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_phone_2',
          field: 'family_phone_2',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.house_ownership',
          field: 'house_ownership',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.family_member',
          field: 'family_member',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.active_member',
          field: 'active_member',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.employment',
          field: 'employment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_name',
          field: 'company_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.employer_name',
          field: 'employer_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.business_type',
          field: 'business_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.position',
          field: 'position',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_country',
          field: 'company_country.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_province',
          field: 'company_province.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_district',
          field: 'company_district.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_commune',
          field: 'company_commune.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_village',
          field: 'company_village.name_en',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_street',
          field: 'company_street',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_no',
          field: 'company_no',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_telephone',
          field: 'company_telephone',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_fax',
          field: 'company_fax',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_email',
          field: 'company_email',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.year_of_employed',
          field: 'year_of_employed',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.length_of_service',
          field: 'length_of_service',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.company_currency',
          field: 'company_currency.description',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.total_monthly_income',
          field: 'total_monthly_income',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.total_rent_expense',
          field: 'total_rent_expense',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.total_insurance_expense',
          field: 'total_insurance_expense',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.total_monthly_loan_payment',
          field: 'total_monthly_loan_payment',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.total_other_expense',
          field: 'total_other_expense',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.zee_cash_balance',
          field: 'zee_cash_balance',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.block',
          field: 'block',
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
        module: 'CustomersIndex',
        route: 'customers',
        permission_prefix: 'customer_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CustomersIndex', ['data', 'total', 'loading'])
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
    ...mapActions('CustomersIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
