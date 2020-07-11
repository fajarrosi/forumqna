@extends('layouts.app')
@section('content')
@guest
 <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Pertanyaan</h4>
                     <hr>
                     <p>Kamu harus register dan login untuk dapat menanyakan <a href="/register">Register disini</a></p>
                  </div>
              </div>
          </div>
      </div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
               <h4>Pertanyaan</h4>
               <hr>
               <form method="post" action="{{route('pertanyaan.simpan')}}" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <label>Judul pertanyaan</label>
                   <input class="form-control" type="text" name="judul" placeholder="judul pertanyaan">
                 </div>
                 <div class="form-group">
                  <label>Isi pertanyaan</label>
                   <textarea name="isi" id="isi"class="form-control" rows="10" cols="50" placeholder="Keterangan lebih lanjut terkait pertanyaan"></textarea >
                 </div>
                 <div class="form-group">
                    <label>Tag</label>
                   <input type="text" name="tag" placeholder="tag dipisahkan dengan tanda koma seperti php, html, dll" class="form-control">
                 </div>
                 <div class="form-group">
                   <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                 </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endguest

@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
<script>
  $(function(){
    CKEDITOR.replace('isi', {
      uiColor: '#0AFDFD'
    });
  });
</script>

@endpush
