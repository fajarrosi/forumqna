@if (Auth::id())

<div class="col-12 col-lg-3">
  <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
    <div class="card-header text-center pb-0">
  
    </div>
        <div class="card-body  text-center ">
                 <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
        <h4 class="text-black">  {{ Auth::user()->name }}</h4>
        <p>Reputasi kamu   {{ Auth::user()->reputasi }}</p>
        </div>
  </div>
</div>

@endif