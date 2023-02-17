
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$notification->trashed() ?__('Notification'):__('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100">{{ session('success')}}</div>
            @endif
          <div class="flex">
            @if(!$notification->trashed())
                <p class="opacity-70"><strong>
                    Created :</strong>{{ $notification->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml8">
                    <strong>
                        Updated :</strong>{{ $notification->updated_at->diffForHumans() }} 
                </p>
                <a href="{{ route('notification.edit',$notification) }}" 
                class="btn-link">Edit Notification</a>
                <form action="{{ route('notification.destroy',$notification) }}"
                    method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4"
                    onclick="return confirm('Are you sure you wish to delete this notification')"
                    >Move to Trash</button>
                </form>
            @else
            <p class="opacity-70"><strong>
                Deleted :</strong>{{ $notification->deleted_at->diffForHumans() }}
            </p>

            <form action="{{ route('trashed.update',$notification) }}"
                method="post">
                @method('put')
                @csrf
               <button type="submit" class="btn btn-link ml-auto">Restore</button>
            </form>
              
          
            <form action="{{ route('trashed.destroy',$notification) }}"
                method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger ml-4"
                onclick="return confirm('Are you sure you wish delete, once deleted cannot undone')"
                >Delete Permanently</button>
            </form>

            @endif

         
        </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   Notification 
                  
                <div class="my-6 p-6 bg-white border-b border-gray-200 
                shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        {{$notification->title }}
                    </h2>
                    <p class="mt-6 whitespace-pre-wrap">{{ $notification->text }}</p>
                   
                </div>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
