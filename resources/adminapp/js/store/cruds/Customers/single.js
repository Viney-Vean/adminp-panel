function initialState() {
  return {
    entry: {
      id: null,
      customer_name: '',
      customer_last_name: '',
      customer_nickname: '',
      customer_gender: null,
      customer_date_of_birth: '',
      customer_nationality: '',
      customer_phone: '',
      customer_business_phone: '',
      customer_other_phone: '',
      customer_mail: '',
      customer_identity_type: null,
      customer_salary_slip: '',
      customer_id_card: '',
      customer_back_id_card: '',
      selfies_photo: [],
      number_of_children: '',
      number_of_family_member: '',
      cbc_check: '',
      cbc_scores: '',
      shift_works: '',
      businesses_income: '',
      type_of_business_activities: '',
      general_expenses: '',
      yes_or_no_loan_leasing_repayment_expenses: null,
      name_of_institution: '',
      customer_identity_number: '',
      customer_identity_date: '',
      customer_vehicle: '',
      house_no: '',
      street_no: '',
      address: '',
      customer_status: '',
      customer_blanklist: '',
      customer_profile: [],
      documentations: [],
      customer_occupation: '',
      customer_income: '',
      income_from_salary: '',
      asset_type: '',
      asset: '',
      collateral: '',
      customer_currency_income: '',
      spouse_currency_income: '',
      spouse: '',
      spouse_name: '',
      spouse_gender: '',
      spouse_date_of_birth: '',
      spouse_nationality: '',
      spouse_phone: '',
      spouse_mail: '',
      spouse_identity_type: '',
      spouse_identity_number: '',
      spouse_identity_date: '',
      spouse_profile: [],
      spouse_occupation: '',
      spouse_income: '',
      is_staff: '',
      is_guarantor: '',
      user: '',
      branch: '',
      password: '',
      remember_token: '',
      created_by: '',
      updated_by: '',
      marital_status: '',
      customer_living_condition: '',
      customer_latin_name: '',
      customer_identity_expired_date: '',
      customer_working_period: '',
      customer_work_experience: '',
      customer_employment_status: '',
      customer_organization: '',
      customer_organization_house_no: '',
      customer_organization_street_no: '',
      customer_organization_address: '',
      relationship: '',
      customer_type: '',
      scores: '',
      is_agree: null,
      recommended: '',
      percentage: '',
      number_share: '',
      member_type: '',
      investor_type: '',
      about: '',
      qiid: '',
      json: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      customer_gender: [],
      customer_identity_type: [],
      yes_or_no_loan_leasing_repayment_expenses: [],
      is_agree: []
    },
    loading: false
  }
}

