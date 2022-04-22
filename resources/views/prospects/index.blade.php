<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prospects') }}
        </h2>
    </x-slot>
    <div class="p-3">
        <div class="flex flex-col">
            <div id='recipients' class="p-8 mt-4 mb-2  lg:mt-0 rounded shadow bg-white">

                <table class="table-auto min-w-full" id="dataTable">
                    <thead class="border-b bg-gray-800">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                            Created at
                        </th>

                        <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                            Info
                        </th>

                        <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                            Tags
                        </th>


                        <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                            Note
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($prospects as $key =>$prospect)
                        <tr class="bg-white border-b">
                            <td class="flex flex-wrap text-sm font-light px-2 py-1 whitespace-nowrap">
                                {{$prospect->created_at}}
                            </td>
                            <td>
                                <ul class="grid grid-rows-1 grid-gap-1">
                                    <li class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                        Name : {{$prospect->name}}
                                    </li>
                                    <li class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                        URL : {{$prospect->site_url}}
                                    </li>
                                    <li class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                        Email : {{$prospect->email}}
                                    </li>
                                    <li class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                        Telephone : {{$prospect->telephone}}
                                    </li>
                                </ul>
                            </td>


                            <td class="flex flex-wrap text-sm font-light px-2 py-1 whitespace-nowrap">
                                @forelse($prospect->tags as $tag)
                                    <span
                                        class="text-{{$tag->color}}-500 bg-{{$tag->color}}-200  p-1 px-2 rounded-full mr-2 mt-2 ">{{$tag->name}} </span>
                                @empty
                                    No tags
                                @endforelse
                            </td>


                            <td class=" text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                {{$prospect->note?? 'No note'}}
                            </td>
                            <td class=" text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap flex">
                                <a href="{{route('prospects.edit',$prospect->id)}}"
                                   class="btn-gray">Edit</a>
                                <form method="POST" action="{{route('prospects.destroy',$prospect->id)}}">
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

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

        });
    </script>

</x-app-layout>
