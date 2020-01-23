<!-- Heading -->
<h6 class="navbar-heading text-muted">
  @if (auth()->user()->role =='admin')
    Panel 
  @else
  Menu
  @endif
</h6>
<ul class="navbar-nav">
  @if(auth()->user()->role =='admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('home') }}">
        <i class="ni ni-tv-2 text-primary"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('producttypes') }}">
        <i class="ni ni-planet text-blue"></i> Admin
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('agents') }}">
        <i class="ni ni-mobile-button text-orange"></i> Agents
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('localsales') }}">
        <i class="ni ni-single-02 text-yellow"></i> Local Sales Agent
      </a>
    </li>
  @elseif(auth()->user()->role =='localsales')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('producttypes') }}">
          <i class="ni ni-single-02 text-green"></i> Local Sales
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('producttypes') }}">
        <i class="ni ni-bullet-list-67 text-green"></i> Product Type
      </a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="./examples/tables.html">
        <i class="ni ni-ui-04 text-orange"></i> Debit Orders
      </a>
    </li>

  @elseif(auth()->user()->role =='regionalsales')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('producttypes') }}">
        <i class="ni ni-user-run text-green"></i> Regional Sales
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('producttypes') }}">
        <i class="ni ni-bullet-list-67 text-green"></i> Product Type
      </a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="./examples/tables.html">
        <i class="ni ni-check-bold text-orange"></i> Debit Orders
      </a>
    </li>
  @endif
  
  @if(auth()->user()->role =='admin')
        <a class="nav-link" href="{{ url('regionalsales') }}">
          <i class="ni ni-bullet-list-67 text-red"></i> Regional Sales Agent
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('producttypes') }}">
          <i class="ni ni-bullet-list-67 text-green"></i> Product Type
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="./examples/tables.html">
          <i class="ni ni-bullet-list-67 text-orange"></i> Debit Orders
        </a>
      </li>
    @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
          <i class="ni ni-key-25 text-info"></i> Logout
        </a>
        <form action="{{route('logout')}}" method="POST" style="display:none;" id="formLogout">
          @csrf
          
        </form>
      </li>
    
      </ul>
    @if(auth()->user()->role =='admin')
      <!-- Divider -->
      <hr class="my-3">
      <!-- Heading -->
      <h6 class="navbar-heading text-muted">Reports</h6>
      <!-- Navigation -->
      <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-spaceship"></i> Frecuenty
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-palette"></i> Progress
          </a>
        </li>

      </ul>
      @endif