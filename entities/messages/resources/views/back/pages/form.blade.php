@inject('formsService', 'InetStudio\Requests\Forms\Contracts\Services\Back\ItemsServiceContract')

@extends('admin::back.layouts.app')

@php
    $title = ($item->id) ? 'Редактирование сообщения' : 'Создание сообщения';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.requests.messages::back.partials.breadcrumbs.form')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title">
                <a class="btn btn-sm btn-white" href="{{ route('back.requests.messages.index') }}">
                    <i class="fa fa-arrow-left"></i> Вернуться назад
                </a>
            </div>
        </div>

        {!! Form::info() !!}

        {!! Form::open(['url' => (! $item->id) ? route('back.requests.messages.store') : route('back.requests.messages.update', [$item->id]), 'id' => 'mainForm', 'enctype' => 'multipart/form-data']) !!}

        @if ($item->id)
            {{ method_field('PUT') }}
        @endif

        {!! Form::hidden('message_id', (! $item->id) ? '' : $item->id, ['id' => 'object-id']) !!}

        {!! Form::hidden('message_type', get_class($item), ['id' => 'object-type']) !!}

        <div class="ibox">
            <div class="ibox-title">
                {!! Form::buttons('', '', ['back' => 'back.requests.messages.index']) !!}
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group float-e-margins" id="mainAccordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#mainAccordion" href="#collapseMain"
                                           aria-expanded="true">Основная информация</a>
                                    </h5>
                                </div>
                                <div id="collapseMain" class="collapse show" aria-expanded="true">
                                    <div class="panel-body">

                                        {!! Form::dropdown('form_id', $item->form_id, [
                                            'label' => [
                                                'title' => 'Форма',
                                            ],
                                            'field' => [
                                                'class' => 'select2-drop form-control',
                                                'data-placeholder' => 'Выберите форму',
                                                'style' => 'width: 100%',
                                                'readonly' => true,
                                            ],
                                            'options' => [
                                                'values' => [null => ''] + $formsService->getAllItems()->pluck('title', 'id')->toArray(),
                                            ],
                                        ]) !!}

                                        <div class="form-group row">
                                            <label for="message" class="col-sm-2 col-form-label font-bold">Данные с
                                                формы</label>

                                            <div class="col-sm-10">
                                                <pre class="json-data">@json($item->additional_info)</pre>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                {!! Form::buttons('', '', ['back' => 'back.requests.messages.index']) !!}
            </div>
        </div>

        {!! Form::close()!!}

    </div>
@endsection
