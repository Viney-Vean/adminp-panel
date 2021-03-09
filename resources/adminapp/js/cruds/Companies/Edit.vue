<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.company.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.branch_id !== null,
                      'is-focused': activeField == 'branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.branch')
                    }}</label>
                    <v-select
                      name="branch"
                      label="name_en"
                      :key="'branch-field'"
                      :value="entry.branch_id"
                      :options="lists.branch"
                      :reduce="entry => entry.id"
                      @input="updateBranch"
                      @search.focus="focusField('branch')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name_en,
                      'is-focused': activeField == 'name_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.company.fields.name_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name_en"
                      @input="updateNameEn"
                      @focus="focusField('name_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name_lc,
                      'is-focused': activeField == 'name_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.name_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name_lc"
                      @input="updateNameLc"
                      @focus="focusField('name_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.business_type,
                      'is-focused': activeField == 'business_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.business_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.business_type"
                      @input="updateBusinessType"
                      @focus="focusField('business_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.industry,
                      'is-focused': activeField == 'industry'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.industry')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.industry"
                      @input="updateIndustry"
                      @focus="focusField('industry')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.title"
                      @input="updateTitle"
                      @focus="focusField('title')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_person,
                      'is-focused': activeField == 'contact_person'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.contact_person')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_person"
                      @input="updateContactPerson"
                      @focus="focusField('contact_person')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.job_title,
                      'is-focused': activeField == 'job_title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.job_title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.job_title"
                      @input="updateJobTitle"
                      @focus="focusField('job_title')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.office_phone,
                      'is-focused': activeField == 'office_phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.office_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.office_phone"
                      @input="updateOfficePhone"
                      @focus="focusField('office_phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mobile_phone_1,
                      'is-focused': activeField == 'mobile_phone_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.mobile_phone_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.mobile_phone_1"
                      @input="updateMobilePhone1"
                      @focus="focusField('mobile_phone_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mobile_phone_2,
                      'is-focused': activeField == 'mobile_phone_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.mobile_phone_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.mobile_phone_2"
                      @input="updateMobilePhone2"
                      @focus="focusField('mobile_phone_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.fax,
                      'is-focused': activeField == 'fax'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.fax')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.fax"
                      @input="updateFax"
                      @focus="focusField('fax')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.website,
                      'is-focused': activeField == 'website'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.website')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.website"
                      @input="updateWebsite"
                      @focus="focusField('website')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.facebook,
                      'is-focused': activeField == 'facebook'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.facebook')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.facebook"
                      @input="updateFacebook"
                      @focus="focusField('facebook')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.address_en,
                      'is-focused': activeField == 'address_en'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.address_en')
                    }}</label>
                    <textarea
                      class="form-control"
                      rows="5"
                      :value="entry.address_en"
                      @input="updateAddressEn"
                      @focus="focusField('address_en')"
                      @blur="clearFocus"
                    ></textarea>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.address_lc,
                      'is-focused': activeField == 'address_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.address_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.address_lc"
                      @input="updateAddressLc"
                      @focus="focusField('address_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.description')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_person_email,
                      'is-focused': activeField == 'contact_person_email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.contact_person_email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_person_email"
                      @input="updateContactPersonEmail"
                      @focus="focusField('contact_person_email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.registration_number,
                      'is-focused': activeField == 'registration_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.registration_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.registration_number"
                      @input="updateRegistrationNumber"
                      @focus="focusField('registration_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tax_regime,
                      'is-focused': activeField == 'tax_regime'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.tax_regime')
                    }}</label>
                    <v-select
                      name="tax_regime"
                      :key="'tax_regime-field'"
                      :value="entry.tax_regime"
                      :options="lists.tax_regime"
                      :reduce="entry => entry.value"
                      @input="updateTaxRegime"
                      @search.focus="focusField('tax_regime')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.vat,
                      'is-focused': activeField == 'vat'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.company.fields.vat')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.vat"
                      @input="updateVat"
                      @focus="focusField('vat')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.company.fields.logo') }}</label>
                    <attachment
                      :route="getRoute('companies')"
                      :collection-name="'company_logo'"
                      :media="entry.logo"
                      :model-id="$route.params.id"
                      :max-file-size="5"
                      @file-uploaded="insertLogoFile"
                      @file-removed="removeLogoFile"
                      :max-files="1"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CompaniesSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('CompaniesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setNameEn',
      'setNameLc',
      'setBusinessType',
      'setIndustry',
      'setTitle',
      'setContactPerson',
      'setJobTitle',
      'setOfficePhone',
      'setMobilePhone1',
      'setMobilePhone2',
      'setEmail',
      'setFax',
      'setWebsite',
      'setFacebook',
      'setAddressEn',
      'setAddressLc',
      'setDescription',
      'setContactPersonEmail',
      'setRegistrationNumber',
      'setTaxRegime',
      'setVat',
      'insertLogoFile',
      'removeLogoFile'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateNameEn(e) {
      this.setNameEn(e.target.value)
    },
    updateNameLc(e) {
      this.setNameLc(e.target.value)
    },
    updateBusinessType(e) {
      this.setBusinessType(e.target.value)
    },
    updateIndustry(e) {
      this.setIndustry(e.target.value)
    },
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateContactPerson(e) {
      this.setContactPerson(e.target.value)
    },
    updateJobTitle(e) {
      this.setJobTitle(e.target.value)
    },
    updateOfficePhone(e) {
      this.setOfficePhone(e.target.value)
    },
    updateMobilePhone1(e) {
      this.setMobilePhone1(e.target.value)
    },
    updateMobilePhone2(e) {
      this.setMobilePhone2(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateFax(e) {
      this.setFax(e.target.value)
    },
    updateWebsite(e) {
      this.setWebsite(e.target.value)
    },
    updateFacebook(e) {
      this.setFacebook(e.target.value)
    },
    updateAddressEn(e) {
      this.setAddressEn(e.target.value)
    },
    updateAddressLc(e) {
      this.setAddressLc(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateContactPersonEmail(e) {
      this.setContactPersonEmail(e.target.value)
    },
    updateRegistrationNumber(e) {
      this.setRegistrationNumber(e.target.value)
    },
    updateTaxRegime(value) {
      this.setTaxRegime(value)
    },
    updateVat(e) {
      this.setVat(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'companies.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
