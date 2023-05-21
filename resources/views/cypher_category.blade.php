<x-app-layout>


    <form class="col-md-12 mt-8" action="{{route('storeCategory', ['locale' => cLng(), 'category' => $cypherCategory->name])}}" method="post">
        @csrf
        <div >
            <div>
                <h1 class="items-center"> Page in english</h1>
            </div>

            <div class=" mt-4 mb-4">
                <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                <div class="row justify-content-md-center">
                    <div>
                        <label> {{ __('Algorithm Information') }} </label>
                        <div class="form-group">
                            <textarea id="editor" name="ml[en][info]">{{$cypherCategory->ml[0]->info ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div >
            <div>
                <h1 class="items-center"> Page in armenian</h1>
            </div>

            <div class="mt-4 mb-4">
                <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                <div class="row justify-content-md-center">
                    <div>
                        <label> {{ __('Algorithm Information') }} </label>
                        <div class="form-group">
                            <textarea id="editor" name="ml[am][info]">{{$cypherCategory->ml[1]->info ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="id" value="{{$cypherCategory->id}}">

        <button type="submit"> submit </button>
    </form>

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
