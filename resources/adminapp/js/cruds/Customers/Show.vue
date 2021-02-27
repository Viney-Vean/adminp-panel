<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.customer.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_name') }}
                        </td>
                        <td>
                          {{ entry.customer_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_last_name') }}
                        </td>
                        <td>
                          {{ entry.customer_last_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_nickname') }}
                        </td>
                        <td>
                          {{ entry.customer_nickname }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_gender') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="customer_gender">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_date_of_birth')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_date_of_birth }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_nationality') }}
                        </td>
                        <td>
                          {{ entry.customer_nationality }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_phone') }}
                        </td>
                        <td>
                          {{ entry.customer_phone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_business_phone')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_business_phone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_other_phone') }}
                        </td>
                        <td>
                          {{ entry.customer_other_phone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_mail') }}
                        </td>
                        <td>
                          {{ entry.customer_mail }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_identity_type')
                          }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="customer_identity_type"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_salary_slip') }}
                        </td>
                        <td>
                          {{ entry.customer_salary_slip }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_id_card') }}
                        </td>
                        <td>
                          {{ entry.customer_id_card }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_back_id_card')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_back_id_card }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.selfies_photo') }}
                        </td>
                        <td>
                          <datatable-pictures
                            :row="entry"
                            :field="'selfies_photo'"
                          >
                          </datatable-pictures>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.number_of_children') }}
                        </td>
                        <td>
                          {{ entry.number_of_children }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.number_of_family_member')
                          }}
                        </td>
                        <td>
                          {{ entry.number_of_family_member }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.cbc_check') }}
                        </td>
                        <td>
                          {{ entry.cbc_check }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.cbc_scores') }}
                        </td>
                        <td>
                          {{ entry.cbc_scores }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.shift_works') }}
                        </td>
                        <td>
                          {{ entry.shift_works }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.businesses_income') }}
                        </td>
                        <td>
                          {{ entry.businesses_income }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.type_of_business_activities'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.type_of_business_activities }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.general_expenses') }}
                        </td>
                        <td>
                          {{ entry.general_expenses }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.yes_or_no_loan_leasing_repayment_expenses'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="yes_or_no_loan_leasing_repayment_expenses"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.name_of_institution') }}
                        </td>
                        <td>
                          {{ entry.name_of_institution }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_identity_number')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_identity_number }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_identity_date')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_identity_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_vehicle') }}
                        </td>
                        <td>
                          {{ entry.customer_vehicle }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.house_no') }}
                        </td>
                        <td>
                          {{ entry.house_no }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.street_no') }}
                        </td>
                        <td>
                          {{ entry.street_no }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.address') }}
                        </td>
                        <td>
                          {{ entry.address }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_status') }}
                        </td>
                        <td>
                          {{ entry.customer_status }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_blanklist') }}
                        </td>
                        <td>
                          {{ entry.customer_blanklist }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_profile') }}
                        </td>
                        <td>
                          <datatable-pictures
                            :row="entry"
                            :field="'customer_profile'"
                          >
                          </datatable-pictures>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.documentations') }}
                        </td>
                        <td>
                          <datatable-attachments
                            :row="entry"
                            :field="'documentations'"
                          >
                          </datatable-attachments>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_occupation') }}
                        </td>
                        <td>
                          {{ entry.customer_occupation }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_income') }}
                        </td>
                        <td>
                          {{ entry.customer_income }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.income_from_salary') }}
                        </td>
                        <td>
                          {{ entry.income_from_salary }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.asset_type') }}
                        </td>
                        <td>
                          {{ entry.asset_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.asset') }}
                        </td>
                        <td>
                          {{ entry.asset }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.collateral') }}
                        </td>
                        <td>
                          {{ entry.collateral }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_currency_income')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_currency_income }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.spouse_currency_income')
                          }}
                        </td>
                        <td>
                          {{ entry.spouse_currency_income }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse') }}
                        </td>
                        <td>
                          {{ entry.spouse }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_name') }}
                        </td>
                        <td>
                          {{ entry.spouse_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_gender') }}
                        </td>
                        <td>
                          {{ entry.spouse_gender }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_date_of_birth') }}
                        </td>
                        <td>
                          {{ entry.spouse_date_of_birth }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_nationality') }}
                        </td>
                        <td>
                          {{ entry.spouse_nationality }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_phone') }}
                        </td>
                        <td>
                          {{ entry.spouse_phone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_mail') }}
                        </td>
                        <td>
                          {{ entry.spouse_mail }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_identity_type') }}
                        </td>
                        <td>
                          {{ entry.spouse_identity_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.spouse_identity_number')
                          }}
                        </td>
                        <td>
                          {{ entry.spouse_identity_number }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_identity_date') }}
                        </td>
                        <td>
                          {{ entry.spouse_identity_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_profile') }}
                        </td>
                        <td>
                          <datatable-pictures
                            :row="entry"
                            :field="'spouse_profile'"
                          >
                          </datatable-pictures>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_occupation') }}
                        </td>
                        <td>
                          {{ entry.spouse_occupation }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_income') }}
                        </td>
                        <td>
                          {{ entry.spouse_income }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.is_staff') }}
                        </td>
                        <td>
                          {{ entry.is_staff }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.is_guarantor') }}
                        </td>
                        <td>
                          {{ entry.is_guarantor }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.user') }}
                        </td>
                        <td>
                          {{ entry.user }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.password') }}
                        </td>
                        <td>
                          {{ entry.password }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.remember_token') }}
                        </td>
                        <td>
                          {{ entry.remember_token }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.created_by') }}
                        </td>
                        <td>
                          {{ entry.created_by }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.updated_by') }}
                        </td>
                        <td>
                          {{ entry.updated_by }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.marital_status') }}
                        </td>
                        <td>
                          {{ entry.marital_status }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.customer_living_condition'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.customer_living_condition }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_latin_name') }}
                        </td>
                        <td>
                          {{ entry.customer_latin_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.customer_identity_expired_date'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.customer_identity_expired_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_working_period')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_working_period }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_work_experience')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_work_experience }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.customer_employment_status'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.customer_employment_status }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.customer.fields.customer_organization')
                          }}
                        </td>
                        <td>
                          {{ entry.customer_organization }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.customer_organization_house_no'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.customer_organization_house_no }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.customer_organization_street_no'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.customer_organization_street_no }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.customer.fields.customer_organization_address'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.customer_organization_address }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.relationship') }}
                        </td>
                        <td>
                          {{ entry.relationship }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_type') }}
                        </td>
                        <td>
                          {{ entry.customer_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.scores') }}
                        </td>
                        <td>
                          {{ entry.scores }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.is_agree') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="is_agree">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.recommended') }}
                        </td>
                        <td>
                          {{ entry.recommended }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.percentage') }}
                        </td>
                        <td>
                          {{ entry.percentage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.number_share') }}
                        </td>
                        <td>
                          {{ entry.number_share }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.member_type') }}
                        </td>
                        <td>
                          {{ entry.member_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.investor_type') }}
                        </td>
                        <td>
                          {{ entry.investor_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.about') }}
                        </td>
                        <td>
                          {{ entry.about }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.qiid') }}
                        </td>
                        <td>
                          {{ entry.qiid }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.json') }}
                        </td>
                        <td>
                          {{ entry.json }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.name_en">
                          </datatable-single>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
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
import DatatableEnum from '@components/Datatables/DatatableEnum'
import DatatablePictures from '@components/Datatables/DatatablePictures'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    DatatableEnum,
    DatatablePictures,
    DatatableAttachments,
    DatatableSingle
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('CustomersSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('CustomersSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
