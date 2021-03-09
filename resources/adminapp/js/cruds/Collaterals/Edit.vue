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
                <strong>{{ $t('cruds.collateral.title_singular') }}</strong>
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
                      'has-items': entry.customer_id !== null,
                      'is-focused': activeField == 'customer'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.collateral.fields.customer')
                    }}</label>
                    <v-select
                      name="customer"
                      label="given_name_en"
                      :key="'customer-field'"
                      :value="entry.customer_id"
                      :options="lists.customer"
                      :reduce="entry => entry.id"
                      @input="updateCustomer"
                      @search.focus="focusField('customer')"
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
                      $t('cruds.collateral.fields.description')
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
                      'has-items': entry.collateral_type_id !== null,
                      'is-focused': activeField == 'collateral_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.collateral_type')
                    }}</label>
                    <v-select
                      name="collateral_type"
                      label="label"
                      :key="'collateral_type-field'"
                      :value="entry.collateral_type_id"
                      :options="lists.collateral_type"
                      :reduce="entry => entry.id"
                      @input="updateCollateralType"
                      @search.focus="focusField('collateral_type')"
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
                      $t('cruds.collateral.fields.currency')
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
                      'has-items': entry.purchase_price,
                      'is-focused': activeField == 'purchase_price'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.purchase_price')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.purchase_price"
                      @input="updatePurchasePrice"
                      @focus="focusField('purchase_price')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.valuation_price,
                      'is-focused': activeField == 'valuation_price'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.valuation_price')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.000000001"
                      :value="entry.valuation_price"
                      @input="updateValuationPrice"
                      @focus="focusField('valuation_price')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.valuer,
                      'is-focused': activeField == 'valuer'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.valuer')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.valuer"
                      @input="updateValuer"
                      @focus="focusField('valuer')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.issued_date,
                      'is-focused': activeField == 'issued_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.issued_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.issued_date"
                      @input="updateIssuedDate"
                      @focus="focusField('issued_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.issued_place,
                      'is-focused': activeField == 'issued_place'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.issued_place')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.issued_place"
                      @input="updateIssuedPlace"
                      @focus="focusField('issued_place')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.issued_by,
                      'is-focused': activeField == 'issued_by'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.issued_by')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.issued_by"
                      @input="updateIssuedBy"
                      @focus="focusField('issued_by')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.collateral_number,
                      'is-focused': activeField == 'collateral_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.collateral_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.collateral_number"
                      @input="updateCollateralNumber"
                      @focus="focusField('collateral_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.province_id !== null,
                      'is-focused': activeField == 'province'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.province')
                    }}</label>
                    <v-select
                      name="province"
                      label="name_en"
                      :key="'province-field'"
                      :value="entry.province_id"
                      :options="lists.province"
                      :reduce="entry => entry.id"
                      @input="updateProvince"
                      @search.focus="focusField('province')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.district_id !== null,
                      'is-focused': activeField == 'district'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.district')
                    }}</label>
                    <v-select
                      name="district"
                      label="name_en"
                      :key="'district-field'"
                      :value="entry.district_id"
                      :options="lists.district"
                      :reduce="entry => entry.id"
                      @input="updateDistrict"
                      @search.focus="focusField('district')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.commune_id !== null,
                      'is-focused': activeField == 'commune'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.commune')
                    }}</label>
                    <v-select
                      name="commune"
                      label="name_en"
                      :key="'commune-field'"
                      :value="entry.commune_id"
                      :options="lists.commune"
                      :reduce="entry => entry.id"
                      @input="updateCommune"
                      @search.focus="focusField('commune')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.village_id !== null,
                      'is-focused': activeField == 'village'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.village')
                    }}</label>
                    <v-select
                      name="village"
                      label="name_en"
                      :key="'village-field'"
                      :value="entry.village_id"
                      :options="lists.village"
                      :reduce="entry => entry.id"
                      @input="updateVillage"
                      @search.focus="focusField('village')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.received_date,
                      'is-focused': activeField == 'received_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.received_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.received_date"
                      @input="updateReceivedDate"
                      @focus="focusField('received_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.withdrawal_date,
                      'is-focused': activeField == 'withdrawal_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.collateral.fields.withdrawal_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.withdrawal_date"
                      @input="updateWithdrawalDate"
                      @focus="focusField('withdrawal_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
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
    ...mapGetters('CollateralsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('CollateralsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setCustomer',
      'setDescription',
      'setCollateralType',
      'setCurrency',
      'setPurchasePrice',
      'setValuationPrice',
      'setValuer',
      'setIssuedDate',
      'setIssuedPlace',
      'setIssuedBy',
      'setCollateralNumber',
      'setProvince',
      'setDistrict',
      'setCommune',
      'setVillage',
      'setReceivedDate',
      'setWithdrawalDate'
    ]),
    updateCustomer(value) {
      this.setCustomer(value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateCollateralType(value) {
      this.setCollateralType(value)
    },
    updateCurrency(value) {
      this.setCurrency(value)
    },
    updatePurchasePrice(e) {
      this.setPurchasePrice(e.target.value)
    },
    updateValuationPrice(e) {
      this.setValuationPrice(e.target.value)
    },
    updateValuer(e) {
      this.setValuer(e.target.value)
    },
    updateIssuedDate(e) {
      this.setIssuedDate(e.target.value)
    },
    updateIssuedPlace(e) {
      this.setIssuedPlace(e.target.value)
    },
    updateIssuedBy(e) {
      this.setIssuedBy(e.target.value)
    },
    updateCollateralNumber(e) {
      this.setCollateralNumber(e.target.value)
    },
    updateProvince(value) {
      this.setProvince(value)
    },
    updateDistrict(value) {
      this.setDistrict(value)
    },
    updateCommune(value) {
      this.setCommune(value)
    },
    updateVillage(value) {
      this.setVillage(value)
    },
    updateReceivedDate(e) {
      this.setReceivedDate(e.target.value)
    },
    updateWithdrawalDate(e) {
      this.setWithdrawalDate(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'collaterals.index' })
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
