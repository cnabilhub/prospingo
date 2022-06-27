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
                                URL
                            </th>

                            <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                                Name
                            </th>

                            <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                                Email
                            </th>

                            <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                                Telephone
                            </th>

                            <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                                Tags
                            </th>

                            <th scope="col" class="text-sm font-medium text-white px-2 py-1">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prospects as $key =>$prospect)
                            <tr class="bg-white border-b">

                                <td class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                    <a href="https://{{ $prospect->site_url }}" class="text-pink-600"
                                        target="_blank">{{ $prospect->site_url }}</a>
                                </td>

                                <td class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                    {{ $prospect->name }}
                                </td>


                                <td class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                    <a href="mailto:{{ $prospect->email }}" class="text-pink-600">
                                        {{ $prospect->email }}
                                    </a>
                                </td>
                                @php
                                    $tel = $prospect->telephone;
                                    $tel = trim($tel);
                                    $tel = str_replace(' ', '', $tel);
                                    $tel = str_replace('+', '', $tel);
                                @endphp

                                <td class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                    <a href="https://api.whatsapp.com/send?phone={{ $tel }}"
                                        class="text-pink-600">
                                        {{ $tel }}
                                    </a>
                                </td>

                                <td class="text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap">
                                    @foreach ($prospect->tags as $tag)
                                        <span>{{ $tag->name }}</span>
                                    @endforeach
                                </td>

                                <td class=" text-sm text-gray-900 font-light px-2 py-1 whitespace-nowrap flex">
                                    <a href="{{ route('prospects.edit', $prospect->id) }}" class="btn-gray">Edit</a>
                                    <form method="POST" action="{{ route('prospects.destroy', $prospect->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure')" class="ml-2 block btn-primary">
                                            DELETE
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
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        })
    </script>

</x-app-layout>
