<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($type.' Event ') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-4 container">
        <form action="" class="card p-3">
            <div class="col-12 row">
                <!-- Title -->
                <div class="col-md-6 mb-2">
                    <label for="title" class="form-label ">Event Title</label>
                    <input type="text" value="{!! $res->title ?? '' !!}" placeholder="Event Title" name="title" id="title" class="form-control border rounded">
                </div>
                <!-- Category -->
                <div class="col-md-6 mb-2">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="#" selected disabled>Select Category</option>
                        <option value="#">1</option>
                        <option value="#">2</option>
                        <option value="#">3</option>
                    </select>
                </div>
                <!-- Status -->
                <div class="col-md-6 mb-2">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="#">Status 1</option>
                        <option value="#">Status 2</option>
                        <option value="#">Status 3</option>
                    </select>
                </div>
                <!-- Meta Description -->
                <div class="col-md-6 mb-2">
                    <label for="excerpt" id="excerpt" class="form-label">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" cols="30" rows="1" class="form-control">{!! $res->excerpt ?? '' !!}</textarea>
                </div>
                <!-- Image -->
                <div class="col-md-12 mb-2">
                    <label for="excerpt" id="excerpt" class="form-label">Event Image</label>
                    <input type="file" name="event_image" id="event_image" value="{!! $res->event_image ?? '' !!}" class="border rounded form-control"/>
                </div>
                <!-- Description -->
                <label for="event_coment" id="event_coment" class="form-label">Event Coment</label>
                <x-forms.tinymce-editor name="event_coment" id="event_coment" class="col-md-12">{!! $res->event_coment ?? '' !!}</x-forms.tinymce-editor>
            </div>
        </form>

    </div>
</x-app-layout>
