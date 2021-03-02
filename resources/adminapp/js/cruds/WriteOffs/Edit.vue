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
                <strong>{{ $t('cruds.writeOff.title_singular') }}</strong>
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
                      $t('cruds.writeOff.fields.branch')
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
                      'has-items': entry.contract,
                      'is-focused': activeField == 'contract'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.contract')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.contract"
                      @input="updateContract"
                      @focus="focusField('contract')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer,
                      'is-focused': activeField == 'customer'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.customer')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.customer"
                      @input="updateCustomer"
                      @focus="focusField('customer')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_name,
                      'is-focused': activeField == 'customer_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.customer_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_name"
                      @input="updateCustomerName"
                      @focus="focusField('customer_name')"
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
                      $t('cruds.writeOff.fields.currency')
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
                      'has-items': entry.dd_account_id !== null,
                      'is-focused': activeField == 'dd_account'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.dd_account')
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
                      'has-items': entry.approve_amount,
                      'is-focused': activeField == 'approve_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.approve_amount')
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
                      $t('cruds.writeOff.fields.disburse_amount')
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
                      'has-items': entry.balance,
                      'is-focused': activeField == 'balance'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.balance')
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
                      'has-items': entry.accrue_interest_current_installment,
                      'is-focused':
                        activeField == 'accrue_interest_current_installment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.writeOff.fields.accrue_interest_current_installment'
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
                      'has-items': entry.principal_due,
                      'is-focused': activeField == 'principal_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.principal_due')
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
                      $t('cruds.writeOff.fields.interest_due')
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
                      $t('cruds.writeOff.fields.charge_due')
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
                      $t('cruds.writeOff.fields.penalty_due')
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
                      'has-items': entry.orig_balance,
                      'is-focused': activeField == 'orig_balance'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.orig_balance')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_balance"
                      @input="updateOrigBalance"
                      @focus="focusField('orig_balance')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items':
                        entry.orig_accrue_interest_current_installment,
                      'is-focused':
                        activeField ==
                        'orig_accrue_interest_current_installment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.writeOff.fields.orig_accrue_interest_current_installment'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_accrue_interest_current_installment"
                      @input="updateOrigAccrueInterestCurrentInstallment"
                      @focus="
                        focusField('orig_accrue_interest_current_installment')
                      "
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.orig_charge,
                      'is-focused': activeField == 'orig_charge'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.orig_charge')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_charge"
                      @input="updateOrigCharge"
                      @focus="focusField('orig_charge')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.orig_principal_due,
                      'is-focused': activeField == 'orig_principal_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.orig_principal_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_principal_due"
                      @input="updateOrigPrincipalDue"
                      @focus="focusField('orig_principal_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.orig_interest_due,
                      'is-focused': activeField == 'orig_interest_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.orig_interest_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_interest_due"
                      @input="updateOrigInterestDue"
                      @focus="focusField('orig_interest_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.orig_charge_due,
                      'is-focused': activeField == 'orig_charge_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.orig_charge_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_charge_due"
                      @input="updateOrigChargeDue"
                      @focus="focusField('orig_charge_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.orig_penalty_due,
                      'is-focused': activeField == 'orig_penalty_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.orig_penalty_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.orig_penalty_due"
                      @input="updateOrigPenaltyDue"
                      @focus="focusField('orig_penalty_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.write_off_date,
                      'is-focused': activeField == 'write_off_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.write_off_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.write_off_date"
                      @input="updateWriteOffDate"
                      @focus="focusField('write_off_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.writeOff.fields.description')
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
    ...mapGetters('WriteOffsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('WriteOffsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setContract',
      'setCustomer',
      'setCustomerName',
      'setCurrency',
      'setDdAccount',
      'setApproveAmount',
      'setDisburseAmount',
      'setBalance',
      'setAccrueInterestCurrentInstallment',
      'setPrincipalDue',
      'setInterestDue',
      'setChargeDue',
      'setPenaltyDue',
      'setOrigBalance',
      'setOrigAccrueInterestCurrentInstallment',
      'setOrigCharge',
      'setOrigPrincipalDue',
      'setOrigInterestDue',
      'setOrigChargeDue',
      'setOrigPenaltyDue',
      'setWriteOffDate',
      'setDescription'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateContract(e) {
      this.setContract(e.target.value)
    },
    updateCustomer(e) {
      this.setCustomer(e.target.value)
    },
    updateCustomerName(e) {
      this.setCustomerName(e.target.value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updateDdAccount(value) {
      this.setDdAccount(value)
    },
    updateApproveAmount(e) {
      this.setApproveAmount(e.target.value)
    },
    updateDisburseAmount(e) {
      this.setDisburseAmount(e.target.value)
    },
    updateBalance(e) {
      this.setBalance(e.target.value)
    },
    updateAccrueInterestCurrentInstallment(e) {
      this.setAccrueInterestCurrentInstallment(e.target.value)
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
    updateOrigBalance(e) {
      this.setOrigBalance(e.target.value)
    },
    updateOrigAccrueInterestCurrentInstallment(e) {
      this.setOrigAccrueInterestCurrentInstallment(e.target.value)
    },
    updateOrigCharge(e) {
      this.setOrigCharge(e.target.value)
    },
    updateOrigPrincipalDue(e) {
      this.setOrigPrincipalDue(e.target.value)
    },
    updateOrigInterestDue(e) {
      this.setOrigInterestDue(e.target.value)
    },
    updateOrigChargeDue(e) {
      this.setOrigChargeDue(e.target.value)
    },
    updateOrigPenaltyDue(e) {
      this.setOrigPenaltyDue(e.target.value)
    },
    updateWriteOffDate(e) {
      this.setWriteOffDate(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'write_offs.index' })
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
