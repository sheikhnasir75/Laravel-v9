
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
        </h2>
    </x-slot>

    <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
   
   <!-- @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach    -->             



            <form action="{{route('notification.store') }}" method="POST">
        @csrf      
            <input id="title" 
                        name="title"
                        placeholder="Title" 
                        class="w-full mt6" 
                        autocomplete="off"
                        type="text"
                        value="{{old('title') }}" ></input>                      
          @error('title')
             <div class="text-red-600 text-sm"> {{ $message }} </div>
          @enderror        
            <textarea 
                        id="textarea" 
                        placeholder="Notification Details" 
                        name="textarea" 
                        cols="40" 
                        class="w-full mt6"
                        rows="5" class="form-control">{{old('textarea') }}</textarea>
        
                        @error('textarea')
                        <div class="text-red-600 text-sm"> {{$message }}</div>
                        @enderror 
            
            <button class="bg-blue-500 hover:bg-blue-700 text-dark font-bold py-2 px-4 rounded">
                Save
              </button>

            
              
                
                      </form>
                </div>
             </div>
        </div>
    </div>
</x-app-layout>