const route = 'customers'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setCustomerName({ commit }, value) {
    commit('setCustomerName', value)
  },
  setCustomerLastName({ commit }, value) {
    commit('setCustomerLastName', value)
  },
  setCustomerNickname({ commit }, value) {
    commit('setCustomerNickname', value)
  },
  setCustomerGender({ commit }, value) {
    commit('setCustomerGender', value)
  },
  setCustomerDateOfBirth({ commit }, value) {
    commit('setCustomerDateOfBirth', value)
  },
  setCustomerNationality({ commit }, value) {
    commit('setCustomerNationality', value)
  },
  setCustomerPhone({ commit }, value) {
    commit('setCustomerPhone', value)
  },
  setCustomerBusinessPhone({ commit }, value) {
    commit('setCustomerBusinessPhone', value)
  },
  setCustomerOtherPhone({ commit }, value) {
    commit('setCustomerOtherPhone', value)
  },
  setCustomerMail({ commit }, value) {
    commit('setCustomerMail', value)
  },
  setCustomerIdentityType({ commit }, value) {
    commit('setCustomerIdentityType', value)
  },
  setCustomerSalarySlip({ commit }, value) {
    commit('setCustomerSalarySlip', value)
  },
  setCustomerIdCard({ commit }, value) {
    commit('setCustomerIdCard', value)
  },
  setCustomerBackIdCard({ commit }, value) {
    commit('setCustomerBackIdCard', value)
  },
  insertSelfiesPhotoFile({ commit }, file) {
    commit('insertSelfiesPhotoFile', file)
  },
  removeSelfiesPhotoFile({ commit }, file) {
    commit('removeSelfiesPhotoFile', file)
  },
  setNumberOfChildren({ commit }, value) {
    commit('setNumberOfChildren', value)
  },
  setNumberOfFamilyMember({ commit }, value) {
    commit('setNumberOfFamilyMember', value)
  },
  setCbcCheck({ commit }, value) {
    commit('setCbcCheck', value)
  },
  setCbcScores({ commit }, value) {
    commit('setCbcScores', value)
  },
  setShiftWorks({ commit }, value) {
    commit('setShiftWorks', value)
  },
  setBusinessesIncome({ commit }, value) {
    commit('setBusinessesIncome', value)
  },
  setTypeOfBusinessActivities({ commit }, value) {
    commit('setTypeOfBusinessActivities', value)
  },
  setGeneralExpenses({ commit }, value) {
    commit('setGeneralExpenses', value)
  },
  setYesOrNoLoanLeasingRepaymentExpenses({ commit }, value) {
    commit('setYesOrNoLoanLeasingRepaymentExpenses', value)
  },
  setNameOfInstitution({ commit }, value) {
    commit('setNameOfInstitution', value)
  },
  setCustomerIdentityNumber({ commit }, value) {
    commit('setCustomerIdentityNumber', value)
  },
  setCustomerIdentityDate({ commit }, value) {
    commit('setCustomerIdentityDate', value)
  },
  setCustomerVehicle({ commit }, value) {
    commit('setCustomerVehicle', value)
  },
  setHouseNo({ commit }, value) {
    commit('setHouseNo', value)
  },
  setStreetNo({ commit }, value) {
    commit('setStreetNo', value)
  },
  setAddress({ commit }, value) {
    commit('setAddress', value)
  },
  setCustomerStatus({ commit }, value) {
    commit('setCustomerStatus', value)
  },
  setCustomerBlanklist({ commit }, value) {
    commit('setCustomerBlanklist', value)
  },
  insertCustomerProfileFile({ commit }, file) {
    commit('insertCustomerProfileFile', file)
  },
  removeCustomerProfileFile({ commit }, file) {
    commit('removeCustomerProfileFile', file)
  },
  insertDocumentationsFile({ commit }, file) {
    commit('insertDocumentationsFile', file)
  },
  removeDocumentationsFile({ commit }, file) {
    commit('removeDocumentationsFile', file)
  },
  setCustomerOccupation({ commit }, value) {
    commit('setCustomerOccupation', value)
  },
  setCustomerIncome({ commit }, value) {
    commit('setCustomerIncome', value)
  },
  setIncomeFromSalary({ commit }, value) {
    commit('setIncomeFromSalary', value)
  },
  setAssetType({ commit }, value) {
    commit('setAssetType', value)
  },
  setAsset({ commit }, value) {
    commit('setAsset', value)
  },
  setCollateral({ commit }, value) {
    commit('setCollateral', value)
  },
  setCustomerCurrencyIncome({ commit }, value) {
    commit('setCustomerCurrencyIncome', value)
  },
  setSpouseCurrencyIncome({ commit }, value) {
    commit('setSpouseCurrencyIncome', value)
  },
  setSpouse({ commit }, value) {
    commit('setSpouse', value)
  },
  setSpouseName({ commit }, value) {
    commit('setSpouseName', value)
  },
  setSpouseGender({ commit }, value) {
    commit('setSpouseGender', value)
  },
  setSpouseDateOfBirth({ commit }, value) {
    commit('setSpouseDateOfBirth', value)
  },
  setSpouseNationality({ commit }, value) {
    commit('setSpouseNationality', value)
  },
  setSpousePhone({ commit }, value) {
    commit('setSpousePhone', value)
  },
  setSpouseMail({ commit }, value) {
    commit('setSpouseMail', value)
  },
  setSpouseIdentityType({ commit }, value) {
    commit('setSpouseIdentityType', value)
  },
  setSpouseIdentityNumber({ commit }, value) {
    commit('setSpouseIdentityNumber', value)
  },
  setSpouseIdentityDate({ commit }, value) {
    commit('setSpouseIdentityDate', value)
  },
  insertSpouseProfileFile({ commit }, file) {
    commit('insertSpouseProfileFile', file)
  },
  removeSpouseProfileFile({ commit }, file) {
    commit('removeSpouseProfileFile', file)
  },
  setSpouseOccupation({ commit }, value) {
    commit('setSpouseOccupation', value)
  },
  setSpouseIncome({ commit }, value) {
    commit('setSpouseIncome', value)
  },
  setIsStaff({ commit }, value) {
    commit('setIsStaff', value)
  },
  setIsGuarantor({ commit }, value) {
    commit('setIsGuarantor', value)
  },
  setUser({ commit }, value) {
    commit('setUser', value)
  },
  setBranch({ commit }, value) {
    commit('setBranch', value)
  },
  setPassword({ commit }, value) {
    commit('setPassword', value)
  },
  setRememberToken({ commit }, value) {
    commit('setRememberToken', value)
  },
  setCreatedBy({ commit }, value) {
    commit('setCreatedBy', value)
  },
  setUpdatedBy({ commit }, value) {
    commit('setUpdatedBy', value)
  },
  setMaritalStatus({ commit }, value) {
    commit('setMaritalStatus', value)
  },
  setCustomerLivingCondition({ commit }, value) {
    commit('setCustomerLivingCondition', value)
  },
  setCustomerLatinName({ commit }, value) {
    commit('setCustomerLatinName', value)
  },
  setCustomerIdentityExpiredDate({ commit }, value) {
    commit('setCustomerIdentityExpiredDate', value)
  },
  setCustomerWorkingPeriod({ commit }, value) {
    commit('setCustomerWorkingPeriod', value)
  },
  setCustomerWorkExperience({ commit }, value) {
    commit('setCustomerWorkExperience', value)
  },
  setCustomerEmploymentStatus({ commit }, value) {
    commit('setCustomerEmploymentStatus', value)
  },
  setCustomerOrganization({ commit }, value) {
    commit('setCustomerOrganization', value)
  },
  setCustomerOrganizationHouseNo({ commit }, value) {
    commit('setCustomerOrganizationHouseNo', value)
  },
  setCustomerOrganizationStreetNo({ commit }, value) {
    commit('setCustomerOrganizationStreetNo', value)
  },
  setCustomerOrganizationAddress({ commit }, value) {
    commit('setCustomerOrganizationAddress', value)
  },
  setRelationship({ commit }, value) {
    commit('setRelationship', value)
  },
  setCustomerType({ commit }, value) {
    commit('setCustomerType', value)
  },
  setScores({ commit }, value) {
    commit('setScores', value)
  },
  setIsAgree({ commit }, value) {
    commit('setIsAgree', value)
  },
  setRecommended({ commit }, value) {
    commit('setRecommended', value)
  },
  setPercentage({ commit }, value) {
    commit('setPercentage', value)
  },
  setNumberShare({ commit }, value) {
    commit('setNumberShare', value)
  },
  setMemberType({ commit }, value) {
    commit('setMemberType', value)
  },
  setInvestorType({ commit }, value) {
    commit('setInvestorType', value)
  },
  setAbout({ commit }, value) {
    commit('setAbout', value)
  },
  setQiid({ commit }, value) {
    commit('setQiid', value)
  },
  setJson({ commit }, value) {
    commit('setJson', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setCustomerName(state, value) {
    state.entry.customer_name = value
  },
  setCustomerLastName(state, value) {
    state.entry.customer_last_name = value
  },
  setCustomerNickname(state, value) {
    state.entry.customer_nickname = value
  },
  setCustomerGender(state, value) {
    state.entry.customer_gender = value
  },
  setCustomerDateOfBirth(state, value) {
    state.entry.customer_date_of_birth = value
  },
  setCustomerNationality(state, value) {
    state.entry.customer_nationality = value
  },
  setCustomerPhone(state, value) {
    state.entry.customer_phone = value
  },
  setCustomerBusinessPhone(state, value) {
    state.entry.customer_business_phone = value
  },
  setCustomerOtherPhone(state, value) {
    state.entry.customer_other_phone = value
  },
  setCustomerMail(state, value) {
    state.entry.customer_mail = value
  },
  setCustomerIdentityType(state, value) {
    state.entry.customer_identity_type = value
  },
  setCustomerSalarySlip(state, value) {
    state.entry.customer_salary_slip = value
  },
  setCustomerIdCard(state, value) {
    state.entry.customer_id_card = value
  },
  setCustomerBackIdCard(state, value) {
    state.entry.customer_back_id_card = value
  },
  insertSelfiesPhotoFile(state, file) {
    state.entry.selfies_photo.push(file)
  },
  removeSelfiesPhotoFile(state, file) {
    state.entry.selfies_photo = state.entry.selfies_photo.filter(item => {
      return item.id !== file.id
    })
  },
  setNumberOfChildren(state, value) {
    state.entry.number_of_children = value
  },
  setNumberOfFamilyMember(state, value) {
    state.entry.number_of_family_member = value
  },
  setCbcCheck(state, value) {
    state.entry.cbc_check = value
  },
  setCbcScores(state, value) {
    state.entry.cbc_scores = value
  },
  setShiftWorks(state, value) {
    state.entry.shift_works = value
  },
  setBusinessesIncome(state, value) {
    state.entry.businesses_income = value
  },
  setTypeOfBusinessActivities(state, value) {
    state.entry.type_of_business_activities = value
  },
  setGeneralExpenses(state, value) {
    state.entry.general_expenses = value
  },
  setYesOrNoLoanLeasingRepaymentExpenses(state, value) {
    state.entry.yes_or_no_loan_leasing_repayment_expenses = value
  },
  setNameOfInstitution(state, value) {
    state.entry.name_of_institution = value
  },
  setCustomerIdentityNumber(state, value) {
    state.entry.customer_identity_number = value
  },
  setCustomerIdentityDate(state, value) {
    state.entry.customer_identity_date = value
  },
  setCustomerVehicle(state, value) {
    state.entry.customer_vehicle = value
  },
  setHouseNo(state, value) {
    state.entry.house_no = value
  },
  setStreetNo(state, value) {
    state.entry.street_no = value
  },
  setAddress(state, value) {
    state.entry.address = value
  },
  setCustomerStatus(state, value) {
    state.entry.customer_status = value
  },
  setCustomerBlanklist(state, value) {
    state.entry.customer_blanklist = value
  },
  insertCustomerProfileFile(state, file) {
    state.entry.customer_profile.push(file)
  },
  removeCustomerProfileFile(state, file) {
    state.entry.customer_profile = state.entry.customer_profile.filter(item => {
      return item.id !== file.id
    })
  },
  insertDocumentationsFile(state, file) {
    state.entry.documentations.push(file)
  },
  removeDocumentationsFile(state, file) {
    state.entry.documentations = state.entry.documentations.filter(item => {
      return item.id !== file.id
    })
  },
  setCustomerOccupation(state, value) {
    state.entry.customer_occupation = value
  },
  setCustomerIncome(state, value) {
    state.entry.customer_income = value
  },
  setIncomeFromSalary(state, value) {
    state.entry.income_from_salary = value
  },
  setAssetType(state, value) {
    state.entry.asset_type = value
  },
  setAsset(state, value) {
    state.entry.asset = value
  },
  setCollateral(state, value) {
    state.entry.collateral = value
  },
  setCustomerCurrencyIncome(state, value) {
    state.entry.customer_currency_income = value
  },
  setSpouseCurrencyIncome(state, value) {
    state.entry.spouse_currency_income = value
  },
  setSpouse(state, value) {
    state.entry.spouse = value
  },
  setSpouseName(state, value) {
    state.entry.spouse_name = value
  },
  setSpouseGender(state, value) {
    state.entry.spouse_gender = value
  },
  setSpouseDateOfBirth(state, value) {
    state.entry.spouse_date_of_birth = value
  },
  setSpouseNationality(state, value) {
    state.entry.spouse_nationality = value
  },
  setSpousePhone(state, value) {
    state.entry.spouse_phone = value
  },
  setSpouseMail(state, value) {
    state.entry.spouse_mail = value
  },
  setSpouseIdentityType(state, value) {
    state.entry.spouse_identity_type = value
  },
  setSpouseIdentityNumber(state, value) {
    state.entry.spouse_identity_number = value
  },
  setSpouseIdentityDate(state, value) {
    state.entry.spouse_identity_date = value
  },
  insertSpouseProfileFile(state, file) {
    state.entry.spouse_profile.push(file)
  },
  removeSpouseProfileFile(state, file) {
    state.entry.spouse_profile = state.entry.spouse_profile.filter(item => {
      return item.id !== file.id
    })
  },
  setSpouseOccupation(state, value) {
    state.entry.spouse_occupation = value
  },
  setSpouseIncome(state, value) {
    state.entry.spouse_income = value
  },
  setIsStaff(state, value) {
    state.entry.is_staff = value
  },
  setIsGuarantor(state, value) {
    state.entry.is_guarantor = value
  },
  setUser(state, value) {
    state.entry.user = value
  },
  setBranch(state, value) {
    state.entry.branch = value
  },
  setPassword(state, value) {
    state.entry.password = value
  },
  setRememberToken(state, value) {
    state.entry.remember_token = value
  },
  setCreatedBy(state, value) {
    state.entry.created_by = value
  },
  setUpdatedBy(state, value) {
    state.entry.updated_by = value
  },
  setMaritalStatus(state, value) {
    state.entry.marital_status = value
  },
  setCustomerLivingCondition(state, value) {
    state.entry.customer_living_condition = value
  },
  setCustomerLatinName(state, value) {
    state.entry.customer_latin_name = value
  },
  setCustomerIdentityExpiredDate(state, value) {
    state.entry.customer_identity_expired_date = value
  },
  setCustomerWorkingPeriod(state, value) {
    state.entry.customer_working_period = value
  },
  setCustomerWorkExperience(state, value) {
    state.entry.customer_work_experience = value
  },
  setCustomerEmploymentStatus(state, value) {
    state.entry.customer_employment_status = value
  },
  setCustomerOrganization(state, value) {
    state.entry.customer_organization = value
  },
  setCustomerOrganizationHouseNo(state, value) {
    state.entry.customer_organization_house_no = value
  },
  setCustomerOrganizationStreetNo(state, value) {
    state.entry.customer_organization_street_no = value
  },
  setCustomerOrganizationAddress(state, value) {
    state.entry.customer_organization_address = value
  },
  setRelationship(state, value) {
    state.entry.relationship = value
  },
  setCustomerType(state, value) {
    state.entry.customer_type = value
  },
  setScores(state, value) {
    state.entry.scores = value
  },
  setIsAgree(state, value) {
    state.entry.is_agree = value
  },
  setRecommended(state, value) {
    state.entry.recommended = value
  },
  setPercentage(state, value) {
    state.entry.percentage = value
  },
  setNumberShare(state, value) {
    state.entry.number_share = value
  },
  setMemberType(state, value) {
    state.entry.member_type = value
  },
  setInvestorType(state, value) {
    state.entry.investor_type = value
  },
  setAbout(state, value) {
    state.entry.about = value
  },
  setQiid(state, value) {
    state.entry.qiid = value
  },
  setJson(state, value) {
    state.entry.json = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
