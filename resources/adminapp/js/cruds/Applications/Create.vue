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
                <strong>{{ $t('cruds.application.title_singular') }}</strong>
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
                      $t('cruds.application.fields.branch')
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
                      'has-items': entry.customer_id !== null,
                      'is-focused': activeField == 'customer'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.application.fields.customer')
                    }}</label>
                    <v-select
                      name="customer"
                      label="customer_name"
                      :key="'customer-field'"
                      :value="entry.customer_id"
                      :options="lists.customer"
                      :reduce="entry => entry.id"
                      @input="updateCustomer"
                      @search.focus="focusField('customer')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.code,
                      'is-focused': activeField == 'code'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.application.fields.code')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.code"
                      @input="updateCode"
                      @focus="focusField('code')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.application_date,
                      'is-focused': activeField == 'application_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.application_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.application_date"
                      @input="updateApplicationDate"
                      @focus="focusField('application_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.currency_id !== null,
                      'is-focused': activeField == 'currency'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.application.fields.currency')
                    }}</label>
                    <v-select
                      name="currency"
                      label="description"
                      :key="'currency-field'"
                      :value="entry.currency_id"
                      :options="lists.currency"
                      :reduce="entry => entry.id"
                      @input="updateCurrency"
                      @search.focus="focusField('currency')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.loan_product_id !== null,
                      'is-focused': activeField == 'loan_product'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.loan_product')
                    }}</label>
                    <v-select
                      name="loan_product"
                      label="description"
                      :key="'loan_product-field'"
                      :value="entry.loan_product_id"
                      :options="lists.loan_product"
                      :reduce="entry => entry.id"
                      @input="updateLoanProduct"
                      @search.focus="focusField('loan_product')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.apply_amount,
                      'is-focused': activeField == 'apply_amount'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.application.fields.apply_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.apply_amount"
                      @input="updateApplyAmount"
                      @focus="focusField('apply_amount')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.approve_amount,
                      'is-focused': activeField == 'approve_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.approve_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.approve_amount"
                      @input="updateApproveAmount"
                      @focus="focusField('approve_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.repayment_method,
                      'is-focused': activeField == 'repayment_method'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.repayment_method')
                    }}</label>
                    <v-select
                      name="repayment_method"
                      :key="'repayment_method-field'"
                      :value="entry.repayment_method"
                      :options="lists.repayment_method"
                      :reduce="entry => entry.value"
                      @input="updateRepaymentMethod"
                      @search.focus="focusField('repayment_method')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.repayment_frequency,
                      'is-focused': activeField == 'repayment_frequency'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.repayment_frequency')
                    }}</label>
                    <v-select
                      name="repayment_frequency"
                      :key="'repayment_frequency-field'"
                      :value="entry.repayment_frequency"
                      :options="lists.repayment_frequency"
                      :reduce="entry => entry.value"
                      @input="updateRepaymentFrequency"
                      @search.focus="focusField('repayment_frequency')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.frequency,
                      'is-focused': activeField == 'frequency'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.frequency')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.frequency"
                      @input="updateFrequency"
                      @focus="focusField('frequency')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.term,
                      'is-focused': activeField == 'term'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.term')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.term"
                      @input="updateTerm"
                      @focus="focusField('term')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.installment,
                      'is-focused': activeField == 'installment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.installment')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.installment"
                      @input="updateInstallment"
                      @focus="focusField('installment')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_rate,
                      'is-focused': activeField == 'interest_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.application.fields.interest_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.interest_rate"
                      @input="updateInterestRate"
                      @focus="focusField('interest_rate')"
                      @blur="clearFocus"
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
    ...mapGetters('ApplicationsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ApplicationsSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setCustomer',
      'setCode',
      'setApplicationDate',
      'setCurrency',
      'setLoanProduct',
      'setApplyAmount',
      'setApproveAmount',
      'setRepaymentMethod',
      'setRepaymentFrequency',
      'setFrequency',
      'setTerm',
      'setInstallment',
      'setInterestRate',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateCustomer(value) {
      this.setCustomer(value)
    },
    updateCode(e) {
      this.setCode(e.target.value)
    },
    updateApplicationDate(e) {
      this.setApplicationDate(e.target.value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updateLoanProduct(value) {
      this.setLoanProduct(value)
    },
    updateApplyAmount(e) {
      this.setApplyAmount(e.target.value)
    },
    updateApproveAmount(e) {
      this.setApproveAmount(e.target.value)
    },
    updateRepaymentMethod(value) {
      this.setRepaymentMethod(value)
    },
    updateRepaymentFrequency(value) {
      this.setRepaymentFrequency(value)
    },
    updateFrequency(e) {
      this.setFrequency(e.target.value)
    },
    updateTerm(e) {
      this.setTerm(e.target.value)
    },
    updateInstallment(e) {
      this.setInstallment(e.target.value)
    },
    updateInterestRate(e) {
      this.setInterestRate(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'applications.index' })
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
