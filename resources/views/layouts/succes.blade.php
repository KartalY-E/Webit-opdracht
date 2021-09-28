

@if(session()->has('success'))
    <div class="alert alert-success p-3">
        {{ session()->get('success') }}
    </div>
@endif