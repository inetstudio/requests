@extends('admin::back.layouts.app')

@php
    $title = ($item->id) ? 'Просмотр формы' : 'Редактирование формы';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.requests.forms::back.partials.breadcrumbs.form')
    @endpush

    <div class="row m-sm">
        <a class="btn btn-white" href="{{ route('back.requests.forms.index') }}">
            <i class="fa fa-arrow-left"></i> Вернуться назад
        </a>
    </div>

    <div class="wrapper wrapper-content">

        {!! Form::info() !!}

        {!! Form::open(['url' => (! $item->id) ? route('back.requests.forms.store') : route('back.requests.forms.update', [$item->id]), 'id' => 'mainForm', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

            @if ($item->id)
                {{ method_field('PUT') }}
            @endif

            {!! Form::hidden('form_id', (! $item->id) ? '' : $item->id, ['id' => 'object-id']) !!}

            {!! Form::hidden('form_type', get_class($item), ['id' => 'object-type']) !!}

            {!! Form::buttons('', '', ['back' => 'back.requests.forms.index']) !!}

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-group float-e-margins" id="mainAccordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#mainAccordion" href="#collapseMain" aria-expanded="true">Основная информация</a>
                                </h5>
                            </div>
                            <div id="collapseMain" class="panel-collapse collapse in" aria-expanded="true">
                                <div class="panel-body">

                                    {!! Form::string('title', $item->title, [
                                        'label' => [
                                            'title' => 'Заголовок',
                                        ],
                                    ]) !!}

                                    {!! Form::string('alias', $item->alias, [
                                        'label' => [
                                            'title' => 'Алиас',
                                        ],
                                    ]) !!}

                                    {!! Form::string('messages_limit', $item->messages_limit, [
                                        'label' => [
                                            'title' => 'Лимит сообщений',
                                        ],
                                    ]) !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::buttons('', '', ['back' => 'back.requests.forms.index']) !!}

        {!! Form::close()!!}

    </div>
@endsection
