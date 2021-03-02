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
                  $t('cruds.collectionSetting.title_singular')
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
                      $t('cruds.collectionSetting.fields.branch')
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
                      'has-items': entry.past_due,
                      'is-focused': activeField == 'past_due'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.past_due')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.past_due"
                      @input="updatePastDue"
                      @focus="focusField('past_due')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pre_grace,
                      'is-focused': activeField == 'pre_grace'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.pre_grace')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.pre_grace"
                      @input="updatePreGrace"
                      @focus="focusField('pre_grace')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.grace,
                      'is-focused': activeField == 'grace'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.grace')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.grace"
                      @input="updateGrace"
                      @focus="focusField('grace')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.collection_order,
                      'is-focused': activeField == 'collection_order'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.collection_order')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.collection_order"
                      @input="updateCollectionOrder"
                      @focus="focusField('collection_order')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.terminate_insufficient_fund,
                      'is-focused': activeField == 'terminate_insufficient_fund'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.terminate_insufficient_fund'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.terminate_insufficient_fund"
                      @input="updateTerminateInsufficientFund"
                      @focus="focusField('terminate_insufficient_fund')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_collection_option,
                      'is-focused': activeField == 'penalty_collection_option'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.penalty_collection_option'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.penalty_collection_option"
                      @input="updatePenaltyCollectionOption"
                      @focus="focusField('penalty_collection_option')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_method,
                      'is-focused': activeField == 'penalty_method'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.penalty_method')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.penalty_method"
                      @input="updatePenaltyMethod"
                      @focus="focusField('penalty_method')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.penalty_calculation_base,
                      'is-focused': activeField == 'penalty_calculation_base'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.penalty_calculation_base'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.penalty_calculation_base"
                      @input="updatePenaltyCalculationBase"
                      @focus="focusField('penalty_calculation_base')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.max_day_penalty_calculation,
                      'is-focused': activeField == 'max_day_penalty_calculation'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.max_day_penalty_calculation'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.max_day_penalty_calculation"
                      @input="updateMaxDayPenaltyCalculation"
                      @focus="focusField('max_day_penalty_calculation')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.write_off_class,
                      'is-focused': activeField == 'write_off_class'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.write_off_class')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.write_off_class"
                      @input="updateWriteOffClass"
                      @focus="focusField('write_off_class')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pd_collection_method,
                      'is-focused': activeField == 'pd_collection_method'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.pd_collection_method')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.pd_collection_method"
                      @input="updatePdCollectionMethod"
                      @focus="focusField('pd_collection_method')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pre_termination_option,
                      'is-focused': activeField == 'pre_termination_option'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.pre_termination_option'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.pre_termination_option"
                      @input="updatePreTerminationOption"
                      @focus="focusField('pre_termination_option')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pre_termination_duration,
                      'is-focused': activeField == 'pre_termination_duration'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.pre_termination_duration'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.pre_termination_duration"
                      @input="updatePreTerminationDuration"
                      @focus="focusField('pre_termination_duration')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pre_terminationd_type,
                      'is-focused': activeField == 'pre_terminationd_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.pre_terminationd_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.pre_terminationd_type"
                      @input="updatePreTerminationdType"
                      @focus="focusField('pre_terminationd_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.pre_termination_percentage,
                      'is-focused': activeField == 'pre_termination_percentage'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.pre_termination_percentage'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.pre_termination_percentage"
                      @input="updatePreTerminationPercentage"
                      @focus="focusField('pre_termination_percentage')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.amend_deduct_option,
                      'is-focused': activeField == 'amend_deduct_option'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.amend_deduct_option')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.amend_deduct_option"
                      @input="updateAmendDeductOption"
                      @focus="focusField('amend_deduct_option')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.amend_deduct_duration,
                      'is-focused': activeField == 'amend_deduct_duration'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.amend_deduct_duration')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.amend_deduct_duration"
                      @input="updateAmendDeductDuration"
                      @focus="focusField('amend_deduct_duration')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.amend_deductd_type,
                      'is-focused': activeField == 'amend_deductd_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collectionSetting.fields.amend_deductd_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.amend_deductd_type"
                      @input="updateAmendDeductdType"
                      @focus="focusField('amend_deductd_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.amend_deduct_percentage,
                      'is-focused': activeField == 'amend_deduct_percentage'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.collectionSetting.fields.amend_deduct_percentage'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.amend_deduct_percentage"
                      @input="updateAmendDeductPercentage"
                      @focus="focusField('amend_deduct_percentage')"
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
    ...mapGetters('CollectionSettingsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('CollectionSettingsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setPastDue',
      'setPreGrace',
      'setGrace',
      'setCollectionOrder',
      'setTerminateInsufficientFund',
      'setPenaltyCollectionOption',
      'setPenaltyMethod',
      'setPenaltyCalculationBase',
      'setMaxDayPenaltyCalculation',
      'setWriteOffClass',
      'setPdCollectionMethod',
      'setPreTerminationOption',
      'setPreTerminationDuration',
      'setPreTerminationdType',
      'setPreTerminationPercentage',
      'setAmendDeductOption',
      'setAmendDeductDuration',
      'setAmendDeductdType',
      'setAmendDeductPercentage'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updatePastDue(e) {
      this.setPastDue(e.target.value)
    },
    updatePreGrace(e) {
      this.setPreGrace(e.target.value)
    },
    updateGrace(e) {
      this.setGrace(e.target.value)
    },
    updateCollectionOrder(e) {
      this.setCollectionOrder(e.target.value)
    },
    updateTerminateInsufficientFund(e) {
      this.setTerminateInsufficientFund(e.target.value)
    },
    updatePenaltyCollectionOption(e) {
      this.setPenaltyCollectionOption(e.target.value)
    },
    updatePenaltyMethod(e) {
      this.setPenaltyMethod(e.target.value)
    },
    updatePenaltyCalculationBase(e) {
      this.setPenaltyCalculationBase(e.target.value)
    },
    updateMaxDayPenaltyCalculation(e) {
      this.setMaxDayPenaltyCalculation(e.target.value)
    },
    updateWriteOffClass(e) {
      this.setWriteOffClass(e.target.value)
    },
    updatePdCollectionMethod(e) {
      this.setPdCollectionMethod(e.target.value)
    },
    updatePreTerminationOption(e) {
      this.setPreTerminationOption(e.target.value)
    },
    updatePreTerminationDuration(e) {
      this.setPreTerminationDuration(e.target.value)
    },
    updatePreTerminationdType(e) {
      this.setPreTerminationdType(e.target.value)
    },
    updatePreTerminationPercentage(e) {
      this.setPreTerminationPercentage(e.target.value)
    },
    updateAmendDeductOption(e) {
      this.setAmendDeductOption(e.target.value)
    },
    updateAmendDeductDuration(e) {
      this.setAmendDeductDuration(e.target.value)
    },
    updateAmendDeductdType(e) {
      this.setAmendDeductdType(e.target.value)
    },
    updateAmendDeductPercentage(e) {
      this.setAmendDeductPercentage(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'collection_settings.index' })
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
