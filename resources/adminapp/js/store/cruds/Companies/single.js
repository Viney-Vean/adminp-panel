function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      name_en: '',
      name_lc: '',
      business_type: '',
      industry: '',
      title: '',
      contact_person: '',
      job_title: '',
      office_phone: '',
      mobile_phone_1: '',
      mobile_phone_2: '',
      cp_email: null,
      email: null,
      fax: '',
      website: '',
      facebook: '',
      logo: '',
      address: '',
      description: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: []
    },
    loading: false
  }
}

const route = 'companies'

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
  setBranch({ commit }, value) {
    commit('setBranch', value)
  },
  setNameEn({ commit }, value) {
    commit('setNameEn', value)
  },
  setNameLc({ commit }, value) {
    commit('setNameLc', value)
  },
  setBusinessType({ commit }, value) {
    commit('setBusinessType', value)
  },
  setIndustry({ commit }, value) {
    commit('setIndustry', value)
  },
  setTitle({ commit }, value) {
    commit('setTitle', value)
  },
  setContactPerson({ commit }, value) {
    commit('setContactPerson', value)
  },
  setJobTitle({ commit }, value) {
    commit('setJobTitle', value)
  },
  setOfficePhone({ commit }, value) {
    commit('setOfficePhone', value)
  },
  setMobilePhone1({ commit }, value) {
    commit('setMobilePhone1', value)
  },
  setMobilePhone2({ commit }, value) {
    commit('setMobilePhone2', value)
  },
  setCpEmail({ commit }, value) {
    commit('setCpEmail', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setFax({ commit }, value) {
    commit('setFax', value)
  },
  setWebsite({ commit }, value) {
    commit('setWebsite', value)
  },
  setFacebook({ commit }, value) {
    commit('setFacebook', value)
  },
  setLogo({ commit }, value) {
    commit('setLogo', value)
  },
  setAddress({ commit }, value) {
    commit('setAddress', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
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
  setBranch(state, value) {
    state.entry.branch_id = value
  },
  setNameEn(state, value) {
    state.entry.name_en = value
  },
  setNameLc(state, value) {
    state.entry.name_lc = value
  },
  setBusinessType(state, value) {
    state.entry.business_type = value
  },
  setIndustry(state, value) {
    state.entry.industry = value
  },
  setTitle(state, value) {
    state.entry.title = value
  },
  setContactPerson(state, value) {
    state.entry.contact_person = value
  },
  setJobTitle(state, value) {
    state.entry.job_title = value
  },
  setOfficePhone(state, value) {
    state.entry.office_phone = value
  },
  setMobilePhone1(state, value) {
    state.entry.mobile_phone_1 = value
  },
  setMobilePhone2(state, value) {
    state.entry.mobile_phone_2 = value
  },
  setCpEmail(state, value) {
    state.entry.cp_email = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setFax(state, value) {
    state.entry.fax = value
  },
  setWebsite(state, value) {
    state.entry.website = value
  },
  setFacebook(state, value) {
    state.entry.facebook = value
  },
  setLogo(state, value) {
    state.entry.logo = value
  },
  setAddress(state, value) {
    state.entry.address = value
  },
  setDescription(state, value) {
    state.entry.description = value
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
