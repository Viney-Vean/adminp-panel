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
                $t('cruds.collectionSetting.title_singular')
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
                          {{ $t('cruds.collectionSetting.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collectionSetting.fields.branch') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="branch.branch">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collectionSetting.fields.past_due') }}
                        </td>
                        <td>
                          {{ entry.past_due }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collectionSetting.fields.pre_grace') }}
                        </td>
                        <td>
                          {{ entry.pre_grace }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collectionSetting.fields.grace') }}
                        </td>
                        <td>
                          {{ entry.grace }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.collection_order'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.collection_order }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.terminate_insufficient_fund'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.terminate_insufficient_fund }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.penalty_collection_option'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.penalty_collection_option }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.collectionSetting.fields.penalty_method')
                          }}
                        </td>
                        <td>
                          {{ entry.penalty_method }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.penalty_calculation_base'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.penalty_calculation_base }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.max_day_penalty_calculation'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.max_day_penalty_calculation }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.collectionSetting.fields.write_off_class')
                          }}
                        </td>
                        <td>
                          {{ entry.write_off_class }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.pd_collection_method'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pd_collection_method }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.pre_termination_option'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pre_termination_option }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.pre_termination_duration'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pre_termination_duration }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.pre_terminationd_type'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pre_terminationd_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.pre_termination_percentage'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.pre_termination_percentage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.amend_deduct_option'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.amend_deduct_option }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.amend_deduct_duration'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.amend_deduct_duration }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.amend_deductd_type'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.amend_deductd_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.collectionSetting.fields.amend_deduct_percentage'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.amend_deduct_percentage }}
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
    ...mapGetters('CollectionSettingsSingle', ['entry'])
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
    ...mapActions('CollectionSettingsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
