@extends('admin::back.layouts.app')

@php
    $title = 'Формы';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.requests.forms::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins requests-forms-package">
                    <div class="ibox-title">
                        <a href="{{ route('back.requests.forms.create') }}" class="btn btn-xs btn-primary">Добавить</a>
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

@pushonce('scripts:datatables_requests_forms_index')
{!! $table->scripts() !!}
@endpushonce
