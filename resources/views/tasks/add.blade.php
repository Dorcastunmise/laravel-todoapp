@extends('layouts.default')

@section('content')
   <div class="card shadow-sm" 
        style="width: 90%; max-width: 800px; margin: 100px auto; padding: 24px; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); background-color: #ffffff;">
            <div style="font-size: 1.75rem; font-weight: 600; text-align: center; margin-bottom: 1rem; font-family: 'Brush Script MT', cursive; color: #2c3e50;">
            Add Task
            </div>        
            
            <form method="POST" action="{{ route('tasks.add.post') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" 
                    class="form-control" 
                    placeholder="Title..."
                    style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #ced4da; font-size: 16px;">
            </div>
            @error('title')
                    <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="mb-3">
                <input type="datetime-local" name="deadline" 
                    class="form-control" 
                    placeholder="Due date..."
                    style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #ced4da; font-size: 16px;">
            </div>
            @error('deadline')
                    <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="mb-3">
                <textarea class="form-control"
                    rows="4" name="description"
                    placeholder="Content..."
                    style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #ced4da; font-size: 16px; resize: vertical;"></textarea>
            </div>
            @error('description')
                    <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="mb-3">
                <select name="priority" 
                    class="form-control" 
                    style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #ced4da; font-size: 16px;">
                    <option value="none">Select Priority...</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            @error('priority')
                    <span class="text-danger">{{$message}}</span>
            @enderror


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

            <button type="submit"
                style="background: #2c3e50; backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); color: #fff; border: 1px solid rgba(255, 255, 255, 0.3); padding: 14px 28px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);">
                Submit
            </button>

        </form>
   </div>
@endsection
