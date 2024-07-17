@if(Auth::user())
<div>
    <div class="dropdown">
        <a  class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- <i class="bi-person-circle h5"></i>  --}}
            <i class="bi bi-person-fill me-2"></i> {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
            <li wire:click="logout"><a  class="btn dropdown-item"><i class="bi bi-box-arrow-left"></i>Logout</a></li>
          
        </ul>
    </div>
</div>
@endif
