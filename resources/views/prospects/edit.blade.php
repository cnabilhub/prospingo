<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit prospects') }}
        </h2>
    </x-slot>
    @isset($error)
        <div class="bg-red-200 text-red-600 p-3 text-center">
            {{$error}}
        </div>
    @endisset

    <form class="p-4 " method="post" action="{{route('prospects.update',$prospect->id)}}">
        @csrf
        @method('PUT')
        <div class="grid md:grid-cols-2">

            <div class="input-group p-3">
                <label class="block"> URL :</label>
                <input type="text" class="c-input" name="site_url" value="{{$prospect->site_url}}">
            </div>

            <div class="input-group p-3">
                <label class="block"> Name :</label>
                <input type="text" class="c-input" name="name" value="{{$prospect->name}}" required>
            </div>

            <div class=" input-group p-3">
                <label class="block"> Email :</label>
                <input type="email" class="c-input " name="email" value="{{$prospect->email}}">
            </div>

            <div class="input-group p-3">
                <label class="block"> Telephone :</label>
                <input type="text" class="c-input " name="telephone" value="{{$prospect->telephone}}">
            </div>


            <div class="input-group p-3">
                <label class="block"> Business type :</label>
                <select type="text" class="c-input tags" name="tags[]" multiple="multiple">
                </select>
            </div>


            <div class="input-group p-3">
                <label class="block">Note : </label>
                <textarea name="note" type="text"
                          class="w-full bg-yellow-100 text-yellow-600 outline-yellow-700 focus:outline-none focus:border-none"
                >{{$prospect->note}}</textarea>
            </div>
        </div>
        <button class="btn-primary"> Update prospect</button>
    </form>
    <script>
        var data = [
                @foreach($tags as $tag)
            {
                id: "{{$tag->id}}",
                text: "{{$tag->name}}",
                @foreach($prospect->tags as $old_tag)
                    @if($old_tag->id == $tag->id)
                selected: true,
                @endif
                @endforeach
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
