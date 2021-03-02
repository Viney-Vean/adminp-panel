<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
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
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.title"
                      @input="updateTitle"
                      @focus="focusField('title')"
                      @blur="clearFocus"
                      required
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
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.gender"
                      @input="updateGender"
                      @focus="focusField('gender')"
                      @blur="clearFocus"
                      required
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
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.phone_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone_2"
                      @input="updatePhone2"
                      @focus="focusField('phone_2')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.date_employ,
                      'is-focused': activeField == 'date_employ'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.date_employ')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.date_employ"
                      @input="updateDateEmploy"
                      @focus="focusField('date_employ')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.department,
                      'is-focused': activeField == 'department'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.officer.fields.department')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.department"
                      @input="updateDepartment"
                      @focus="focusField('department')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.report_to,
                      'is-focused': activeField == 'report_to'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.officer.fields.report_to')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.report_to"
                      @input="updateReportTo"
                      @focus="focusField('report_to')"
                      @blur="clearFocus"
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
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('OfficersSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setGivenNameEn',
      'setSurnameEn',
      'setGivenNameLc',
      'setSurNameEn',
      'setTitle',
      'setGender',
      'setPhone1',
      'setPhone2',
      'setDateEmploy',
      'setDepartment',
      'setReportTo',
      'setActive',
      'setUser',
      'fetchCreateData'
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
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateGender(e) {
      this.setGender(e.target.value)
    },
    updatePhone1(e) {
      this.setPhone1(e.target.value)
    },
    updatePhone2(e) {
      this.setPhone2(e.target.value)
    },
    updateDateEmploy(e) {
      this.setDateEmploy(e.target.value)
    },
    updateDepartment(e) {
      this.setDepartment(e.target.value)
    },
    updateReportTo(e) {
      this.setReportTo(e.target.value)
    },
    updateActive(value) {
      this.setActive(value)
    },
    updateUser(value) {
      this.setUser(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'officers.index' })
          this.$eventHub.$emit('create-success')
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
