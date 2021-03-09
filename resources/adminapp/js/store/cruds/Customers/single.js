function initialState() {
  return {
    entry: {
      id: null,
      customer_name: '',
      branch_id: null,
      given_name_en: '',
      surname_en: '',
      given_name_lc: '',
      surname_lc: '',
      title: null,
      gender_id: null,
      date_of_birth: '',
      customer_type_id: null,
      resident_status_id: null,
      education_level_id: null,
      officer_id: null,
      house_no: '',
      street: '',
      phone_1: '',
      phone_2: '',
      facebook: '',
      email: null,
      location_mapping: '',
      family_given_name_en: '',
      family_surname_en: '',
      family_given_name_lc: '',
      family_surname_lc: '',
      family_date_of_birth: '',
      family_nationality: '',
      family_id_type: '',
      family_id_number: '',
      family_issue_place: '',
      family_issue_date: '',
      family_expiry_date: '',
      spouse_employment: '',
      family_phone_1: '',
      family_phone_2: '',
      house_ownership: '',
      family_member: '',
      active_member: '',
      employment: '',
      company_name: '',
      employer_name: '',
      business_type: '',
      position: '',
      company_country: '',
      company_province: '',
      company_district: '',
      company_commune: '',
      company_village: '',
      company_street: '',
      company_no: '',
      company_telephone: '',
      company_fax: '',
      company_email: null,
      year_of_employed: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      title: [],
      gender: [],
      customer_type: [],
      resident_status: [],
      education_level: [],
      officer: []
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
  setBranch({ commit }, value) {
    commit('setBranch', value)
  },
  setGivenNameEn({ commit }, value) {
    commit('setGivenNameEn', value)
  },
  setSurnameEn({ commit }, value) {
    commit('setSurnameEn', value)
  },
  setGivenNameLc({ commit }, value) {
    commit('setGivenNameLc', value)
  },
  setSurnameLc({ commit }, value) {
    commit('setSurnameLc', value)
  },
  setTitle({ commit }, value) {
    commit('setTitle', value)
  },
  setGender({ commit }, value) {
    commit('setGender', value)
  },
  setDateOfBirth({ commit }, value) {
    commit('setDateOfBirth', value)
  },
  setCustomerType({ commit }, value) {
    commit('setCustomerType', value)
  },
  setResidentStatus({ commit }, value) {
    commit('setResidentStatus', value)
  },
  setEducationLevel({ commit }, value) {
    commit('setEducationLevel', value)
  },
  setOfficer({ commit }, value) {
    commit('setOfficer', value)
  },
  setHouseNo({ commit }, value) {
    commit('setHouseNo', value)
  },
  setStreet({ commit }, value) {
    commit('setStreet', value)
  },
  setPhone1({ commit }, value) {
    commit('setPhone1', value)
  },
  setPhone2({ commit }, value) {
    commit('setPhone2', value)
  },
  setFacebook({ commit }, value) {
    commit('setFacebook', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setLocationMapping({ commit }, value) {
    commit('setLocationMapping', value)
  },
  setFamilyGivenNameEn({ commit }, value) {
    commit('setFamilyGivenNameEn', value)
  },
  setFamilySurnameEn({ commit }, value) {
    commit('setFamilySurnameEn', value)
  },
  setFamilyGivenNameLc({ commit }, value) {
    commit('setFamilyGivenNameLc', value)
  },
  setFamilySurnameLc({ commit }, value) {
    commit('setFamilySurnameLc', value)
  },
  setFamilyDateOfBirth({ commit }, value) {
    commit('setFamilyDateOfBirth', value)
  },
  setFamilyNationality({ commit }, value) {
    commit('setFamilyNationality', value)
  },
  setFamilyIdType({ commit }, value) {
    commit('setFamilyIdType', value)
  },
  setFamilyIdNumber({ commit }, value) {
    commit('setFamilyIdNumber', value)
  },
  setFamilyIssuePlace({ commit }, value) {
    commit('setFamilyIssuePlace', value)
  },
  setFamilyIssueDate({ commit }, value) {
    commit('setFamilyIssueDate', value)
  },
  setFamilyExpiryDate({ commit }, value) {
    commit('setFamilyExpiryDate', value)
  },
  setSpouseEmployment({ commit }, value) {
    commit('setSpouseEmployment', value)
  },
  setFamilyPhone1({ commit }, value) {
    commit('setFamilyPhone1', value)
  },
  setFamilyPhone2({ commit }, value) {
    commit('setFamilyPhone2', value)
  },
  setHouseOwnership({ commit }, value) {
    commit('setHouseOwnership', value)
  },
  setFamilyMember({ commit }, value) {
    commit('setFamilyMember', value)
  },
  setActiveMember({ commit }, value) {
    commit('setActiveMember', value)
  },
  setEmployment({ commit }, value) {
    commit('setEmployment', value)
  },
  setCompanyName({ commit }, value) {
    commit('setCompanyName', value)
  },
  setEmployerName({ commit }, value) {
    commit('setEmployerName', value)
  },
  setBusinessType({ commit }, value) {
    commit('setBusinessType', value)
  },
  setPosition({ commit }, value) {
    commit('setPosition', value)
  },
  setCompanyCountry({ commit }, value) {
    commit('setCompanyCountry', value)
  },
  setCompanyProvince({ commit }, value) {
    commit('setCompanyProvince', value)
  },
  setCompanyDistrict({ commit }, value) {
    commit('setCompanyDistrict', value)
  },
  setCompanyCommune({ commit }, value) {
    commit('setCompanyCommune', value)
  },
  setCompanyVillage({ commit }, value) {
    commit('setCompanyVillage', value)
  },
  setCompanyStreet({ commit }, value) {
    commit('setCompanyStreet', value)
  },
  setCompanyNo({ commit }, value) {
    commit('setCompanyNo', value)
  },
  setCompanyTelephone({ commit }, value) {
    commit('setCompanyTelephone', value)
  },
  setCompanyFax({ commit }, value) {
    commit('setCompanyFax', value)
  },
  setCompanyEmail({ commit }, value) {
    commit('setCompanyEmail', value)
  },
  setYearOfEmployed({ commit }, value) {
    commit('setYearOfEmployed', value)
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
  setBranch(state, value) {
    state.entry.branch_id = value
  },
  setGivenNameEn(state, value) {
    state.entry.given_name_en = value
  },
  setSurnameEn(state, value) {
    state.entry.surname_en = value
  },
  setGivenNameLc(state, value) {
    state.entry.given_name_lc = value
  },
  setSurnameLc(state, value) {
    state.entry.surname_lc = value
  },
  setTitle(state, value) {
    state.entry.title = value
  },
  setGender(state, value) {
    state.entry.gender_id = value
  },
  setDateOfBirth(state, value) {
    state.entry.date_of_birth = value
  },
  setCustomerType(state, value) {
    state.entry.customer_type_id = value
  },
  setResidentStatus(state, value) {
    state.entry.resident_status_id = value
  },
  setEducationLevel(state, value) {
    state.entry.education_level_id = value
  },
  setOfficer(state, value) {
    state.entry.officer_id = value
  },
  setHouseNo(state, value) {
    state.entry.house_no = value
  },
  setStreet(state, value) {
    state.entry.street = value
  },
  setPhone1(state, value) {
    state.entry.phone_1 = value
  },
  setPhone2(state, value) {
    state.entry.phone_2 = value
  },
  setFacebook(state, value) {
    state.entry.facebook = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setLocationMapping(state, value) {
    state.entry.location_mapping = value
  },
  setFamilyGivenNameEn(state, value) {
    state.entry.family_given_name_en = value
  },
  setFamilySurnameEn(state, value) {
    state.entry.family_surname_en = value
  },
  setFamilyGivenNameLc(state, value) {
    state.entry.family_given_name_lc = value
  },
  setFamilySurnameLc(state, value) {
    state.entry.family_surname_lc = value
  },
  setFamilyDateOfBirth(state, value) {
    state.entry.family_date_of_birth = value
  },
  setFamilyNationality(state, value) {
    state.entry.family_nationality = value
  },
  setFamilyIdType(state, value) {
    state.entry.family_id_type = value
  },
  setFamilyIdNumber(state, value) {
    state.entry.family_id_number = value
  },
  setFamilyIssuePlace(state, value) {
    state.entry.family_issue_place = value
  },
  setFamilyIssueDate(state, value) {
    state.entry.family_issue_date = value
  },
  setFamilyExpiryDate(state, value) {
    state.entry.family_expiry_date = value
  },
  setSpouseEmployment(state, value) {
    state.entry.spouse_employment = value
  },
  setFamilyPhone1(state, value) {
    state.entry.family_phone_1 = value
  },
  setFamilyPhone2(state, value) {
    state.entry.family_phone_2 = value
  },
  setHouseOwnership(state, value) {
    state.entry.house_ownership = value
  },
  setFamilyMember(state, value) {
    state.entry.family_member = value
  },
  setActiveMember(state, value) {
    state.entry.active_member = value
  },
  setEmployment(state, value) {
    state.entry.employment = value
  },
  setCompanyName(state, value) {
    state.entry.company_name = value
  },
  setEmployerName(state, value) {
    state.entry.employer_name = value
  },
  setBusinessType(state, value) {
    state.entry.business_type = value
  },
  setPosition(state, value) {
    state.entry.position = value
  },
  setCompanyCountry(state, value) {
    state.entry.company_country = value
  },
  setCompanyProvince(state, value) {
    state.entry.company_province = value
  },
  setCompanyDistrict(state, value) {
    state.entry.company_district = value
  },
  setCompanyCommune(state, value) {
    state.entry.company_commune = value
  },
  setCompanyVillage(state, value) {
    state.entry.company_village = value
  },
  setCompanyStreet(state, value) {
    state.entry.company_street = value
  },
  setCompanyNo(state, value) {
    state.entry.company_no = value
  },
  setCompanyTelephone(state, value) {
    state.entry.company_telephone = value
  },
  setCompanyFax(state, value) {
    state.entry.company_fax = value
  },
  setCompanyEmail(state, value) {
    state.entry.company_email = value
  },
  setYearOfEmployed(state, value) {
    state.entry.year_of_employed = value
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
