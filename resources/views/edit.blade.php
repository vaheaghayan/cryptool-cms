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
                <button id="main-btn" class="nav-link text-black active" data-toggle="tab">{{__('Main')}}</button>
            </li>
            <li class="nav-item">
                <button id="english-btn" class="nav-link text-black" data-toggle="tab">{{__('English')}}</button>
            </li>
            <li class="nav-item">
                <button id="armenian-btn" class="nav-link text-black" data-toggle="tab">{{__('Armenian')}}</button>
            </li>
        </ul>

        <form class=".col-md-12 mt-8" action="{{route('store', [cLng()])}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="col-lg-6 m-auto">
                <div id="main-page" >
                    <div>
                        <h1 class="items-center"> Algorithm Create</h1>
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="data[name]" value="{{$cypher->name ?? ''}}"/>
                        <x-input-error :messages="$errors->get('data.name')" class="mt-2" />
                    </div>

                    <div class="form-group col-lg-4 mt-4">

                        <x-input-label  for="category">Select Cipher Category</x-input-label>
                        <select class="form-control" name="data[category]" id="category">
                            <option >Select Category</option>
                            @foreach(\App\Models\Cypher\Cypher::CATEGORIES as $category)
                            <option value="{{$category}}" @if($cypher && $category == $cypher->category) selected @endif >{{ucwords(str_replace( '_', ' ',$category  ))}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('data.category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea rows="3" id="description" name="data[description]" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full " >{{$cypher->description ?? ''}}</textarea>
                        <x-input-error :messages="$errors->get('data.description')" class="mt-2" />
                    </div>

                    <div class="mt-4 col-lg-4">

                        @if($cypher && $cypher->icon)
                            <img  style="width: 130px; height: 130px" src="{{url('/images/'. $cypher->icon)}}">
                        @endif

                        <x-input-label for="icon" :value="__('Icon')" />
                        <input type="file" id="icon" class="form-control" value="{{$cypher->icon ?? ''}}" name="data[icon]" />
                        <x-input-error :messages="$errors->get('data.icon')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <input type="radio" class="btn-check" name="data[show_status]" id="show_status_active" autocomplete="off" value="{{\App\Models\Cypher\Cypher::STATUS_ACTIVE}}"
                        @if($cypher && $cypher->show_status)
                            checked
                        @elseif(!$cypher)
                            checked
                        @endif>
                        <label class="btn btn-outline-secondary " for="show_status_active">Active</label>

                        <input type="radio" class="btn-check" name="data[show_status]" id="show_status_inactive" autocomplete="off" value="{{\App\Models\Cypher\Cypher::STATUS_INACTIVE}}"
                        @if($cypher && !$cypher->show_status)
                            checked
                        @endif >
                        <label class="btn btn-outline-secondary" for="show_status_inactive">Inactive</label>
                    </div>
                </div>


                <div id="english-page">
                    <div>
                        <h1 class="items-center"> Page in english</h1>
                    </div>

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="ml[en][title]" value="{{$cypher->ml[0]->title ?? ''}}"/>
                        <x-input-error :messages="$errors->get('ml.en.title')" class="mt-2" />
                    </div>

                    <div class=" mt-4 mb-4">
                        <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                        <div class="row justify-content-md-center">
                            <div>
                                <label> {{ __('Algorithm Information') }} </label>
                                <div class="form-group">
                                    <textarea id="editor" name="ml[en][info]">{{$cypher->ml[0]->info ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="armenian-page">
                    <div>
                        <h1 class="items-center"> Page in armenian</h1>
                    </div>

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="ml[am][title]" value="{{$cypher->ml[1]->title ?? ''}}"/>
                        <x-input-error :messages="$errors->get('ml.am.title')" class="mt-2" />
                    </div>

                    <div class="mt-4 mb-4">
                        <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                        <div class="row justify-content-md-center">
                            <div>
                                <label> {{ __('Algorithm Information') }} </label>
                                <div class="form-group">
                                    <textarea id="editor" name="ml[am][info]">{{$cypher->ml[1]->info ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
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
            @if($cypher)
                <input type="hidden" name="id" value="{{$cypher->id}}">
            @endif
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

