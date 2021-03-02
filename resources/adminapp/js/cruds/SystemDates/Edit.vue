<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.systemDate.title_singular') }}</strong>
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
                      $t('cruds.systemDate.fields.branch')
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
                      'has-items': entry.current_system_date,
                      'is-focused': activeField == 'current_system_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.current_system_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.current_system_date"
                      @input="updateCurrentSystemDate"
                      @focus="focusField('current_system_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.next_system_date,
                      'is-focused': activeField == 'next_system_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.next_system_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.next_system_date"
                      @input="updateNextSystemDate"
                      @focus="focusField('next_system_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.next_week_end,
                      'is-focused': activeField == 'next_week_end'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.next_week_end')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.next_week_end"
                      @input="updateNextWeekEnd"
                      @focus="focusField('next_week_end')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.next_month_end,
                      'is-focused': activeField == 'next_month_end'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.next_month_end')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.next_month_end"
                      @input="updateNextMonthEnd"
                      @focus="focusField('next_month_end')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.next_year_end,
                      'is-focused': activeField == 'next_year_end'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.next_year_end')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.next_year_end"
                      @input="updateNextYearEnd"
                      @focus="focusField('next_year_end')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.previous_year_end,
                      'is-focused': activeField == 'previous_year_end'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.previous_year_end')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.previous_year_end"
                      @input="updatePreviousYearEnd"
                      @focus="focusField('previous_year_end')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.previous_month_end,
                      'is-focused': activeField == 'previous_month_end'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.systemDate.fields.previous_month_end')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.previous_month_end"
                      @input="updatePreviousMonthEnd"
                      @focus="focusField('previous_month_end')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
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
    ...mapGetters('SystemDatesSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('SystemDatesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBranch',
      'setCurrentSystemDate',
      'setNextSystemDate',
      'setNextWeekEnd',
      'setNextMonthEnd',
      'setNextYearEnd',
      'setPreviousYearEnd',
      'setPreviousMonthEnd'
    ]),
    updateBranch(value) {
      this.setBranch(value)
    },
    updateCurrentSystemDate(e) {
      this.setCurrentSystemDate(e.target.value)
    },
    updateNextSystemDate(e) {
      this.setNextSystemDate(e.target.value)
    },
    updateNextWeekEnd(e) {
      this.setNextWeekEnd(e.target.value)
    },
    updateNextMonthEnd(e) {
      this.setNextMonthEnd(e.target.value)
    },
    updateNextYearEnd(e) {
      this.setNextYearEnd(e.target.value)
    },
    updatePreviousYearEnd(e) {
      this.setPreviousYearEnd(e.target.value)
    },
    updatePreviousMonthEnd(e) {
      this.setPreviousMonthEnd(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'system_dates.index' })
          this.$eventHub.$emit('update-success')
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
