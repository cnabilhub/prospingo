<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="p-2 px-5">
        <form class="flex justify-center align-middle items-end"
              action="{{route('tags.update',$tag->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="ml-2 form-group">
                <label class="text-left" for="name"> Name </label>
                <input id="name" class="c-input" type="text" name="name" value="{{$tag->name}}">
            </div>
            <div class="ml-2 form-group">
                <label class="text-left" for="color"> Color </label>
                <input id="color" class="c-input" type="text" name="color" value="{{$tag->color}}">
            </div>

            <div class=" ml-2 form-group">
                <button type="submit" class="btn-gray"> Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
