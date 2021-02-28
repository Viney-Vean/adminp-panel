function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      customer: '',
      account_name: '',
      chart_of_account_id: null,
      balance_side: null,
      currency_id: null,
      open_date: '',
      balance: '',
      available_bal: '0',
      account_status: '',
      blocked_bal: '0',
      closing_date: '',
      block: '',
      block_reason: '',
      type: '',
      account_product_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      chart_of_account: [],
      balance_side: [],
      currency: [],
      account_product: []
    },
    loading: false
  }
}

const route = 'accounts'

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
  setCustomer({ commit }, value) {
    commit('setCustomer', value)
  },
  setAccountName({ commit }, value) {
    commit('setAccountName', value)
  },
  setChartOfAccount({ commit }, value) {
    commit('setChartOfAccount', value)
  },
  setBalanceSide({ commit }, value) {
    commit('setBalanceSide', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setOpenDate({ commit }, value) {
    commit('setOpenDate', value)
  },
  setBalance({ commit }, value) {
    commit('setBalance', value)
  },
  setAvailableBal({ commit }, value) {
    commit('setAvailableBal', value)
  },
  setAccountStatus({ commit }, value) {
    commit('setAccountStatus', value)
  },
  setBlockedBal({ commit }, value) {
    commit('setBlockedBal', value)
  },
  setClosingDate({ commit }, value) {
    commit('setClosingDate', value)
  },
  setBlock({ commit }, value) {
    commit('setBlock', value)
  },
  setBlockReason({ commit }, value) {
    commit('setBlockReason', value)
  },
  setType({ commit }, value) {
    commit('setType', value)
  },
  setAccountProduct({ commit }, value) {
    commit('setAccountProduct', value)
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
  setCustomer(state, value) {
    state.entry.customer = value
  },
  setAccountName(state, value) {
    state.entry.account_name = value
  },
  setChartOfAccount(state, value) {
    state.entry.chart_of_account_id = value
  },
  setBalanceSide(state, value) {
    state.entry.balance_side = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setOpenDate(state, value) {
    state.entry.open_date = value
  },
  setBalance(state, value) {
    state.entry.balance = value
  },
  setAvailableBal(state, value) {
    state.entry.available_bal = value
  },
  setAccountStatus(state, value) {
    state.entry.account_status = value
  },
  setBlockedBal(state, value) {
    state.entry.blocked_bal = value
  },
  setClosingDate(state, value) {
    state.entry.closing_date = value
  },
  setBlock(state, value) {
    state.entry.block = value
  },
  setBlockReason(state, value) {
    state.entry.block_reason = value
  },
  setType(state, value) {
    state.entry.type = value
  },
  setAccountProduct(state, value) {
    state.entry.account_product_id = value
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
