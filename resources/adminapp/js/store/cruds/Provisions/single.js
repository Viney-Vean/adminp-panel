function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      class: '',
      class_title: '',
      overdue_from: '0',
      overdue_to: '0',
      contract_type: null,
      more_than_one_year: null,
      interest_income_recognition: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      contract_type: [],
      more_than_one_year: [],
      interest_income_recognition: []
    },
    loading: false
  }
}

const route = 'provisions'

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
  setClass({ commit }, value) {
    commit('setClass', value)
  },
  setClassTitle({ commit }, value) {
    commit('setClassTitle', value)
  },
  setOverdueFrom({ commit }, value) {
    commit('setOverdueFrom', value)
  },
  setOverdueTo({ commit }, value) {
    commit('setOverdueTo', value)
  },
  setContractType({ commit }, value) {
    commit('setContractType', value)
  },
  setMoreThanOneYear({ commit }, value) {
    commit('setMoreThanOneYear', value)
  },
  setInterestIncomeRecognition({ commit }, value) {
    commit('setInterestIncomeRecognition', value)
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
  setClass(state, value) {
    state.entry.class = value
  },
  setClassTitle(state, value) {
    state.entry.class_title = value
  },
  setOverdueFrom(state, value) {
    state.entry.overdue_from = value
  },
  setOverdueTo(state, value) {
    state.entry.overdue_to = value
  },
  setContractType(state, value) {
    state.entry.contract_type = value
  },
  setMoreThanOneYear(state, value) {
    state.entry.more_than_one_year = value
  },
  setInterestIncomeRecognition(state, value) {
    state.entry.interest_income_recognition = value
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
