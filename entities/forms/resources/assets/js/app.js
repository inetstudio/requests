import {requestsForms} from './package/forms';

require('./plugins/tinymce/plugins/forms');

require('../../../../../../widgets/entities/widgets/resources/assets/js/mixins/widget');

require('./stores/requests-forms');

window.Vue.component(
    'FormWidget',
    () => import('./components/partials/FormWidget/FormWidget.vue'),
);

requestsForms.init();
