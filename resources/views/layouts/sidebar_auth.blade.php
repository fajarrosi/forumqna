@if (Auth::id())
<div class="card">
    <div class="card-body">
        <ul style=" list-style-type: none; padding-left: 20px;">
            <li><a href="/pertanyaan/tampil/{{Auth::id()}}"><i class="fa fa-question-circle" style="color: #4285F4;"></i> <strong>Pertanyaan Saya</strong></a></li>
            <li><a href="/jawaban/tampil/{{Auth::id()}}"><i class="fa fa-bullhorn" style="color: #4285F4;"></i> <strong>Jawaban Saya</strong></a></li>
            <li><a href="/reputasi/{{Auth::id()}}" ><i class="fa fa-book" style="color: #4285F4;"></i> <strong>Reputasi Saya</strong></a></li>
        </ul>
        <hr>
        <ul style=" list-style-type: none; padding-left: 20px;">
            <li><a href="/questions/top"><i class="fa fa-fire" style="color: #4285F4;"></i> Top Pertanyaan</a></li>
            <li><a href="/pertanyaan/terbaru"><i class="far fa-lightbulb"></i> Pertanyaan Terbaru</a></li>
        </ul>
    </div>
</div>
@endif