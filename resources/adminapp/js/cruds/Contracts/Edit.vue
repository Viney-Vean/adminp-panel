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
                <strong>{{ $t('cruds.contract.title_singular') }}</strong>
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
                      $t('cruds.contract.fields.branch')
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
                      'has-items': entry.code,
                      'is-focused': activeField == 'code'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.code')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.code"
                      @input="updateCode"
                      @focus="focusField('code')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.application_id !== null,
                      'is-focused': activeField == 'application'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.application')
                    }}</label>
                    <v-select
                      name="application"
                      label="code"
                      :key="'application-field'"
                      :value="entry.application_id"
                      :options="lists.application"
                      :reduce="entry => entry.id"
                      @input="updateApplication"
                      @search.focus="focusField('application')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.dd_account_id !== null,
                      'is-focused': activeField == 'dd_account'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.dd_account')
                    }}</label>
                    <v-select
                      name="dd_account"
                      label="account_name"
                      :key="'dd_account-field'"
                      :value="entry.dd_account_id"
                      :options="lists.dd_account"
                      :reduce="entry => entry.id"
                      @input="updateDdAccount"
                      @search.focus="focusField('dd_account')"
                      @search.blur="clearFocus"
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
                      $t('cruds.contract.fields.currency')
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
                      $t('cruds.contract.fields.loan_product')
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
                      'has-items': entry.approve_amount,
                      'is-focused': activeField == 'approve_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.approve_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.approve_amount"
                      @input="updateApproveAmount"
                      @focus="focusField('approve_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.disburse_amount,
                      'is-focused': activeField == 'disburse_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.disburse_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.disburse_amount"
                      @input="updateDisburseAmount"
                      @focus="focusField('disburse_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.outstanding,
                      'is-focused': activeField == 'outstanding'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.outstanding')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.outstanding"
                      @input="updateOutstanding"
                      @focus="focusField('outstanding')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.balance,
                      'is-focused': activeField == 'balance'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.balance')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.balance"
                      @input="updateBalance"
                      @focus="focusField('balance')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.transaction_date,
                      'is-focused': activeField == 'transaction_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.transaction_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.transaction_date"
                      @input="updateTransactionDate"
                      @focus="focusField('transaction_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.maturity_date,
                      'is-focused': activeField == 'maturity_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.maturity_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.maturity_date"
                      @input="updateMaturityDate"
                      @focus="focusField('maturity_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_rate,
                      'is-focused': activeField == 'interest_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.interest_rate')
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
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.repayment_method,
                      'is-focused': activeField == 'repayment_method'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.repayment_method')
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
                      $t('cruds.contract.fields.repayment_frequency')
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
                      $t('cruds.contract.fields.frequency')
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
                      $t('cruds.contract.fields.term')
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
                      $t('cruds.contract.fields.installment')
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
                      'has-items': entry.first_collection_date,
                      'is-focused': activeField == 'first_collection_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.first_collection_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.first_collection_date"
                      @input="updateFirstCollectionDate"
                      @focus="focusField('first_collection_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contract_type,
                      'is-focused': activeField == 'contract_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.contract_type')
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
                      $t('cruds.contract.fields.more_than_one_year')
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
                      'has-items': entry.provision_class_id !== null,
                      'is-focused': activeField == 'provision_class'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.provision_class')
                    }}</label>
                    <v-select
                      name="provision_class"
                      label="class"
                      :key="'provision_class-field'"
                      :value="entry.provision_class_id"
                      :options="lists.provision_class"
                      :reduce="entry => entry.id"
                      @input="updateProvisionClass"
                      @search.focus="focusField('provision_class')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.officer_id !== null,
                      'is-focused': activeField == 'officer'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.officer')
                    }}</label>
                    <v-select
                      name="officer"
                      label="given_name_en"
                      :key="'officer-field'"
                      :value="entry.officer_id"
                      :options="lists.officer"
                      :reduce="entry => entry.id"
                      @input="updateOfficer"
                      @search.focus="focusField('officer')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_interest,
                      'is-focused': activeField == 'total_interest'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.total_interest')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.total_interest"
                      @input="updateTotalInterest"
                      @focus="focusField('total_interest')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_interest_per_day,
                      'is-focused': activeField == 'accrue_interest_per_day'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_interest_per_day')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.accrue_interest_per_day"
                      @input="updateAccrueInterestPerDay"
                      @focus="focusField('accrue_interest_per_day')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_income_earn,
                      'is-focused': activeField == 'interest_income_earn'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.interest_income_earn')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_income_earn"
                      @input="updateInterestIncomeEarn"
                      @focus="focusField('interest_income_earn')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_interest_receivable,
                      'is-focused': activeField == 'accrue_interest_receivable'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_interest_receivable')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_interest_receivable"
                      @input="updateAccrueInterestReceivable"
                      @focus="focusField('accrue_interest_receivable')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_interest_current_installment,
                      'is-focused':
                        activeField == 'accrue_interest_current_installment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.contract.fields.accrue_interest_current_installment'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_interest_current_installment"
                      @input="updateAccrueInterestCurrentInstallment"
                      @focus="focusField('accrue_interest_current_installment')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_interest_current_month,
                      'is-focused':
                        activeField == 'accrue_interest_current_month'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_interest_current_month')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_interest_current_month"
                      @input="updateAccrueInterestCurrentMonth"
                      @focus="focusField('accrue_interest_current_month')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_interest_previous_month,
                      'is-focused':
                        activeField == 'accrue_interest_previous_month'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_interest_previous_month')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_interest_previous_month"
                      @input="updateAccrueInterestPreviousMonth"
                      @focus="focusField('accrue_interest_previous_month')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_regular_fee_per_day,
                      'is-focused': activeField == 'accrue_regular_fee_per_day'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_regular_fee_per_day')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_regular_fee_per_day"
                      @input="updateAccrueRegularFeePerDay"
                      @focus="focusField('accrue_regular_fee_per_day')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_regular_fee_receivable,
                      'is-focused':
                        activeField == 'accrue_regular_fee_receivable'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_regular_fee_receivable')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_regular_fee_receivable"
                      @input="updateAccrueRegularFeeReceivable"
                      @focus="focusField('accrue_regular_fee_receivable')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_regular_fee_current_installment,
                      'is-focused':
                        activeField == 'accrue_regular_fee_current_installment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.contract.fields.accrue_regular_fee_current_installment'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_regular_fee_current_installment"
                      @input="updateAccrueRegularFeeCurrentInstallment"
                      @focus="
                        focusField('accrue_regular_fee_current_installment')
                      "
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_regular_fee_current_month,
                      'is-focused':
                        activeField == 'accrue_regular_fee_current_month'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.contract.fields.accrue_regular_fee_current_month'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_regular_fee_current_month"
                      @input="updateAccrueRegularFeeCurrentMonth"
                      @focus="focusField('accrue_regular_fee_current_month')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_regular_fee_prev_month,
                      'is-focused':
                        activeField == 'accrue_regular_fee_prev_month'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.accrue_regular_fee_prev_month')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_regular_fee_prev_month"
                      @input="updateAccrueRegularFeePrevMonth"
                      @focus="focusField('accrue_regular_fee_prev_month')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_earn,
                      'is-focused': activeField == 'admin_fee_earn'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.admin_fee_earn')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.admin_fee_earn"
                      @input="updateAdminFeeEarn"
                      @focus="focusField('admin_fee_earn')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_unearn,
                      'is-focused': activeField == 'admin_fee_unearn'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.admin_fee_unearn')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.admin_fee_unearn"
                      @input="updateAdminFeeUnearn"
                      @focus="focusField('admin_fee_unearn')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_per_day,
                      'is-focused': activeField == 'admin_fee_per_day'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.admin_fee_per_day')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.admin_fee_per_day"
                      @input="updateAdminFeePerDay"
                      @focus="focusField('admin_fee_per_day')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.next_run_date,
                      'is-focused': activeField == 'next_run_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.next_run_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.next_run_date"
                      @input="updateNextRunDate"
                      @focus="focusField('next_run_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.principal_due,
                      'is-focused': activeField == 'principal_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.principal_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.principal_due"
                      @input="updatePrincipalDue"
                      @focus="focusField('principal_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_due,
                      'is-focused': activeField == 'interest_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.interest_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_due"
                      @input="updateInterestDue"
                      @focus="focusField('interest_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.charge_due,
                      'is-focused': activeField == 'charge_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.charge_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.charge_due"
                      @input="updateChargeDue"
                      @focus="focusField('charge_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_due,
                      'is-focused': activeField == 'penalty_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.penalty_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.penalty_due"
                      @input="updatePenaltyDue"
                      @focus="focusField('penalty_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_overdue,
                      'is-focused': activeField == 'total_overdue'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.total_overdue')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.total_overdue"
                      @input="updateTotalOverdue"
                      @focus="focusField('total_overdue')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.num_day_due,
                      'is-focused': activeField == 'num_day_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.num_day_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.num_day_due"
                      @input="updateNumDayDue"
                      @focus="focusField('num_day_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.provision_amount,
                      'is-focused': activeField == 'provision_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.provision_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.provision_amount"
                      @input="updateProvisionAmount"
                      @focus="focusField('provision_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.provision_amount_lcy,
                      'is-focused': activeField == 'provision_amount_lcy'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contract.fields.provision_amount_lcy')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.provision_amount_lcy"
                      @input="updateProvisionAmountLcy"
                      @focus="focusField('provision_amount_lcy')"
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
    ...mapGetters('ContractsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('ContractsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setCode',
      'setApplication',
      'setDdAccount',
      'setCurrency',
      'setLoanProduct',
      'setApproveAmount',
      'setDisburseAmount',
      'setOutstanding',
      'setBalance',
      'setTransactionDate',
      'setMaturityDate',
      'setInterestRate',
      'setRepaymentMethod',
      'setRepaymentFrequency',
      'setFrequency',
      'setTerm',
      'setInstallment',
      'setFirstCollectionDate',
      'setContractType',
      'setMoreThanOneYear',
      'setProvisionClass',
      'setOfficer',
      'setTotalInterest',
      'setAccrueInterestPerDay',
      'setInterestIncomeEarn',
      'setAccrueInterestReceivable',
      'setAccrueInterestCurrentInstallment',
      'setAccrueInterestCurrentMonth',
      'setAccrueInterestPreviousMonth',
      'setAccrueRegularFeePerDay',
      'setAccrueRegularFeeReceivable',
      'setAccrueRegularFeeCurrentInstallment',
      'setAccrueRegularFeeCurrentMonth',
      'setAccrueRegularFeePrevMonth',
      'setAdminFeeEarn',
      'setAdminFeeUnearn',
      'setAdminFeePerDay',
      'setNextRunDate',
      'setPrincipalDue',
      'setInterestDue',
      'setChargeDue',
      'setPenaltyDue',
      'setTotalOverdue',
      'setNumDayDue',
      'setProvisionAmount',
      'setProvisionAmountLcy'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateCode(e) {
      this.setCode(e.target.value)
    },
    updateApplication(value) {
      this.setApplication(value)
    },
    updateDdAccount(value) {
      this.setDdAccount(value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updateLoanProduct(value) {
      this.setLoanProduct(value)
    },
    updateApproveAmount(e) {
      this.setApproveAmount(e.target.value)
    },
    updateDisburseAmount(e) {
      this.setDisburseAmount(e.target.value)
    },
    updateOutstanding(e) {
      this.setOutstanding(e.target.value)
    },
    updateBalance(e) {
      this.setBalance(e.target.value)
    },
    updateTransactionDate(e) {
      this.setTransactionDate(e.target.value)
    },
    updateMaturityDate(e) {
      this.setMaturityDate(e.target.value)
    },
    updateInterestRate(e) {
      this.setInterestRate(e.target.value)
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
    updateFirstCollectionDate(e) {
      this.setFirstCollectionDate(e.target.value)
    },
    updateContractType(value) {
      this.setContractType(value)
    },
    updateMoreThanOneYear(value) {
      this.setMoreThanOneYear(value)
    },
    updateProvisionClass(value) {
      this.setProvisionClass(value)
    },
    updateOfficer(value) {
      this.setOfficer(value)
    },
    updateTotalInterest(e) {
      this.setTotalInterest(e.target.value)
    },
    updateAccrueInterestPerDay(e) {
      this.setAccrueInterestPerDay(e.target.value)
    },
    updateInterestIncomeEarn(e) {
      this.setInterestIncomeEarn(e.target.value)
    },
    updateAccrueInterestReceivable(e) {
      this.setAccrueInterestReceivable(e.target.value)
    },
    updateAccrueInterestCurrentInstallment(e) {
      this.setAccrueInterestCurrentInstallment(e.target.value)
    },
    updateAccrueInterestCurrentMonth(e) {
      this.setAccrueInterestCurrentMonth(e.target.value)
    },
    updateAccrueInterestPreviousMonth(e) {
      this.setAccrueInterestPreviousMonth(e.target.value)
    },
    updateAccrueRegularFeePerDay(e) {
      this.setAccrueRegularFeePerDay(e.target.value)
    },
    updateAccrueRegularFeeReceivable(e) {
      this.setAccrueRegularFeeReceivable(e.target.value)
    },
    updateAccrueRegularFeeCurrentInstallment(e) {
      this.setAccrueRegularFeeCurrentInstallment(e.target.value)
    },
    updateAccrueRegularFeeCurrentMonth(e) {
      this.setAccrueRegularFeeCurrentMonth(e.target.value)
    },
    updateAccrueRegularFeePrevMonth(e) {
      this.setAccrueRegularFeePrevMonth(e.target.value)
    },
    updateAdminFeeEarn(e) {
      this.setAdminFeeEarn(e.target.value)
    },
    updateAdminFeeUnearn(e) {
      this.setAdminFeeUnearn(e.target.value)
    },
    updateAdminFeePerDay(e) {
      this.setAdminFeePerDay(e.target.value)
    },
    updateNextRunDate(e) {
      this.setNextRunDate(e.target.value)
    },
    updatePrincipalDue(e) {
      this.setPrincipalDue(e.target.value)
    },
    updateInterestDue(e) {
      this.setInterestDue(e.target.value)
    },
    updateChargeDue(e) {
      this.setChargeDue(e.target.value)
    },
    updatePenaltyDue(e) {
      this.setPenaltyDue(e.target.value)
    },
    updateTotalOverdue(e) {
      this.setTotalOverdue(e.target.value)
    },
    updateNumDayDue(e) {
      this.setNumDayDue(e.target.value)
    },
    updateProvisionAmount(e) {
      this.setProvisionAmount(e.target.value)
    },
    updateProvisionAmountLcy(e) {
      this.setProvisionAmountLcy(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'contracts.index' })
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
