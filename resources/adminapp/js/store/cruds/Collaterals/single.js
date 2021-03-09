function initialState() {
  return {
    entry: {
      id: null,
      customer_id: null,
      description: '',
      collateral_type_id: null,
      currency_id: null,
      purchase_price: '0',
      valuation_price: '0',
      valuer: '',
      issued_date: '',
      issued_place: '',
      issued_by: '',
      collateral_number: '',
      province_id: null,
      district_id: null,
      commune_id: null,
      village_id: null,
      received_date: '',
      withdrawal_date: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      customer: [],
      collateral_type: [],
      currency: [],
      province: [],
      district: [],
      commune: [],
      village: []
    },
    loading: false
  }
}

const route = 'collaterals'

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
  setCustomer({ commit }, value) {
    commit('setCustomer', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setCollateralType({ commit }, value) {
    commit('setCollateralType', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setPurchasePrice({ commit }, value) {
    commit('setPurchasePrice', value)
  },
  setValuationPrice({ commit }, value) {
    commit('setValuationPrice', value)
  },
  setValuer({ commit }, value) {
    commit('setValuer', value)
  },
  setIssuedDate({ commit }, value) {
    commit('setIssuedDate', value)
  },
  setIssuedPlace({ commit }, value) {
    commit('setIssuedPlace', value)
  },
  setIssuedBy({ commit }, value) {
    commit('setIssuedBy', value)
  },
  setCollateralNumber({ commit }, value) {
    commit('setCollateralNumber', value)
  },
  setProvince({ commit }, value) {
    commit('setProvince', value)
  },
  setDistrict({ commit }, value) {
    commit('setDistrict', value)
  },
  setCommune({ commit }, value) {
    commit('setCommune', value)
  },
  setVillage({ commit }, value) {
    commit('setVillage', value)
  },
  setReceivedDate({ commit }, value) {
    commit('setReceivedDate', value)
  },
  setWithdrawalDate({ commit }, value) {
    commit('setWithdrawalDate', value)
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
  setCustomer(state, value) {
    state.entry.customer_id = value
  },
  setDescription(state, value) {
    state.entry.description = value
  },
  setCollateralType(state, value) {
    state.entry.collateral_type_id = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setPurchasePrice(state, value) {
    state.entry.purchase_price = value
  },
  setValuationPrice(state, value) {
    state.entry.valuation_price = value
  },
  setValuer(state, value) {
    state.entry.valuer = value
  },
  setIssuedDate(state, value) {
    state.entry.issued_date = value
  },
  setIssuedPlace(state, value) {
    state.entry.issued_place = value
  },
  setIssuedBy(state, value) {
    state.entry.issued_by = value
  },
  setCollateralNumber(state, value) {
    state.entry.collateral_number = value
  },
  setProvince(state, value) {
    state.entry.province_id = value
  },
  setDistrict(state, value) {
    state.entry.district_id = value
  },
  setCommune(state, value) {
    state.entry.commune_id = value
  },
  setVillage(state, value) {
    state.entry.village_id = value
  },
  setReceivedDate(state, value) {
    state.entry.received_date = value
  },
  setWithdrawalDate(state, value) {
    state.entry.withdrawal_date = value
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
