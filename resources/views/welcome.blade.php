@extends("layouts.default")
@section('content')
<main class="flex-shrink-0 mt-5" style="margin-top:150px;">
  <div class="container" style="max-width: 600px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(8px); border-radius: 16px; padding: 24px; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);">
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <div class="my-3 p-3" style="background: rgba(255, 255, 255, 0.6); border-radius: 12px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);">
      <h6 class="border-bottom pb-2 mb-0" style="font-weight: 600; font-size: 18px;">Suggestions</h6>

      @foreach($tasks as $task)
        <div class="d-flex text-body-secondary pt-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
            <path d="M9 15h6" />
            <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" />
          </svg>
          <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
              <strong class="text-dark" style="font-size: 16px;">{{$task->title}} | {{$task->deadline}}</strong>
              <a href="#" style="text-decoration: underline; color: #2c3e50;">Follow</a>
            </div>
            <span class="d-block" style="color: #2c3e50;">{{$task->description}}</span>
          </div>
        </div>
      @endforeach

      <small class="d-block text-end mt-3">
        <a href="#" style="color: #2c3e50; font-weight: 500;">All suggestions</a>
      </small>
    </div>
  </div>
</main>
@endsection
