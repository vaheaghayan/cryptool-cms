<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>

            <div>
                <a href="{{url(cLng(). '/cypher/category/edit')}}" type="button" class="btn btn-secondary">
                    {{ __('Create Category') }}
                </a>

                <a href="{{route('dashboard', ['locale' => cLng()])}}" type="button" class="btn btn-secondary">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="col-lg-12 d-flex justify-content-center mt-5">
        <div class="col-lg-9">
            <div class="col-lg-12">
                @if($categories->isNotEmpty())
                    <table class="col-lg-12">
                        <thead>
                        <tr class="col-lg-12 d-flex justify-content-between">
                            <th class="columns-lg p-6 text-gray-900">
                                Category Name
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
                        @foreach($categories as $category)
                            <tr class="col-lg-12 d-flex justify-content-between">
                                <td class="columns-lg p-6 text-gray-900">
                                    {{$category->ml[0]->name   }}
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    {{$category->created_at}}
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    {{$category->updated_at}}
                                </td>
                                <td class="columns-lg p-6 text-gray-900">
                                    @if($category->show_status)
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
                                        <a href="{{ url(cLng() . '/cypher/category/edit/' . $category->id) }}" style="text-decoration: none; color: white">
                                            <button type="button" class="btn btn-primary">
                                            Edit
                                            </button>
                                        </a>

                                            <form action="{{ url(cLng() . '/cypher/category/delete/' . $category->id) }}" method="post">
                                                @csrf
                                                <button type="button" class="btn btn-danger">
                                                    <input type="submit" value="Delete">
                                                </button>
                                            </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
