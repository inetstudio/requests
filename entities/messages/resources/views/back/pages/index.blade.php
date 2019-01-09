@extends('admin::back.layouts.app')

@php
    $title = 'Сообщения';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.requests.messages::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#export_messages_modal">Экспорт</button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{ $table->table(['class' => 'table table-striped table-bordered table-hover dataTable']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.module.requests.messages::back.partials.modals.export')

@pushonce('scripts:datatables_requests_messages_index')
    {!! $table->scripts() !!}
@endpushonce
