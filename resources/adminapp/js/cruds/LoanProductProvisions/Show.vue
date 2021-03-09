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
              <strong>{{
                $t('cruds.loanProductProvision.title_singular')
              }}</strong>
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
                          {{ $t('cruds.loanProductProvision.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProductProvision.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.branch">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProductProvision.fields.product') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="product.description"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProductProvision.fields.class') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="class.class_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.outstanding_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="outstanding_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.loanProductProvision.fields.air_coa') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="air_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.interest_income_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="interest_income_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.interest_in_suspend_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="interest_in_suspend_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.provision_expense_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="provision_expense_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.provision_reserve_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="provision_reserve_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.loanProductProvision.fields.penalty_coa')
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="penalty_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.charge_income_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="charge_income_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.charge_in_suspend_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="charge_in_suspend_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.charge_receivable_coa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="charge_receivable_coa.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.loanProductProvision.fields.provision_booking'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.provision_booking }}
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
    ...mapGetters('LoanProductProvisionsSingle', ['entry'])
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
    ...mapActions('LoanProductProvisionsSingle', [
      'fetchShowData',
      'resetState'
    ])
  }
}
</script>
