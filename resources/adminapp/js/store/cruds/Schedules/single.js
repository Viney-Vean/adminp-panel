function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      loan_id: null,
      no: '',
      collection_date: '',
      principal: '0',
      interest: '0',
      charge: '0',
      penalty: '0',
      balance: '0',
      num_day: '',
      total_amount: '0',
      paid_amount: '0',
      waive_interest: '0',
      waive_charge: '0',
      waive_penalty: '0',
      status: '1',
      schedule_saved: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      loan: [],
      status: []
    },
    loading: false
  }
}

const route = 'schedules'

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
  setLoan({ commit }, value) {
    commit('setLoan', value)
  },
  setNo({ commit }, value) {
    commit('setNo', value)
  },
  setCollectionDate({ commit }, value) {
    commit('setCollectionDate', value)
  },
  setPrincipal({ commit }, value) {
    commit('setPrincipal', value)
  },
  setInterest({ commit }, value) {
    commit('setInterest', value)
  },
  setCharge({ commit }, value) {
    commit('setCharge', value)
  },
  setPenalty({ commit }, value) {
    commit('setPenalty', value)
  },
  setBalance({ commit }, value) {
    commit('setBalance', value)
  },
  setNumDay({ commit }, value) {
    commit('setNumDay', value)
  },
  setTotalAmount({ commit }, value) {
    commit('setTotalAmount', value)
  },
  setPaidAmount({ commit }, value) {
    commit('setPaidAmount', value)
  },
  setWaiveInterest({ commit }, value) {
    commit('setWaiveInterest', value)
  },
  setWaiveCharge({ commit }, value) {
    commit('setWaiveCharge', value)
  },
  setWaivePenalty({ commit }, value) {
    commit('setWaivePenalty', value)
  },
  setStatus({ commit }, value) {
    commit('setStatus', value)
  },
  setScheduleSaved({ commit }, value) {
    commit('setScheduleSaved', value)
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
  setLoan(state, value) {
    state.entry.loan_id = value
  },
  setNo(state, value) {
    state.entry.no = value
  },
  setCollectionDate(state, value) {
    state.entry.collection_date = value
  },
  setPrincipal(state, value) {
    state.entry.principal = value
  },
  setInterest(state, value) {
    state.entry.interest = value
  },
  setCharge(state, value) {
    state.entry.charge = value
  },
  setPenalty(state, value) {
    state.entry.penalty = value
  },
  setBalance(state, value) {
    state.entry.balance = value
  },
  setNumDay(state, value) {
    state.entry.num_day = value
  },
  setTotalAmount(state, value) {
    state.entry.total_amount = value
  },
  setPaidAmount(state, value) {
    state.entry.paid_amount = value
  },
  setWaiveInterest(state, value) {
    state.entry.waive_interest = value
  },
  setWaiveCharge(state, value) {
    state.entry.waive_charge = value
  },
  setWaivePenalty(state, value) {
    state.entry.waive_penalty = value
  },
  setStatus(state, value) {
    state.entry.status = value
  },
  setScheduleSaved(state, value) {
    state.entry.schedule_saved = value
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
