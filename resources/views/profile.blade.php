
@auth
<div class="card text-bg-dark ms-auto" style="max-width: 18rem;">
    <div class="card-header mx-auto">Profile</div>
    <div class="card-body">
      <h5 class="card-title">{{Auth()->User()->name}} </h5>
      <p class="card-text">Email {{Auth()->User()->email}}</p>
    </div>
  </div>
  @endauth