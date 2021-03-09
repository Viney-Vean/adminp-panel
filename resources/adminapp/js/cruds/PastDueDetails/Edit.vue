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
                <strong>{{ $t('cruds.pastDueDetail.title_singular') }}</strong>
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
                      'has-items': entry.schedule_id !== null,
                      'is-focused': activeField == 'schedule'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.schedule')
                    }}</label>
                    <v-select
                      name="schedule"
                      label="no"
                      :key="'schedule-field'"
                      :value="entry.schedule_id"
                      :options="lists.schedule"
                      :reduce="entry => entry.id"
                      @input="updateSchedule"
                      @search.focus="focusField('schedule')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contract_id !== null,
                      'is-focused': activeField == 'contract'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.contract')
                    }}</label>
                    <v-select
                      name="contract"
                      label="code"
                      :key="'contract-field'"
                      :value="entry.contract_id"
                      :options="lists.contract"
                      :reduce="entry => entry.id"
                      @input="updateContract"
                      @search.focus="focusField('contract')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.due_date,
                      'is-focused': activeField == 'due_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.due_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.due_date"
                      @input="updateDueDate"
                      @focus="focusField('due_date')"
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
                      $t('cruds.pastDueDetail.fields.principal_due')
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
                      'has-items': entry.out_principal,
                      'is-focused': activeField == 'out_principal'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.out_principal')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.out_principal"
                      @input="updateOutPrincipal"
                      @focus="focusField('out_principal')"
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
                      $t('cruds.pastDueDetail.fields.interest_due')
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
                      'has-items': entry.out_interest,
                      'is-focused': activeField == 'out_interest'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.out_interest')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.out_interest"
                      @input="updateOutInterest"
                      @focus="focusField('out_interest')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accrue_interest_out,
                      'is-focused': activeField == 'accrue_interest_out'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.accrue_interest_out')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.accrue_interest_out"
                      @input="updateAccrueInterestOut"
                      @focus="focusField('accrue_interest_out')"
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
                      $t('cruds.pastDueDetail.fields.charge_due')
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
                      'has-items': entry.out_charge,
                      'is-focused': activeField == 'out_charge'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.out_charge')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.out_charge"
                      @input="updateOutCharge"
                      @focus="focusField('out_charge')"
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
                      $t('cruds.pastDueDetail.fields.penalty_due')
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
                      'has-items': entry.out_penalty,
                      'is-focused': activeField == 'out_penalty'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.out_penalty')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.out_penalty"
                      @input="updateOutPenalty"
                      @focus="focusField('out_penalty')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.numday_due,
                      'is-focused': activeField == 'numday_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.numday_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.numday_due"
                      @input="updateNumdayDue"
                      @focus="focusField('numday_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status_due,
                      'is-focused': activeField == 'status_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.status_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.status_due"
                      @input="updateStatusDue"
                      @focus="focusField('status_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.collect_penalty_amount,
                      'is-focused': activeField == 'collect_penalty_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.collect_penalty_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.collect_penalty_amount"
                      @input="updateCollectPenaltyAmount"
                      @focus="focusField('collect_penalty_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.collect_interest_amount,
                      'is-focused': activeField == 'collect_interest_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.collect_interest_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.collect_interest_amount"
                      @input="updateCollectInterestAmount"
                      @focus="focusField('collect_interest_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.collect_charge_amount,
                      'is-focused': activeField == 'collect_charge_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.collect_charge_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.collect_charge_amount"
                      @input="updateCollectChargeAmount"
                      @focus="focusField('collect_charge_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.waive_penalty_amount,
                      'is-focused': activeField == 'waive_penalty_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.waive_penalty_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.waive_penalty_amount"
                      @input="updateWaivePenaltyAmount"
                      @focus="focusField('waive_penalty_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.waive_interest_amount,
                      'is-focused': activeField == 'waive_interest_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.waive_interest_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.waive_interest_amount"
                      @input="updateWaiveInterestAmount"
                      @focus="focusField('waive_interest_amount')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.waive_charge_amount,
                      'is-focused': activeField == 'waive_charge_amount'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.pastDueDetail.fields.waive_charge_amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.waive_charge_amount"
                      @input="updateWaiveChargeAmount"
                      @focus="focusField('waive_charge_amount')"
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
    ...mapGetters('PastDueDetailsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('PastDueDetailsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setSchedule',
      'setContract',
      'setDueDate',
      'setPrincipalDue',
      'setOutPrincipal',
      'setInterestDue',
      'setOutInterest',
      'setAccrueInterestOut',
      'setChargeDue',
      'setOutCharge',
      'setPenaltyDue',
      'setOutPenalty',
      'setNumdayDue',
      'setStatusDue',
      'setCollectPenaltyAmount',
      'setCollectInterestAmount',
      'setCollectChargeAmount',
      'setWaivePenaltyAmount',
      'setWaiveInterestAmount',
      'setWaiveChargeAmount'
    ]),
    updateSchedule(value) {
      this.setSchedule(value)
    },
    updateContract(value) {
      this.setContract(value)
    },
    updateDueDate(e) {
      this.setDueDate(e.target.value)
    },
    updatePrincipalDue(e) {
      this.setPrincipalDue(e.target.value)
    },
    updateOutPrincipal(e) {
      this.setOutPrincipal(e.target.value)
    },
    updateInterestDue(e) {
      this.setInterestDue(e.target.value)
    },
    updateOutInterest(e) {
      this.setOutInterest(e.target.value)
    },
    updateAccrueInterestOut(e) {
      this.setAccrueInterestOut(e.target.value)
    },
    updateChargeDue(e) {
      this.setChargeDue(e.target.value)
    },
    updateOutCharge(e) {
      this.setOutCharge(e.target.value)
    },
    updatePenaltyDue(e) {
      this.setPenaltyDue(e.target.value)
    },
    updateOutPenalty(e) {
      this.setOutPenalty(e.target.value)
    },
    updateNumdayDue(e) {
      this.setNumdayDue(e.target.value)
    },
    updateStatusDue(e) {
      this.setStatusDue(e.target.value)
    },
    updateCollectPenaltyAmount(e) {
      this.setCollectPenaltyAmount(e.target.value)
    },
    updateCollectInterestAmount(e) {
      this.setCollectInterestAmount(e.target.value)
    },
    updateCollectChargeAmount(e) {
      this.setCollectChargeAmount(e.target.value)
    },
    updateWaivePenaltyAmount(e) {
      this.setWaivePenaltyAmount(e.target.value)
    },
    updateWaiveInterestAmount(e) {
      this.setWaiveInterestAmount(e.target.value)
    },
    updateWaiveChargeAmount(e) {
      this.setWaiveChargeAmount(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'past_due_details.index' })
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
