function initialState() {
  return {
    entry: {
      id: null,
      branch: '',
      start_operation_date: '',
      name_en: '',
      name_lc: '',
      salutation: null,
      branch_manager_en: '',
      branch_manager_lc: '',
      office_phone_number: '',
      mobile_phone: '',
      email: '',
      fax: '',
      facebook: '',
      address_en: '',
      address_lc: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      salutation: []
    },
    loading: false
  }
}

const route = 'branches'

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
  setStartOperationDate({ commit }, value) {
    commit('setStartOperationDate', value)
  },
  setNameEn({ commit }, value) {
    commit('setNameEn', value)
  },
  setNameLc({ commit }, value) {
    commit('setNameLc', value)
  },
  setSalutation({ commit }, value) {
    commit('setSalutation', value)
  },
  setBranchManagerEn({ commit }, value) {
    commit('setBranchManagerEn', value)
  },
  setBranchManagerLc({ commit }, value) {
    commit('setBranchManagerLc', value)
  },
  setOfficePhoneNumber({ commit }, value) {
    commit('setOfficePhoneNumber', value)
  },
  setMobilePhone({ commit }, value) {
    commit('setMobilePhone', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setFax({ commit }, value) {
    commit('setFax', value)
  },
  setFacebook({ commit }, value) {
    commit('setFacebook', value)
  },
  setAddressEn({ commit }, value) {
    commit('setAddressEn', value)
  },
  setAddressLc({ commit }, value) {
    commit('setAddressLc', value)
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
    state.entry.branch = value
  },
  setStartOperationDate(state, value) {
    state.entry.start_operation_date = value
  },
  setNameEn(state, value) {
    state.entry.name_en = value
  },
  setNameLc(state, value) {
    state.entry.name_lc = value
  },
  setSalutation(state, value) {
    state.entry.salutation = value
  },
  setBranchManagerEn(state, value) {
    state.entry.branch_manager_en = value
  },
  setBranchManagerLc(state, value) {
    state.entry.branch_manager_lc = value
  },
  setOfficePhoneNumber(state, value) {
    state.entry.office_phone_number = value
  },
  setMobilePhone(state, value) {
    state.entry.mobile_phone = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setFax(state, value) {
    state.entry.fax = value
  },
  setFacebook(state, value) {
    state.entry.facebook = value
  },
  setAddressEn(state, value) {
    state.entry.address_en = value
  },
  setAddressLc(state, value) {
    state.entry.address_lc = value
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
