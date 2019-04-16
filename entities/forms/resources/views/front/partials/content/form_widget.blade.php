@inject('formsService', 'InetStudio\Requests\Forms\Contracts\Services\Front\ItemsServiceContract')

@php
    $form = $formsService->getItemById($id);
@endphp

@includeWhen(
    $form && ($form->messages_limit > 0 && $form->messages_limit > $form->messages->count() || $form->messages_limit == 0),
    'admin.module.requests.forms::front.partials.content.forms.'.$form->alias,
    compact('form', 'widget')
)
