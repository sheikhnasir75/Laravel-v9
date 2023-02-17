
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notification.index')?__('Notification'):__('Trashed') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100">{{ session('success')}}</div>
            
            @endif
            @if(request()->routeIs('notification.index'))
                <a href="{{ route('notification.create') }}" 
                class="btn btn-primary">+ New Notification</a>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    All Notification
                    @forelse ($notifications as $notification)
                <div class="my-6 p-6 bg-white border-b border-gray-200 
                shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">

                      
                       <a 
                       @if(request()->routeIs('notification.index'))
                         href="{{ route('notification.show',$notification)}}"
                       @else
                         href="{{ route('trashed.show',$notification)}}"
                        @endif
                       >
                         {{ $notification->title }}</a>
                    </h2>
                    <form action="{{ route('notification.destroy',$notification) }}"
                    method="post">
                    @method('delete')
                    @csrf
                


                <button  onclick="return confirm('Are you sure you wish to delete this notification')" 
                type="submit" class="text-dark bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 
                hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg 
                shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium 
                rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                Move to Trash
                </button>
                </form>
                    <p class="mt-2">{{ Str::limit($notification->text,100) }}</p>
                    <span>{{$notification->updated_at->diffForHumans()}}</span>
                </div>
                    @empty
                    @if(request()->routeIs('notification.index'))
                    <p>You have no Notification</p>
                    @else
                    <p>No Items in the Trashed</p>
                    @endif
                    @endforelse

                   
                    {{ $notifications->links() }}
                </div>
             
            </div>
        </div>
    </div>
</x-app-layout>
