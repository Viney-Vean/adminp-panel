function initialState() {
  return {
    entry: {
      id: null,
      past_due: '',
      pre_grace: '',
      grace: '',
      branch_id: null,
      collection_order: '',
      terminate_insufficient_fund: '',
      penalty_collection_option: '',
      penalty_method: '',
      penalty_calculation_base: '',
      max_day_penalty_calculation: '',
      write_off_class: '',
      pd_collection_method: '',
      pre_termination_option: '',
      pre_termination_duration: '',
      pre_terminationd_type: '',
      pre_termination_percentage: '',
      amend_deduct_option: '',
      amend_deduct_duration: '',
      amend_deductd_type: '',
      amend_deduct_percentage: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: []
    },
    loading: false
  }
}

const route = 'collection-settings'

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
  setPastDue({ commit }, value) {
    commit('setPastDue', value)
  },
  setPreGrace({ commit }, value) {
    commit('setPreGrace', value)
  },
  setGrace({ commit }, value) {
    commit('setGrace', value)
  },
  setBranch({ commit }, value) {
    commit('setBranch', value)
  },
  setCollectionOrder({ commit }, value) {
    commit('setCollectionOrder', value)
  },
  setTerminateInsufficientFund({ commit }, value) {
    commit('setTerminateInsufficientFund', value)
  },
  setPenaltyCollectionOption({ commit }, value) {
    commit('setPenaltyCollectionOption', value)
  },
  setPenaltyMethod({ commit }, value) {
    commit('setPenaltyMethod', value)
  },
  setPenaltyCalculationBase({ commit }, value) {
    commit('setPenaltyCalculationBase', value)
  },
  setMaxDayPenaltyCalculation({ commit }, value) {
    commit('setMaxDayPenaltyCalculation', value)
  },
  setWriteOffClass({ commit }, value) {
    commit('setWriteOffClass', value)
  },
  setPdCollectionMethod({ commit }, value) {
    commit('setPdCollectionMethod', value)
  },
  setPreTerminationOption({ commit }, value) {
    commit('setPreTerminationOption', value)
  },
  setPreTerminationDuration({ commit }, value) {
    commit('setPreTerminationDuration', value)
  },
  setPreTerminationdType({ commit }, value) {
    commit('setPreTerminationdType', value)
  },
  setPreTerminationPercentage({ commit }, value) {
    commit('setPreTerminationPercentage', value)
  },
  setAmendDeductOption({ commit }, value) {
    commit('setAmendDeductOption', value)
  },
  setAmendDeductDuration({ commit }, value) {
    commit('setAmendDeductDuration', value)
  },
  setAmendDeductdType({ commit }, value) {
    commit('setAmendDeductdType', value)
  },
  setAmendDeductPercentage({ commit }, value) {
    commit('setAmendDeductPercentage', value)
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
  setPastDue(state, value) {
    state.entry.past_due = value
  },
  setPreGrace(state, value) {
    state.entry.pre_grace = value
  },
  setGrace(state, value) {
    state.entry.grace = value
  },
  setBranch(state, value) {
    state.entry.branch_id = value
  },
  setCollectionOrder(state, value) {
    state.entry.collection_order = value
  },
  setTerminateInsufficientFund(state, value) {
    state.entry.terminate_insufficient_fund = value
  },
  setPenaltyCollectionOption(state, value) {
    state.entry.penalty_collection_option = value
  },
  setPenaltyMethod(state, value) {
    state.entry.penalty_method = value
  },
  setPenaltyCalculationBase(state, value) {
    state.entry.penalty_calculation_base = value
  },
  setMaxDayPenaltyCalculation(state, value) {
    state.entry.max_day_penalty_calculation = value
  },
  setWriteOffClass(state, value) {
    state.entry.write_off_class = value
  },
  setPdCollectionMethod(state, value) {
    state.entry.pd_collection_method = value
  },
  setPreTerminationOption(state, value) {
    state.entry.pre_termination_option = value
  },
  setPreTerminationDuration(state, value) {
    state.entry.pre_termination_duration = value
  },
  setPreTerminationdType(state, value) {
    state.entry.pre_terminationd_type = value
  },
  setPreTerminationPercentage(state, value) {
    state.entry.pre_termination_percentage = value
  },
  setAmendDeductOption(state, value) {
    state.entry.amend_deduct_option = value
  },
  setAmendDeductDuration(state, value) {
    state.entry.amend_deduct_duration = value
  },
  setAmendDeductdType(state, value) {
    state.entry.amend_deductd_type = value
  },
  setAmendDeductPercentage(state, value) {
    state.entry.amend_deduct_percentage = value
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
