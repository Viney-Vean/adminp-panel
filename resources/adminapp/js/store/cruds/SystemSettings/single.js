function initialState() {
  return {
    entry: {
      id: null,
      branch: '',
      principal_collection: '',
      interest_collection: '',
      admin_fee_collection: '',
      pd_principal_collection: '',
      pd_interest_collection: '',
      charge_collection: '',
      penalty_collection: '',
      loan_accrual_interest: '',
      amendment_add_principal: '',
      amendment_duduct_principal: '',
      terminate: '',
      write_off_charge: '',
      write_off_penalty: '',
      write_off_interest: '',
      write_off_principal: '',
      waive_charge: '',
      waive_penalty: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    loading: false
  }
}

const route = 'system-settings'

const getters = {
  entry: state => state.entry,
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
  setPrincipalCollection({ commit }, value) {
    commit('setPrincipalCollection', value)
  },
  setInterestCollection({ commit }, value) {
    commit('setInterestCollection', value)
  },
  setAdminFeeCollection({ commit }, value) {
    commit('setAdminFeeCollection', value)
  },
  setPdPrincipalCollection({ commit }, value) {
    commit('setPdPrincipalCollection', value)
  },
  setPdInterestCollection({ commit }, value) {
    commit('setPdInterestCollection', value)
  },
  setChargeCollection({ commit }, value) {
    commit('setChargeCollection', value)
  },
  setPenaltyCollection({ commit }, value) {
    commit('setPenaltyCollection', value)
  },
  setLoanAccrualInterest({ commit }, value) {
    commit('setLoanAccrualInterest', value)
  },
  setAmendmentAddPrincipal({ commit }, value) {
    commit('setAmendmentAddPrincipal', value)
  },
  setAmendmentDuductPrincipal({ commit }, value) {
    commit('setAmendmentDuductPrincipal', value)
  },
  setTerminate({ commit }, value) {
    commit('setTerminate', value)
  },
  setWriteOffCharge({ commit }, value) {
    commit('setWriteOffCharge', value)
  },
  setWriteOffPenalty({ commit }, value) {
    commit('setWriteOffPenalty', value)
  },
  setWriteOffInterest({ commit }, value) {
    commit('setWriteOffInterest', value)
  },
  setWriteOffPrincipal({ commit }, value) {
    commit('setWriteOffPrincipal', value)
  },
  setWaiveCharge({ commit }, value) {
    commit('setWaiveCharge', value)
  },
  setWaivePenalty({ commit }, value) {
    commit('setWaivePenalty', value)
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
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
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
  setPrincipalCollection(state, value) {
    state.entry.principal_collection = value
  },
  setInterestCollection(state, value) {
    state.entry.interest_collection = value
  },
  setAdminFeeCollection(state, value) {
    state.entry.admin_fee_collection = value
  },
  setPdPrincipalCollection(state, value) {
    state.entry.pd_principal_collection = value
  },
  setPdInterestCollection(state, value) {
    state.entry.pd_interest_collection = value
  },
  setChargeCollection(state, value) {
    state.entry.charge_collection = value
  },
  setPenaltyCollection(state, value) {
    state.entry.penalty_collection = value
  },
  setLoanAccrualInterest(state, value) {
    state.entry.loan_accrual_interest = value
  },
  setAmendmentAddPrincipal(state, value) {
    state.entry.amendment_add_principal = value
  },
  setAmendmentDuductPrincipal(state, value) {
    state.entry.amendment_duduct_principal = value
  },
  setTerminate(state, value) {
    state.entry.terminate = value
  },
  setWriteOffCharge(state, value) {
    state.entry.write_off_charge = value
  },
  setWriteOffPenalty(state, value) {
    state.entry.write_off_penalty = value
  },
  setWriteOffInterest(state, value) {
    state.entry.write_off_interest = value
  },
  setWriteOffPrincipal(state, value) {
    state.entry.write_off_principal = value
  },
  setWaiveCharge(state, value) {
    state.entry.waive_charge = value
  },
  setWaivePenalty(state, value) {
    state.entry.waive_penalty = value
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
