<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Algorithms') }}
            </h2>

            <a href="{{route('create.page', ['locale' => cLng()])}}" type="button" class="right-0 btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 d-flex justify-content-center">
        <div class="col-lg-9">
            <div class="col-lg-12">
                @if($cyphers->isNotEmpty())
                    <table class="col-lg-12">
                        <thead>
                        <tr class="col-lg-12 d-flex justify-content-between">
                            <th class="columns-lg p-6 text-gray-900">
                                Icon
                            </th>
                            <th class="columns-lg p-6 text-gray-900">
                                Cypher Name
                            </th>
                            <th class="columns-lg p-6 text-gray-900">
                                Created At
                            </th>
                            <th class="columns-lg p-6 text-gray-900">
                                Updated At
                            </th>
                            <th class="columns-lg p-6 text-gray-900">
                                Show Status
                            </th>
                            <th class="columns-lg p-6 text-gray-900">
                                Actions
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($cyphers as $cypher)
                            <tr class="col-lg-12 d-flex justify-content-between">
                                <td class="columns-lg p-6 text-gray-900">
                                    <img class="logo-img" src="{{asset('storage/images/cyphers/icon/' . $cypher->icon)}}">
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    {{$cypher->name}}
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    {{$cypher->created_at}}
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    {{$cypher->updated_at}}
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    @if($cypher->show_status)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    @endif
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{route('edit.page', ['id' => $cypher->id, 'locale' => cLng()])}}" style="text-decoration: none; color: white">Edit</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <div class="w3-row-padding w3-padding-64 w3-container" align="center"></div>
</x-app-layout>
