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
              <strong>{{ $t('cruds.systemSetting.title_singular') }}</strong>
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
                          {{ $t('cruds.systemSetting.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.systemSetting.fields.branch') }}
                        </td>
                        <td>
                          {{ entry.branch }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.principal_collection'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.principal_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.interest_collection')
                          }}
                        </td>
                        <td>
                          {{ entry.interest_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.admin_fee_collection'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.admin_fee_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.pd_principal_collection'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pd_principal_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.pd_interest_collection'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pd_interest_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.charge_collection')
                          }}
                        </td>
                        <td>
                          {{ entry.charge_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.penalty_collection')
                          }}
                        </td>
                        <td>
                          {{ entry.penalty_collection }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.loan_accrual_interest'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.loan_accrual_interest }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.amendment_add_principal'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.amendment_add_principal }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.systemSetting.fields.amendment_duduct_principal'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.amendment_duduct_principal }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.systemSetting.fields.terminate') }}
                        </td>
                        <td>
                          {{ entry.terminate }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.write_off_charge')
                          }}
                        </td>
                        <td>
                          {{ entry.write_off_charge }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.write_off_penalty')
                          }}
                        </td>
                        <td>
                          {{ entry.write_off_penalty }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.write_off_interest')
                          }}
                        </td>
                        <td>
                          {{ entry.write_off_interest }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.systemSetting.fields.write_off_principal')
                          }}
                        </td>
                        <td>
                          {{ entry.write_off_principal }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.systemSetting.fields.waive_charge') }}
                        </td>
                        <td>
                          {{ entry.waive_charge }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.systemSetting.fields.waive_penalty') }}
                        </td>
                        <td>
                          {{ entry.waive_penalty }}
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

export default {
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('SystemSettingsSingle', ['entry'])
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
    ...mapActions('SystemSettingsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
