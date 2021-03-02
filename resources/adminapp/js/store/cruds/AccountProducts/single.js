function initialState() {
  return {
    entry: {
      id: null,
      branch: '',
      account_product_title: '',
      chart_of_account_id: null,
      currency: '',
      account_product_type_id: null,
      account_type_id: null,
      interest_rate: '0',
      charged_rate: '0',
      tax_rate: '0',
      balance_define: '0',
      interest_day_basis: '0',
      interest_accrual_basis: '0',
      interest_capitalization: '0',
      dormant_day: '',
      interest_expense_coa: '',
      interest_payable_coa: '',
      interest_income_coa: '',
      interest_receivable_coa: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      chart_of_account: [],
      account_product_type: [],
      account_type: []
    },
    loading: false
  }
}

const route = 'account-products'

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
  setAccountProductTitle({ commit }, value) {
    commit('setAccountProductTitle', value)
  },
  setChartOfAccount({ commit }, value) {
    commit('setChartOfAccount', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setAccountProductType({ commit }, value) {
    commit('setAccountProductType', value)
  },
  setAccountType({ commit }, value) {
    commit('setAccountType', value)
  },
  setInterestRate({ commit }, value) {
    commit('setInterestRate', value)
  },
  setChargedRate({ commit }, value) {
    commit('setChargedRate', value)
  },
  setTaxRate({ commit }, value) {
    commit('setTaxRate', value)
  },
  setBalanceDefine({ commit }, value) {
    commit('setBalanceDefine', value)
  },
  setInterestDayBasis({ commit }, value) {
    commit('setInterestDayBasis', value)
  },
  setInterestAccrualBasis({ commit }, value) {
    commit('setInterestAccrualBasis', value)
  },
  setInterestCapitalization({ commit }, value) {
    commit('setInterestCapitalization', value)
  },
  setDormantDay({ commit }, value) {
    commit('setDormantDay', value)
  },
  setInterestExpenseCoa({ commit }, value) {
    commit('setInterestExpenseCoa', value)
  },
  setInterestPayableCoa({ commit }, value) {
    commit('setInterestPayableCoa', value)
  },
  setInterestIncomeCoa({ commit }, value) {
    commit('setInterestIncomeCoa', value)
  },
  setInterestReceivableCoa({ commit }, value) {
    commit('setInterestReceivableCoa', value)
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
  setAccountProductTitle(state, value) {
    state.entry.account_product_title = value
  },
  setChartOfAccount(state, value) {
    state.entry.chart_of_account_id = value
  },
  setCurrency(state, value) {
    state.entry.currency = value
  },
  setAccountProductType(state, value) {
    state.entry.account_product_type_id = value
  },
  setAccountType(state, value) {
    state.entry.account_type_id = value
  },
  setInterestRate(state, value) {
    state.entry.interest_rate = value
  },
  setChargedRate(state, value) {
    state.entry.charged_rate = value
  },
  setTaxRate(state, value) {
    state.entry.tax_rate = value
  },
  setBalanceDefine(state, value) {
    state.entry.balance_define = value
  },
  setInterestDayBasis(state, value) {
    state.entry.interest_day_basis = value
  },
  setInterestAccrualBasis(state, value) {
    state.entry.interest_accrual_basis = value
  },
  setInterestCapitalization(state, value) {
    state.entry.interest_capitalization = value
  },
  setDormantDay(state, value) {
    state.entry.dormant_day = value
  },
  setInterestExpenseCoa(state, value) {
    state.entry.interest_expense_coa = value
  },
  setInterestPayableCoa(state, value) {
    state.entry.interest_payable_coa = value
  },
  setInterestIncomeCoa(state, value) {
    state.entry.interest_income_coa = value
  },
  setInterestReceivableCoa(state, value) {
    state.entry.interest_receivable_coa = value
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
