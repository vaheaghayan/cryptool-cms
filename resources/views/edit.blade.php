<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Algorithms') }}
            </h2>

            <a href="{{route('dashboard', ['locale' => cLng()])}}" type="button" class="btn btn-secondary">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="container mt-8 ">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <button id="main-btn" class="nav-link text-black active" href="#description" data-toggle="tab">{{__('Main')}}</button>
            </li>
            <li class="nav-item">
                <button id="english-btn" class="nav-link text-black" data-toggle="tab">{{__('English')}}</button>
            </li>
            <li class="nav-item">
                <button id="armenian-btn" class="nav-link text-black" data-toggle="tab">{{__('Armenian')}}</button>
            </li>
        </ul>

        <form class=".col-md-12 mt-8" action="{{route('edit', [cLng()])}}" enctype="multipart/form-data" method="post">
            @csrf
            <div id="main-page" class="">
                <div>
                    <h1 class="items-center"> Algorithm Create</h1>
                </div>

                <div class="col-lg-6 m-auto">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="data[name]" :value="old('name')"/>
                    <x-input-error :messages="$errors->get('data.name')" class="mt-2" />
                </div>

                <div class="col-lg-6 m-auto mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea rows="3" id="description" name="data[description]" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full " ></textarea>
                    <x-input-error :messages="$errors->get('data.description')" class="mt-2" />
                </div>

                <div class="col-lg-2 m-auto mt-4">
                    <x-input-label for="icon" :value="__('Icon')" />
                    <input type="file" id="icon" class="form-control" name="data[img][icon]" />
                    <x-input-error :messages="$errors->get('data.icon')" class="mt-2" />
                </div>

                <div class="col-lg-2 m-auto mt-4">
                    <x-input-label for="image-1" :value="__('Image 1')" />
                    <input type="file" id="image-1" class="form-control" name="data[img][image_1]" />
                    <x-input-error :messages="$errors->get('data.image_1')" class="mt-2" />
                </div>

                <div class="col-lg-2 m-auto mt-4">
                    <x-input-label for="image-2" :value="__('Image 2')" />
                    <input type="file" id="image-2" class="form-control" name="data[img][image_2]" />
                    <x-input-error :messages="$errors->get('data.image_2')" class="mt-2" />
                </div>

                <div class="col-lg-2 m-auto mt-4">
                    <x-input-label for="image-3" :value="__('Image 3')" />
                    <input type="file" id="image-3" class="form-control" name="data[img][image_3]" />
                    <x-input-error :messages="$errors->get('data.image_3')" class="mt-2" />
                </div>

{{--                <div class="form-group required">--}}
{{--                    <div class="form-group required">--}}
{{--                        <label class="col-md-2 control-label"> {{__('Languages')}} </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check form-check-inline">--}}
{{--                        <input class="form-check-input" type="checkbox" id="en-checkbox" >--}}
{{--                        <label class="form-check-label" for="en-checkbox">English</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check form-check-inline">--}}
{{--                        <input class="form-check-input" type="checkbox" id="hy-checkbox" >--}}
{{--                        <label class="form-check-label" for="hy-checkbox">Armenian</label>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="show-status-block">
                    <input type="radio" class="btn-check" name="data[show_status]" id="show_status_active" autocomplete="off" value="1" checked>
                    <label class="btn btn-secondary" for="show_status_active">Active</label>

                    <input type="radio" class="btn-check" name="data[show_status]" id="show_status_inactive" autocomplete="off" value="0">
                    <label class="btn btn-secondary" for="show_status_inactive">Inactive</label>
                </div>
            </div>


            <div id="english-page">
                <div>
                    <h1 class="items-center"> Page in english</h1>
                </div>

                <div class="col-lg-6 m-auto">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="ml[en][title]" :value="old('title')"/>
                    <x-input-error :messages="$errors->get('ml.en.title')" class="mt-2" />
                </div>

                <div class="container mt-4 mb-4">
                    <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-lg-8">
                            <label> {{ __('Algorithm Information') }} </label>
                            <div class="form-group">
                                <textarea id="editor" name="ml[en][info]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="armenian-page">
                <div>
                    <h1 class="items-center"> Page in armenian</h1>
                </div>

                <div class="col-lg-6 m-auto">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="ml[am][title]" :value="old('title')"/>
                    <x-input-error :messages="$errors->get('ml.am.title')" class="mt-2" />
                </div>

                <div class="container mt-4 mb-4">
                    <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-lg-8">
                            <label> {{ __('Algorithm Information') }} </label>
                            <div class="form-group">
                                <textarea id="editor" name="ml[am][info]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-primary-button data-url="{{route('edit', ['locale' => cLng()])}}" id="submit-btn" class="ml-3">
                {{ __('Submit') }}
            </x-primary-button>

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

<script src="{{asset('resources/js/algorithm/index.js')}}"></script>

