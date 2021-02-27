function initialState() {
  return {
    entry: {
      id: null,
      branch_id: null,
      customer_id: null,
      code: '',
      application_id: null,
      dd_account_id: null,
      currency_id: null,
      loan_product_id: null,
      approve_amount: '0',
      disburse_amount: '0',
      outstanding: '0',
      balance: '0',
      transaction_date: '',
      maturity_date: '',
      interest_rate: '',
      repayment_method: null,
      repayment_frequency: null,
      frequency: '',
      term: '0',
      installment: '0',
      first_collection_date: '',
      contract_type: 'N',
      more_than_one_year: null,
      provision_class_id: null,
      officer_id: null,
      total_interest: '0',
      accrue_interest_per_day: '0',
      interest_income_earn: '0',
      accrue_interest_receivable: '0',
      accrue_interest_current_installment: '0',
      accrue_interest_current_month: '0',
      accrue_interest_previous_month: '0',
      accrue_regular_fee_per_day: '0',
      accrue_regular_fee_receivable: '0',
      accrue_regular_fee_current_installment: '0',
      accrue_regular_fee_current_month: '0',
      accrue_regular_fee_prev_month: '0',
      admin_fee_earn: '0',
      admin_fee_unearn: '',
      admin_fee_per_day: '0',
      next_run_date: '',
      principal_due: '',
      interest_due: '0',
      charge_due: '0',
      penalty_due: '0',
      total_overdue: '0',
      num_day_due: '0',
      provision_amount: '0',
      provision_amount_lcy: '0',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      branch: [],
      customer: [],
      application: [],
      dd_account: [],
      currency: [],
      loan_product: [],
      repayment_method: [],
      repayment_frequency: [],
      contract_type: [],
      more_than_one_year: [],
      provision_class: [],
      officer: []
    },
    loading: false
  }
}

