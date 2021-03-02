function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      account_title: '',
      account_type_id: null,
      classification: null,
      main_account_id: null,
      currency_id: null,
      posting_side: null,
      balance_side: null,
      allow_posting: null,
      allow_direct_posting: null,
      active: null,
      description: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      account_type: [],
      classification: [],
      main_account: [],
      currency: [],
      posting_side: [],
      balance_side: [],
      allow_posting: [],
      allow_direct_posting: [],
      active: []
    },
    loading: false
  }
}

const route = 'chart-of-accounts'

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
  setAccountTitle({ commit }, value) {
    commit('setAccountTitle', value)
  },
  setAccountType({ commit }, value) {
    commit('setAccountType', value)
  },
  setClassification({ commit }, value) {
    commit('setClassification', value)
  },
  setMainAccount({ commit }, value) {
    commit('setMainAccount', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setPostingSide({ commit }, value) {
    commit('setPostingSide', value)
  },
  setBalanceSide({ commit }, value) {
    commit('setBalanceSide', value)
  },
  setAllowPosting({ commit }, value) {
    commit('setAllowPosting', value)
  },
  setAllowDirectPosting({ commit }, value) {
    commit('setAllowDirectPosting', value)
  },
  setActive({ commit }, value) {
    commit('setActive', value)
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
  setAccountTitle(state, value) {
    state.entry.account_title = value
  },
  setAccountType(state, value) {
    state.entry.account_type_id = value
  },
  setClassification(state, value) {
    state.entry.classification = value
  },
  setMainAccount(state, value) {
    state.entry.main_account_id = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setPostingSide(state, value) {
    state.entry.posting_side = value
  },
  setBalanceSide(state, value) {
    state.entry.balance_side = value
  },
  setAllowPosting(state, value) {
    state.entry.allow_posting = value
  },
  setAllowDirectPosting(state, value) {
    state.entry.allow_direct_posting = value
  },
  setActive(state, value) {
    state.entry.active = value
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
