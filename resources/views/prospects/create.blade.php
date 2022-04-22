<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create prospects') }}
        </h2>
    </x-slot>
    @isset($error)
        <div class="bg-red-200 text-red-600 p-3 text-center">
            {{$error}}
        </div>
    @endisset
    <form class="p-4 " method="post" action="{{route('prospects.store')}}">
        @csrf
        <div class="grid md:grid-cols-2">

            <div class="input-group p-3">
                <span class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>  URL :</span>

                <input type="text" class="c-input" name="site_url" value="{{old('site_url')}}">
            </div>

            <div class="input-group p-3">
                <span class="flex">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
</svg>
                    Name :</span>
                <input type="text" class="c-input" name="name" value="{{old('name')}}" required>
            </div>

            <div class=" input-group p-3">
                <span class="flex">
<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
     stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
</svg>
                    Email :</span>
                <input type="email" class="c-input " name="email" value="{{old('email')}}">
            </div>

            <div class="input-group p-3">
                <span class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
</svg>
                    Telephone :</span>
                <input type="text" class="c-input " name="telephone" value="{{old('telephone')}}">
            </div>


            <div class="input-group p-3">
                <span class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
</svg>
                    Tags :</span>
                <select type="text" class="c-input tags" name="tags[]" multiple="multiple">


                </select>
            </div>


            <div class="input-group p-3">
                <span class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Note:</span>
                <textarea type="text"
                          class="w-full bg-yellow-100 text-yellow-600 outline-yellow-700 focus:outline-none focus:border-none"
                          name="note">{{old('note')}}</textarea>
            </div>
        </div>
        <button class="btn-primary"> Add prospect</button>
    </form>
    <script>
        var data = [
                @foreach($tags as $tag)
            {
                id: "{{$tag->id}}",
                text: "{{$tag->name}}"
            },

            @endforeach
        ]
        $(document).ready(function () {
            $('.tags').select2({
                data: data
            });
        });
    </script>
</x-app-layout>
