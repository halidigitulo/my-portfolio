<div class="btn-group" role="group">
    <a href="{{ url('downloads/' . $filename) }}" class="btn btn-icon btn-sm btn-outline-primary me-1" target="_blank">
        <i class='bx  bx-arrow-down-stroke-circle'  ></i> 
    </a>
    <button class="btn btn-icon btn-sm btn-outline-danger btn-delete" data-file="{{ $filename }}">
        <i class='bx  bx-trash'  ></i> 
    </button>
</div>
