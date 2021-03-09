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
                      'has-items': entry.branch_id !== null,
                      'is-focused': activeField == 'branch'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.branch')
                    }}</label>
                    <v-select
                      name="branch"
                      label="name_en"
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
                      'has-items': entry.given_name_en,
                      'is-focused': activeField == 'given_name_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.given_name_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.given_name_en"
                      @input="updateGivenNameEn"
                      @focus="focusField('given_name_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.surname_en,
                      'is-focused': activeField == 'surname_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.surname_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.surname_en"
                      @input="updateSurnameEn"
                      @focus="focusField('surname_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.given_name_lc,
                      'is-focused': activeField == 'given_name_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.given_name_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.given_name_lc"
                      @input="updateGivenNameLc"
                      @focus="focusField('given_name_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.surname_lc,
                      'is-focused': activeField == 'surname_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.surname_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.surname_lc"
                      @input="updateSurnameLc"
                      @focus="focusField('surname_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.title')
                    }}</label>
                    <v-select
                      name="title"
                      :key="'title-field'"
                      :value="entry.title"
                      :options="lists.title"
                      :reduce="entry => entry.value"
                      @input="updateTitle"
                      @search.focus="focusField('title')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.gender_id !== null,
                      'is-focused': activeField == 'gender'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.gender')
                    }}</label>
                    <v-select
                      name="gender"
                      label="label"
                      :key="'gender-field'"
                      :value="entry.gender_id"
                      :options="lists.gender"
                      :reduce="entry => entry.id"
                      @input="updateGender"
                      @search.focus="focusField('gender')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.date_of_birth,
                      'is-focused': activeField == 'date_of_birth'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.customer.fields.date_of_birth')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.date_of_birth"
                      @input="updateDateOfBirth"
                      @focus="focusField('date_of_birth')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_type_id !== null,
                      'is-focused': activeField == 'customer_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.customer_type')
                    }}</label>
                    <v-select
                      name="customer_type"
                      label="label"
                      :key="'customer_type-field'"
                      :value="entry.customer_type_id"
                      :options="lists.customer_type"
                      :reduce="entry => entry.id"
                      @input="updateCustomerType"
                      @search.focus="focusField('customer_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.resident_status_id !== null,
                      'is-focused': activeField == 'resident_status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.resident_status')
                    }}</label>
                    <v-select
                      name="resident_status"
                      label="label"
                      :key="'resident_status-field'"
                      :value="entry.resident_status_id"
                      :options="lists.resident_status"
                      :reduce="entry => entry.id"
                      @input="updateResidentStatus"
                      @search.focus="focusField('resident_status')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.education_level_id !== null,
                      'is-focused': activeField == 'education_level'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.education_level')
                    }}</label>
                    <v-select
                      name="education_level"
                      label="label"
                      :key="'education_level-field'"
                      :value="entry.education_level_id"
                      :options="lists.education_level"
                      :reduce="entry => entry.id"
                      @input="updateEducationLevel"
                      @search.focus="focusField('education_level')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.officer_id !== null,
                      'is-focused': activeField == 'officer'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.officer')
                    }}</label>
                    <v-select
                      name="officer"
                      label="label"
                      :key="'officer-field'"
                      :value="entry.officer_id"
                      :options="lists.officer"
                      :reduce="entry => entry.id"
                      @input="updateOfficer"
                      @search.focus="focusField('officer')"
                      @search.blur="clearFocus"
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
                      'has-items': entry.street,
                      'is-focused': activeField == 'street'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.street')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.street"
                      @input="updateStreet"
                      @focus="focusField('street')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone_1,
                      'is-focused': activeField == 'phone_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.phone_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone_1"
                      @input="updatePhone1"
                      @focus="focusField('phone_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone_2,
                      'is-focused': activeField == 'phone_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.phone_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone_2"
                      @input="updatePhone2"
                      @focus="focusField('phone_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.facebook,
                      'is-focused': activeField == 'facebook'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.facebook')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.facebook"
                      @input="updateFacebook"
                      @focus="focusField('facebook')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.customer.fields.location_mapping')
                    }}</label>
                    <ckeditor
                      :editor="editor"
                      :value="entry.location_mapping"
                      @input="updateLocationMapping"
                    >
                    </ckeditor>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_given_name_en,
                      'is-focused': activeField == 'family_given_name_en'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_given_name_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_given_name_en"
                      @input="updateFamilyGivenNameEn"
                      @focus="focusField('family_given_name_en')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_surname_en,
                      'is-focused': activeField == 'family_surname_en'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_surname_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_surname_en"
                      @input="updateFamilySurnameEn"
                      @focus="focusField('family_surname_en')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_given_name_lc,
                      'is-focused': activeField == 'family_given_name_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_given_name_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_given_name_lc"
                      @input="updateFamilyGivenNameLc"
                      @focus="focusField('family_given_name_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_surname_lc,
                      'is-focused': activeField == 'family_surname_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_surname_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_surname_lc"
                      @input="updateFamilySurnameLc"
                      @focus="focusField('family_surname_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_date_of_birth,
                      'is-focused': activeField == 'family_date_of_birth'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_date_of_birth')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.family_date_of_birth"
                      @input="updateFamilyDateOfBirth"
                      @focus="focusField('family_date_of_birth')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_nationality,
                      'is-focused': activeField == 'family_nationality'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_nationality')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_nationality"
                      @input="updateFamilyNationality"
                      @focus="focusField('family_nationality')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_id_type,
                      'is-focused': activeField == 'family_id_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_id_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_id_type"
                      @input="updateFamilyIdType"
                      @focus="focusField('family_id_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_id_number,
                      'is-focused': activeField == 'family_id_number'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_id_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_id_number"
                      @input="updateFamilyIdNumber"
                      @focus="focusField('family_id_number')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_issue_place,
                      'is-focused': activeField == 'family_issue_place'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_issue_place')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_issue_place"
                      @input="updateFamilyIssuePlace"
                      @focus="focusField('family_issue_place')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_issue_date,
                      'is-focused': activeField == 'family_issue_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_issue_date')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_issue_date"
                      @input="updateFamilyIssueDate"
                      @focus="focusField('family_issue_date')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_expiry_date,
                      'is-focused': activeField == 'family_expiry_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_expiry_date')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_expiry_date"
                      @input="updateFamilyExpiryDate"
                      @focus="focusField('family_expiry_date')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.spouse_employment,
                      'is-focused': activeField == 'spouse_employment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.spouse_employment')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.spouse_employment"
                      @input="updateSpouseEmployment"
                      @focus="focusField('spouse_employment')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_phone_1,
                      'is-focused': activeField == 'family_phone_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_phone_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_phone_1"
                      @input="updateFamilyPhone1"
                      @focus="focusField('family_phone_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_phone_2,
                      'is-focused': activeField == 'family_phone_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_phone_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.family_phone_2"
                      @input="updateFamilyPhone2"
                      @focus="focusField('family_phone_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.house_ownership,
                      'is-focused': activeField == 'house_ownership'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.house_ownership')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.house_ownership"
                      @input="updateHouseOwnership"
                      @focus="focusField('house_ownership')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.family_member,
                      'is-focused': activeField == 'family_member'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.family_member')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.family_member"
                      @input="updateFamilyMember"
                      @focus="focusField('family_member')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.active_member,
                      'is-focused': activeField == 'active_member'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.active_member')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.active_member"
                      @input="updateActiveMember"
                      @focus="focusField('active_member')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.employment,
                      'is-focused': activeField == 'employment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.employment')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.employment"
                      @input="updateEmployment"
                      @focus="focusField('employment')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_name,
                      'is-focused': activeField == 'company_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_name"
                      @input="updateCompanyName"
                      @focus="focusField('company_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.employer_name,
                      'is-focused': activeField == 'employer_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.employer_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.employer_name"
                      @input="updateEmployerName"
                      @focus="focusField('employer_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.business_type,
                      'is-focused': activeField == 'business_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.business_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.business_type"
                      @input="updateBusinessType"
                      @focus="focusField('business_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.position,
                      'is-focused': activeField == 'position'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.position')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.position"
                      @input="updatePosition"
                      @focus="focusField('position')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_country,
                      'is-focused': activeField == 'company_country'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_country')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_country"
                      @input="updateCompanyCountry"
                      @focus="focusField('company_country')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_province,
                      'is-focused': activeField == 'company_province'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_province')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_province"
                      @input="updateCompanyProvince"
                      @focus="focusField('company_province')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_district,
                      'is-focused': activeField == 'company_district'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_district')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_district"
                      @input="updateCompanyDistrict"
                      @focus="focusField('company_district')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_commune,
                      'is-focused': activeField == 'company_commune'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_commune')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_commune"
                      @input="updateCompanyCommune"
                      @focus="focusField('company_commune')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_village,
                      'is-focused': activeField == 'company_village'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_village')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_village"
                      @input="updateCompanyVillage"
                      @focus="focusField('company_village')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_street,
                      'is-focused': activeField == 'company_street'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_street')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_street"
                      @input="updateCompanyStreet"
                      @focus="focusField('company_street')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_no,
                      'is-focused': activeField == 'company_no'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_no')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_no"
                      @input="updateCompanyNo"
                      @focus="focusField('company_no')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_telephone,
                      'is-focused': activeField == 'company_telephone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_telephone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_telephone"
                      @input="updateCompanyTelephone"
                      @focus="focusField('company_telephone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_fax,
                      'is-focused': activeField == 'company_fax'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_fax')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_fax"
                      @input="updateCompanyFax"
                      @focus="focusField('company_fax')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_email,
                      'is-focused': activeField == 'company_email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.company_email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_email"
                      @input="updateCompanyEmail"
                      @focus="focusField('company_email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.year_of_employed,
                      'is-focused': activeField == 'year_of_employed'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.customer.fields.year_of_employed')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.year_of_employed"
                      @input="updateYearOfEmployed"
                      @focus="focusField('year_of_employed')"
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  components: {
    ClassicEditor
  },
  data() {
    return {
      status: '',
      activeField: '',
      editor: ClassicEditor
    }
  },
  computed: {
    ...mapGetters('CustomersSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('CustomersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setCustomerName',
      'setBranch',
      'setGivenNameEn',
      'setSurnameEn',
      'setGivenNameLc',
      'setSurnameLc',
      'setTitle',
      'setGender',
      'setDateOfBirth',
      'setCustomerType',
      'setResidentStatus',
      'setEducationLevel',
      'setOfficer',
      'setHouseNo',
      'setStreet',
      'setPhone1',
      'setPhone2',
      'setFacebook',
      'setEmail',
      'setLocationMapping',
      'setFamilyGivenNameEn',
      'setFamilySurnameEn',
      'setFamilyGivenNameLc',
      'setFamilySurnameLc',
      'setFamilyDateOfBirth',
      'setFamilyNationality',
      'setFamilyIdType',
      'setFamilyIdNumber',
      'setFamilyIssuePlace',
      'setFamilyIssueDate',
      'setFamilyExpiryDate',
      'setSpouseEmployment',
      'setFamilyPhone1',
      'setFamilyPhone2',
      'setHouseOwnership',
      'setFamilyMember',
      'setActiveMember',
      'setEmployment',
      'setCompanyName',
      'setEmployerName',
      'setBusinessType',
      'setPosition',
      'setCompanyCountry',
      'setCompanyProvince',
      'setCompanyDistrict',
      'setCompanyCommune',
      'setCompanyVillage',
      'setCompanyStreet',
      'setCompanyNo',
      'setCompanyTelephone',
      'setCompanyFax',
      'setCompanyEmail',
      'setYearOfEmployed'
    ]),
    updateCustomerName(e) {
      this.setCustomerName(e.target.value)
    },
    updateBranch(value) {
      this.setBranch(value)
    },
    updateGivenNameEn(e) {
      this.setGivenNameEn(e.target.value)
    },
    updateSurnameEn(e) {
      this.setSurnameEn(e.target.value)
    },
    updateGivenNameLc(e) {
      this.setGivenNameLc(e.target.value)
    },
    updateSurnameLc(e) {
      this.setSurnameLc(e.target.value)
    },
    updateTitle(value) {
      this.setTitle(value)
    },
    updateGender(value) {
      this.setGender(value)
    },
    updateDateOfBirth(e) {
      this.setDateOfBirth(e.target.value)
    },
    updateCustomerType(value) {
      this.setCustomerType(value)
    },
    updateResidentStatus(value) {
      this.setResidentStatus(value)
    },
    updateEducationLevel(value) {
      this.setEducationLevel(value)
    },
    updateOfficer(value) {
      this.setOfficer(value)
    },
    updateHouseNo(e) {
      this.setHouseNo(e.target.value)
    },
    updateStreet(e) {
      this.setStreet(e.target.value)
    },
    updatePhone1(e) {
      this.setPhone1(e.target.value)
    },
    updatePhone2(e) {
      this.setPhone2(e.target.value)
    },
    updateFacebook(e) {
      this.setFacebook(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateLocationMapping(value) {
      this.setLocationMapping(value)
    },
    updateFamilyGivenNameEn(e) {
      this.setFamilyGivenNameEn(e.target.value)
    },
    updateFamilySurnameEn(e) {
      this.setFamilySurnameEn(e.target.value)
    },
    updateFamilyGivenNameLc(e) {
      this.setFamilyGivenNameLc(e.target.value)
    },
    updateFamilySurnameLc(e) {
      this.setFamilySurnameLc(e.target.value)
    },
    updateFamilyDateOfBirth(e) {
      this.setFamilyDateOfBirth(e.target.value)
    },
    updateFamilyNationality(e) {
      this.setFamilyNationality(e.target.value)
    },
    updateFamilyIdType(e) {
      this.setFamilyIdType(e.target.value)
    },
    updateFamilyIdNumber(e) {
      this.setFamilyIdNumber(e.target.value)
    },
    updateFamilyIssuePlace(e) {
      this.setFamilyIssuePlace(e.target.value)
    },
    updateFamilyIssueDate(e) {
      this.setFamilyIssueDate(e.target.value)
    },
    updateFamilyExpiryDate(e) {
      this.setFamilyExpiryDate(e.target.value)
    },
    updateSpouseEmployment(e) {
      this.setSpouseEmployment(e.target.value)
    },
    updateFamilyPhone1(e) {
      this.setFamilyPhone1(e.target.value)
    },
    updateFamilyPhone2(e) {
      this.setFamilyPhone2(e.target.value)
    },
    updateHouseOwnership(e) {
      this.setHouseOwnership(e.target.value)
    },
    updateFamilyMember(e) {
      this.setFamilyMember(e.target.value)
    },
    updateActiveMember(e) {
      this.setActiveMember(e.target.value)
    },
    updateEmployment(e) {
      this.setEmployment(e.target.value)
    },
    updateCompanyName(e) {
      this.setCompanyName(e.target.value)
    },
    updateEmployerName(e) {
      this.setEmployerName(e.target.value)
    },
    updateBusinessType(e) {
      this.setBusinessType(e.target.value)
    },
    updatePosition(e) {
      this.setPosition(e.target.value)
    },
    updateCompanyCountry(e) {
      this.setCompanyCountry(e.target.value)
    },
    updateCompanyProvince(e) {
      this.setCompanyProvince(e.target.value)
    },
    updateCompanyDistrict(e) {
      this.setCompanyDistrict(e.target.value)
    },
    updateCompanyCommune(e) {
      this.setCompanyCommune(e.target.value)
    },
    updateCompanyVillage(e) {
      this.setCompanyVillage(e.target.value)
    },
    updateCompanyStreet(e) {
      this.setCompanyStreet(e.target.value)
    },
    updateCompanyNo(e) {
      this.setCompanyNo(e.target.value)
    },
    updateCompanyTelephone(e) {
      this.setCompanyTelephone(e.target.value)
    },
    updateCompanyFax(e) {
      this.setCompanyFax(e.target.value)
    },
    updateCompanyEmail(e) {
      this.setCompanyEmail(e.target.value)
    },
    updateYearOfEmployed(e) {
      this.setYearOfEmployed(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'customers.index' })
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
