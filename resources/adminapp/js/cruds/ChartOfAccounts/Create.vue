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
                <strong>{{ $t('cruds.chartOfAccount.title_singular') }}</strong>
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
                      $t('cruds.chartOfAccount.fields.branch')
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
                      'has-items': entry.account_title,
                      'is-focused': activeField == 'account_title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.account_title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.account_title"
                      @input="updateAccountTitle"
                      @focus="focusField('account_title')"
                      @blur="clearFocus"
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
                      $t('cruds.chartOfAccount.fields.account_type')
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
                      'has-items': entry.classification,
                      'is-focused': activeField == 'classification'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.classification')
                    }}</label>
                    <v-select
                      name="classification"
                      :key="'classification-field'"
                      :value="entry.classification"
                      :options="lists.classification"
                      :reduce="entry => entry.value"
                      @input="updateClassification"
                      @search.focus="focusField('classification')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.main_account_id !== null,
                      'is-focused': activeField == 'main_account'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.main_account')
                    }}</label>
                    <v-select
                      name="main_account"
                      label="account_title"
                      :key="'main_account-field'"
                      :value="entry.main_account_id"
                      :options="lists.main_account"
                      :reduce="entry => entry.id"
                      @input="updateMainAccount"
                      @search.focus="focusField('main_account')"
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
                      $t('cruds.chartOfAccount.fields.currency')
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
                      'has-items': entry.posting_side,
                      'is-focused': activeField == 'posting_side'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.posting_side')
                    }}</label>
                    <v-select
                      name="posting_side"
                      :key="'posting_side-field'"
                      :value="entry.posting_side"
                      :options="lists.posting_side"
                      :reduce="entry => entry.value"
                      @input="updatePostingSide"
                      @search.focus="focusField('posting_side')"
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
                      $t('cruds.chartOfAccount.fields.balance_side')
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
                      'has-items': entry.allow_posting,
                      'is-focused': activeField == 'allow_posting'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.allow_posting')
                    }}</label>
                    <v-select
                      name="allow_posting"
                      :key="'allow_posting-field'"
                      :value="entry.allow_posting"
                      :options="lists.allow_posting"
                      :reduce="entry => entry.value"
                      @input="updateAllowPosting"
                      @search.focus="focusField('allow_posting')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.allow_direct_posting,
                      'is-focused': activeField == 'allow_direct_posting'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.allow_direct_posting')
                    }}</label>
                    <v-select
                      name="allow_direct_posting"
                      :key="'allow_direct_posting-field'"
                      :value="entry.allow_direct_posting"
                      :options="lists.allow_direct_posting"
                      :reduce="entry => entry.value"
                      @input="updateAllowDirectPosting"
                      @search.focus="focusField('allow_direct_posting')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.active,
                      'is-focused': activeField == 'active'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.chartOfAccount.fields.active')
                    }}</label>
                    <v-select
                      name="active"
                      :key="'active-field'"
                      :value="entry.active"
                      :options="lists.active"
                      :reduce="entry => entry.value"
                      @input="updateActive"
                      @search.focus="focusField('active')"
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
                      $t('cruds.chartOfAccount.fields.description')
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
    ...mapGetters('ChartOfAccountsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ChartOfAccountsSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setAccountTitle',
      'setAccountType',
      'setClassification',
      'setMainAccount',
      'setCurrency',
      'setPostingSide',
      'setBalanceSide',
      'setAllowPosting',
      'setAllowDirectPosting',
      'setActive',
      'setDescription',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateAccountTitle(e) {
      this.setAccountTitle(e.target.value)
    },
    updateAccountType(value) {
      this.setAccountType(value)
    },
    updateClassification(value) {
      this.setClassification(value)
    },
    updateMainAccount(value) {
      this.setMainAccount(value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updatePostingSide(value) {
      this.setPostingSide(value)
    },
    updateBalanceSide(value) {
      this.setBalanceSide(value)
    },
    updateAllowPosting(value) {
      this.setAllowPosting(value)
    },
    updateAllowDirectPosting(value) {
      this.setAllowDirectPosting(value)
    },
    updateActive(value) {
      this.setActive(value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'chart_of_accounts.index' })
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
