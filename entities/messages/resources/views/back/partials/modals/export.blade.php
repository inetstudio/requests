@pushonce('modals:export_messages')
<div id="export_messages_modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal inmodal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Закрыть</span></button>
                <h1 class="modal-title">Экспорт заявок</h1>
            </div>

            <div class="modal-body">
                <div class="ibox-content">

                    {!! Form::hidden('export_requests_form_data', '', [
                        'class' => 'choose-data',
                        'id' => 'export_requests_form_data',
                    ]) !!}

                    {!! Form::string('export_requests_form', '', [
                        'label' => [
                            'title' => 'Формы',
                        ],
                        'field' => [
                            'class' => 'form-control autocomplete',
                            'data-search' => route('back.requests.forms.utility.suggestions'),
                            'data-target' => '#export_requests_form_data'
                        ],
                    ]) !!}

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Закрыть</button>
                <a href="#" class="btn btn-primary export">Экспортировать</a>
            </div>

        </div>
    </div>
</div>
@endpushonce
