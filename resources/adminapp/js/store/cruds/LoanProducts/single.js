function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      description: '',
      currency_id: null,
      repayment_method: '',
      day_basis_top_side: '',
      day_basis_down_side: '',
      minimum_age: '',
      maximum_age: '',
      min_interest_rate: '0',
      max_interest_rate: '0',
      minimum_amount: '0',
      maximum_amount: '0',
      minimum_term_monthly: '',
      maximum_term_monthly: '',
      minimum_term_weekly: '',
      maximum_term_weekly: '',
      minimum_term_daily: '',
      maximum_term_daily: '',
      reduce_base_on: null,
      max_reduce_percentage: '0',
      penalty_reduction_base_on: null,
      max_penalty_reduce_percentage: '0',
      admin_fee_base_on: null,
      admin_fee_amount: '',
      admin_fee_accrual: 'N',
      regular_fee_base_on: null,
      regular_fee_amount: '0',
      regular_fee_accual: 'N',
      fee_earn_coa_id: null,
      fee_unearn_coa_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      currency: [],
      reduce_base_on: [],
      penalty_reduction_base_on: [],
      admin_fee_base_on: [],
      admin_fee_accrual: [],
      regular_fee_base_on: [],
      regular_fee_accual: [],
      fee_earn_coa: [],
      fee_unearn_coa: []
    },
    loading: false
  }
}

const route = 'loan-products'

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
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setRepaymentMethod({ commit }, value) {
    commit('setRepaymentMethod', value)
  },
  setDayBasisTopSide({ commit }, value) {
    commit('setDayBasisTopSide', value)
  },
  setDayBasisDownSide({ commit }, value) {
    commit('setDayBasisDownSide', value)
  },
  setMinimumAge({ commit }, value) {
    commit('setMinimumAge', value)
  },
  setMaximumAge({ commit }, value) {
    commit('setMaximumAge', value)
  },
  setMinInterestRate({ commit }, value) {
    commit('setMinInterestRate', value)
  },
  setMaxInterestRate({ commit }, value) {
    commit('setMaxInterestRate', value)
  },
  setMinimumAmount({ commit }, value) {
    commit('setMinimumAmount', value)
  },
  setMaximumAmount({ commit }, value) {
    commit('setMaximumAmount', value)
  },
  setMinimumTermMonthly({ commit }, value) {
    commit('setMinimumTermMonthly', value)
  },
  setMaximumTermMonthly({ commit }, value) {
    commit('setMaximumTermMonthly', value)
  },
  setMinimumTermWeekly({ commit }, value) {
    commit('setMinimumTermWeekly', value)
  },
  setMaximumTermWeekly({ commit }, value) {
    commit('setMaximumTermWeekly', value)
  },
  setMinimumTermDaily({ commit }, value) {
    commit('setMinimumTermDaily', value)
  },
  setMaximumTermDaily({ commit }, value) {
    commit('setMaximumTermDaily', value)
  },
  setReduceBaseOn({ commit }, value) {
    commit('setReduceBaseOn', value)
  },
  setMaxReducePercentage({ commit }, value) {
    commit('setMaxReducePercentage', value)
  },
  setPenaltyReductionBaseOn({ commit }, value) {
    commit('setPenaltyReductionBaseOn', value)
  },
  setMaxPenaltyReducePercentage({ commit }, value) {
    commit('setMaxPenaltyReducePercentage', value)
  },
  setAdminFeeBaseOn({ commit }, value) {
    commit('setAdminFeeBaseOn', value)
  },
  setAdminFeeAmount({ commit }, value) {
    commit('setAdminFeeAmount', value)
  },
  setAdminFeeAccrual({ commit }, value) {
    commit('setAdminFeeAccrual', value)
  },
  setRegularFeeBaseOn({ commit }, value) {
    commit('setRegularFeeBaseOn', value)
  },
  setRegularFeeAmount({ commit }, value) {
    commit('setRegularFeeAmount', value)
  },
  setRegularFeeAccual({ commit }, value) {
    commit('setRegularFeeAccual', value)
  },
  setFeeEarnCoa({ commit }, value) {
    commit('setFeeEarnCoa', value)
  },
  setFeeUnearnCoa({ commit }, value) {
    commit('setFeeUnearnCoa', value)
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
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setRepaymentMethod(state, value) {
    state.entry.repayment_method = value
  },
  setDayBasisTopSide(state, value) {
    state.entry.day_basis_top_side = value
  },
  setDayBasisDownSide(state, value) {
    state.entry.day_basis_down_side = value
  },
  setMinimumAge(state, value) {
    state.entry.minimum_age = value
  },
  setMaximumAge(state, value) {
    state.entry.maximum_age = value
  },
  setMinInterestRate(state, value) {
    state.entry.min_interest_rate = value
  },
  setMaxInterestRate(state, value) {
    state.entry.max_interest_rate = value
  },
  setMinimumAmount(state, value) {
    state.entry.minimum_amount = value
  },
  setMaximumAmount(state, value) {
    state.entry.maximum_amount = value
  },
  setMinimumTermMonthly(state, value) {
    state.entry.minimum_term_monthly = value
  },
  setMaximumTermMonthly(state, value) {
    state.entry.maximum_term_monthly = value
  },
  setMinimumTermWeekly(state, value) {
    state.entry.minimum_term_weekly = value
  },
  setMaximumTermWeekly(state, value) {
    state.entry.maximum_term_weekly = value
  },
  setMinimumTermDaily(state, value) {
    state.entry.minimum_term_daily = value
  },
  setMaximumTermDaily(state, value) {
    state.entry.maximum_term_daily = value
  },
  setReduceBaseOn(state, value) {
    state.entry.reduce_base_on = value
  },
  setMaxReducePercentage(state, value) {
    state.entry.max_reduce_percentage = value
  },
  setPenaltyReductionBaseOn(state, value) {
    state.entry.penalty_reduction_base_on = value
  },
  setMaxPenaltyReducePercentage(state, value) {
    state.entry.max_penalty_reduce_percentage = value
  },
  setAdminFeeBaseOn(state, value) {
    state.entry.admin_fee_base_on = value
  },
  setAdminFeeAmount(state, value) {
    state.entry.admin_fee_amount = value
  },
  setAdminFeeAccrual(state, value) {
    state.entry.admin_fee_accrual = value
  },
  setRegularFeeBaseOn(state, value) {
    state.entry.regular_fee_base_on = value
  },
  setRegularFeeAmount(state, value) {
    state.entry.regular_fee_amount = value
  },
  setRegularFeeAccual(state, value) {
    state.entry.regular_fee_accual = value
  },
  setFeeEarnCoa(state, value) {
    state.entry.fee_earn_coa_id = value
  },
  setFeeUnearnCoa(state, value) {
    state.entry.fee_unearn_coa_id = value
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
