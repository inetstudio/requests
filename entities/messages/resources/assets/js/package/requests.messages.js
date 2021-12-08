export let requestsMessages = {
  init: () => {
    $('#export_messages_modal').on('click', '.export', function(event) {
      let formData = $('#export_messages_modal .choose-data').val();

      if (formData === '') {
        event.preventDefault();

        $('#export_messages_modal').modal('hide');

        return;
      }

      let data = JSON.parse(formData),
          url = route('back.requests.messages.export', {
            form: data.alias,
          });

      $(this).attr('href', url);
      $('#export_messages_modal').modal('hide');
    });

    $('#export_messages_modal').on('hidden.bs.modal', function(e) {
      let modal = $(this);

      modal.find('.choose-data').val('');
      modal.find('input[name=export_requests_form]').val('');
    });
  }
};
