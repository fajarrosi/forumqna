@extends('layouts.app')
@section('content')
 <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Reputasi Saya</h4>
                     <hr>
                     <p>Reputasi kamu => {{$data[0]->reputasi}} poin <br>
                     Reputasi akan bertambah 10 poin jika pertanyaan / jawaban kamu di upvote sama pengguna lain <br>
                     Reputasi akan berkurang 1 poin jika pertanyaan / jawaban kamu di downvote sama pengguna lain <br>
                     Setiap jawaban kamu yang ditandai sebagai jawaban tepat maka kamu mendapatkan tambahan reputasi 15 poin. <br> 
                     Pengguna yang boleh downvote adalah pengguna dengan reputasi minimal 15 poin
                    </p>
                  </div>
              </div>
          </div>
      </div>

@endsection