const route = 'contracts'

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
  setCustomer({ commit }, value) {
    commit('setCustomer', value)
  },
  setCode({ commit }, value) {
    commit('setCode', value)
  },
  setApplication({ commit }, value) {
    commit('setApplication', value)
  },
  setDdAccount({ commit }, value) {
    commit('setDdAccount', value)
  },
  setCurrency({ commit }, value) {
    commit('setCurrency', value)
  },
  setLoanProduct({ commit }, value) {
    commit('setLoanProduct', value)
  },
  setApproveAmount({ commit }, value) {
    commit('setApproveAmount', value)
  },
  setDisburseAmount({ commit }, value) {
    commit('setDisburseAmount', value)
  },
  setOutstanding({ commit }, value) {
    commit('setOutstanding', value)
  },
  setBalance({ commit }, value) {
    commit('setBalance', value)
  },
  setTransactionDate({ commit }, value) {
    commit('setTransactionDate', value)
  },
  setMaturityDate({ commit }, value) {
    commit('setMaturityDate', value)
  },
  setInterestRate({ commit }, value) {
    commit('setInterestRate', value)
  },
  setRepaymentMethod({ commit }, value) {
    commit('setRepaymentMethod', value)
  },
  setRepaymentFrequency({ commit }, value) {
    commit('setRepaymentFrequency', value)
  },
  setFrequency({ commit }, value) {
    commit('setFrequency', value)
  },
  setTerm({ commit }, value) {
    commit('setTerm', value)
  },
  setInstallment({ commit }, value) {
    commit('setInstallment', value)
  },
  setFirstCollectionDate({ commit }, value) {
    commit('setFirstCollectionDate', value)
  },
  setContractType({ commit }, value) {
    commit('setContractType', value)
  },
  setMoreThanOneYear({ commit }, value) {
    commit('setMoreThanOneYear', value)
  },
  setProvisionClass({ commit }, value) {
    commit('setProvisionClass', value)
  },
  setOfficer({ commit }, value) {
    commit('setOfficer', value)
  },
  setTotalInterest({ commit }, value) {
    commit('setTotalInterest', value)
  },
  setAccrueInterestPerDay({ commit }, value) {
    commit('setAccrueInterestPerDay', value)
  },
  setInterestIncomeEarn({ commit }, value) {
    commit('setInterestIncomeEarn', value)
  },
  setAccrueInterestReceivable({ commit }, value) {
    commit('setAccrueInterestReceivable', value)
  },
  setAccrueInterestCurrentInstallment({ commit }, value) {
    commit('setAccrueInterestCurrentInstallment', value)
  },
  setAccrueInterestCurrentMonth({ commit }, value) {
    commit('setAccrueInterestCurrentMonth', value)
  },
  setAccrueInterestPreviousMonth({ commit }, value) {
    commit('setAccrueInterestPreviousMonth', value)
  },
  setAccrueRegularFeePerDay({ commit }, value) {
    commit('setAccrueRegularFeePerDay', value)
  },
  setAccrueRegularFeeReceivable({ commit }, value) {
    commit('setAccrueRegularFeeReceivable', value)
  },
  setAccrueRegularFeeCurrentInstallment({ commit }, value) {
    commit('setAccrueRegularFeeCurrentInstallment', value)
  },
  setAccrueRegularFeeCurrentMonth({ commit }, value) {
    commit('setAccrueRegularFeeCurrentMonth', value)
  },
  setAccrueRegularFeePrevMonth({ commit }, value) {
    commit('setAccrueRegularFeePrevMonth', value)
  },
  setAdminFeeEarn({ commit }, value) {
    commit('setAdminFeeEarn', value)
  },
  setAdminFeeUnearn({ commit }, value) {
    commit('setAdminFeeUnearn', value)
  },
  setAdminFeePerDay({ commit }, value) {
    commit('setAdminFeePerDay', value)
  },
  setNextRunDate({ commit }, value) {
    commit('setNextRunDate', value)
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
  setTotalOverdue({ commit }, value) {
    commit('setTotalOverdue', value)
  },
  setNumDayDue({ commit }, value) {
    commit('setNumDayDue', value)
  },
  setProvisionAmount({ commit }, value) {
    commit('setProvisionAmount', value)
  },
  setProvisionAmountLcy({ commit }, value) {
    commit('setProvisionAmountLcy', value)
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
  setCustomer(state, value) {
    state.entry.customer_id = value
  },
  setCode(state, value) {
    state.entry.code = value
  },
  setApplication(state, value) {
    state.entry.application_id = value
  },
  setDdAccount(state, value) {
    state.entry.dd_account_id = value
  },
  setCurrency(state, value) {
    state.entry.currency_id = value
  },
  setLoanProduct(state, value) {
    state.entry.loan_product_id = value
  },
  setApproveAmount(state, value) {
    state.entry.approve_amount = value
  },
  setDisburseAmount(state, value) {
    state.entry.disburse_amount = value
  },
  setOutstanding(state, value) {
    state.entry.outstanding = value
  },
  setBalance(state, value) {
    state.entry.balance = value
  },
  setTransactionDate(state, value) {
    state.entry.transaction_date = value
  },
  setMaturityDate(state, value) {
    state.entry.maturity_date = value
  },
  setInterestRate(state, value) {
    state.entry.interest_rate = value
  },
  setRepaymentMethod(state, value) {
    state.entry.repayment_method = value
  },
  setRepaymentFrequency(state, value) {
    state.entry.repayment_frequency = value
  },
  setFrequency(state, value) {
    state.entry.frequency = value
  },
  setTerm(state, value) {
    state.entry.term = value
  },
  setInstallment(state, value) {
    state.entry.installment = value
  },
  setFirstCollectionDate(state, value) {
    state.entry.first_collection_date = value
  },
  setContractType(state, value) {
    state.entry.contract_type = value
  },
  setMoreThanOneYear(state, value) {
    state.entry.more_than_one_year = value
  },
  setProvisionClass(state, value) {
    state.entry.provision_class_id = value
  },
  setOfficer(state, value) {
    state.entry.officer_id = value
  },
  setTotalInterest(state, value) {
    state.entry.total_interest = value
  },
  setAccrueInterestPerDay(state, value) {
    state.entry.accrue_interest_per_day = value
  },
  setInterestIncomeEarn(state, value) {
    state.entry.interest_income_earn = value
  },
  setAccrueInterestReceivable(state, value) {
    state.entry.accrue_interest_receivable = value
  },
  setAccrueInterestCurrentInstallment(state, value) {
    state.entry.accrue_interest_current_installment = value
  },
  setAccrueInterestCurrentMonth(state, value) {
    state.entry.accrue_interest_current_month = value
  },
  setAccrueInterestPreviousMonth(state, value) {
    state.entry.accrue_interest_previous_month = value
  },
  setAccrueRegularFeePerDay(state, value) {
    state.entry.accrue_regular_fee_per_day = value
  },
  setAccrueRegularFeeReceivable(state, value) {
    state.entry.accrue_regular_fee_receivable = value
  },
  setAccrueRegularFeeCurrentInstallment(state, value) {
    state.entry.accrue_regular_fee_current_installment = value
  },
  setAccrueRegularFeeCurrentMonth(state, value) {
    state.entry.accrue_regular_fee_current_month = value
  },
  setAccrueRegularFeePrevMonth(state, value) {
    state.entry.accrue_regular_fee_prev_month = value
  },
  setAdminFeeEarn(state, value) {
    state.entry.admin_fee_earn = value
  },
  setAdminFeeUnearn(state, value) {
    state.entry.admin_fee_unearn = value
  },
  setAdminFeePerDay(state, value) {
    state.entry.admin_fee_per_day = value
  },
  setNextRunDate(state, value) {
    state.entry.next_run_date = value
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
  setTotalOverdue(state, value) {
    state.entry.total_overdue = value
  },
  setNumDayDue(state, value) {
    state.entry.num_day_due = value
  },
  setProvisionAmount(state, value) {
    state.entry.provision_amount = value
  },
  setProvisionAmountLcy(state, value) {
    state.entry.provision_amount_lcy = value
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
