require('./plugins/tinymce/plugins/forms');

require('../../../../../../widgets/entities/widgets/resources/assets/js/mixins/widget');

require('./stores/requests-forms');

Vue.component(
    'FormWidget',
    require('./components/partials/FormWidget/FormWidget.vue').default,
);

let requestsForms = require('./package/forms');
requestsForms.init();
