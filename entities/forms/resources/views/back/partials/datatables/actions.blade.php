<div class="btn-nowrap">
    <a href="{{ route('back.requests.forms.edit', [$id]) }}" class="btn btn-xs btn-default m-r-xs">
        <i class="fa fa-pencil-alt"></i>
    </a>
    <a href="#" class="btn btn-xs btn-danger delete" data-url="{{ route('back.requests.forms.destroy', [$id]) }}">
        <i class="fa fa-times"></i>
    </a>
</div>
