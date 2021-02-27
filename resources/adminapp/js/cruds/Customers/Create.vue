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
                <strong>{{ $t('cruds.customer.title_singular') }}</strong>
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
                      'has-items': entry.customer_name,
                      'is-focused': activeField == 'customer_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.customer_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_name"
                      @input="updateCustomerName"
                      @focus="focusField('customer_name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_last_name,
                      'is-focused': activeField == 'customer_last_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.customer_last_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_last_name"
                      @input="updateCustomerLastName"
                      @focus="focusField('customer_last_name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_nickname,
                      'is-focused': activeField == 'customer_nickname'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_nickname')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_nickname"
                      @input="updateCustomerNickname"
                      @focus="focusField('customer_nickname')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_gender,
                      'is-focused': activeField == 'customer_gender'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_gender')
                    }}</label>
                    <v-select
                      name="customer_gender"
                      :key="'customer_gender-field'"
                      :value="entry.customer_gender"
                      :options="lists.customer_gender"
                      :reduce="entry => entry.value"
                      @input="updateCustomerGender"
                      @search.focus="focusField('customer_gender')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_date_of_birth,
                      'is-focused': activeField == 'customer_date_of_birth'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_date_of_birth')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.customer_date_of_birth"
                      @input="updateCustomerDateOfBirth"
                      @focus="focusField('customer_date_of_birth')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_nationality,
                      'is-focused': activeField == 'customer_nationality'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_nationality')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_nationality"
                      @input="updateCustomerNationality"
                      @focus="focusField('customer_nationality')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_phone,
                      'is-focused': activeField == 'customer_phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_phone"
                      @input="updateCustomerPhone"
                      @focus="focusField('customer_phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_business_phone,
                      'is-focused': activeField == 'customer_business_phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_business_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_business_phone"
                      @input="updateCustomerBusinessPhone"
                      @focus="focusField('customer_business_phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_other_phone,
                      'is-focused': activeField == 'customer_other_phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_other_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_other_phone"
                      @input="updateCustomerOtherPhone"
                      @focus="focusField('customer_other_phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_mail,
                      'is-focused': activeField == 'customer_mail'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_mail')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_mail"
                      @input="updateCustomerMail"
                      @focus="focusField('customer_mail')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_identity_type,
                      'is-focused': activeField == 'customer_identity_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_identity_type')
                    }}</label>
                    <v-select
                      name="customer_identity_type"
                      :key="'customer_identity_type-field'"
                      :value="entry.customer_identity_type"
                      :options="lists.customer_identity_type"
                      :reduce="entry => entry.value"
                      @input="updateCustomerIdentityType"
                      @search.focus="focusField('customer_identity_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_salary_slip,
                      'is-focused': activeField == 'customer_salary_slip'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_salary_slip')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.customer_salary_slip"
                      @input="updateCustomerSalarySlip"
                      @focus="focusField('customer_salary_slip')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_id_card,
                      'is-focused': activeField == 'customer_id_card'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_id_card')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_id_card"
                      @input="updateCustomerIdCard"
                      @focus="focusField('customer_id_card')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_back_id_card,
                      'is-focused': activeField == 'customer_back_id_card'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_back_id_card')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_back_id_card"
                      @input="updateCustomerBackIdCard"
                      @focus="focusField('customer_back_id_card')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.customer.fields.selfies_photo')
                    }}</label>
                    <attachment
                      :route="getRoute('customers')"
                      :collection-name="'customer_selfies_photo'"
                      :media="entry.selfies_photo"
                      :max-file-size="2"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertSelfiesPhotoFile"
                      @file-removed="removeSelfiesPhotoFile"
                      :max-files="1"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.number_of_children,
                      'is-focused': activeField == 'number_of_children'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.number_of_children')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.number_of_children"
                      @input="updateNumberOfChildren"
                      @focus="focusField('number_of_children')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.number_of_family_member,
                      'is-focused': activeField == 'number_of_family_member'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.number_of_family_member')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.number_of_family_member"
                      @input="updateNumberOfFamilyMember"
                      @focus="focusField('number_of_family_member')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.cbc_check,
                      'is-focused': activeField == 'cbc_check'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.cbc_check')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.cbc_check"
                      @input="updateCbcCheck"
                      @focus="focusField('cbc_check')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.cbc_scores,
                      'is-focused': activeField == 'cbc_scores'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.cbc_scores')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.cbc_scores"
                      @input="updateCbcScores"
                      @focus="focusField('cbc_scores')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.shift_works,
                      'is-focused': activeField == 'shift_works'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.shift_works')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.shift_works"
                      @input="updateShiftWorks"
                      @focus="focusField('shift_works')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.businesses_income,
                      'is-focused': activeField == 'businesses_income'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.businesses_income')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.businesses_income"
                      @input="updateBusinessesIncome"
                      @focus="focusField('businesses_income')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.type_of_business_activities,
                      'is-focused': activeField == 'type_of_business_activities'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.type_of_business_activities')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.type_of_business_activities"
                      @input="updateTypeOfBusinessActivities"
                      @focus="focusField('type_of_business_activities')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.general_expenses,
                      'is-focused': activeField == 'general_expenses'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.general_expenses')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.general_expenses"
                      @input="updateGeneralExpenses"
                      @focus="focusField('general_expenses')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items':
                        entry.yes_or_no_loan_leasing_repayment_expenses,
                      'is-focused':
                        activeField ==
                        'yes_or_no_loan_leasing_repayment_expenses'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.customer.fields.yes_or_no_loan_leasing_repayment_expenses'
                      )
                    }}</label>
                    <v-select
                      name="yes_or_no_loan_leasing_repayment_expenses"
                      :key="'yes_or_no_loan_leasing_repayment_expenses-field'"
                      :value="entry.yes_or_no_loan_leasing_repayment_expenses"
                      :options="lists.yes_or_no_loan_leasing_repayment_expenses"
                      :reduce="entry => entry.value"
                      @input="updateYesOrNoLoanLeasingRepaymentExpenses"
                      @search.focus="
                        focusField('yes_or_no_loan_leasing_repayment_expenses')
                      "
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name_of_institution,
                      'is-focused': activeField == 'name_of_institution'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.name_of_institution')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name_of_institution"
                      @input="updateNameOfInstitution"
                      @focus="focusField('name_of_institution')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_identity_number,
                      'is-focused': activeField == 'customer_identity_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_identity_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_identity_number"
                      @input="updateCustomerIdentityNumber"
                      @focus="focusField('customer_identity_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_identity_date,
                      'is-focused': activeField == 'customer_identity_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_identity_date')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_identity_date"
                      @input="updateCustomerIdentityDate"
                      @focus="focusField('customer_identity_date')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_vehicle,
                      'is-focused': activeField == 'customer_vehicle'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_vehicle')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_vehicle"
                      @input="updateCustomerVehicle"
                      @focus="focusField('customer_vehicle')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.house_no,
                      'is-focused': activeField == 'house_no'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.house_no')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.house_no"
                      @input="updateHouseNo"
                      @focus="focusField('house_no')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.street_no,
                      'is-focused': activeField == 'street_no'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.street_no')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.street_no"
                      @input="updateStreetNo"
                      @focus="focusField('street_no')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.address,
                      'is-focused': activeField == 'address'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.address')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.address"
                      @input="updateAddress"
                      @focus="focusField('address')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_status,
                      'is-focused': activeField == 'customer_status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_status')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_status"
                      @input="updateCustomerStatus"
                      @focus="focusField('customer_status')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_blanklist,
                      'is-focused': activeField == 'customer_blanklist'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_blanklist')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_blanklist"
                      @input="updateCustomerBlanklist"
                      @focus="focusField('customer_blanklist')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.customer.fields.customer_profile')
                    }}</label>
                    <attachment
                      :route="getRoute('customers')"
                      :collection-name="'customer_customer_profile'"
                      :media="entry.customer_profile"
                      :max-file-size="2"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertCustomerProfileFile"
                      @file-removed="removeCustomerProfileFile"
                      :max-files="1"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.customer.fields.documentations')
                    }}</label>
                    <attachment
                      :route="getRoute('customers')"
                      :collection-name="'customer_documentations'"
                      :media="entry.documentations"
                      :max-file-size="2"
                      @file-uploaded="insertDocumentationsFile"
                      @file-removed="removeDocumentationsFile"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_occupation,
                      'is-focused': activeField == 'customer_occupation'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_occupation')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_occupation"
                      @input="updateCustomerOccupation"
                      @focus="focusField('customer_occupation')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_income,
                      'is-focused': activeField == 'customer_income'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_income')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_income"
                      @input="updateCustomerIncome"
                      @focus="focusField('customer_income')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.income_from_salary,
                      'is-focused': activeField == 'income_from_salary'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.income_from_salary')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.income_from_salary"
                      @input="updateIncomeFromSalary"
                      @focus="focusField('income_from_salary')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.asset_type,
                      'is-focused': activeField == 'asset_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.asset_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.asset_type"
                      @input="updateAssetType"
                      @focus="focusField('asset_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.asset,
                      'is-focused': activeField == 'asset'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.asset')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.asset"
                      @input="updateAsset"
                      @focus="focusField('asset')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.collateral,
                      'is-focused': activeField == 'collateral'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.collateral')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.collateral"
                      @input="updateCollateral"
                      @focus="focusField('collateral')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_currency_income,
                      'is-focused': activeField == 'customer_currency_income'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_currency_income')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_currency_income"
                      @input="updateCustomerCurrencyIncome"
                      @focus="focusField('customer_currency_income')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_currency_income,
                      'is-focused': activeField == 'spouse_currency_income'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_currency_income')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_currency_income"
                      @input="updateSpouseCurrencyIncome"
                      @focus="focusField('spouse_currency_income')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse,
                      'is-focused': activeField == 'spouse'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse"
                      @input="updateSpouse"
                      @focus="focusField('spouse')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_name,
                      'is-focused': activeField == 'spouse_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_name"
                      @input="updateSpouseName"
                      @focus="focusField('spouse_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_gender,
                      'is-focused': activeField == 'spouse_gender'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_gender')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_gender"
                      @input="updateSpouseGender"
                      @focus="focusField('spouse_gender')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_date_of_birth,
                      'is-focused': activeField == 'spouse_date_of_birth'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_date_of_birth')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_date_of_birth"
                      @input="updateSpouseDateOfBirth"
                      @focus="focusField('spouse_date_of_birth')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_nationality,
                      'is-focused': activeField == 'spouse_nationality'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_nationality')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_nationality"
                      @input="updateSpouseNationality"
                      @focus="focusField('spouse_nationality')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_phone,
                      'is-focused': activeField == 'spouse_phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_phone"
                      @input="updateSpousePhone"
                      @focus="focusField('spouse_phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_mail,
                      'is-focused': activeField == 'spouse_mail'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_mail')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_mail"
                      @input="updateSpouseMail"
                      @focus="focusField('spouse_mail')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_identity_type,
                      'is-focused': activeField == 'spouse_identity_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_identity_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_identity_type"
                      @input="updateSpouseIdentityType"
                      @focus="focusField('spouse_identity_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_identity_number,
                      'is-focused': activeField == 'spouse_identity_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_identity_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_identity_number"
                      @input="updateSpouseIdentityNumber"
                      @focus="focusField('spouse_identity_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_identity_date,
                      'is-focused': activeField == 'spouse_identity_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_identity_date')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_identity_date"
                      @input="updateSpouseIdentityDate"
                      @focus="focusField('spouse_identity_date')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.customer.fields.spouse_profile')
                    }}</label>
                    <attachment
                      :route="getRoute('customers')"
                      :collection-name="'customer_spouse_profile'"
                      :media="entry.spouse_profile"
                      :max-file-size="2"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertSpouseProfileFile"
                      @file-removed="removeSpouseProfileFile"
                      :max-files="1"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_occupation,
                      'is-focused': activeField == 'spouse_occupation'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_occupation')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_occupation"
                      @input="updateSpouseOccupation"
                      @focus="focusField('spouse_occupation')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_income,
                      'is-focused': activeField == 'spouse_income'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_income')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_income"
                      @input="updateSpouseIncome"
                      @focus="focusField('spouse_income')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.is_staff,
                      'is-focused': activeField == 'is_staff'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.is_staff')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.is_staff"
                      @input="updateIsStaff"
                      @focus="focusField('is_staff')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.is_guarantor,
                      'is-focused': activeField == 'is_guarantor'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.is_guarantor')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.is_guarantor"
                      @input="updateIsGuarantor"
                      @focus="focusField('is_guarantor')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.user,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.user')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.user"
                      @input="updateUser"
                      @focus="focusField('user')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.branch,
                      'is-focused': activeField == 'branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.branch')
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
                      'has-items': entry.password,
                      'is-focused': activeField == 'password'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.password')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.password"
                      @input="updatePassword"
                      @focus="focusField('password')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.remember_token,
                      'is-focused': activeField == 'remember_token'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.remember_token')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.remember_token"
                      @input="updateRememberToken"
                      @focus="focusField('remember_token')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.created_by,
                      'is-focused': activeField == 'created_by'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.created_by')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.created_by"
                      @input="updateCreatedBy"
                      @focus="focusField('created_by')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.updated_by,
                      'is-focused': activeField == 'updated_by'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.updated_by')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.updated_by"
                      @input="updateUpdatedBy"
                      @focus="focusField('updated_by')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.marital_status,
                      'is-focused': activeField == 'marital_status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.marital_status')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.marital_status"
                      @input="updateMaritalStatus"
                      @focus="focusField('marital_status')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_living_condition,
                      'is-focused': activeField == 'customer_living_condition'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_living_condition')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_living_condition"
                      @input="updateCustomerLivingCondition"
                      @focus="focusField('customer_living_condition')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_latin_name,
                      'is-focused': activeField == 'customer_latin_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_latin_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_latin_name"
                      @input="updateCustomerLatinName"
                      @focus="focusField('customer_latin_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_identity_expired_date,
                      'is-focused':
                        activeField == 'customer_identity_expired_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_identity_expired_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.customer_identity_expired_date"
                      @input="updateCustomerIdentityExpiredDate"
                      @focus="focusField('customer_identity_expired_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_working_period,
                      'is-focused': activeField == 'customer_working_period'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_working_period')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.customer_working_period"
                      @input="updateCustomerWorkingPeriod"
                      @focus="focusField('customer_working_period')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_work_experience,
                      'is-focused': activeField == 'customer_work_experience'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_work_experience')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_work_experience"
                      @input="updateCustomerWorkExperience"
                      @focus="focusField('customer_work_experience')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_employment_status,
                      'is-focused': activeField == 'customer_employment_status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_employment_status')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_employment_status"
                      @input="updateCustomerEmploymentStatus"
                      @focus="focusField('customer_employment_status')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_organization,
                      'is-focused': activeField == 'customer_organization'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_organization')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_organization"
                      @input="updateCustomerOrganization"
                      @focus="focusField('customer_organization')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_organization_house_no,
                      'is-focused':
                        activeField == 'customer_organization_house_no'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_organization_house_no')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_organization_house_no"
                      @input="updateCustomerOrganizationHouseNo"
                      @focus="focusField('customer_organization_house_no')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_organization_street_no,
                      'is-focused':
                        activeField == 'customer_organization_street_no'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.customer.fields.customer_organization_street_no'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_organization_street_no"
                      @input="updateCustomerOrganizationStreetNo"
                      @focus="focusField('customer_organization_street_no')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_organization_address,
                      'is-focused':
                        activeField == 'customer_organization_address'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_organization_address')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_organization_address"
                      @input="updateCustomerOrganizationAddress"
                      @focus="focusField('customer_organization_address')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.relationship,
                      'is-focused': activeField == 'relationship'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.relationship')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.relationship"
                      @input="updateRelationship"
                      @focus="focusField('relationship')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_type,
                      'is-focused': activeField == 'customer_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_type"
                      @input="updateCustomerType"
                      @focus="focusField('customer_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.scores,
                      'is-focused': activeField == 'scores'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.scores')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.scores"
                      @input="updateScores"
                      @focus="focusField('scores')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.is_agree,
                      'is-focused': activeField == 'is_agree'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.is_agree')
                    }}</label>
                    <v-select
                      name="is_agree"
                      :key="'is_agree-field'"
                      :value="entry.is_agree"
                      :options="lists.is_agree"
                      :reduce="entry => entry.value"
                      @input="updateIsAgree"
                      @search.focus="focusField('is_agree')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.recommended,
                      'is-focused': activeField == 'recommended'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.recommended')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.recommended"
                      @input="updateRecommended"
                      @focus="focusField('recommended')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.percentage,
                      'is-focused': activeField == 'percentage'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.percentage')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.percentage"
                      @input="updatePercentage"
                      @focus="focusField('percentage')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.number_share,
                      'is-focused': activeField == 'number_share'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.number_share')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.number_share"
                      @input="updateNumberShare"
                      @focus="focusField('number_share')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.member_type,
                      'is-focused': activeField == 'member_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.member_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.member_type"
                      @input="updateMemberType"
                      @focus="focusField('member_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.investor_type,
                      'is-focused': activeField == 'investor_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.investor_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.investor_type"
                      @input="updateInvestorType"
                      @focus="focusField('investor_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.about,
                      'is-focused': activeField == 'about'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.about')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.about"
                      @input="updateAbout"
                      @focus="focusField('about')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.qiid,
                      'is-focused': activeField == 'qiid'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.qiid')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.qiid"
                      @input="updateQiid"
                      @focus="focusField('qiid')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.json,
                      'is-focused': activeField == 'json'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.json')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.json"
                      @input="updateJson"
                      @focus="focusField('json')"
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
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CustomersSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CustomersSingle', [
      'storeData',
      'resetState',
      'setCustomerName',
      'setCustomerLastName',
      'setCustomerNickname',
      'setCustomerGender',
      'setCustomerDateOfBirth',
      'setCustomerNationality',
      'setCustomerPhone',
      'setCustomerBusinessPhone',
      'setCustomerOtherPhone',
      'setCustomerMail',
      'setCustomerIdentityType',
      'setCustomerSalarySlip',
      'setCustomerIdCard',
      'setCustomerBackIdCard',
      'insertSelfiesPhotoFile',
      'removeSelfiesPhotoFile',
      'setNumberOfChildren',
      'setNumberOfFamilyMember',
      'setCbcCheck',
      'setCbcScores',
      'setShiftWorks',
      'setBusinessesIncome',
      'setTypeOfBusinessActivities',
      'setGeneralExpenses',
      'setYesOrNoLoanLeasingRepaymentExpenses',
      'setNameOfInstitution',
      'setCustomerIdentityNumber',
      'setCustomerIdentityDate',
      'setCustomerVehicle',
      'setHouseNo',
      'setStreetNo',
      'setAddress',
      'setCustomerStatus',
      'setCustomerBlanklist',
      'insertCustomerProfileFile',
      'removeCustomerProfileFile',
      'insertDocumentationsFile',
      'removeDocumentationsFile',
      'setCustomerOccupation',
      'setCustomerIncome',
      'setIncomeFromSalary',
      'setAssetType',
      'setAsset',
      'setCollateral',
      'setCustomerCurrencyIncome',
      'setSpouseCurrencyIncome',
      'setSpouse',
      'setSpouseName',
      'setSpouseGender',
      'setSpouseDateOfBirth',
      'setSpouseNationality',
      'setSpousePhone',
      'setSpouseMail',
      'setSpouseIdentityType',
      'setSpouseIdentityNumber',
      'setSpouseIdentityDate',
      'insertSpouseProfileFile',
      'removeSpouseProfileFile',
      'setSpouseOccupation',
      'setSpouseIncome',
      'setIsStaff',
      'setIsGuarantor',
      'setUser',
      'setBranch',
      'setPassword',
      'setRememberToken',
      'setCreatedBy',
      'setUpdatedBy',
      'setMaritalStatus',
      'setCustomerLivingCondition',
      'setCustomerLatinName',
      'setCustomerIdentityExpiredDate',
      'setCustomerWorkingPeriod',
      'setCustomerWorkExperience',
      'setCustomerEmploymentStatus',
      'setCustomerOrganization',
      'setCustomerOrganizationHouseNo',
      'setCustomerOrganizationStreetNo',
      'setCustomerOrganizationAddress',
      'setRelationship',
      'setCustomerType',
      'setScores',
      'setIsAgree',
      'setRecommended',
      'setPercentage',
      'setNumberShare',
      'setMemberType',
      'setInvestorType',
      'setAbout',
      'setQiid',
      'setJson',
      'fetchCreateData'
    ]),
    updateCustomerName(e) {
      this.setCustomerName(e.target.value)
    },
    updateCustomerLastName(e) {
      this.setCustomerLastName(e.target.value)
    },
    updateCustomerNickname(e) {
      this.setCustomerNickname(e.target.value)
    },
    updateCustomerGender(value) {
      this.setCustomerGender(value)
    },
    updateCustomerDateOfBirth(e) {
      this.setCustomerDateOfBirth(e.target.value)
    },
    updateCustomerNationality(e) {
      this.setCustomerNationality(e.target.value)
    },
    updateCustomerPhone(e) {
      this.setCustomerPhone(e.target.value)
    },
    updateCustomerBusinessPhone(e) {
      this.setCustomerBusinessPhone(e.target.value)
    },
    updateCustomerOtherPhone(e) {
      this.setCustomerOtherPhone(e.target.value)
    },
    updateCustomerMail(e) {
      this.setCustomerMail(e.target.value)
    },
    updateCustomerIdentityType(value) {
      this.setCustomerIdentityType(value)
    },
    updateCustomerSalarySlip(e) {
      this.setCustomerSalarySlip(e.target.value)
    },
    updateCustomerIdCard(e) {
      this.setCustomerIdCard(e.target.value)
    },
    updateCustomerBackIdCard(e) {
      this.setCustomerBackIdCard(e.target.value)
    },
    updateNumberOfChildren(e) {
      this.setNumberOfChildren(e.target.value)
    },
    updateNumberOfFamilyMember(e) {
      this.setNumberOfFamilyMember(e.target.value)
    },
    updateCbcCheck(e) {
      this.setCbcCheck(e.target.value)
    },
    updateCbcScores(e) {
      this.setCbcScores(e.target.value)
    },
    updateShiftWorks(e) {
      this.setShiftWorks(e.target.value)
    },
    updateBusinessesIncome(e) {
      this.setBusinessesIncome(e.target.value)
    },
    updateTypeOfBusinessActivities(e) {
      this.setTypeOfBusinessActivities(e.target.value)
    },
    updateGeneralExpenses(e) {
      this.setGeneralExpenses(e.target.value)
    },
    updateYesOrNoLoanLeasingRepaymentExpenses(value) {
      this.setYesOrNoLoanLeasingRepaymentExpenses(value)
    },
    updateNameOfInstitution(e) {
      this.setNameOfInstitution(e.target.value)
    },
    updateCustomerIdentityNumber(e) {
      this.setCustomerIdentityNumber(e.target.value)
    },
    updateCustomerIdentityDate(e) {
      this.setCustomerIdentityDate(e.target.value)
    },
    updateCustomerVehicle(e) {
      this.setCustomerVehicle(e.target.value)
    },
    updateHouseNo(e) {
      this.setHouseNo(e.target.value)
    },
    updateStreetNo(e) {
      this.setStreetNo(e.target.value)
    },
    updateAddress(e) {
      this.setAddress(e.target.value)
    },
    updateCustomerStatus(e) {
      this.setCustomerStatus(e.target.value)
    },
    updateCustomerBlanklist(e) {
      this.setCustomerBlanklist(e.target.value)
    },
    updateCustomerOccupation(e) {
      this.setCustomerOccupation(e.target.value)
    },
    updateCustomerIncome(e) {
      this.setCustomerIncome(e.target.value)
    },
    updateIncomeFromSalary(e) {
      this.setIncomeFromSalary(e.target.value)
    },
    updateAssetType(e) {
      this.setAssetType(e.target.value)
    },
    updateAsset(e) {
      this.setAsset(e.target.value)
    },
    updateCollateral(e) {
      this.setCollateral(e.target.value)
    },
    updateCustomerCurrencyIncome(e) {
      this.setCustomerCurrencyIncome(e.target.value)
    },
    updateSpouseCurrencyIncome(e) {
      this.setSpouseCurrencyIncome(e.target.value)
    },
    updateSpouse(e) {
      this.setSpouse(e.target.value)
    },
    updateSpouseName(e) {
      this.setSpouseName(e.target.value)
    },
    updateSpouseGender(e) {
      this.setSpouseGender(e.target.value)
    },
    updateSpouseDateOfBirth(e) {
      this.setSpouseDateOfBirth(e.target.value)
    },
    updateSpouseNationality(e) {
      this.setSpouseNationality(e.target.value)
    },
    updateSpousePhone(e) {
      this.setSpousePhone(e.target.value)
    },
    updateSpouseMail(e) {
      this.setSpouseMail(e.target.value)
    },
    updateSpouseIdentityType(e) {
      this.setSpouseIdentityType(e.target.value)
    },
    updateSpouseIdentityNumber(e) {
      this.setSpouseIdentityNumber(e.target.value)
    },
    updateSpouseIdentityDate(e) {
      this.setSpouseIdentityDate(e.target.value)
    },
    updateSpouseOccupation(e) {
      this.setSpouseOccupation(e.target.value)
    },
    updateSpouseIncome(e) {
      this.setSpouseIncome(e.target.value)
    },
    updateIsStaff(e) {
      this.setIsStaff(e.target.value)
    },
    updateIsGuarantor(e) {
      this.setIsGuarantor(e.target.value)
    },
    updateUser(e) {
      this.setUser(e.target.value)
    },
    updateBranch(e) {
      this.setBranch(e.target.value)
    },
    updatePassword(e) {
      this.setPassword(e.target.value)
    },
    updateRememberToken(e) {
      this.setRememberToken(e.target.value)
    },
    updateCreatedBy(e) {
      this.setCreatedBy(e.target.value)
    },
    updateUpdatedBy(e) {
      this.setUpdatedBy(e.target.value)
    },
    updateMaritalStatus(e) {
      this.setMaritalStatus(e.target.value)
    },
    updateCustomerLivingCondition(e) {
      this.setCustomerLivingCondition(e.target.value)
    },
    updateCustomerLatinName(e) {
      this.setCustomerLatinName(e.target.value)
    },
    updateCustomerIdentityExpiredDate(e) {
      this.setCustomerIdentityExpiredDate(e.target.value)
    },
    updateCustomerWorkingPeriod(e) {
      this.setCustomerWorkingPeriod(e.target.value)
    },
    updateCustomerWorkExperience(e) {
      this.setCustomerWorkExperience(e.target.value)
    },
    updateCustomerEmploymentStatus(e) {
      this.setCustomerEmploymentStatus(e.target.value)
    },
    updateCustomerOrganization(e) {
      this.setCustomerOrganization(e.target.value)
    },
    updateCustomerOrganizationHouseNo(e) {
      this.setCustomerOrganizationHouseNo(e.target.value)
    },
    updateCustomerOrganizationStreetNo(e) {
      this.setCustomerOrganizationStreetNo(e.target.value)
    },
    updateCustomerOrganizationAddress(e) {
      this.setCustomerOrganizationAddress(e.target.value)
    },
    updateRelationship(e) {
      this.setRelationship(e.target.value)
    },
    updateCustomerType(e) {
      this.setCustomerType(e.target.value)
    },
    updateScores(e) {
      this.setScores(e.target.value)
    },
    updateIsAgree(value) {
      this.setIsAgree(value)
    },
    updateRecommended(e) {
      this.setRecommended(e.target.value)
    },
    updatePercentage(e) {
      this.setPercentage(e.target.value)
    },
    updateNumberShare(e) {
      this.setNumberShare(e.target.value)
    },
    updateMemberType(e) {
      this.setMemberType(e.target.value)
    },
    updateInvestorType(e) {
      this.setInvestorType(e.target.value)
    },
    updateAbout(e) {
      this.setAbout(e.target.value)
    },
    updateQiid(e) {
      this.setQiid(e.target.value)
    },
    updateJson(e) {
      this.setJson(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'customers.index' })
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
