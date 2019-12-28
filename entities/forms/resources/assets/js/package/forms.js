let forms = {};

forms.init = function() {
  if (!window.Admin.vue.modulesComponents.modules.hasOwnProperty('requests-forms')) {
    window.Admin.vue.modulesComponents.modules = Object.assign(
        {}, window.Admin.vue.modulesComponents.modules, {
          "requests-forms": {
            components: [],
          },
        });
  }
};

module.exports = forms;
