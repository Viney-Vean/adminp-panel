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
              <strong>{{ $t('cruds.loanProduct.title_singular') }}</strong>
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
                          {{ $t('cruds.loanProduct.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.branch">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.description') }}
                        </td>
                        <td>
                          {{ entry.description }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.currency') }}
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
                          {{ $t('cruds.loanProduct.fields.repayment_method') }}
                        </td>
                        <td>
                          {{ entry.repayment_method }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.day_basis_top_side')
                          }}
                        </td>
                        <td>
                          {{ entry.day_basis_top_side }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.day_basis_down_side')
                          }}
                        </td>
                        <td>
                          {{ entry.day_basis_down_side }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.minimum_age') }}
                        </td>
                        <td>
                          {{ entry.minimum_age }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.maximum_age') }}
                        </td>
                        <td>
                          {{ entry.maximum_age }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.min_interest_rate') }}
                        </td>
                        <td>
                          {{ entry.min_interest_rate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.max_interest_rate') }}
                        </td>
                        <td>
                          {{ entry.max_interest_rate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.minimum_amount') }}
                        </td>
                        <td>
                          {{ entry.minimum_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.maximum_amount') }}
                        </td>
                        <td>
                          {{ entry.maximum_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.minimum_term_monthly')
                          }}
                        </td>
                        <td>
                          {{ entry.minimum_term_monthly }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.maximum_term_monthly')
                          }}
                        </td>
                        <td>
                          {{ entry.maximum_term_monthly }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.minimum_term_weekly')
                          }}
                        </td>
                        <td>
                          {{ entry.minimum_term_weekly }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.maximum_term_weekly')
                          }}
                        </td>
                        <td>
                          {{ entry.maximum_term_weekly }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.minimum_term_daily')
                          }}
                        </td>
                        <td>
                          {{ entry.minimum_term_daily }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.maximum_term_daily')
                          }}
                        </td>
                        <td>
                          {{ entry.maximum_term_daily }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.reduce_base_on') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="reduce_base_on">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.max_reduce_percentage')
                          }}
                        </td>
                        <td>
                          {{ entry.max_reduce_percentage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProduct.fields.penalty_reduction_base_on'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="penalty_reduction_base_on"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProduct.fields.max_penalty_reduce_percentage'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.max_penalty_reduce_percentage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.admin_fee_base_on') }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="admin_fee_base_on"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.admin_fee_amount') }}
                        </td>
                        <td>
                          {{ entry.admin_fee_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.admin_fee_accrual') }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="admin_fee_accrual"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.regular_fee_base_on')
                          }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="regular_fee_base_on"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.regular_fee_amount')
                          }}
                        </td>
                        <td>
                          {{ entry.regular_fee_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProduct.fields.regular_fee_accual')
                          }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="regular_fee_accual"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.fee_earn_coa') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="fee_earn_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProduct.fields.fee_unearn_coa') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="fee_unearn_coa.account_title"
                          >
                          </datatable-single>
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
    ...mapGetters('LoanProductsSingle', ['entry'])
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
    ...mapActions('LoanProductsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
