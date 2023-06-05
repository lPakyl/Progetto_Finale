<form action="{{ route('setLocale', $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn  bg-transparent"><img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="20" height="20" alt=""/></button>
    <span class=""></span>
</form>
