window.tinymce.PluginManager.add('requests.forms', function(editor) {
  editor.addButton('add_request_form_widget', {
    title: 'Заявки',
    icon: 'editimage',
    onclick: function() {
      editor.focus();

      let content = editor.selection.getContent();
      let requestsFormWidgetID = '';

      if (content !== '' &&
          !/<img class="content-widget".+data-type="requests.form".+\/>/g.test(
              content)) {
        swal({
          title: 'Ошибка',
          text: 'Необходимо выбрать виджет-форму',
          type: 'error',
        });

        return false;
      } else if (content !== '') {
        requestsFormWidgetID = $(content).attr('data-id');

        window.Admin.modules.widgets.getWidget(
            requestsFormWidgetID, function(widget) {
              $('#choose_requests_form_modal .choose-data')
                  .val(JSON.stringify(widget.additional_info));
              $('#choose_requests_form_modal input[name=requests_form]')
                  .val(widget.additional_info.title);
            });
      }

      $('#choose_requests_form_modal .save').off('click');
      $('#choose_requests_form_modal .save').on('click', function(event) {
        event.preventDefault();

        let data = JSON.parse(
            $('#choose_requests_form_modal .choose-data').val());

        window.Admin.modules.widgets.saveWidget(requestsFormWidgetID, {
          view: 'admin.module.requests.forms::front.partials.content.form_widget',
          params: {
            id: data.id,
          },
          additional_info: data,
        }, {
          editor: editor,
          type: 'requests.form',
          alt: 'Виджет-форма: ' + data.title,
        }, function(widget) {
          $('#choose_requests_form_modal').modal('hide');
        });
      });

      $('#choose_requests_form_modal').modal();
    },
  });
});
