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
              <strong>{{ $t('cruds.chartOfAccount.title_singular') }}</strong>
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
                          {{ $t('cruds.chartOfAccount.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.branch">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.account_title') }}
                        </td>
                        <td>
                          {{ entry.account_title }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.account_type') }}
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
                          {{ $t('cruds.chartOfAccount.fields.classification') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="classification">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.main_account') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="main_account.account_title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.currency') }}
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
                          {{ $t('cruds.chartOfAccount.fields.posting_side') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="posting_side">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.balance_side') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="balance_side">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.allow_posting') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="allow_posting">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.chartOfAccount.fields.allow_direct_posting'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-enum
                            :row="entry"
                            field="allow_direct_posting"
                          >
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.active') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="active">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.chartOfAccount.fields.description') }}
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
    ...mapGetters('ChartOfAccountsSingle', ['entry'])
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
    ...mapActions('ChartOfAccountsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
