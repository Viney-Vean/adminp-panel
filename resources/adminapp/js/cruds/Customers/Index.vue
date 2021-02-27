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
import DatatableEnum from '@components/Datatables/DatatableEnum'
import DatatablePictures from '@components/Datatables/DatatablePictures'
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
          title: 'cruds.customer.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.customer.fields.customer_name',
          field: 'customer_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_last_name',
          field: 'customer_last_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_nickname',
          field: 'customer_nickname',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_gender',
          field: 'customer_gender',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.customer.fields.customer_date_of_birth',
          field: 'customer_date_of_birth',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_nationality',
          field: 'customer_nationality',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_phone',
          field: 'customer_phone',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_business_phone',
          field: 'customer_business_phone',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_other_phone',
          field: 'customer_other_phone',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_mail',
          field: 'customer_mail',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_identity_type',
          field: 'customer_identity_type',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.customer.fields.customer_salary_slip',
          field: 'customer_salary_slip',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_id_card',
          field: 'customer_id_card',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_back_id_card',
          field: 'customer_back_id_card',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.selfies_photo',
          field: 'selfies_photo',
          thComp: TranslatedHeader,
          tdComp: DatatablePictures
        },
        {
          title: 'cruds.customer.fields.number_of_children',
          field: 'number_of_children',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.number_of_family_member',
          field: 'number_of_family_member',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.cbc_check',
          field: 'cbc_check',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.cbc_scores',
          field: 'cbc_scores',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.shift_works',
          field: 'shift_works',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.businesses_income',
          field: 'businesses_income',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.type_of_business_activities',
          field: 'type_of_business_activities',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.general_expenses',
          field: 'general_expenses',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title:
            'cruds.customer.fields.yes_or_no_loan_leasing_repayment_expenses',
          field: 'yes_or_no_loan_leasing_repayment_expenses',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.customer.fields.name_of_institution',
          field: 'name_of_institution',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_identity_number',
          field: 'customer_identity_number',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_identity_date',
          field: 'customer_identity_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_vehicle',
          field: 'customer_vehicle',
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
          title: 'cruds.customer.fields.street_no',
          field: 'street_no',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.address',
          field: 'address',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_status',
          field: 'customer_status',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_blanklist',
          field: 'customer_blanklist',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_profile',
          field: 'customer_profile',
          thComp: TranslatedHeader,
          tdComp: DatatablePictures
        },
        {
          title: 'cruds.customer.fields.documentations',
          field: 'documentations',
          thComp: TranslatedHeader,
          tdComp: DatatableAttachments
        },
        {
          title: 'cruds.customer.fields.customer_occupation',
          field: 'customer_occupation',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_income',
          field: 'customer_income',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.income_from_salary',
          field: 'income_from_salary',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.asset_type',
          field: 'asset_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.asset',
          field: 'asset',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.collateral',
          field: 'collateral',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_currency_income',
          field: 'customer_currency_income',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_currency_income',
          field: 'spouse_currency_income',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse',
          field: 'spouse',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_name',
          field: 'spouse_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_gender',
          field: 'spouse_gender',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_date_of_birth',
          field: 'spouse_date_of_birth',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_nationality',
          field: 'spouse_nationality',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_phone',
          field: 'spouse_phone',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_mail',
          field: 'spouse_mail',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_identity_type',
          field: 'spouse_identity_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_identity_number',
          field: 'spouse_identity_number',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_identity_date',
          field: 'spouse_identity_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_profile',
          field: 'spouse_profile',
          thComp: TranslatedHeader,
          tdComp: DatatablePictures
        },
        {
          title: 'cruds.customer.fields.spouse_occupation',
          field: 'spouse_occupation',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.spouse_income',
          field: 'spouse_income',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.is_staff',
          field: 'is_staff',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.is_guarantor',
          field: 'is_guarantor',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.user',
          field: 'user',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.branch',
          field: 'branch',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.password',
          field: 'password',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.remember_token',
          field: 'remember_token',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.created_by',
          field: 'created_by',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.updated_by',
          field: 'updated_by',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.marital_status',
          field: 'marital_status',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_living_condition',
          field: 'customer_living_condition',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_latin_name',
          field: 'customer_latin_name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_identity_expired_date',
          field: 'customer_identity_expired_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_working_period',
          field: 'customer_working_period',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_work_experience',
          field: 'customer_work_experience',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_employment_status',
          field: 'customer_employment_status',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_organization',
          field: 'customer_organization',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_organization_house_no',
          field: 'customer_organization_house_no',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_organization_street_no',
          field: 'customer_organization_street_no',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_organization_address',
          field: 'customer_organization_address',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.relationship',
          field: 'relationship',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.customer_type',
          field: 'customer_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.scores',
          field: 'scores',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.is_agree',
          field: 'is_agree',
          thComp: TranslatedHeader,
          sortable: true,
          tdComp: DatatableEnum
        },
        {
          title: 'cruds.customer.fields.recommended',
          field: 'recommended',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.percentage',
          field: 'percentage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.number_share',
          field: 'number_share',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.member_type',
          field: 'member_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.investor_type',
          field: 'investor_type',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.about',
          field: 'about',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.qiid',
          field: 'qiid',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.customer.fields.json',
          field: 'json',
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
