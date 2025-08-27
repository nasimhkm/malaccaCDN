<div class="bg-gray-800 p-4 rounded-lg shadow">
    <div class="flex justify-between items-start">
        <h3 class="font-bold text-white">{{ $task->title }}</h3>
        
        <!-- Dropdown Tombol Aksi -->
        <button id="task-dropdown-button-{{ $task->id }}" data-dropdown-toggle="task-dropdown-{{ $task->id }}" class="text-gray-400 hover:text-white text-lg" type="button">
            &#8942; <!-- Vertical ellipsis icon -->
        </button>
        <div id="task-dropdown-{{ $task->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
            <ul class="py-1 text-sm text-gray-700" aria-labelledby="task-dropdown-button-{{ $task->id }}">
                <li>
                    <button 
                        data-modal-target="edit-task-modal" 
                        data-modal-toggle="edit-task-modal"
                        data-task-id="{{ $task->id }}"
                        data-task-url="{{ route('admin.tasks.edit', $task) }}"
                        class="edit-task-btn block py-2 px-4 hover:bg-gray-100 w-full text-left">
                        Edit
                    </button>
                </li>
                <li>
                    <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block py-2 px-4 text-red-600 hover:bg-gray-100 w-full text-left">Delete</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @if($task->description)
        <p class="text-sm text-gray-400 mt-2">{{ $task->description }}</p>
    @endif
</div>
