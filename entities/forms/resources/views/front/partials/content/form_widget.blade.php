@inject('formsService', 'InetStudio\Requests\Forms\Contracts\Services\Front\FormsServiceContract')

@php
    $form = $formsService->getFormByID($id);
@endphp

@includeWhen($form && $form->messages_limit > 0 && $form->messages_limit > $form->messages->count(), 'admin.module.requests.forms::front.partials.content.forms.'.$form->alias)
