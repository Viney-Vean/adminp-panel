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
              <strong>{{ $t('cruds.pastDueDetail.title_singular') }}</strong>
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
                          {{ $t('cruds.pastDueDetail.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.schedule') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="schedule.no">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.contract') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="contract.code">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.due_date') }}
                        </td>
                        <td>
                          {{ entry.due_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.principal_due') }}
                        </td>
                        <td>
                          {{ entry.principal_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.out_principal') }}
                        </td>
                        <td>
                          {{ entry.out_principal }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.interest_due') }}
                        </td>
                        <td>
                          {{ entry.interest_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.out_interest') }}
                        </td>
                        <td>
                          {{ entry.out_interest }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.pastDueDetail.fields.accrue_interest_out')
                          }}
                        </td>
                        <td>
                          {{ entry.accrue_interest_out }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.charge_due') }}
                        </td>
                        <td>
                          {{ entry.charge_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.out_charge') }}
                        </td>
                        <td>
                          {{ entry.out_charge }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.penalty_due') }}
                        </td>
                        <td>
                          {{ entry.penalty_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.out_penalty') }}
                        </td>
                        <td>
                          {{ entry.out_penalty }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.numday_due') }}
                        </td>
                        <td>
                          {{ entry.numday_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.pastDueDetail.fields.status_due') }}
                        </td>
                        <td>
                          {{ entry.status_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.pastDueDetail.fields.collect_penalty_amount'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.collect_penalty_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.pastDueDetail.fields.collect_interest_amount'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.collect_interest_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.pastDueDetail.fields.collect_charge_amount'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.collect_charge_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.pastDueDetail.fields.waive_penalty_amount'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.waive_penalty_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.pastDueDetail.fields.waive_interest_amount'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.waive_interest_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.pastDueDetail.fields.waive_charge_amount')
                          }}
                        </td>
                        <td>
                          {{ entry.waive_charge_amount }}
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
    ...mapGetters('PastDueDetailsSingle', ['entry'])
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
    ...mapActions('PastDueDetailsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
