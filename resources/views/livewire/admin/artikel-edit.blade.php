<div>
    @section('title')
        Edit Artikel {{ $item->title }}
    @endsection
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('update-artikel', $item->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-flow-row grid-cols-3 gap-4">
            <div class="col-span-1">
                <div>Klik untuk ubah gambar</div>
                <div><input type="file" class="mt-2" name="thumbnail"></div>
            </div>
            <div class="col-span-1">
                <div>Pilih Kategori</div>
                <select class="mt-2 rounded-lg" class="py-1" name="kategori_id">
                    <option value="">Please select</option>
                    @foreach ($kategori as $i)
                        @if ($item->kategori_id == $i->id)
                            <option value="{{ $i->id }}" selected>{{ $i->nama }}</option>
                        @else
                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                        @endif

                    @endforeach
                </select>
            </div>
            <div class="col-span-1">
                <div>Title/Judul Artikel</div>
                <input type="text" class="py-1 mt-2 rounded-lg" name="title" value="{{ $item->title }}">
            </div>

        </div>
        <div class="___class_+?8___">
            <div>Deskripsi</div>
            <textarea id="editor1" rows="10" cols="80" class="w-full" name="body">
                {{ $item->body }}
            </textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-600 text-white py-1 px-2 rounded-lg mt-2">Submit</button>
        </div>
    </form>
</div>
@push('script')
    <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    </script>
@endpush
