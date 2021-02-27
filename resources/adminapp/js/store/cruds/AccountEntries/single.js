function initialState() {
  return {
    entry: {
      id: null,
      branch: '',
      account_id: null,
      chart_of_account: '',
      currency_id: null,
      debit_credit: null,
      amount: '0',
      note: '',
      transaction_code: '',
      transaction_date: '',
      operation: '',
      reference: '',
      loan_reference: '',
      module_type: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      account: [],
      currency: [],
      debit_credit: []
    },
    loading: false
  }
}

const route = 'account-entries'

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
  setAccount({ commit }, value) {
    commit('setAccount', value)
  },
  setChartOfAccount({ commit }, value) {
    commit('setChartOfAccount', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setDebitCredit({ commit }, value) {
    commit('setDebitCredit', value)
  },
  setAmount({ commit }, value) {
    commit('setAmount', value)
  },
  setNote({ commit }, value) {
    commit('setNote', value)
  },
  setTransactionCode({ commit }, value) {
    commit('setTransactionCode', value)
  },
  setTransactionDate({ commit }, value) {
    commit('setTransactionDate', value)
  },
  setOperation({ commit }, value) {
    commit('setOperation', value)
  },
  setReference({ commit }, value) {
    commit('setReference', value)
  },
  setLoanReference({ commit }, value) {
    commit('setLoanReference', value)
  },
  setModuleType({ commit }, value) {
    commit('setModuleType', value)
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
  setAccount(state, value) {
    state.entry.account_id = value
  },
  setChartOfAccount(state, value) {
    state.entry.chart_of_account = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setDebitCredit(state, value) {
    state.entry.debit_credit = value
  },
  setAmount(state, value) {
    state.entry.amount = value
  },
  setNote(state, value) {
    state.entry.note = value
  },
  setTransactionCode(state, value) {
    state.entry.transaction_code = value
  },
  setTransactionDate(state, value) {
    state.entry.transaction_date = value
  },
  setOperation(state, value) {
    state.entry.operation = value
  },
  setReference(state, value) {
    state.entry.reference = value
  },
  setLoanReference(state, value) {
    state.entry.loan_reference = value
  },
  setModuleType(state, value) {
    state.entry.module_type = value
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
