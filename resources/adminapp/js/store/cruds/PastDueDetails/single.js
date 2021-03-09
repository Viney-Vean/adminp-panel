function initialState() {
  return {
    entry: {
      id: null,
      schedule_id: null,
      contract_id: null,
      due_date: '',
      principal_due: '0',
      out_principal: '',
      interest_due: '0',
      out_interest: '0',
      accrue_interest_out: '0',
      charge_due: '0',
      out_charge: '0',
      penalty_due: '0',
      out_penalty: '0',
      numday_due: '',
      status_due: '',
      collect_penalty_amount: '',
      collect_interest_amount: '0',
      collect_charge_amount: '',
      waive_penalty_amount: '0',
      waive_interest_amount: '0',
      waive_charge_amount: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      schedule: [],
      contract: []
    },
    loading: false
  }
}

const route = 'past-due-details'

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
  setSchedule({ commit }, value) {
    commit('setSchedule', value)
  },
  setContract({ commit }, value) {
    commit('setContract', value)
  },
  setDueDate({ commit }, value) {
    commit('setDueDate', value)
  },
  setPrincipalDue({ commit }, value) {
    commit('setPrincipalDue', value)
  },
  setOutPrincipal({ commit }, value) {
    commit('setOutPrincipal', value)
  },
  setInterestDue({ commit }, value) {
    commit('setInterestDue', value)
  },
  setOutInterest({ commit }, value) {
    commit('setOutInterest', value)
  },
  setAccrueInterestOut({ commit }, value) {
    commit('setAccrueInterestOut', value)
  },
  setChargeDue({ commit }, value) {
    commit('setChargeDue', value)
  },
  setOutCharge({ commit }, value) {
    commit('setOutCharge', value)
  },
  setPenaltyDue({ commit }, value) {
    commit('setPenaltyDue', value)
  },
  setOutPenalty({ commit }, value) {
    commit('setOutPenalty', value)
  },
  setNumdayDue({ commit }, value) {
    commit('setNumdayDue', value)
  },
  setStatusDue({ commit }, value) {
    commit('setStatusDue', value)
  },
  setCollectPenaltyAmount({ commit }, value) {
    commit('setCollectPenaltyAmount', value)
  },
  setCollectInterestAmount({ commit }, value) {
    commit('setCollectInterestAmount', value)
  },
  setCollectChargeAmount({ commit }, value) {
    commit('setCollectChargeAmount', value)
  },
  setWaivePenaltyAmount({ commit }, value) {
    commit('setWaivePenaltyAmount', value)
  },
  setWaiveInterestAmount({ commit }, value) {
    commit('setWaiveInterestAmount', value)
  },
  setWaiveChargeAmount({ commit }, value) {
    commit('setWaiveChargeAmount', value)
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
  setSchedule(state, value) {
    state.entry.schedule_id = value
  },
  setContract(state, value) {
    state.entry.contract_id = value
  },
  setDueDate(state, value) {
    state.entry.due_date = value
  },
  setPrincipalDue(state, value) {
    state.entry.principal_due = value
  },
  setOutPrincipal(state, value) {
    state.entry.out_principal = value
  },
  setInterestDue(state, value) {
    state.entry.interest_due = value
  },
  setOutInterest(state, value) {
    state.entry.out_interest = value
  },
  setAccrueInterestOut(state, value) {
    state.entry.accrue_interest_out = value
  },
  setChargeDue(state, value) {
    state.entry.charge_due = value
  },
  setOutCharge(state, value) {
    state.entry.out_charge = value
  },
  setPenaltyDue(state, value) {
    state.entry.penalty_due = value
  },
  setOutPenalty(state, value) {
    state.entry.out_penalty = value
  },
  setNumdayDue(state, value) {
    state.entry.numday_due = value
  },
  setStatusDue(state, value) {
    state.entry.status_due = value
  },
  setCollectPenaltyAmount(state, value) {
    state.entry.collect_penalty_amount = value
  },
  setCollectInterestAmount(state, value) {
    state.entry.collect_interest_amount = value
  },
  setCollectChargeAmount(state, value) {
    state.entry.collect_charge_amount = value
  },
  setWaivePenaltyAmount(state, value) {
    state.entry.waive_penalty_amount = value
  },
  setWaiveInterestAmount(state, value) {
    state.entry.waive_interest_amount = value
  },
  setWaiveChargeAmount(state, value) {
    state.entry.waive_charge_amount = value
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
