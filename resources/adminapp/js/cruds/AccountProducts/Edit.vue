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
                <strong>{{ $t('cruds.accountProduct.title_singular') }}</strong>
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
                      $t('cruds.accountProduct.fields.branch')
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
                      'has-items': entry.account_product_title,
                      'is-focused': activeField == 'account_product_title'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.accountProduct.fields.account_product_title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.account_product_title"
                      @input="updateAccountProductTitle"
                      @focus="focusField('account_product_title')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.chart_of_account_id !== null,
                      'is-focused': activeField == 'chart_of_account'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.chart_of_account')
                    }}</label>
                    <v-select
                      name="chart_of_account"
                      label="account_title"
                      :key="'chart_of_account-field'"
                      :value="entry.chart_of_account_id"
                      :options="lists.chart_of_account"
                      :reduce="entry => entry.id"
                      @input="updateChartOfAccount"
                      @search.focus="focusField('chart_of_account')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.currency,
                      'is-focused': activeField == 'currency'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.currency')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.currency"
                      @input="updateCurrency"
                      @focus="focusField('currency')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.account_product_type_id !== null,
                      'is-focused': activeField == 'account_product_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.account_product_type')
                    }}</label>
                    <v-select
                      name="account_product_type"
                      label="description"
                      :key="'account_product_type-field'"
                      :value="entry.account_product_type_id"
                      :options="lists.account_product_type"
                      :reduce="entry => entry.id"
                      @input="updateAccountProductType"
                      @search.focus="focusField('account_product_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.account_type_id !== null,
                      'is-focused': activeField == 'account_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.account_type')
                    }}</label>
                    <v-select
                      name="account_type"
                      label="description"
                      :key="'account_type-field'"
                      :value="entry.account_type_id"
                      :options="lists.account_type"
                      :reduce="entry => entry.id"
                      @input="updateAccountType"
                      @search.focus="focusField('account_type')"
                      @search.blur="clearFocus"
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
                      $t('cruds.accountProduct.fields.interest_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_rate"
                      @input="updateInterestRate"
                      @focus="focusField('interest_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.charged_rate,
                      'is-focused': activeField == 'charged_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.charged_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.charged_rate"
                      @input="updateChargedRate"
                      @focus="focusField('charged_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tax_rate,
                      'is-focused': activeField == 'tax_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.tax_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.tax_rate"
                      @input="updateTaxRate"
                      @focus="focusField('tax_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.balance_define,
                      'is-focused': activeField == 'balance_define'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.balance_define')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.balance_define"
                      @input="updateBalanceDefine"
                      @focus="focusField('balance_define')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_day_basis,
                      'is-focused': activeField == 'interest_day_basis'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_day_basis')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_day_basis"
                      @input="updateInterestDayBasis"
                      @focus="focusField('interest_day_basis')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_accrual_basis,
                      'is-focused': activeField == 'interest_accrual_basis'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_accrual_basis')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_accrual_basis"
                      @input="updateInterestAccrualBasis"
                      @focus="focusField('interest_accrual_basis')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_capitalization,
                      'is-focused': activeField == 'interest_capitalization'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_capitalization')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_capitalization"
                      @input="updateInterestCapitalization"
                      @focus="focusField('interest_capitalization')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.dormant_day,
                      'is-focused': activeField == 'dormant_day'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.dormant_day')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.dormant_day"
                      @input="updateDormantDay"
                      @focus="focusField('dormant_day')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_expense_coa,
                      'is-focused': activeField == 'interest_expense_coa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_expense_coa')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.interest_expense_coa"
                      @input="updateInterestExpenseCoa"
                      @focus="focusField('interest_expense_coa')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_payable_coa,
                      'is-focused': activeField == 'interest_payable_coa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_payable_coa')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.interest_payable_coa"
                      @input="updateInterestPayableCoa"
                      @focus="focusField('interest_payable_coa')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_income_coa,
                      'is-focused': activeField == 'interest_income_coa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_income_coa')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.interest_income_coa"
                      @input="updateInterestIncomeCoa"
                      @focus="focusField('interest_income_coa')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_receivable_coa,
                      'is-focused': activeField == 'interest_receivable_coa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.accountProduct.fields.interest_receivable_coa')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.interest_receivable_coa"
                      @input="updateInterestReceivableCoa"
                      @focus="focusField('interest_receivable_coa')"
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
    ...mapGetters('AccountProductsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('AccountProductsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setAccountProductTitle',
      'setChartOfAccount',
      'setCurrency',
      'setAccountProductType',
      'setAccountType',
      'setInterestRate',
      'setChargedRate',
      'setTaxRate',
      'setBalanceDefine',
      'setInterestDayBasis',
      'setInterestAccrualBasis',
      'setInterestCapitalization',
      'setDormantDay',
      'setInterestExpenseCoa',
      'setInterestPayableCoa',
      'setInterestIncomeCoa',
      'setInterestReceivableCoa'
    ]),
    updateBranch(e) {
      this.setBranch(e.target.value)
    },
    updateAccountProductTitle(e) {
      this.setAccountProductTitle(e.target.value)
    },
    updateChartOfAccount(value) {
      this.setChartOfAccount(value)
    },
    updateCurrency(e) {
      this.setCurrency(e.target.value)
    },
    updateAccountProductType(value) {
      this.setAccountProductType(value)
    },
    updateAccountType(value) {
      this.setAccountType(value)
    },
    updateInterestRate(e) {
      this.setInterestRate(e.target.value)
    },
    updateChargedRate(e) {
      this.setChargedRate(e.target.value)
    },
    updateTaxRate(e) {
      this.setTaxRate(e.target.value)
    },
    updateBalanceDefine(e) {
      this.setBalanceDefine(e.target.value)
    },
    updateInterestDayBasis(e) {
      this.setInterestDayBasis(e.target.value)
    },
    updateInterestAccrualBasis(e) {
      this.setInterestAccrualBasis(e.target.value)
    },
    updateInterestCapitalization(e) {
      this.setInterestCapitalization(e.target.value)
    },
    updateDormantDay(e) {
      this.setDormantDay(e.target.value)
    },
    updateInterestExpenseCoa(e) {
      this.setInterestExpenseCoa(e.target.value)
    },
    updateInterestPayableCoa(e) {
      this.setInterestPayableCoa(e.target.value)
    },
    updateInterestIncomeCoa(e) {
      this.setInterestIncomeCoa(e.target.value)
    },
    updateInterestReceivableCoa(e) {
      this.setInterestReceivableCoa(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'account_products.index' })
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
