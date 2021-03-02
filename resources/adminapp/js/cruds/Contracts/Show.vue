<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.contract.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.name_en">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.customer') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="customer.customer_name"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.code') }}
                        </td>
                        <td>
                          {{ entry.code }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.application') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="application.code"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.dd_account') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="dd_account.account_name"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.currency') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="currency.description"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.loan_product') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="loan_product.description"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.approve_amount') }}
                        </td>
                        <td>
                          {{ entry.approve_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.disburse_amount') }}
                        </td>
                        <td>
                          {{ entry.disburse_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.outstanding') }}
                        </td>
                        <td>
                          {{ entry.outstanding }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.balance') }}
                        </td>
                        <td>
                          {{ entry.balance }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.transaction_date') }}
                        </td>
                        <td>
                          {{ entry.transaction_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.maturity_date') }}
                        </td>
                        <td>
                          {{ entry.maturity_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.interest_rate') }}
                        </td>
                        <td>
                          {{ entry.interest_rate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.repayment_method') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="repayment_method">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.repayment_frequency') }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="repayment_frequency"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.frequency') }}
                        </td>
                        <td>
                          {{ entry.frequency }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.term') }}
                        </td>
                        <td>
                          {{ entry.term }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.installment') }}
                        </td>
                        <td>
                          {{ entry.installment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.contract.fields.first_collection_date')
                          }}
                        </td>
                        <td>
                          {{ entry.first_collection_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.contract_type') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="contract_type">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.more_than_one_year') }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="more_than_one_year"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.provision_class') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="provision_class.class"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.officer') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="officer.given_name_en"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.total_interest') }}
                        </td>
                        <td>
                          {{ entry.total_interest }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.contract.fields.accrue_interest_per_day')
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_per_day }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.interest_income_earn') }}
                        </td>
                        <td>
                          {{ entry.interest_income_earn }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_interest_receivable'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_receivable }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_interest_current_installment'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_current_installment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_interest_current_month'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_current_month }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_interest_previous_month'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_previous_month }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_regular_fee_per_day'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_regular_fee_per_day }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_regular_fee_receivable'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_regular_fee_receivable }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_regular_fee_current_installment'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_regular_fee_current_installment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_regular_fee_current_month'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_regular_fee_current_month }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.contract.fields.accrue_regular_fee_prev_month'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_regular_fee_prev_month }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.admin_fee_earn') }}
                        </td>
                        <td>
                          {{ entry.admin_fee_earn }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.admin_fee_unearn') }}
                        </td>
                        <td>
                          {{ entry.admin_fee_unearn }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.admin_fee_per_day') }}
                        </td>
                        <td>
                          {{ entry.admin_fee_per_day }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.next_run_date') }}
                        </td>
                        <td>
                          {{ entry.next_run_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.principal_due') }}
                        </td>
                        <td>
                          {{ entry.principal_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.interest_due') }}
                        </td>
                        <td>
                          {{ entry.interest_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.charge_due') }}
                        </td>
                        <td>
                          {{ entry.charge_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.penalty_due') }}
                        </td>
                        <td>
                          {{ entry.penalty_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.total_overdue') }}
                        </td>
                        <td>
                          {{ entry.total_overdue }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.num_day_due') }}
                        </td>
                        <td>
                          {{ entry.num_day_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.provision_amount') }}
                        </td>
                        <td>
                          {{ entry.provision_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.contract.fields.provision_amount_lcy') }}
                        </td>
                        <td>
                          {{ entry.provision_amount_lcy }}
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableEnum from '@components/Datatables/DatatableEnum'

export default {
  components: {
    DatatableSingle,
    DatatableEnum
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('ContractsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('ContractsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
