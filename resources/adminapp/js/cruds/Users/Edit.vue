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
                <strong>{{ $t('cruds.user.title_singular') }}</strong>
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
                      'has-items': entry.name,
                      'is-focused': activeField == 'name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.user.fields.name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name"
                      @input="updateName"
                      @focus="focusField('name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.user.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.password,
                      'is-focused': activeField == 'password'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.user.fields.password')
                    }}</label>
                    <input
                      class="form-control"
                      type="password"
                      :value="entry.password"
                      @input="updatePassword"
                      @focus="focusField('password')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.roles.length !== 0,
                      'is-focused': activeField == 'roles'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.user.fields.roles')
                    }}</label>
                    <v-select
                      name="roles"
                      label="title"
                      :key="'roles-field'"
                      :value="entry.roles"
                      :options="lists.roles"
                      :closeOnSelect="false"
                      multiple
                      @input="updateRoles"
                      @search.focus="focusField('roles')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.branch_id !== null,
                      'is-focused': activeField == 'branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.user.fields.branch')
                    }}</label>
                    <v-select
                      name="branch"
                      label="branch"
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
                      'has-items': entry.access_branch.length !== 0,
                      'is-focused': activeField == 'access_branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.user.fields.access_branch')
                    }}</label>
                    <v-select
                      name="access_branch"
                      label="branch"
                      :key="'access_branch-field'"
                      :value="entry.access_branch"
                      :options="lists.access_branch"
                      :closeOnSelect="false"
                      multiple
                      @input="updateAccessBranch"
                      @search.focus="focusField('access_branch')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.defualt_branch_id !== null,
                      'is-focused': activeField == 'defualt_branch'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.user.fields.defualt_branch')
                    }}</label>
                    <v-select
                      name="defualt_branch"
                      label="branch"
                      :key="'defualt_branch-field'"
                      :value="entry.defualt_branch_id"
                      :options="lists.defualt_branch"
                      :reduce="entry => entry.id"
                      @input="updateDefualtBranch"
                      @search.focus="focusField('defualt_branch')"
                      @search.blur="clearFocus"
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
    ...mapGetters('UsersSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('UsersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setName',
      'setEmail',
      'setPassword',
      'setRoles',
      'setBranch',
      'setAccessBranch',
      'setDefualtBranch'
    ]),
    updateName(e) {
      this.setName(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updatePassword(e) {
      this.setPassword(e.target.value)
    },
    updateRoles(value) {
      this.setRoles(value)
    },
    updateBranch(value) {
      this.setBranch(value)
    },
    updateAccessBranch(value) {
      this.setAccessBranch(value)
    },
    updateDefualtBranch(value) {
      this.setDefualtBranch(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'users.index' })
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
