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
              <strong>{{ $t('cruds.application.title_singular') }}</strong>
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
                          {{ $t('cruds.application.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.branch">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.customer') }}
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
                          {{ $t('cruds.application.fields.code') }}
                        </td>
                        <td>
                          {{ entry.code }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.application_date') }}
                        </td>
                        <td>
                          {{ entry.application_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.currency') }}
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
                          {{ $t('cruds.application.fields.loan_product') }}
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
                          {{ $t('cruds.application.fields.apply_amount') }}
                        </td>
                        <td>
                          {{ entry.apply_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.approve_amount') }}
                        </td>
                        <td>
                          {{ entry.approve_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.repayment_method') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="repayment_method">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.application.fields.repayment_frequency')
                          }}
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
                          {{ $t('cruds.application.fields.frequency') }}
                        </td>
                        <td>
                          {{ entry.frequency }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.term') }}
                        </td>
                        <td>
                          {{ entry.term }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.installment') }}
                        </td>
                        <td>
                          {{ entry.installment }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.application.fields.interest_rate') }}
                        </td>
                        <td>
                          {{ entry.interest_rate }}
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
    ...mapGetters('ApplicationsSingle', ['entry'])
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
    ...mapActions('ApplicationsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
