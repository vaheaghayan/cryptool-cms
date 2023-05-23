<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if($saveMode == 'add')
                    {{ __('Category Add Page') }}
                @else
                    {{ __('Category Edit Page') }}
                @endif
            </h2>

            <a href="{{ url(cLng() . '/cypher/categories') }}" type="button" class="btn btn-secondary">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="container mt-8 ">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <button id="english-btn" class="nav-link text-black active" data-toggle="tab">{{__('English')}}</button>
            </li>
            <li class="nav-item">
                <button id="armenian-btn" class="nav-link text-black" data-toggle="tab">{{__('Armenian')}}</button>
            </li>
            <li class="nav-item">
                <button id="main-btn" class="nav-link text-black" data-toggle="tab">{{__('Main')}}</button>
            </li>
        </ul>

        <form class=".col-md-12 mt-8" action="{{ url(cLng() . '/cypher/category/edit') }}" method="post">
            @csrf
            <div class="col-lg-12 m-auto">
                <div id="english-page">
                    <div>
                        <h1 class="items-center"> Page in english</h1>
                    </div>

                    <div class="col-lg-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="ml[en][name]" value="{{$category->ml[0]->name ?? ''}}"/>
                        <x-input-error :messages="$errors->get('data.name')" class="mt-2" />
                    </div>

                    <div class=" mt-4 mb-4">
                        <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                        <div class="row justify-content-md-center">
                            <div>
                                <label> {{ __('Category Information') }} </label>
                                <div class="form-group">
                                    <textarea id="editor" name="ml[en][body]">{{$category->ml[0]->body ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="armenian-page">
                    <div>
                        <h1 class="items-center"> Page in armenian</h1>
                    </div>

                    <div class="col-lg-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="ml[am][name]" value="{{$category->ml[1]->name ?? ''}}"/>
                        <x-input-error :messages="$errors->get('data.name')" class="mt-2" />
                    </div>

                    <div class="mt-4 mb-4">
                        <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                        <div class="row justify-content-md-center">
                            <div>
                                <label> {{ __('Category Information') }} </label>
                                <div class="form-group">
                                    <textarea id="editor" name="ml[am][body]">{{$category->ml[1]->body ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="main-page" >
                    <div>
                        <h1 class="items-center"> Algorithm Category Create</h1>
                    </div>

                    <div class="mt-4">
                        <input type="radio" class="btn-check" name="data[show_status]" id="show_status_active" autocomplete="off" value="{{\App\Models\CypherCategory::STATUS_ACTIVE}}"
                               @if($category->show_status == \App\Models\CypherCategory::STATUS_ACTIVE)
                                   checked
                            @endif>
                        <label class="btn btn-outline-secondary " for="show_status_active">Active</label>

                        <input type="radio" class="btn-check" name="data[show_status]" id="show_status_inactive" autocomplete="off" value="{{\App\Models\CypherCategory::STATUS_INACTIVE}}"
                               @if($category->show_status == \App\Models\CypherCategory::STATUS_INACTIVE)
                                   checked
                            @endif >
                        <label class="btn btn-outline-secondary" for="show_status_inactive">Inactive</label>
                    </div>
                </div>

                <div>
                    <div class="mt-5">
                        <button class="btn btn-secondary">
                            {{__('Submit')}}
                        </button>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="{{$category->id}}">
        </form>
    </div>
</x-app-layout>

<script src="https://cdn.tiny.cloud/1/mu7nf9dkj1jdz6te0mpxst990vl3xkrhyjoybpelfo686cqq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#editor',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: false,
    });
</script>

@vite('resources/js/category/index.js')

