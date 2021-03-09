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
                <strong>{{ $t('cruds.loanProduct.title_singular') }}</strong>
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
                      $t('cruds.loanProduct.fields.branch')
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
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.description')
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
                      'has-items': entry.currency_id !== null,
                      'is-focused': activeField == 'currency'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.currency')
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
                      'has-items': entry.repayment_method,
                      'is-focused': activeField == 'repayment_method'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.repayment_method')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.repayment_method"
                      @input="updateRepaymentMethod"
                      @focus="focusField('repayment_method')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.day_basis_top_side,
                      'is-focused': activeField == 'day_basis_top_side'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.day_basis_top_side')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.day_basis_top_side"
                      @input="updateDayBasisTopSide"
                      @focus="focusField('day_basis_top_side')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.day_basis_down_side,
                      'is-focused': activeField == 'day_basis_down_side'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.day_basis_down_side')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.day_basis_down_side"
                      @input="updateDayBasisDownSide"
                      @focus="focusField('day_basis_down_side')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minimum_age,
                      'is-focused': activeField == 'minimum_age'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.minimum_age')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.minimum_age"
                      @input="updateMinimumAge"
                      @focus="focusField('minimum_age')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.maximum_age,
                      'is-focused': activeField == 'maximum_age'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.maximum_age')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.maximum_age"
                      @input="updateMaximumAge"
                      @focus="focusField('maximum_age')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.min_interest_rate,
                      'is-focused': activeField == 'min_interest_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.min_interest_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.min_interest_rate"
                      @input="updateMinInterestRate"
                      @focus="focusField('min_interest_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.max_interest_rate,
                      'is-focused': activeField == 'max_interest_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.max_interest_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.max_interest_rate"
                      @input="updateMaxInterestRate"
                      @focus="focusField('max_interest_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minimum_amount,
                      'is-focused': activeField == 'minimum_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.minimum_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.minimum_amount"
                      @input="updateMinimumAmount"
                      @focus="focusField('minimum_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.maximum_amount,
                      'is-focused': activeField == 'maximum_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.maximum_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.maximum_amount"
                      @input="updateMaximumAmount"
                      @focus="focusField('maximum_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minimum_term_monthly,
                      'is-focused': activeField == 'minimum_term_monthly'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.minimum_term_monthly')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.minimum_term_monthly"
                      @input="updateMinimumTermMonthly"
                      @focus="focusField('minimum_term_monthly')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.maximum_term_monthly,
                      'is-focused': activeField == 'maximum_term_monthly'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.maximum_term_monthly')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.maximum_term_monthly"
                      @input="updateMaximumTermMonthly"
                      @focus="focusField('maximum_term_monthly')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minimum_term_weekly,
                      'is-focused': activeField == 'minimum_term_weekly'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.minimum_term_weekly')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.minimum_term_weekly"
                      @input="updateMinimumTermWeekly"
                      @focus="focusField('minimum_term_weekly')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.maximum_term_weekly,
                      'is-focused': activeField == 'maximum_term_weekly'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.maximum_term_weekly')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.maximum_term_weekly"
                      @input="updateMaximumTermWeekly"
                      @focus="focusField('maximum_term_weekly')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minimum_term_daily,
                      'is-focused': activeField == 'minimum_term_daily'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.minimum_term_daily')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.minimum_term_daily"
                      @input="updateMinimumTermDaily"
                      @focus="focusField('minimum_term_daily')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.maximum_term_daily,
                      'is-focused': activeField == 'maximum_term_daily'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.maximum_term_daily')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.maximum_term_daily"
                      @input="updateMaximumTermDaily"
                      @focus="focusField('maximum_term_daily')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.reduce_base_on,
                      'is-focused': activeField == 'reduce_base_on'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.reduce_base_on')
                    }}</label>
                    <v-select
                      name="reduce_base_on"
                      :key="'reduce_base_on-field'"
                      :value="entry.reduce_base_on"
                      :options="lists.reduce_base_on"
                      :reduce="entry => entry.value"
                      @input="updateReduceBaseOn"
                      @search.focus="focusField('reduce_base_on')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.max_reduce_percentage,
                      'is-focused': activeField == 'max_reduce_percentage'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.max_reduce_percentage')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.max_reduce_percentage"
                      @input="updateMaxReducePercentage"
                      @focus="focusField('max_reduce_percentage')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_reduction_base_on,
                      'is-focused': activeField == 'penalty_reduction_base_on'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.penalty_reduction_base_on')
                    }}</label>
                    <v-select
                      name="penalty_reduction_base_on"
                      :key="'penalty_reduction_base_on-field'"
                      :value="entry.penalty_reduction_base_on"
                      :options="lists.penalty_reduction_base_on"
                      :reduce="entry => entry.value"
                      @input="updatePenaltyReductionBaseOn"
                      @search.focus="focusField('penalty_reduction_base_on')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.max_penalty_reduce_percentage,
                      'is-focused':
                        activeField == 'max_penalty_reduce_percentage'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.loanProduct.fields.max_penalty_reduce_percentage'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.max_penalty_reduce_percentage"
                      @input="updateMaxPenaltyReducePercentage"
                      @focus="focusField('max_penalty_reduce_percentage')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_base_on,
                      'is-focused': activeField == 'admin_fee_base_on'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.admin_fee_base_on')
                    }}</label>
                    <v-select
                      name="admin_fee_base_on"
                      :key="'admin_fee_base_on-field'"
                      :value="entry.admin_fee_base_on"
                      :options="lists.admin_fee_base_on"
                      :reduce="entry => entry.value"
                      @input="updateAdminFeeBaseOn"
                      @search.focus="focusField('admin_fee_base_on')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_amount,
                      'is-focused': activeField == 'admin_fee_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.admin_fee_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.admin_fee_amount"
                      @input="updateAdminFeeAmount"
                      @focus="focusField('admin_fee_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_accrual,
                      'is-focused': activeField == 'admin_fee_accrual'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.admin_fee_accrual')
                    }}</label>
                    <v-select
                      name="admin_fee_accrual"
                      :key="'admin_fee_accrual-field'"
                      :value="entry.admin_fee_accrual"
                      :options="lists.admin_fee_accrual"
                      :reduce="entry => entry.value"
                      @input="updateAdminFeeAccrual"
                      @search.focus="focusField('admin_fee_accrual')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.regular_fee_base_on,
                      'is-focused': activeField == 'regular_fee_base_on'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.regular_fee_base_on')
                    }}</label>
                    <v-select
                      name="regular_fee_base_on"
                      :key="'regular_fee_base_on-field'"
                      :value="entry.regular_fee_base_on"
                      :options="lists.regular_fee_base_on"
                      :reduce="entry => entry.value"
                      @input="updateRegularFeeBaseOn"
                      @search.focus="focusField('regular_fee_base_on')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.regular_fee_amount,
                      'is-focused': activeField == 'regular_fee_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.regular_fee_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.regular_fee_amount"
                      @input="updateRegularFeeAmount"
                      @focus="focusField('regular_fee_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.regular_fee_accual,
                      'is-focused': activeField == 'regular_fee_accual'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.regular_fee_accual')
                    }}</label>
                    <v-select
                      name="regular_fee_accual"
                      :key="'regular_fee_accual-field'"
                      :value="entry.regular_fee_accual"
                      :options="lists.regular_fee_accual"
                      :reduce="entry => entry.value"
                      @input="updateRegularFeeAccual"
                      @search.focus="focusField('regular_fee_accual')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.fee_earn_coa_id !== null,
                      'is-focused': activeField == 'fee_earn_coa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.fee_earn_coa')
                    }}</label>
                    <v-select
                      name="fee_earn_coa"
                      label="account_title"
                      :key="'fee_earn_coa-field'"
                      :value="entry.fee_earn_coa_id"
                      :options="lists.fee_earn_coa"
                      :reduce="entry => entry.id"
                      @input="updateFeeEarnCoa"
                      @search.focus="focusField('fee_earn_coa')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.fee_unearn_coa_id !== null,
                      'is-focused': activeField == 'fee_unearn_coa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.loanProduct.fields.fee_unearn_coa')
                    }}</label>
                    <v-select
                      name="fee_unearn_coa"
                      label="account_title"
                      :key="'fee_unearn_coa-field'"
                      :value="entry.fee_unearn_coa_id"
                      :options="lists.fee_unearn_coa"
                      :reduce="entry => entry.id"
                      @input="updateFeeUnearnCoa"
                      @search.focus="focusField('fee_unearn_coa')"
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
    ...mapGetters('LoanProductsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('LoanProductsSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setDescription',
      'setCurrency',
      'setRepaymentMethod',
      'setDayBasisTopSide',
      'setDayBasisDownSide',
      'setMinimumAge',
      'setMaximumAge',
      'setMinInterestRate',
      'setMaxInterestRate',
      'setMinimumAmount',
      'setMaximumAmount',
      'setMinimumTermMonthly',
      'setMaximumTermMonthly',
      'setMinimumTermWeekly',
      'setMaximumTermWeekly',
      'setMinimumTermDaily',
      'setMaximumTermDaily',
      'setReduceBaseOn',
      'setMaxReducePercentage',
      'setPenaltyReductionBaseOn',
      'setMaxPenaltyReducePercentage',
      'setAdminFeeBaseOn',
      'setAdminFeeAmount',
      'setAdminFeeAccrual',
      'setRegularFeeBaseOn',
      'setRegularFeeAmount',
      'setRegularFeeAccual',
      'setFeeEarnCoa',
      'setFeeUnearnCoa',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updateRepaymentMethod(e) {
      this.setRepaymentMethod(e.target.value)
    },
    updateDayBasisTopSide(e) {
      this.setDayBasisTopSide(e.target.value)
    },
    updateDayBasisDownSide(e) {
      this.setDayBasisDownSide(e.target.value)
    },
    updateMinimumAge(e) {
      this.setMinimumAge(e.target.value)
    },
    updateMaximumAge(e) {
      this.setMaximumAge(e.target.value)
    },
    updateMinInterestRate(e) {
      this.setMinInterestRate(e.target.value)
    },
    updateMaxInterestRate(e) {
      this.setMaxInterestRate(e.target.value)
    },
    updateMinimumAmount(e) {
      this.setMinimumAmount(e.target.value)
    },
    updateMaximumAmount(e) {
      this.setMaximumAmount(e.target.value)
    },
    updateMinimumTermMonthly(e) {
      this.setMinimumTermMonthly(e.target.value)
    },
    updateMaximumTermMonthly(e) {
      this.setMaximumTermMonthly(e.target.value)
    },
    updateMinimumTermWeekly(e) {
      this.setMinimumTermWeekly(e.target.value)
    },
    updateMaximumTermWeekly(e) {
      this.setMaximumTermWeekly(e.target.value)
    },
    updateMinimumTermDaily(e) {
      this.setMinimumTermDaily(e.target.value)
    },
    updateMaximumTermDaily(e) {
      this.setMaximumTermDaily(e.target.value)
    },
    updateReduceBaseOn(value) {
      this.setReduceBaseOn(value)
    },
    updateMaxReducePercentage(e) {
      this.setMaxReducePercentage(e.target.value)
    },
    updatePenaltyReductionBaseOn(value) {
      this.setPenaltyReductionBaseOn(value)
    },
    updateMaxPenaltyReducePercentage(e) {
      this.setMaxPenaltyReducePercentage(e.target.value)
    },
    updateAdminFeeBaseOn(value) {
      this.setAdminFeeBaseOn(value)
    },
    updateAdminFeeAmount(e) {
      this.setAdminFeeAmount(e.target.value)
    },
    updateAdminFeeAccrual(value) {
      this.setAdminFeeAccrual(value)
    },
    updateRegularFeeBaseOn(value) {
      this.setRegularFeeBaseOn(value)
    },
    updateRegularFeeAmount(e) {
      this.setRegularFeeAmount(e.target.value)
    },
    updateRegularFeeAccual(value) {
      this.setRegularFeeAccual(value)
    },
    updateFeeEarnCoa(value) {
      this.setFeeEarnCoa(value)
    },
    updateFeeUnearnCoa(value) {
      this.setFeeUnearnCoa(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'loan_products.index' })
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
