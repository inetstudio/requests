window.Admin.vue.stores['requests-forms'] = new Vuex.Store({
  state: {
    emptyForm: {
      model: {
        title: '',
        alias: '',
        messages_limit: 0,
        created_at: null,
        updated_at: null,
        deleted_at: null,
      },
      isModified: false,
      hash: '',
    },
    form: {},
    mode: '',
  },
  mutations: {
    setForm(state, form) {
      let emptyForm = JSON.parse(JSON.stringify(state.emptyForm));
      emptyForm.model.id = UUID.generate();

      let resultForm = _.merge(emptyForm, form);
      resultForm.hash = window.hash(resultForm.model);

      state.form = resultForm;
    },
    setMode(state, mode) {
      state.mode = mode;
    },
  },
});
