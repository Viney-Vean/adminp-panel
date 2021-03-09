function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      description: '',
      buy_rate: '',
      sell_rate: '',
      rnd_mode: '',
      minimum_unit: '',
      decimal_place: '',
      currency_sign: '',
      revaluation_rate: '',
      other_rate: '',
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

const route = 'currencies'

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
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setBuyRate({ commit }, value) {
    commit('setBuyRate', value)
  },
  setSellRate({ commit }, value) {
    commit('setSellRate', value)
  },
  setRndMode({ commit }, value) {
    commit('setRndMode', value)
  },
  setMinimumUnit({ commit }, value) {
    commit('setMinimumUnit', value)
  },
  setDecimalPlace({ commit }, value) {
    commit('setDecimalPlace', value)
  },
  setCurrencySign({ commit }, value) {
    commit('setCurrencySign', value)
  },
  setRevaluationRate({ commit }, value) {
    commit('setRevaluationRate', value)
  },
  setOtherRate({ commit }, value) {
    commit('setOtherRate', value)
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
  setDescription(state, value) {
    state.entry.description = value
  },
  setBuyRate(state, value) {
    state.entry.buy_rate = value
  },
  setSellRate(state, value) {
    state.entry.sell_rate = value
  },
  setRndMode(state, value) {
    state.entry.rnd_mode = value
  },
  setMinimumUnit(state, value) {
    state.entry.minimum_unit = value
  },
  setDecimalPlace(state, value) {
    state.entry.decimal_place = value
  },
  setCurrencySign(state, value) {
    state.entry.currency_sign = value
  },
  setRevaluationRate(state, value) {
    state.entry.revaluation_rate = value
  },
  setOtherRate(state, value) {
    state.entry.other_rate = value
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
