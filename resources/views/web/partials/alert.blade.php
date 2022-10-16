@if (Session::has('message'))
<div class="alert alert-{{ Session::get('typealert') }} alert-dismissible fade show my-2" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @if ($errors->any())
        <ul class="mt-1 mb-0 pl-3">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endif