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
                <strong>{{ $t('cruds.branch.title_singular') }}</strong>
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
                      'has-items': entry.branch,
                      'is-focused': activeField == 'branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.branch.fields.branch')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.branch"
                      @input="updateBranch"
                      @focus="focusField('branch')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.start_operation_date,
                      'is-focused': activeField == 'start_operation_date'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.start_operation_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.start_operation_date"
                      @input="updateStartOperationDate"
                      @focus="focusField('start_operation_date')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name_en,
                      'is-focused': activeField == 'name_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.name_en')
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
                      $t('cruds.branch.fields.name_lc')
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
                      'has-items': entry.salutation,
                      'is-focused': activeField == 'salutation'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.branch.fields.salutation')
                    }}</label>
                    <v-select
                      name="salutation"
                      :key="'salutation-field'"
                      :value="entry.salutation"
                      :options="lists.salutation"
                      :reduce="entry => entry.value"
                      @input="updateSalutation"
                      @search.focus="focusField('salutation')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.branch_manager_en,
                      'is-focused': activeField == 'branch_manager_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.branch_manager_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.branch_manager_en"
                      @input="updateBranchManagerEn"
                      @focus="focusField('branch_manager_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.branch_manager_lc,
                      'is-focused': activeField == 'branch_manager_lc'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.branch_manager_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.branch_manager_lc"
                      @input="updateBranchManagerLc"
                      @focus="focusField('branch_manager_lc')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.office_phone_number,
                      'is-focused': activeField == 'office_phone_number'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.office_phone_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.office_phone_number"
                      @input="updateOfficePhoneNumber"
                      @focus="focusField('office_phone_number')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mobile_phone,
                      'is-focused': activeField == 'mobile_phone'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.mobile_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.mobile_phone"
                      @input="updateMobilePhone"
                      @focus="focusField('mobile_phone')"
                      @blur="clearFocus"
                      required
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
                      $t('cruds.branch.fields.email')
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
                    <label class="bmd-label-floating required">{{
                      $t('cruds.branch.fields.fax')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.fax"
                      @input="updateFax"
                      @focus="focusField('fax')"
                      @blur="clearFocus"
                      required
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
                      $t('cruds.branch.fields.facebook')
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
                      $t('cruds.branch.fields.address_en')
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
                      $t('cruds.branch.fields.address_lc')
                    }}</label>
                    <textarea
                      class="form-control"
                      rows="5"
                      :value="entry.address_lc"
                      @input="updateAddressLc"
                      @focus="focusField('address_lc')"
                      @blur="clearFocus"
                    ></textarea>
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

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('BranchesSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('BranchesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setStartOperationDate',
      'setNameEn',
      'setNameLc',
      'setSalutation',
      'setBranchManagerEn',
      'setBranchManagerLc',
      'setOfficePhoneNumber',
      'setMobilePhone',
      'setEmail',
      'setFax',
      'setFacebook',
      'setAddressEn',
      'setAddressLc'
    ]),
    updateBranch(e) {
      this.setBranch(e.target.value)
    },
    updateStartOperationDate(e) {
      this.setStartOperationDate(e.target.value)
    },
    updateNameEn(e) {
      this.setNameEn(e.target.value)
    },
    updateNameLc(e) {
      this.setNameLc(e.target.value)
    },
    updateSalutation(value) {
      this.setSalutation(value)
    },
    updateBranchManagerEn(e) {
      this.setBranchManagerEn(e.target.value)
    },
    updateBranchManagerLc(e) {
      this.setBranchManagerLc(e.target.value)
    },
    updateOfficePhoneNumber(e) {
      this.setOfficePhoneNumber(e.target.value)
    },
    updateMobilePhone(e) {
      this.setMobilePhone(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateFax(e) {
      this.setFax(e.target.value)
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
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'branches.index' })
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
