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
              <strong>{{ $t('cruds.writeOff.title_singular') }}</strong>
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
                          {{ $t('cruds.writeOff.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.branch">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.contract') }}
                        </td>
                        <td>
                          {{ entry.contract }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.customer') }}
                        </td>
                        <td>
                          {{ entry.customer }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.customer_name') }}
                        </td>
                        <td>
                          {{ entry.customer_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.currency') }}
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
                          {{ $t('cruds.writeOff.fields.dd_account') }}
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
                          {{ $t('cruds.writeOff.fields.approve_amount') }}
                        </td>
                        <td>
                          {{ entry.approve_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.disburse_amount') }}
                        </td>
                        <td>
                          {{ entry.disburse_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.balance') }}
                        </td>
                        <td>
                          {{ entry.balance }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.writeOff.fields.accrue_interest_current_installment'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_current_installment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.principal_due') }}
                        </td>
                        <td>
                          {{ entry.principal_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.interest_due') }}
                        </td>
                        <td>
                          {{ entry.interest_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.charge_due') }}
                        </td>
                        <td>
                          {{ entry.charge_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.penalty_due') }}
                        </td>
                        <td>
                          {{ entry.penalty_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.orig_balance') }}
                        </td>
                        <td>
                          {{ entry.orig_balance }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.writeOff.fields.orig_accrue_interest_current_installment'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.orig_accrue_interest_current_installment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.orig_charge') }}
                        </td>
                        <td>
                          {{ entry.orig_charge }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.orig_principal_due') }}
                        </td>
                        <td>
                          {{ entry.orig_principal_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.orig_interest_due') }}
                        </td>
                        <td>
                          {{ entry.orig_interest_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.orig_charge_due') }}
                        </td>
                        <td>
                          {{ entry.orig_charge_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.orig_penalty_due') }}
                        </td>
                        <td>
                          {{ entry.orig_penalty_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.write_off_date') }}
                        </td>
                        <td>
                          {{ entry.write_off_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.writeOff.fields.description') }}
                        </td>
                        <td>
                          {{ entry.description }}
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
    ...mapGetters('WriteOffsSingle', ['entry'])
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
    ...mapActions('WriteOffsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
