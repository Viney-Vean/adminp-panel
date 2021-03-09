function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      given_name_en: '',
      surname_en: '',
      given_name_lc: '',
      sur_name_en: '',
      salutation_id: null,
      gender: null,
      phone_1: '',
      phone_2: '',
      unit_id: null,
      department_id: null,
      id_card_number: '',
      employment_date: '',
      user_id: null,
      active: null,
      report_to_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      salutation: [],
      gender: [],
      unit: [],
      department: [],
      user: [],
      active: [],
      report_to: []
    },
    loading: false
  }
}

const route = 'officers'

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
  setGivenNameEn({ commit }, value) {
    commit('setGivenNameEn', value)
  },
  setSurnameEn({ commit }, value) {
    commit('setSurnameEn', value)
  },
  setGivenNameLc({ commit }, value) {
    commit('setGivenNameLc', value)
  },
  setSurNameEn({ commit }, value) {
    commit('setSurNameEn', value)
  },
  setSalutation({ commit }, value) {
    commit('setSalutation', value)
  },
  setGender({ commit }, value) {
    commit('setGender', value)
  },
  setPhone1({ commit }, value) {
    commit('setPhone1', value)
  },
  setPhone2({ commit }, value) {
    commit('setPhone2', value)
  },
  setUnit({ commit }, value) {
    commit('setUnit', value)
  },
  setDepartment({ commit }, value) {
    commit('setDepartment', value)
  },
  setIdCardNumber({ commit }, value) {
    commit('setIdCardNumber', value)
  },
  setEmploymentDate({ commit }, value) {
    commit('setEmploymentDate', value)
  },
  setUser({ commit }, value) {
    commit('setUser', value)
  },
  setActive({ commit }, value) {
    commit('setActive', value)
  },
  setReportTo({ commit }, value) {
    commit('setReportTo', value)
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
  setGivenNameEn(state, value) {
    state.entry.given_name_en = value
  },
  setSurnameEn(state, value) {
    state.entry.surname_en = value
  },
  setGivenNameLc(state, value) {
    state.entry.given_name_lc = value
  },
  setSurNameEn(state, value) {
    state.entry.sur_name_en = value
  },
  setSalutation(state, value) {
    state.entry.salutation_id = value
  },
  setGender(state, value) {
    state.entry.gender = value
  },
  setPhone1(state, value) {
    state.entry.phone_1 = value
  },
  setPhone2(state, value) {
    state.entry.phone_2 = value
  },
  setUnit(state, value) {
    state.entry.unit_id = value
  },
  setDepartment(state, value) {
    state.entry.department_id = value
  },
  setIdCardNumber(state, value) {
    state.entry.id_card_number = value
  },
  setEmploymentDate(state, value) {
    state.entry.employment_date = value
  },
  setUser(state, value) {
    state.entry.user_id = value
  },
  setActive(state, value) {
    state.entry.active = value
  },
  setReportTo(state, value) {
    state.entry.report_to_id = value
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
