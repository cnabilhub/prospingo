@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="w-full text-center-font-bold bg-red-200  text-red-700 p-3 text-center rounded shadow shadow-red-300"
            role="alert">
            <div>{{ $error }} </div>
        </div>
    @endforeach
@endif

@if (session()->has('message'))
    <div
        class="w-full text-center-font-bold bg-green-200  text-green-700 p-3 text-center rounded shadow shadow-green-300">
        {{ session()->get('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="w-full text-center-font-bold bg-red-200  text-red-700 p-3 text-center rounded shadow shadow-red-300">
        {{ session()->get('error') }}
    </div>
@endif
@if (session()->has('warning'))
    <div class="w-full text-center-font-bold bg-orange-200  text-orange-700 p-3 text-center rounded shadow shadow-orange-300">
        {{ session()->get('warning') }}
    </div>
@endif
