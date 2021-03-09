<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.commune.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.branch_id !== null,
                      'is-focused': activeField == 'branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.commune.fields.branch')
                    }}</label>
                    <v-select
                      name="branch"
                      label="name_en"
                      :key="'branch-field'"
                      :value="entry.branch_id"
                      :options="lists.branch"
                      :reduce="entry => entry.id"
                      @input="updateBranch"
                      @search.focus="focusField('branch')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.district_id !== null,
                      'is-focused': activeField == 'district'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.commune.fields.district')
                    }}</label>
                    <v-select
                      name="district"
                      label="name_en"
                      :key="'district-field'"
                      :value="entry.district_id"
                      :options="lists.district"
                      :reduce="entry => entry.id"
                      @input="updateDistrict"
                      @search.focus="focusField('district')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name_en,
                      'is-focused': activeField == 'name_en'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.commune.fields.name_en')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name_en"
                      @input="updateNameEn"
                      @focus="focusField('name_en')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name_lc,
                      'is-focused': activeField == 'name_lc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.commune.fields.name_lc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name_lc"
                      @input="updateNameLc"
                      @focus="focusField('name_lc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.code,
                      'is-focused': activeField == 'code'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.commune.fields.code')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.code"
                      @input="updateCode"
                      @focus="focusField('code')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CommunesSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CommunesSingle', [
      'storeData',
      'resetState',
      'setBranch',
      'setDistrict',
      'setNameEn',
      'setNameLc',
      'setCode',
      'fetchCreateData'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateDistrict(value) {
      this.setDistrict(value)
    },
    updateNameEn(e) {
      this.setNameEn(e.target.value)
    },
    updateNameLc(e) {
      this.setNameLc(e.target.value)
    },
    updateCode(e) {
      this.setCode(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'communes.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
