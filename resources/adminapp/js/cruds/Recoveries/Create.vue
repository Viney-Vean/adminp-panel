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
                <strong>{{ $t('cruds.recovery.title_singular') }}</strong>
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
                      $t('cruds.recovery.fields.branch')
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
                      'has-items': entry.loan,
                      'is-focused': activeField == 'loan'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.loan')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.loan"
                      @input="updateLoan"
                      @focus="focusField('loan')"
                      @blur="clearFocus"
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
                      $t('cruds.recovery.fields.description')
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
                      $t('cruds.recovery.fields.currency')
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
                      $t('cruds.recovery.fields.dd_account')
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
                      'has-items': entry.recovery_amount,
                      'is-focused': activeField == 'recovery_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.recovery_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.recovery_amount"
                      @input="updateRecoveryAmount"
                      @focus="focusField('recovery_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.recovery_date,
                      'is-focused': activeField == 'recovery_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.recovery_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.recovery_date"
                      @input="updateRecoveryDate"
                      @focus="focusField('recovery_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.principal_amount,
                      'is-focused': activeField == 'principal_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.principal_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.principal_amount"
                      @input="updatePrincipalAmount"
                      @focus="focusField('principal_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_amount,
                      'is-focused': activeField == 'interest_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.interest_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.interest_amount"
                      @input="updateInterestAmount"
                      @focus="focusField('interest_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.charge_amount,
                      'is-focused': activeField == 'charge_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.charge_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.charge_amount"
                      @input="updateChargeAmount"
                      @focus="focusField('charge_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_amount,
                      'is-focused': activeField == 'penalty_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.recovery.fields.penalty_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.penalty_amount"
                      @input="updatePenaltyAmount"
                      @focus="focusField('penalty_amount')"
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
    ...mapGetters('RecoveriesSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('RecoveriesSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setLoan',
      'setDescription',
      'setCurrency',
      'setDdAccount',
      'setRecoveryAmount',
      'setRecoveryDate',
      'setPrincipalAmount',
      'setInterestAmount',
      'setChargeAmount',
      'setPenaltyAmount',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateLoan(e) {
      this.setLoan(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updateDdAccount(value) {
      this.setDdAccount(value)
    },
    updateRecoveryAmount(e) {
      this.setRecoveryAmount(e.target.value)
    },
    updateRecoveryDate(e) {
      this.setRecoveryDate(e.target.value)
    },
    updatePrincipalAmount(e) {
      this.setPrincipalAmount(e.target.value)
    },
    updateInterestAmount(e) {
      this.setInterestAmount(e.target.value)
    },
    updateChargeAmount(e) {
      this.setChargeAmount(e.target.value)
    },
    updatePenaltyAmount(e) {
      this.setPenaltyAmount(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'recoveries.index' })
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
