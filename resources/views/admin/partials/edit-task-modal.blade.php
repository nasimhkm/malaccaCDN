<!-- Edit modal -->
<div id="edit-task-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="edit-task-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-white">Edit Task</h3>
                <form class="space-y-6" id="edit-task-form" action="" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="edit-task-title" class="block mb-2 text-sm font-medium text-gray-300">Title</label>
                        <input type="text" name="title" id="edit-task-title" class="bg-gray-700 border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="edit-task-description" class="block mb-2 text-sm font-medium text-gray-300">Description</label>
                        <textarea name="description" id="edit-task-description" rows="4" class="bg-gray-700 border-gray-600 text-white text-sm rounded-lg block w-full p-2.5"></textarea>
                    </div>
                    <div>
                        <label for="edit-task-status" class="block mb-2 text-sm font-medium text-gray-300">Status</label>
                        <select name="status" id="edit-task-status" class="bg-gray-700 border-gray-600 text-white text-sm rounded-lg block w-full p-2.5">
                            <option value="backlog">Backlog</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Task</button>
                </form>
            </div>
        </div>
    </div>
</div>
