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
              <strong>{{ $t('cruds.accountProduct.title_singular') }}</strong>
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
                          {{ $t('cruds.accountProduct.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.branch') }}
                        </td>
                        <td>
                          {{ entry.branch }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.account_product_title'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.account_product_title }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.accountProduct.fields.chart_of_account')
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="chart_of_account.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.currency') }}
                        </td>
                        <td>
                          {{ entry.currency }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.account_product_type'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="account_product_type.description"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.account_type') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="account_type.description"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.interest_rate') }}
                        </td>
                        <td>
                          {{ entry.interest_rate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.charged_rate') }}
                        </td>
                        <td>
                          {{ entry.charged_rate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.tax_rate') }}
                        </td>
                        <td>
                          {{ entry.tax_rate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.balance_define') }}
                        </td>
                        <td>
                          {{ entry.balance_define }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.accountProduct.fields.interest_day_basis')
                          }}
                        </td>
                        <td>
                          {{ entry.interest_day_basis }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.interest_accrual_basis'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.interest_accrual_basis }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.interest_capitalization'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.interest_capitalization }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.accountProduct.fields.dormant_day') }}
                        </td>
                        <td>
                          {{ entry.dormant_day }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.interest_expense_coa'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.interest_expense_coa }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.interest_payable_coa'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.interest_payable_coa }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.interest_income_coa'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.interest_income_coa }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.accountProduct.fields.interest_receivable_coa'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.interest_receivable_coa }}
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

export default {
  components: {
    DatatableSingle
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('AccountProductsSingle', ['entry'])
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
    ...mapActions('AccountProductsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
