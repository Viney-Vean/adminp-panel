function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      current_system_date: '',
      next_system_date: '',
      next_week_end: '',
      next_month_end: '',
      next_year_end: '',
      previous_year_end: '',
      previous_month_end: '',
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

const route = 'system-dates'

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
  setCurrentSystemDate({ commit }, value) {
    commit('setCurrentSystemDate', value)
  },
  setNextSystemDate({ commit }, value) {
    commit('setNextSystemDate', value)
  },
  setNextWeekEnd({ commit }, value) {
    commit('setNextWeekEnd', value)
  },
  setNextMonthEnd({ commit }, value) {
    commit('setNextMonthEnd', value)
  },
  setNextYearEnd({ commit }, value) {
    commit('setNextYearEnd', value)
  },
  setPreviousYearEnd({ commit }, value) {
    commit('setPreviousYearEnd', value)
  },
  setPreviousMonthEnd({ commit }, value) {
    commit('setPreviousMonthEnd', value)
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
  setCurrentSystemDate(state, value) {
    state.entry.current_system_date = value
  },
  setNextSystemDate(state, value) {
    state.entry.next_system_date = value
  },
  setNextWeekEnd(state, value) {
    state.entry.next_week_end = value
  },
  setNextMonthEnd(state, value) {
    state.entry.next_month_end = value
  },
  setNextYearEnd(state, value) {
    state.entry.next_year_end = value
  },
  setPreviousYearEnd(state, value) {
    state.entry.previous_year_end = value
  },
  setPreviousMonthEnd(state, value) {
    state.entry.previous_month_end = value
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
