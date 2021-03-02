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
                <strong>{{ $t('cruds.account.title_singular') }}</strong>
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
                      $t('cruds.account.fields.branch')
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
                      'has-items': entry.customer,
                      'is-focused': activeField == 'customer'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.customer')
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
                      'has-items': entry.account_name,
                      'is-focused': activeField == 'account_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.account.fields.account_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.account_name"
                      @input="updateAccountName"
                      @focus="focusField('account_name')"
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
                      $t('cruds.account.fields.chart_of_account')
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
                      'has-items': entry.balance_side,
                      'is-focused': activeField == 'balance_side'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.balance_side')
                    }}</label>
                    <v-select
                      name="balance_side"
                      :key="'balance_side-field'"
                      :value="entry.balance_side"
                      :options="lists.balance_side"
                      :reduce="entry => entry.value"
                      @input="updateBalanceSide"
                      @search.focus="focusField('balance_side')"
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
                      $t('cruds.account.fields.currency')
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
                      'has-items': entry.account_product_id !== null,
                      'is-focused': activeField == 'account_product'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.account_product')
                    }}</label>
                    <v-select
                      name="account_product"
                      label="account_product_title"
                      :key="'account_product-field'"
                      :value="entry.account_product_id"
                      :options="lists.account_product"
                      :reduce="entry => entry.id"
                      @input="updateAccountProduct"
                      @search.focus="focusField('account_product')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.open_date,
                      'is-focused': activeField == 'open_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.open_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.open_date"
                      @input="updateOpenDate"
                      @focus="focusField('open_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.balance,
                      'is-focused': activeField == 'balance'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.balance')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.balance"
                      @input="updateBalance"
                      @focus="focusField('balance')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.available_bal,
                      'is-focused': activeField == 'available_bal'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.available_bal')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.0000000001"
                      :value="entry.available_bal"
                      @input="updateAvailableBal"
                      @focus="focusField('available_bal')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.account_status,
                      'is-focused': activeField == 'account_status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.account_status')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.account_status"
                      @input="updateAccountStatus"
                      @focus="focusField('account_status')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.blocked_bal,
                      'is-focused': activeField == 'blocked_bal'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.blocked_bal')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.0000000001"
                      :value="entry.blocked_bal"
                      @input="updateBlockedBal"
                      @focus="focusField('blocked_bal')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.closing_date,
                      'is-focused': activeField == 'closing_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.closing_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.closing_date"
                      @input="updateClosingDate"
                      @focus="focusField('closing_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.block,
                      'is-focused': activeField == 'block'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.block')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.block"
                      @input="updateBlock"
                      @focus="focusField('block')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.block_reason,
                      'is-focused': activeField == 'block_reason'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.block_reason')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.block_reason"
                      @input="updateBlockReason"
                      @focus="focusField('block_reason')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.type,
                      'is-focused': activeField == 'type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.account.fields.type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.type"
                      @input="updateType"
                      @focus="focusField('type')"
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
    ...mapGetters('AccountsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('AccountsSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setCustomer',
      'setAccountName',
      'setChartOfAccount',
      'setBalanceSide',
      'setCurrency',
      'setAccountProduct',
      'setOpenDate',
      'setBalance',
      'setAvailableBal',
      'setAccountStatus',
      'setBlockedBal',
      'setClosingDate',
      'setBlock',
      'setBlockReason',
      'setType',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateCustomer(e) {
      this.setCustomer(e.target.value)
    },
    updateAccountName(e) {
      this.setAccountName(e.target.value)
    },
    updateChartOfAccount(value) {
      this.setChartOfAccount(value)
    },
    updateBalanceSide(value) {
      this.setBalanceSide(value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updateAccountProduct(value) {
      this.setAccountProduct(value)
    },
    updateOpenDate(e) {
      this.setOpenDate(e.target.value)
    },
    updateBalance(e) {
      this.setBalance(e.target.value)
    },
    updateAvailableBal(e) {
      this.setAvailableBal(e.target.value)
    },
    updateAccountStatus(e) {
      this.setAccountStatus(e.target.value)
    },
    updateBlockedBal(e) {
      this.setBlockedBal(e.target.value)
    },
    updateClosingDate(e) {
      this.setClosingDate(e.target.value)
    },
    updateBlock(e) {
      this.setBlock(e.target.value)
    },
    updateBlockReason(e) {
      this.setBlockReason(e.target.value)
    },
    updateType(e) {
      this.setType(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'accounts.index' })
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
