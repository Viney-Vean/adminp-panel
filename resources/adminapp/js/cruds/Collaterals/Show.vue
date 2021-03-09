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
              <strong>{{ $t('cruds.collateral.title_singular') }}</strong>
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
                          {{ $t('cruds.collateral.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.customer') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="customer.given_name_en"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.description') }}
                        </td>
                        <td>
                          {{ entry.description }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.collateral_type') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="collateral_type.label"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.currency') }}
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
                          {{ $t('cruds.collateral.fields.purchase_price') }}
                        </td>
                        <td>
                          {{ entry.purchase_price }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.valuation_price') }}
                        </td>
                        <td>
                          {{ entry.valuation_price }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.valuer') }}
                        </td>
                        <td>
                          {{ entry.valuer }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.issued_date') }}
                        </td>
                        <td>
                          {{ entry.issued_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.issued_place') }}
                        </td>
                        <td>
                          {{ entry.issued_place }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.issued_by') }}
                        </td>
                        <td>
                          {{ entry.issued_by }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.collateral_number') }}
                        </td>
                        <td>
                          {{ entry.collateral_number }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.province') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="province.name_en"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.district') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="district.name_en"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.commune') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="commune.name_en"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.village') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="village.name_en"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.received_date') }}
                        </td>
                        <td>
                          {{ entry.received_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.collateral.fields.withdrawal_date') }}
                        </td>
                        <td>
                          {{ entry.withdrawal_date }}
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
    ...mapGetters('CollateralsSingle', ['entry'])
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
    ...mapActions('CollateralsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
