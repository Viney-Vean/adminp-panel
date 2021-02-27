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
                <strong>{{
                  $t('cruds.loanProductProvision.title_singular')
                }}</strong>
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
                      $t('cruds.loanProductProvision.fields.branch')
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
                      'has-items': entry.product_id !== null,
                      'is-focused': activeField == 'product'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.product')
                    }}</label>
                    <v-select
                      name="product"
                      label="description"
                      :key="'product-field'"
                      :value="entry.product_id"
                      :options="lists.product"
                      :reduce="entry => entry.id"
                      @input="updateProduct"
                      @search.focus="focusField('product')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.class_id !== null,
                      'is-focused': activeField == 'class'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.class')
                    }}</label>
                    <v-select
                      name="class"
                      label="class_title"
                      :key="'class-field'"
                      :value="entry.class_id"
                      :options="lists.class"
                      :reduce="entry => entry.id"
                      @input="updateClass"
                      @search.focus="focusField('class')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.outstanding_coa_id !== null,
                      'is-focused': activeField == 'outstanding_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.outstanding_coa')
                    }}</label>
                    <v-select
                      name="outstanding_coa"
                      label="account_title"
                      :key="'outstanding_coa-field'"
                      :value="entry.outstanding_coa_id"
                      :options="lists.outstanding_coa"
                      :reduce="entry => entry.id"
                      @input="updateOutstandingCoa"
                      @search.focus="focusField('outstanding_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.air_coa_id !== null,
                      'is-focused': activeField == 'air_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.air_coa')
                    }}</label>
                    <v-select
                      name="air_coa"
                      label="account_title"
                      :key="'air_coa-field'"
                      :value="entry.air_coa_id"
                      :options="lists.air_coa"
                      :reduce="entry => entry.id"
                      @input="updateAirCoa"
                      @search.focus="focusField('air_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.int_income_coa_id !== null,
                      'is-focused': activeField == 'int_income_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.int_income_coa')
                    }}</label>
                    <v-select
                      name="int_income_coa"
                      label="account_title"
                      :key="'int_income_coa-field'"
                      :value="entry.int_income_coa_id"
                      :options="lists.int_income_coa"
                      :reduce="entry => entry.id"
                      @input="updateIntIncomeCoa"
                      @search.focus="focusField('int_income_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_in_suspend_coa_id !== null,
                      'is-focused': activeField == 'interest_in_suspend_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t(
                        'cruds.loanProductProvision.fields.interest_in_suspend_coa'
                      )
                    }}</label>
                    <v-select
                      name="interest_in_suspend_coa"
                      label="account_title"
                      :key="'interest_in_suspend_coa-field'"
                      :value="entry.interest_in_suspend_coa_id"
                      :options="lists.interest_in_suspend_coa"
                      :reduce="entry => entry.id"
                      @input="updateInterestInSuspendCoa"
                      @search.focus="focusField('interest_in_suspend_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.provision_expense_coa_id !== null,
                      'is-focused': activeField == 'provision_expense_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t(
                        'cruds.loanProductProvision.fields.provision_expense_coa'
                      )
                    }}</label>
                    <v-select
                      name="provision_expense_coa"
                      label="account_title"
                      :key="'provision_expense_coa-field'"
                      :value="entry.provision_expense_coa_id"
                      :options="lists.provision_expense_coa"
                      :reduce="entry => entry.id"
                      @input="updateProvisionExpenseCoa"
                      @search.focus="focusField('provision_expense_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.provision_reserve_coa_id !== null,
                      'is-focused': activeField == 'provision_reserve_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t(
                        'cruds.loanProductProvision.fields.provision_reserve_coa'
                      )
                    }}</label>
                    <v-select
                      name="provision_reserve_coa"
                      label="account_title"
                      :key="'provision_reserve_coa-field'"
                      :value="entry.provision_reserve_coa_id"
                      :options="lists.provision_reserve_coa"
                      :reduce="entry => entry.id"
                      @input="updateProvisionReserveCoa"
                      @search.focus="focusField('provision_reserve_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_coa_id !== null,
                      'is-focused': activeField == 'penalty_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.penalty_coa')
                    }}</label>
                    <v-select
                      name="penalty_coa"
                      label="account_title"
                      :key="'penalty_coa-field'"
                      :value="entry.penalty_coa_id"
                      :options="lists.penalty_coa"
                      :reduce="entry => entry.id"
                      @input="updatePenaltyCoa"
                      @search.focus="focusField('penalty_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.income_charge_coa_id !== null,
                      'is-focused': activeField == 'income_charge_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.income_charge_coa')
                    }}</label>
                    <v-select
                      name="income_charge_coa"
                      label="account_title"
                      :key="'income_charge_coa-field'"
                      :value="entry.income_charge_coa_id"
                      :options="lists.income_charge_coa"
                      :reduce="entry => entry.id"
                      @input="updateIncomeChargeCoa"
                      @search.focus="focusField('income_charge_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.in_suspend_charge_coa_id !== null,
                      'is-focused': activeField == 'in_suspend_charge_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t(
                        'cruds.loanProductProvision.fields.in_suspend_charge_coa'
                      )
                    }}</label>
                    <v-select
                      name="in_suspend_charge_coa"
                      label="account_title"
                      :key="'in_suspend_charge_coa-field'"
                      :value="entry.in_suspend_charge_coa_id"
                      :options="lists.in_suspend_charge_coa"
                      :reduce="entry => entry.id"
                      @input="updateInSuspendChargeCoa"
                      @search.focus="focusField('in_suspend_charge_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.charge_receivable_coa_id !== null,
                      'is-focused': activeField == 'charge_receivable_coa'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t(
                        'cruds.loanProductProvision.fields.charge_receivable_coa'
                      )
                    }}</label>
                    <v-select
                      name="charge_receivable_coa"
                      label="account_title"
                      :key="'charge_receivable_coa-field'"
                      :value="entry.charge_receivable_coa_id"
                      :options="lists.charge_receivable_coa"
                      :reduce="entry => entry.id"
                      @input="updateChargeReceivableCoa"
                      @search.focus="focusField('charge_receivable_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.provision_booking,
                      'is-focused': activeField == 'provision_booking'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.provision_booking')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.provision_booking"
                      @input="updateProvisionBooking"
                      @focus="focusField('provision_booking')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.more_than_one_year,
                      'is-focused': activeField == 'more_than_one_year'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.loanProductProvision.fields.more_than_one_year')
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
                    <label class="bmd-label-floating required">{{
                      $t(
                        'cruds.loanProductProvision.fields.interest_income_recognition'
                      )
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
    ...mapGetters('LoanProductProvisionsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('LoanProductProvisionsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setProduct',
      'setClass',
      'setOutstandingCoa',
      'setAirCoa',
      'setIntIncomeCoa',
      'setInterestInSuspendCoa',
      'setProvisionExpenseCoa',
      'setProvisionReserveCoa',
      'setPenaltyCoa',
      'setIncomeChargeCoa',
      'setInSuspendChargeCoa',
      'setChargeReceivableCoa',
      'setProvisionBooking',
      'setMoreThanOneYear',
      'setInterestIncomeRecognition'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateProduct(value) {
      this.setProduct(value)
    },
    updateClass(value) {
      this.setClass(value)
    },
    updateOutstandingCoa(value) {
      this.setOutstandingCoa(value)
    },
    updateAirCoa(value) {
      this.setAirCoa(value)
    },
    updateIntIncomeCoa(value) {
      this.setIntIncomeCoa(value)
    },
    updateInterestInSuspendCoa(value) {
      this.setInterestInSuspendCoa(value)
    },
    updateProvisionExpenseCoa(value) {
      this.setProvisionExpenseCoa(value)
    },
    updateProvisionReserveCoa(value) {
      this.setProvisionReserveCoa(value)
    },
    updatePenaltyCoa(value) {
      this.setPenaltyCoa(value)
    },
    updateIncomeChargeCoa(value) {
      this.setIncomeChargeCoa(value)
    },
    updateInSuspendChargeCoa(value) {
      this.setInSuspendChargeCoa(value)
    },
    updateChargeReceivableCoa(value) {
      this.setChargeReceivableCoa(value)
    },
    updateProvisionBooking(e) {
      this.setProvisionBooking(e.target.value)
    },
    updateMoreThanOneYear(value) {
      this.setMoreThanOneYear(value)
    },
    updateInterestIncomeRecognition(value) {
      this.setInterestIncomeRecognition(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'loan_product_provisions.index' })
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
