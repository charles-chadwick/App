
@if(session()->has('message'))
    <div class="text-lime-700 bg-lime-100 border border-lime-500 text-center p-2 mb-2 rounded">
    {{ session('message') }}
    </div>
@endif
