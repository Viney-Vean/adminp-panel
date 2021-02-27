function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      product_id: null,
      class_id: null,
      outstanding_coa_id: null,
      air_coa_id: null,
      int_income_coa_id: null,
      interest_in_suspend_coa_id: null,
      provision_expense_coa_id: null,
      provision_reserve_coa_id: null,
      penalty_coa_id: null,
      income_charge_coa_id: null,
      in_suspend_charge_coa_id: null,
      charge_receivable_coa_id: null,
      provision_booking: '0',
      more_than_one_year: null,
      interest_income_recognition: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      product: [],
      class: [],
      outstanding_coa: [],
      air_coa: [],
      int_income_coa: [],
      interest_in_suspend_coa: [],
      provision_expense_coa: [],
      provision_reserve_coa: [],
      penalty_coa: [],
      income_charge_coa: [],
      in_suspend_charge_coa: [],
      charge_receivable_coa: [],
      more_than_one_year: [],
      interest_income_recognition: []
    },
    loading: false
  }
}

const route = 'loan-product-provisions'

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
  setProduct({ commit }, value) {
    commit('setProduct', value)
  },
  setClass({ commit }, value) {
    commit('setClass', value)
  },
  setOutstandingCoa({ commit }, value) {
    commit('setOutstandingCoa', value)
  },
  setAirCoa({ commit }, value) {
    commit('setAirCoa', value)
  },
  setIntIncomeCoa({ commit }, value) {
    commit('setIntIncomeCoa', value)
  },
  setInterestInSuspendCoa({ commit }, value) {
    commit('setInterestInSuspendCoa', value)
  },
  setProvisionExpenseCoa({ commit }, value) {
    commit('setProvisionExpenseCoa', value)
  },
  setProvisionReserveCoa({ commit }, value) {
    commit('setProvisionReserveCoa', value)
  },
  setPenaltyCoa({ commit }, value) {
    commit('setPenaltyCoa', value)
  },
  setIncomeChargeCoa({ commit }, value) {
    commit('setIncomeChargeCoa', value)
  },
  setInSuspendChargeCoa({ commit }, value) {
    commit('setInSuspendChargeCoa', value)
  },
  setChargeReceivableCoa({ commit }, value) {
    commit('setChargeReceivableCoa', value)
  },
  setProvisionBooking({ commit }, value) {
    commit('setProvisionBooking', value)
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
  setProduct(state, value) {
    state.entry.product_id = value
  },
  setClass(state, value) {
    state.entry.class_id = value
  },
  setOutstandingCoa(state, value) {
    state.entry.outstanding_coa_id = value
  },
  setAirCoa(state, value) {
    state.entry.air_coa_id = value
  },
  setIntIncomeCoa(state, value) {
    state.entry.int_income_coa_id = value
  },
  setInterestInSuspendCoa(state, value) {
    state.entry.interest_in_suspend_coa_id = value
  },
  setProvisionExpenseCoa(state, value) {
    state.entry.provision_expense_coa_id = value
  },
  setProvisionReserveCoa(state, value) {
    state.entry.provision_reserve_coa_id = value
  },
  setPenaltyCoa(state, value) {
    state.entry.penalty_coa_id = value
  },
  setIncomeChargeCoa(state, value) {
    state.entry.income_charge_coa_id = value
  },
  setInSuspendChargeCoa(state, value) {
    state.entry.in_suspend_charge_coa_id = value
  },
  setChargeReceivableCoa(state, value) {
    state.entry.charge_receivable_coa_id = value
  },
  setProvisionBooking(state, value) {
    state.entry.provision_booking = value
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
