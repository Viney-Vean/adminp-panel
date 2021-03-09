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
                          {{ $t('cruds.customer.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.name_en">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.given_name_en') }}
                        </td>
                        <td>
                          {{ entry.given_name_en }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.surname_en') }}
                        </td>
                        <td>
                          {{ entry.surname_en }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.given_name_lc') }}
                        </td>
                        <td>
                          {{ entry.given_name_lc }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.surname_lc') }}
                        </td>
                        <td>
                          {{ entry.surname_lc }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.title') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="title">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.gender') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="gender.label">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.date_of_birth') }}
                        </td>
                        <td>
                          {{ entry.date_of_birth }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.customer_type') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="customer_type.label"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.resident_status') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="resident_status.label"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.education_level') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="education_level.label"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.officer') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="officer.label">
                          </datatable-single>
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
                          {{ $t('cruds.customer.fields.street') }}
                        </td>
                        <td>
                          {{ entry.street }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.phone_1') }}
                        </td>
                        <td>
                          {{ entry.phone_1 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.phone_2') }}
                        </td>
                        <td>
                          {{ entry.phone_2 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.facebook') }}
                        </td>
                        <td>
                          {{ entry.facebook }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.email') }}
                        </td>
                        <td>
                          {{ entry.email }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.location_mapping') }}
                        </td>
                        <td>
                          <ckeditor
                            :editor="editor"
                            :value="entry.location_mapping"
                            disabled
                          >
                          </ckeditor>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_given_name_en') }}
                        </td>
                        <td>
                          {{ entry.family_given_name_en }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_surname_en') }}
                        </td>
                        <td>
                          {{ entry.family_surname_en }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_given_name_lc') }}
                        </td>
                        <td>
                          {{ entry.family_given_name_lc }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_surname_lc') }}
                        </td>
                        <td>
                          {{ entry.family_surname_lc }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_date_of_birth') }}
                        </td>
                        <td>
                          {{ entry.family_date_of_birth }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_nationality') }}
                        </td>
                        <td>
                          {{ entry.family_nationality }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_id_type') }}
                        </td>
                        <td>
                          {{ entry.family_id_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_id_number') }}
                        </td>
                        <td>
                          {{ entry.family_id_number }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_issue_place') }}
                        </td>
                        <td>
                          {{ entry.family_issue_place }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_issue_date') }}
                        </td>
                        <td>
                          {{ entry.family_issue_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_expiry_date') }}
                        </td>
                        <td>
                          {{ entry.family_expiry_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.spouse_employment') }}
                        </td>
                        <td>
                          {{ entry.spouse_employment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_phone_1') }}
                        </td>
                        <td>
                          {{ entry.family_phone_1 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_phone_2') }}
                        </td>
                        <td>
                          {{ entry.family_phone_2 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.house_ownership') }}
                        </td>
                        <td>
                          {{ entry.house_ownership }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.family_member') }}
                        </td>
                        <td>
                          {{ entry.family_member }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.active_member') }}
                        </td>
                        <td>
                          {{ entry.active_member }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.employment') }}
                        </td>
                        <td>
                          {{ entry.employment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_name') }}
                        </td>
                        <td>
                          {{ entry.company_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.employer_name') }}
                        </td>
                        <td>
                          {{ entry.employer_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.business_type') }}
                        </td>
                        <td>
                          {{ entry.business_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.position') }}
                        </td>
                        <td>
                          {{ entry.position }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_country') }}
                        </td>
                        <td>
                          {{ entry.company_country }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_province') }}
                        </td>
                        <td>
                          {{ entry.company_province }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_district') }}
                        </td>
                        <td>
                          {{ entry.company_district }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_commune') }}
                        </td>
                        <td>
                          {{ entry.company_commune }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_village') }}
                        </td>
                        <td>
                          {{ entry.company_village }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_street') }}
                        </td>
                        <td>
                          {{ entry.company_street }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_no') }}
                        </td>
                        <td>
                          {{ entry.company_no }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_telephone') }}
                        </td>
                        <td>
                          {{ entry.company_telephone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_fax') }}
                        </td>
                        <td>
                          {{ entry.company_fax }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.company_email') }}
                        </td>
                        <td>
                          {{ entry.company_email }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.customer.fields.year_of_employed') }}
                        </td>
                        <td>
                          {{ entry.year_of_employed }}
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
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableEnum from '@components/Datatables/DatatableEnum'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  components: {
    DatatableSingle,
    DatatableEnum,
    ClassicEditor
  },
  data() {
    return {
      editor: ClassicEditor
    }
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
