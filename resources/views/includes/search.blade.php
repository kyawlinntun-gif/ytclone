{{-- ---------- Start of Search ---------- --}}
<form action="{{ route('search') }}" method="GET">
    <div class="d-flex align-items-center my-3">
        <input type="text" name="query" id="query" class="form-control" placeholder="Search">
        <button type="submit" class="search-btn"><i class="material-icons">search</i></button>
    </div>
</form>
{{-- ---------- End of Search ---------- --}}
