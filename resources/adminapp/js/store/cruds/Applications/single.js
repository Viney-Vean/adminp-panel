function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      code: '',
      application_date: '',
      currency_id: null,
      loan_product_id: null,
      apply_amount: '',
      approve_amount: '',
      repayment_method: '1',
      repayment_frequency: null,
      frequency: '',
      term: '0',
      installment: '',
      interest_rate: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      currency: [],
      loan_product: [],
      repayment_method: [],
      repayment_frequency: []
    },
    loading: false
  }
}

const route = 'applications'

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
  setCode({ commit }, value) {
    commit('setCode', value)
  },
  setApplicationDate({ commit }, value) {
    commit('setApplicationDate', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setLoanProduct({ commit }, value) {
    commit('setLoanProduct', value)
  },
  setApplyAmount({ commit }, value) {
    commit('setApplyAmount', value)
  },
  setApproveAmount({ commit }, value) {
    commit('setApproveAmount', value)
  },
  setRepaymentMethod({ commit }, value) {
    commit('setRepaymentMethod', value)
  },
  setRepaymentFrequency({ commit }, value) {
    commit('setRepaymentFrequency', value)
  },
  setFrequency({ commit }, value) {
    commit('setFrequency', value)
  },
  setTerm({ commit }, value) {
    commit('setTerm', value)
  },
  setInstallment({ commit }, value) {
    commit('setInstallment', value)
  },
  setInterestRate({ commit }, value) {
    commit('setInterestRate', value)
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
  setCode(state, value) {
    state.entry.code = value
  },
  setApplicationDate(state, value) {
    state.entry.application_date = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setLoanProduct(state, value) {
    state.entry.loan_product_id = value
  },
  setApplyAmount(state, value) {
    state.entry.apply_amount = value
  },
  setApproveAmount(state, value) {
    state.entry.approve_amount = value
  },
  setRepaymentMethod(state, value) {
    state.entry.repayment_method = value
  },
  setRepaymentFrequency(state, value) {
    state.entry.repayment_frequency = value
  },
  setFrequency(state, value) {
    state.entry.frequency = value
  },
  setTerm(state, value) {
    state.entry.term = value
  },
  setInstallment(state, value) {
    state.entry.installment = value
  },
  setInterestRate(state, value) {
    state.entry.interest_rate = value
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
