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
                <strong>{{ $t('cruds.currency.title_singular') }}</strong>
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
                      $t('cruds.currency.fields.branch')
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
                    <label class="bmd-label-floating required">{{
                      $t('cruds.currency.fields.description')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.buy_rate,
                      'is-focused': activeField == 'buy_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.buy_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.buy_rate"
                      @input="updateBuyRate"
                      @focus="focusField('buy_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.sell_rate,
                      'is-focused': activeField == 'sell_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.sell_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.sell_rate"
                      @input="updateSellRate"
                      @focus="focusField('sell_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.rnd_mode,
                      'is-focused': activeField == 'rnd_mode'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.rnd_mode')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.rnd_mode"
                      @input="updateRndMode"
                      @focus="focusField('rnd_mode')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minimum_unit,
                      'is-focused': activeField == 'minimum_unit'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.minimum_unit')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.minimum_unit"
                      @input="updateMinimumUnit"
                      @focus="focusField('minimum_unit')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.decimal_place,
                      'is-focused': activeField == 'decimal_place'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.decimal_place')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.decimal_place"
                      @input="updateDecimalPlace"
                      @focus="focusField('decimal_place')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.currency_sign,
                      'is-focused': activeField == 'currency_sign'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.currency_sign')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.currency_sign"
                      @input="updateCurrencySign"
                      @focus="focusField('currency_sign')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.revaluation_rate,
                      'is-focused': activeField == 'revaluation_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.revaluation_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.revaluation_rate"
                      @input="updateRevaluationRate"
                      @focus="focusField('revaluation_rate')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.other_rate,
                      'is-focused': activeField == 'other_rate'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.currency.fields.other_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.other_rate"
                      @input="updateOtherRate"
                      @focus="focusField('other_rate')"
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
    ...mapGetters('CurrenciesSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CurrenciesSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setDescription',
      'setBuyRate',
      'setSellRate',
      'setRndMode',
      'setMinimumUnit',
      'setDecimalPlace',
      'setCurrencySign',
      'setRevaluationRate',
      'setOtherRate',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateBuyRate(e) {
      this.setBuyRate(e.target.value)
    },
    updateSellRate(e) {
      this.setSellRate(e.target.value)
    },
    updateRndMode(e) {
      this.setRndMode(e.target.value)
    },
    updateMinimumUnit(e) {
      this.setMinimumUnit(e.target.value)
    },
    updateDecimalPlace(e) {
      this.setDecimalPlace(e.target.value)
    },
    updateCurrencySign(e) {
      this.setCurrencySign(e.target.value)
    },
    updateRevaluationRate(e) {
      this.setRevaluationRate(e.target.value)
    },
    updateOtherRate(e) {
      this.setOtherRate(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'currencies.index' })
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
