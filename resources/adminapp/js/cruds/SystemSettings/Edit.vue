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
                <strong>{{ $t('cruds.systemSetting.title_singular') }}</strong>
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
                      $t('cruds.systemSetting.fields.branch')
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
                      'has-items': entry.principal_collection,
                      'is-focused': activeField == 'principal_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.principal_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.principal_collection"
                      @input="updatePrincipalCollection"
                      @focus="focusField('principal_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.interest_collection,
                      'is-focused': activeField == 'interest_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.interest_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.interest_collection"
                      @input="updateInterestCollection"
                      @focus="focusField('interest_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.admin_fee_collection,
                      'is-focused': activeField == 'admin_fee_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.admin_fee_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.admin_fee_collection"
                      @input="updateAdminFeeCollection"
                      @focus="focusField('admin_fee_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pd_principal_collection,
                      'is-focused': activeField == 'pd_principal_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.pd_principal_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.pd_principal_collection"
                      @input="updatePdPrincipalCollection"
                      @focus="focusField('pd_principal_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pd_interest_collection,
                      'is-focused': activeField == 'pd_interest_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.pd_interest_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.pd_interest_collection"
                      @input="updatePdInterestCollection"
                      @focus="focusField('pd_interest_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.charge_collection,
                      'is-focused': activeField == 'charge_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.charge_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.charge_collection"
                      @input="updateChargeCollection"
                      @focus="focusField('charge_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_collection,
                      'is-focused': activeField == 'penalty_collection'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.penalty_collection')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.penalty_collection"
                      @input="updatePenaltyCollection"
                      @focus="focusField('penalty_collection')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.loan_accrual_interest,
                      'is-focused': activeField == 'loan_accrual_interest'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.loan_accrual_interest')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.loan_accrual_interest"
                      @input="updateLoanAccrualInterest"
                      @focus="focusField('loan_accrual_interest')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.amendment_add_principal,
                      'is-focused': activeField == 'amendment_add_principal'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.amendment_add_principal')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.amendment_add_principal"
                      @input="updateAmendmentAddPrincipal"
                      @focus="focusField('amendment_add_principal')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.amendment_duduct_principal,
                      'is-focused': activeField == 'amendment_duduct_principal'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.systemSetting.fields.amendment_duduct_principal'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.amendment_duduct_principal"
                      @input="updateAmendmentDuductPrincipal"
                      @focus="focusField('amendment_duduct_principal')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.terminate,
                      'is-focused': activeField == 'terminate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.terminate')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.terminate"
                      @input="updateTerminate"
                      @focus="focusField('terminate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.write_off_charge,
                      'is-focused': activeField == 'write_off_charge'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.write_off_charge')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.write_off_charge"
                      @input="updateWriteOffCharge"
                      @focus="focusField('write_off_charge')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.write_off_penalty,
                      'is-focused': activeField == 'write_off_penalty'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.write_off_penalty')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.write_off_penalty"
                      @input="updateWriteOffPenalty"
                      @focus="focusField('write_off_penalty')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.write_off_interest,
                      'is-focused': activeField == 'write_off_interest'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.write_off_interest')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.write_off_interest"
                      @input="updateWriteOffInterest"
                      @focus="focusField('write_off_interest')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.write_off_principal,
                      'is-focused': activeField == 'write_off_principal'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.write_off_principal')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.write_off_principal"
                      @input="updateWriteOffPrincipal"
                      @focus="focusField('write_off_principal')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.waive_charge,
                      'is-focused': activeField == 'waive_charge'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.waive_charge')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.waive_charge"
                      @input="updateWaiveCharge"
                      @focus="focusField('waive_charge')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.waive_penalty,
                      'is-focused': activeField == 'waive_penalty'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemSetting.fields.waive_penalty')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.waive_penalty"
                      @input="updateWaivePenalty"
                      @focus="focusField('waive_penalty')"
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
    ...mapGetters('SystemSettingsSingle', ['entry', 'loading'])
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
    ...mapActions('SystemSettingsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setPrincipalCollection',
      'setInterestCollection',
      'setAdminFeeCollection',
      'setPdPrincipalCollection',
      'setPdInterestCollection',
      'setChargeCollection',
      'setPenaltyCollection',
      'setLoanAccrualInterest',
      'setAmendmentAddPrincipal',
      'setAmendmentDuductPrincipal',
      'setTerminate',
      'setWriteOffCharge',
      'setWriteOffPenalty',
      'setWriteOffInterest',
      'setWriteOffPrincipal',
      'setWaiveCharge',
      'setWaivePenalty'
    ]),
    updateBranch(e) {
      this.setBranch(e.target.value)
    },
    updatePrincipalCollection(e) {
      this.setPrincipalCollection(e.target.value)
    },
    updateInterestCollection(e) {
      this.setInterestCollection(e.target.value)
    },
    updateAdminFeeCollection(e) {
      this.setAdminFeeCollection(e.target.value)
    },
    updatePdPrincipalCollection(e) {
      this.setPdPrincipalCollection(e.target.value)
    },
    updatePdInterestCollection(e) {
      this.setPdInterestCollection(e.target.value)
    },
    updateChargeCollection(e) {
      this.setChargeCollection(e.target.value)
    },
    updatePenaltyCollection(e) {
      this.setPenaltyCollection(e.target.value)
    },
    updateLoanAccrualInterest(e) {
      this.setLoanAccrualInterest(e.target.value)
    },
    updateAmendmentAddPrincipal(e) {
      this.setAmendmentAddPrincipal(e.target.value)
    },
    updateAmendmentDuductPrincipal(e) {
      this.setAmendmentDuductPrincipal(e.target.value)
    },
    updateTerminate(e) {
      this.setTerminate(e.target.value)
    },
    updateWriteOffCharge(e) {
      this.setWriteOffCharge(e.target.value)
    },
    updateWriteOffPenalty(e) {
      this.setWriteOffPenalty(e.target.value)
    },
    updateWriteOffInterest(e) {
      this.setWriteOffInterest(e.target.value)
    },
    updateWriteOffPrincipal(e) {
      this.setWriteOffPrincipal(e.target.value)
    },
    updateWaiveCharge(e) {
      this.setWaiveCharge(e.target.value)
    },
    updateWaivePenalty(e) {
      this.setWaivePenalty(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'system_settings.index' })
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
