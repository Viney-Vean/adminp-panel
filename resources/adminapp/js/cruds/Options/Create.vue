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
                <strong>{{ $t('cruds.option.title_singular') }}</strong>
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
                      'has-items': entry.group_id !== null,
                      'is-focused': activeField == 'group'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.option.fields.group')
                    }}</label>
                    <v-select
                      name="group"
                      label="label"
                      :key="'group-field'"
                      :value="entry.group_id"
                      :options="lists.group"
                      :reduce="entry => entry.id"
                      @input="updateGroup"
                      @search.focus="focusField('group')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.key,
                      'is-focused': activeField == 'key'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.option.fields.key')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.key"
                      @input="updateKey"
                      @focus="focusField('key')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.value,
                      'is-focused': activeField == 'value'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.option.fields.value')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.value"
                      @input="updateValue"
                      @focus="focusField('value')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.label,
                      'is-focused': activeField == 'label'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.option.fields.label')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.label"
                      @input="updateLabel"
                      @focus="focusField('label')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.order,
                      'is-focused': activeField == 'order'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.option.fields.order')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.order"
                      @input="updateOrder"
                      @focus="focusField('order')"
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
    ...mapGetters('OptionsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('OptionsSingle', [
      'storeData',
      'resetState',
      'setGroup',
      'setKey',
      'setValue',
      'setLabel',
      'setOrder',
      'fetchCreateData'
    ]),
    updateGroup(value) {
      this.setGroup(value)
    },
    updateKey(e) {
      this.setKey(e.target.value)
    },
    updateValue(e) {
      this.setValue(e.target.value)
    },
    updateLabel(e) {
      this.setLabel(e.target.value)
    },
    updateOrder(e) {
      this.setOrder(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'options.index' })
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
