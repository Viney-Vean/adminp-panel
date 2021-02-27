function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      loan: '',
      description: '',
      customer: '',
      currency_id: null,
      dd_account_id: null,
      recovery_amount: '0',
      recovery_date: '',
      principal_amount: '0',
      interest_amount: '0',
      charge_amount: '0',
      penalty_amount: '0',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      currency: [],
      dd_account: []
    },
    loading: false
  }
}

const route = 'recoveries'

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
  setLoan({ commit }, value) {
    commit('setLoan', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setCustomer({ commit }, value) {
    commit('setCustomer', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setDdAccount({ commit }, value) {
    commit('setDdAccount', value)
  },
  setRecoveryAmount({ commit }, value) {
    commit('setRecoveryAmount', value)
  },
  setRecoveryDate({ commit }, value) {
    commit('setRecoveryDate', value)
  },
  setPrincipalAmount({ commit }, value) {
    commit('setPrincipalAmount', value)
  },
  setInterestAmount({ commit }, value) {
    commit('setInterestAmount', value)
  },
  setChargeAmount({ commit }, value) {
    commit('setChargeAmount', value)
  },
  setPenaltyAmount({ commit }, value) {
    commit('setPenaltyAmount', value)
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
  setLoan(state, value) {
    state.entry.loan = value
  },
  setDescription(state, value) {
    state.entry.description = value
  },
  setCustomer(state, value) {
    state.entry.customer = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setDdAccount(state, value) {
    state.entry.dd_account_id = value
  },
  setRecoveryAmount(state, value) {
    state.entry.recovery_amount = value
  },
  setRecoveryDate(state, value) {
    state.entry.recovery_date = value
  },
  setPrincipalAmount(state, value) {
    state.entry.principal_amount = value
  },
  setInterestAmount(state, value) {
    state.entry.interest_amount = value
  },
  setChargeAmount(state, value) {
    state.entry.charge_amount = value
  },
  setPenaltyAmount(state, value) {
    state.entry.penalty_amount = value
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
