function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      account_id: null,
      currency_id: null,
      chart_of_account: '',
      debit_credit: null,
      class_id: null,
      transaction_date: '',
      transaction_code: '',
      operation: '',
      module_type: '',
      reference: '',
      loan_reference: '',
      note: '',
      amount: '0',
      lcy_amount: '0',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      account: [],
      currency: [],
      debit_credit: [],
      class: []
    },
    loading: false
  }
}

const route = 'journals'

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
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setChartOfAccount({ commit }, value) {
    commit('setChartOfAccount', value)
  },
  setDebitCredit({ commit }, value) {
    commit('setDebitCredit', value)
  },
  setClass({ commit }, value) {
    commit('setClass', value)
  },
  setTransactionDate({ commit }, value) {
    commit('setTransactionDate', value)
  },
  setTransactionCode({ commit }, value) {
    commit('setTransactionCode', value)
  },
  setOperation({ commit }, value) {
    commit('setOperation', value)
  },
  setModuleType({ commit }, value) {
    commit('setModuleType', value)
  },
  setReference({ commit }, value) {
    commit('setReference', value)
  },
  setLoanReference({ commit }, value) {
    commit('setLoanReference', value)
  },
  setNote({ commit }, value) {
    commit('setNote', value)
  },
  setAmount({ commit }, value) {
    commit('setAmount', value)
  },
  setLcyAmount({ commit }, value) {
    commit('setLcyAmount', value)
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
    state.entry.branch_id = value
  },
  setAccount(state, value) {
    state.entry.account_id = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setChartOfAccount(state, value) {
    state.entry.chart_of_account = value
  },
  setDebitCredit(state, value) {
    state.entry.debit_credit = value
  },
  setClass(state, value) {
    state.entry.class_id = value
  },
  setTransactionDate(state, value) {
    state.entry.transaction_date = value
  },
  setTransactionCode(state, value) {
    state.entry.transaction_code = value
  },
  setOperation(state, value) {
    state.entry.operation = value
  },
  setModuleType(state, value) {
    state.entry.module_type = value
  },
  setReference(state, value) {
    state.entry.reference = value
  },
  setLoanReference(state, value) {
    state.entry.loan_reference = value
  },
  setNote(state, value) {
    state.entry.note = value
  },
  setAmount(state, value) {
    state.entry.amount = value
  },
  setLcyAmount(state, value) {
    state.entry.lcy_amount = value
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
