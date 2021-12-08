import hash from 'object-hash';
import { v4 as uuidv4 } from 'uuid';

window.Admin.vue.stores['requests-forms'] = new window.Vuex.Store({
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
      emptyForm.model.id = uuidv4();

      let resultForm = _.merge(emptyForm, form);
      resultForm.hash = hash(resultForm.model);

      state.form = resultForm;
    },
    setMode(state, mode) {
      state.mode = mode;
    },
  },
});
