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
                <strong>{{ $t('cruds.officer.title_singular') }}</strong>
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
                      $t('cruds.officer.fields.branch')
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
                      'has-items': entry.given_name_en,
                      'is-focused': activeField == 'given_name_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.given_name_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.given_name_en"
                      @input="updateGivenNameEn"
                      @focus="focusField('given_name_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.surname_en,
                      'is-focused': activeField == 'surname_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.surname_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.surname_en"
                      @input="updateSurnameEn"
                      @focus="focusField('surname_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.given_name_lc,
                      'is-focused': activeField == 'given_name_lc'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.given_name_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.given_name_lc"
                      @input="updateGivenNameLc"
                      @focus="focusField('given_name_lc')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.sur_name_en,
                      'is-focused': activeField == 'sur_name_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.sur_name_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.sur_name_en"
                      @input="updateSurNameEn"
                      @focus="focusField('sur_name_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.salutation_id !== null,
                      'is-focused': activeField == 'salutation'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.salutation')
                    }}</label>
                    <v-select
                      name="salutation"
                      label="label"
                      :key="'salutation-field'"
                      :value="entry.salutation_id"
                      :options="lists.salutation"
                      :reduce="entry => entry.id"
                      @input="updateSalutation"
                      @search.focus="focusField('salutation')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.gender,
                      'is-focused': activeField == 'gender'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.gender')
                    }}</label>
                    <v-select
                      name="gender"
                      :key="'gender-field'"
                      :value="entry.gender"
                      :options="lists.gender"
                      :reduce="entry => entry.value"
                      @input="updateGender"
                      @search.focus="focusField('gender')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone_1,
                      'is-focused': activeField == 'phone_1'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.phone_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone_1"
                      @input="updatePhone1"
                      @focus="focusField('phone_1')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone_2,
                      'is-focused': activeField == 'phone_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.phone_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone_2"
                      @input="updatePhone2"
                      @focus="focusField('phone_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.unit_id !== null,
                      'is-focused': activeField == 'unit'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.unit')
                    }}</label>
                    <v-select
                      name="unit"
                      label="label"
                      :key="'unit-field'"
                      :value="entry.unit_id"
                      :options="lists.unit"
                      :reduce="entry => entry.id"
                      @input="updateUnit"
                      @search.focus="focusField('unit')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.department_id !== null,
                      'is-focused': activeField == 'department'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.department')
                    }}</label>
                    <v-select
                      name="department"
                      label="label"
                      :key="'department-field'"
                      :value="entry.department_id"
                      :options="lists.department"
                      :reduce="entry => entry.id"
                      @input="updateDepartment"
                      @search.focus="focusField('department')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.id_card_number,
                      'is-focused': activeField == 'id_card_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.id_card_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.id_card_number"
                      @input="updateIdCardNumber"
                      @focus="focusField('id_card_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.employment_date,
                      'is-focused': activeField == 'employment_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.employment_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.employment_date"
                      @input="updateEmploymentDate"
                      @focus="focusField('employment_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.user_id !== null,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.user')
                    }}</label>
                    <v-select
                      name="user"
                      label="name"
                      :key="'user-field'"
                      :value="entry.user_id"
                      :options="lists.user"
                      :reduce="entry => entry.id"
                      @input="updateUser"
                      @search.focus="focusField('user')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.active,
                      'is-focused': activeField == 'active'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.active')
                    }}</label>
                    <v-select
                      name="active"
                      :key="'active-field'"
                      :value="entry.active"
                      :options="lists.active"
                      :reduce="entry => entry.value"
                      @input="updateActive"
                      @search.focus="focusField('active')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.report_to_id !== null,
                      'is-focused': activeField == 'report_to'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.report_to')
                    }}</label>
                    <v-select
                      name="report_to"
                      label="given_name_en"
                      :key="'report_to-field'"
                      :value="entry.report_to_id"
                      :options="lists.report_to"
                      :reduce="entry => entry.id"
                      @input="updateReportTo"
                      @search.focus="focusField('report_to')"
                      @search.blur="clearFocus"
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

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('OfficersSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('OfficersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setGivenNameEn',
      'setSurnameEn',
      'setGivenNameLc',
      'setSurNameEn',
      'setSalutation',
      'setGender',
      'setPhone1',
      'setPhone2',
      'setUnit',
      'setDepartment',
      'setIdCardNumber',
      'setEmploymentDate',
      'setUser',
      'setActive',
      'setReportTo'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateGivenNameEn(e) {
      this.setGivenNameEn(e.target.value)
    },
    updateSurnameEn(e) {
      this.setSurnameEn(e.target.value)
    },
    updateGivenNameLc(e) {
      this.setGivenNameLc(e.target.value)
    },
    updateSurNameEn(e) {
      this.setSurNameEn(e.target.value)
    },
    updateSalutation(value) {
      this.setSalutation(value)
    },
    updateGender(value) {
      this.setGender(value)
    },
    updatePhone1(e) {
      this.setPhone1(e.target.value)
    },
    updatePhone2(e) {
      this.setPhone2(e.target.value)
    },
    updateUnit(value) {
      this.setUnit(value)
    },
    updateDepartment(value) {
      this.setDepartment(value)
    },
    updateIdCardNumber(e) {
      this.setIdCardNumber(e.target.value)
    },
    updateEmploymentDate(e) {
      this.setEmploymentDate(e.target.value)
    },
    updateUser(value) {
      this.setUser(value)
    },
    updateActive(value) {
      this.setActive(value)
    },
    updateReportTo(value) {
      this.setReportTo(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'officers.index' })
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
