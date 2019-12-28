<template>
    <div id="add_requests_form_widget_modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal inmodal fade" ref="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
                    <h1 class="modal-title">Выберите форму</h1>
                </div>
                <div class="modal-body">
                    <div class="ibox-content" v-bind:class="{ 'sk-loading': options.loading }">
                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"></div>
                            <div class="sk-double-bounce2"></div>
                        </div>

                        <base-autocomplete
                            ref="form_suggestion"
                            label="Форма"
                            name="form_suggestion"
                            v-bind:value="model.additional_info.title"
                            v-bind:attributes="{
                                'data-search': suggestionsUrl,
                                'placeholder': 'Выберите форму',
                                'autocomplete': 'off'
                            }"
                            v-on:select="suggestionSelect"
                        />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Закрыть</button>
                    <a href="#" class="btn btn-primary" v-on:click.prevent="save">Сохранить</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'FormWidget',
    data() {
      return {
        model: this.getDefaultModel(),
        options: {
          loading: true,
        },
        events: {
          widgetLoaded: function(component) {
            let url = route('back.requests.forms.show', component.model.params.id).toString();

            component.options.loading = true;

            axios.get(url).then(response => {
              $(component.$refs.form_suggestion.$refs.autocomplete).val(response.data.title).trigger('change');
              component.options.loading = false;
            });
          },
        },
      };
    },
    computed: {
      suggestionsUrl() {
        return route('back.requests.forms.utility.suggestions').toString();
      },
      modalFormState() {
        return window.Admin.vue.stores['requests-forms'].state.mode;
      },
    },
    watch: {
      modalFormState: function(newMode) {
        if (newMode === 'form_created') {
          let form = window.Admin.vue.stores['requests-forms'].state.form;

          this.model.params.id = form.model.id;

          this.save();
        }
      },
    },
    methods: {
      getDefaultModel() {
        return _.merge(this.getDefaultWidgetModel(), {
          view: 'admin.module.requests.forms::front.partials.content.form_widget'
        });
      },
      initComponent() {
        let component = this;

        component.model = _.merge(component.model, this.widget.model);
        component.options.loading = false;
      },
      suggestionSelect(payload) {
        let component = this;

        let data = payload.data;

        component.model.params.id = data.id;
        component.model.additional_info = data;
      },
      save() {
        let component = this;

        if (! _.get(component.model.params, 'id')) {
          $(component.$refs.modal).modal('hide');

          return;
        }

        component.saveWidget(function() {
          $(component.$refs.modal).modal('hide');
        });
      }
    },
    created: function() {
      this.initComponent();
    },
    mounted() {
      let component = this;

      this.$nextTick(function() {
        $(component.$refs.modal).on('hide.bs.modal', function() {
          component.model = component.getDefaultModel();
        });
      });
    },
    mixins: [
      window.Admin.vue.mixins['widget'],
    ],
  };
</script>
