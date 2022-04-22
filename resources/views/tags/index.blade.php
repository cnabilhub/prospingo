<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>


    <div class="p-2 px-5">
        <form class="flex justify-center align-middle items-end"
              action="{{route('tags.store')}}" method="POST">
            @csrf
            <div class="ml-2 form-group">
                <label class="text-left"> Name </label>
                <input class=" c-input" type="text" name="name">
            </div>
            <div class="ml-2 form-group">
                <label class="text-left"> Color </label>
                <input class=" c-input" type="text" name="color">
            </div>

            <div class="ml-2 form-group">
                <button type="submit" class="btn-success"> Ajouter</button>
            </div>
        </form>
    </div>
    <div class="p-3">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-4">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div id='recipients' class="p-8 mt-4 mb-2  lg:mt-0 rounded shadow bg-white">

                            <table class="min-w-full text-center mt-3 " id="dataTable">
                                <thead class="border-b bg-gray-800">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Color
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Delete
                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                @forelse($tags as $key=>$tag)
                                    <tr class="bg-white border-b">

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$key+1}}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$tag->name}}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$tag->color}}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a class="btn-gray" href="{{route('tags.edit',$tag->id)}}">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                            <form method="POST" action="{{route('tags.destroy',$tag->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Are you sure')"
                                                    class="ml-2 block btn-primary"> DELETE
                                                </button>

                                            </form>
                                        </td>

                                    </tr>

                                @empty
                                    No data
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

        });
    </script>


</x-app-layout>
