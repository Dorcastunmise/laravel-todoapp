@extends("layouts.default")
@section('content')
<main class="flex-shrink-0 mt-5" style="margin-top:150px;">
  <div class="container" style="max-width: 600px; background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(14px); border-radius: 20px; padding: 32px; box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);">
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

    <div class="my-3 p-4" style="background: rgba(255, 255, 255, 0.55); border-radius: 16px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);">
      <h6 class="border-bottom pb-2 mb-3" style="font-weight: 600; font-size: 20px; color: #34495e;">Suggestions</h6>

      @foreach($tasks as $task)
      <div class="d-flex text-body-secondary pt-3" style="gap: 12px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M14 3v4a1 1 0 0 0 1 1h4" />
          <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
          <path d="M9 15h6" />
          <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" />
        </svg>
        
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
          <div class="d-flex justify-content-between">
            <div class="flex-grow-1">
              @php
                $priorityColors = [
                  'high' => '#dc3545',     // red
                  'medium' => '#fd7e14',   // orange
                  'low' => '#198754',      // green
                ];
                $priorityColor = $priorityColors[strtolower($task->priority)] ?? '#6c757d'; // fallback grey
              @endphp

              <div style="font-size: 12px; font-weight: 600; color: {{ $priorityColor }}; margin-bottom: 2px;">
                {{ strtoupper($task->priority) }}
              </div>

              <div style="font-size: 17px; font-weight: 600; color: #212529; margin-bottom: 4px;">
                {{ $task->title }} | {{ $task->deadline }}
              </div>
              <div style="font-size: 15px; color: #5f6368;">
                {{ $task->description }}
              </div>
            </div>
            <div class="d-flex align-items-start">
              <a href="{{ route('tasks.update.status', $task->id) }}"
                style="background-color: #198754; color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 14px; font-weight: 500; text-decoration: none; transition: background-color 0.2s ease;"
                class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icon-tabler-check">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M5 12l5 5l10 -10"/>
                </svg>
              </a>
            </div>
          </div>
        </div>


      </div>
      @endforeach

      <small class="d-block text-end mt-4">
        <a href="#" style="color: #2c3e50; font-weight: 500; text-decoration: underline;">All suggestions</a>
      </small>
    </div>
  </div>
</main>
@endsection