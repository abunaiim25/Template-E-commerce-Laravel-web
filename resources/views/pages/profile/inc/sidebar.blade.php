<div class="card p-3" style="width: 18rem;">
    <img class="card-img-top"  style="border-radius: 50%;" src="#" height="100%;" width="100%;" alt="Card image cap">
    <ul class="list-group list-group-flush">
      
      <a href="{{ route('home') }}" class="btn btn-outline-success  btn-block">Home</a>
      
      <a href="{{ url('user.order') }}" class="btn btn-outline-success  btn-block">My Orders</a>
      
      <a   class="btn btn-outline-danger  btn-block" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        
    </ul>
  </div>
