function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      contract: '',
      currency_id: null,
      dd_account_id: null,
      approve_amount: '',
      disburse_amount: '',
      balance: '0',
      accrue_interest_current_installment: '0',
      principal_due: '0',
      interest_due: '0',
      charge_due: '0',
      penalty_due: '0',
      orig_balance: '0',
      orig_accrue_interest_current_installment: '0',
      orig_charge: '0',
      orig_principal_due: '0',
      orig_interest_due: '0',
      orig_charge_due: '0',
      orig_penalty_due: '0',
      write_off_date: '',
      description: '',
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

const route = 'write-offs'

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
  setContract({ commit }, value) {
    commit('setContract', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setDdAccount({ commit }, value) {
    commit('setDdAccount', value)
  },
  setApproveAmount({ commit }, value) {
    commit('setApproveAmount', value)
  },
  setDisburseAmount({ commit }, value) {
    commit('setDisburseAmount', value)
  },
  setBalance({ commit }, value) {
    commit('setBalance', value)
  },
  setAccrueInterestCurrentInstallment({ commit }, value) {
    commit('setAccrueInterestCurrentInstallment', value)
  },
  setPrincipalDue({ commit }, value) {
    commit('setPrincipalDue', value)
  },
  setInterestDue({ commit }, value) {
    commit('setInterestDue', value)
  },
  setChargeDue({ commit }, value) {
    commit('setChargeDue', value)
  },
  setPenaltyDue({ commit }, value) {
    commit('setPenaltyDue', value)
  },
  setOrigBalance({ commit }, value) {
    commit('setOrigBalance', value)
  },
  setOrigAccrueInterestCurrentInstallment({ commit }, value) {
    commit('setOrigAccrueInterestCurrentInstallment', value)
  },
  setOrigCharge({ commit }, value) {
    commit('setOrigCharge', value)
  },
  setOrigPrincipalDue({ commit }, value) {
    commit('setOrigPrincipalDue', value)
  },
  setOrigInterestDue({ commit }, value) {
    commit('setOrigInterestDue', value)
  },
  setOrigChargeDue({ commit }, value) {
    commit('setOrigChargeDue', value)
  },
  setOrigPenaltyDue({ commit }, value) {
    commit('setOrigPenaltyDue', value)
  },
  setWriteOffDate({ commit }, value) {
    commit('setWriteOffDate', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
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
  setContract(state, value) {
    state.entry.contract = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setDdAccount(state, value) {
    state.entry.dd_account_id = value
  },
  setApproveAmount(state, value) {
    state.entry.approve_amount = value
  },
  setDisburseAmount(state, value) {
    state.entry.disburse_amount = value
  },
  setBalance(state, value) {
    state.entry.balance = value
  },
  setAccrueInterestCurrentInstallment(state, value) {
    state.entry.accrue_interest_current_installment = value
  },
  setPrincipalDue(state, value) {
    state.entry.principal_due = value
  },
  setInterestDue(state, value) {
    state.entry.interest_due = value
  },
  setChargeDue(state, value) {
    state.entry.charge_due = value
  },
  setPenaltyDue(state, value) {
    state.entry.penalty_due = value
  },
  setOrigBalance(state, value) {
    state.entry.orig_balance = value
  },
  setOrigAccrueInterestCurrentInstallment(state, value) {
    state.entry.orig_accrue_interest_current_installment = value
  },
  setOrigCharge(state, value) {
    state.entry.orig_charge = value
  },
  setOrigPrincipalDue(state, value) {
    state.entry.orig_principal_due = value
  },
  setOrigInterestDue(state, value) {
    state.entry.orig_interest_due = value
  },
  setOrigChargeDue(state, value) {
    state.entry.orig_charge_due = value
  },
  setOrigPenaltyDue(state, value) {
    state.entry.orig_penalty_due = value
  },
  setWriteOffDate(state, value) {
    state.entry.write_off_date = value
  },
  setDescription(state, value) {
    state.entry.description = value
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
