<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="category-modal">

  <div class="fixed inset-0 bg-gray-400 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

      <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Nouvelle Catégorie</h3>
            <button type="button" id="close-modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-400 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-400 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="mt-2">

                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6">
                    <label for="content" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="content" id="content" cols="30" rows="5"></textarea>
                  </div>
                </div>

            </div>
          </div>

          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-400 text-base font-medium text-white hover:bg-gray-500 focus:outline-none focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Créer</button>

            <button type="reset" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Annuler</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
