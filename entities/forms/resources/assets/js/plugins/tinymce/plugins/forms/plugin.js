window.tinymce.PluginManager.add('requests.forms', function(editor) {
  let widgetData = {
    widget: {
      events: {
        widgetSaved: function(model) {
          editor.execCommand(
              'mceReplaceContent',
              false,
              '<img class="content-widget" data-type="requests.form" data-id="' + model.id + '" alt="Виджет-форма: '+model.additional_info.title+'" />',
          );
        },
      },
    },
  };

  function loadWidget() {
    let component = window.Admin.vue.helpers.getVueComponent('requests-forms', 'FormWidget');

    component.$data.model.id = widgetData.model.id;
  }

  editor.addButton('add_request_form_widget', {
    title: 'Заявки',
    icon: 'editimage',
    onclick: function() {
      editor.focus();

      let content = editor.selection.getContent();
      let isForm = /<img class="content-widget".+data-type="requests.form".+>/g.test(content);

      if (content === '' || isForm) {
        widgetData.model = {
          id: parseInt($(content).attr('data-id')) || 0,
        };

        window.Admin.vue.helpers.initComponent('requests-forms', 'FormWidget', widgetData);

        window.waitForElement('#add_requests_form_widget_modal', function() {
          loadWidget();

          $('#add_requests_form_widget_modal').modal();
        });
      } else {
        swal({
          title: 'Ошибка',
          text: 'Необходимо выбрать виджет-форму',
          type: 'error',
        });

        return false;
      }
    }
  });
});
