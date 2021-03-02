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
                <strong>{{ $t('cruds.provision.title_singular') }}</strong>
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
                      $t('cruds.provision.fields.branch')
                    }}</label>
                    <v-select
                      name="branch"
                      label="branch"
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
                      'has-items': entry.class,
                      'is-focused': activeField == 'class'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.class')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.class"
                      @input="updateClass"
                      @focus="focusField('class')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.class_title,
                      'is-focused': activeField == 'class_title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.class_title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.class_title"
                      @input="updateClassTitle"
                      @focus="focusField('class_title')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.overdue_from,
                      'is-focused': activeField == 'overdue_from'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.overdue_from')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.overdue_from"
                      @input="updateOverdueFrom"
                      @focus="focusField('overdue_from')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.overdue_to,
                      'is-focused': activeField == 'overdue_to'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.overdue_to')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.overdue_to"
                      @input="updateOverdueTo"
                      @focus="focusField('overdue_to')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contract_type,
                      'is-focused': activeField == 'contract_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.contract_type')
                    }}</label>
                    <v-select
                      name="contract_type"
                      :key="'contract_type-field'"
                      :value="entry.contract_type"
                      :options="lists.contract_type"
                      :reduce="entry => entry.value"
                      @input="updateContractType"
                      @search.focus="focusField('contract_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.more_than_one_year,
                      'is-focused': activeField == 'more_than_one_year'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.more_than_one_year')
                    }}</label>
                    <v-select
                      name="more_than_one_year"
                      :key="'more_than_one_year-field'"
                      :value="entry.more_than_one_year"
                      :options="lists.more_than_one_year"
                      :reduce="entry => entry.value"
                      @input="updateMoreThanOneYear"
                      @search.focus="focusField('more_than_one_year')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_income_recognition,
                      'is-focused': activeField == 'interest_income_recognition'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.provision.fields.interest_income_recognition')
                    }}</label>
                    <v-select
                      name="interest_income_recognition"
                      :key="'interest_income_recognition-field'"
                      :value="entry.interest_income_recognition"
                      :options="lists.interest_income_recognition"
                      :reduce="entry => entry.value"
                      @input="updateInterestIncomeRecognition"
                      @search.focus="focusField('interest_income_recognition')"
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
    ...mapGetters('ProvisionsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ProvisionsSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setClass',
      'setClassTitle',
      'setOverdueFrom',
      'setOverdueTo',
      'setContractType',
      'setMoreThanOneYear',
      'setInterestIncomeRecognition',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateClass(e) {
      this.setClass(e.target.value)
    },
    updateClassTitle(e) {
      this.setClassTitle(e.target.value)
    },
    updateOverdueFrom(e) {
      this.setOverdueFrom(e.target.value)
    },
    updateOverdueTo(e) {
      this.setOverdueTo(e.target.value)
    },
    updateContractType(value) {
      this.setContractType(value)
    },
    updateMoreThanOneYear(value) {
      this.setMoreThanOneYear(value)
    },
    updateInterestIncomeRecognition(value) {
      this.setInterestIncomeRecognition(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'provisions.index' })
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
