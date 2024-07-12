  <div class="w-full flex flex-col h-screen overflow-x-hidden border-t">
      <x-nav attribute="value" />
      <div class="container mx-auto px-4">
          <h1 class="text-4xl py-6">Users</h1>
          <!-- Options -->
          <div class="mb-4 flex justify-between items-center">
              <!-- Search -->
              <div class="flex-1 pr-4">
                  <div class="relative md:w-1/3">
                      <input wire:model="search" type="search" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Search...">
                      <div class="absolute top-0 left-0 inline-flex items-center p-2">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                              <circle cx="10" cy="10" r="7" />
                              <line x1="21" y1="21" x2="15" y2="15" />
                          </svg>
                      </div>
                  </div>
              </div>
              <!-- Button -->
              <div>
                  <div class="shadow rounded-lg flex">
                    @livewire('form-users')
                  </div>
              </div>
          </div>

          <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative mb-8">
              <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                  <thead>
                      <tr class="text-left">
                          <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                              USER
                          </th>
                          <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                              ROL
                          </th>
                          <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                              EMAIL
                          </th>
                          <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                              CREATED AT
                          </th>
                          <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-2 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                              STATUS
                          </th>
                          <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                            ACTION
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @if ($users->count())
                      @foreach ($users as $user)
                        <tr>
                            <td class="border-dashed border-t border-gray-200">
                                <span class="text-gray-700 px-6 py-3 flex items-center">{{$user->user}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200">
                                <span class="text-gray-700 px-6 py-3 flex items-center">{{$user->getRoleNames()->first()}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200">
                                <span class="text-gray-700 px-6 py-3 flex items-center">{{$user->email}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200">
                                <span class="text-gray-700 px-6 py-3 flex items-center">{{$user->created_at}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200">
                              @if ($user->state === '1')
                                <span class="text-green-900 bg-green-100 rounded-full px-3 py-1">Active</span>
                              @else
                                <span class="text-red-900 bg-red-200 rounded-full px-3 py-1">Inactive</span>
                              @endif
                            </td>
                            <td class="border-dashed border-t border-gray-200">
                                <a wire:click="edit({{$user->id}})" class="mx-2 cursor-pointer">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a  wire:click="$emit('deleteUser', {{$user->id}})" class="mx-2 cursor-pointer">
                                  <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                          <td colspan="6" class="text-center text-2xl px-5 py-5 border-b border-gray-200 bg-white text-sm">
                              <span>Sin registros</span>
                          </td>
                      </tr>
                    @endif
                  </tbody>
              </table>
              <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row xs:justify-between">
                {{ $users->links() }}
              </div>
          </div>
      </div>
      <div class="{{$edit_user}} fixed items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0">
          <div class="bg-white rounded-xl shadow-2xl sm:w-1/3">

              <!-- Modal Header -->
              <div class="flex justify-between items-center border-b-2 text-xl p-2">
                  <p class="">Edit user</p>
                                  id usuario: {{$user_id}}
                  <i class="fa-solid fa-xmark cursor-pointer" wire:click="$set('edit_user', 'hidden')"></i>
              </div>

              <!-- Modal body -->
              <div class="px-3 py-4">
                  <div class="md:flex text-left py-1">
                      <div class="md:w-full px-2">
                          {!! Form::label('user', 'User', ['class' => 'mb-1']) !!}
                          {!! Form::text('user', null, ['wire:model.defer' => 'user', 'class' => 'w-full rounded-md border border-gray-400 p-1']) !!}
                          @error ('user')<small class="text-red-700">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="md:w-full px-2">
                          {!! Form::label('username', 'User name', ['class' => 'mb-1']) !!}
                          {!! Form::text('username', null, ['wire:model.defer' => 'username', 'class' => 'w-full rounded-md border border-gray-400 p-1']) !!}
                          @error ('username')<small class="text-red-700">{{$message}}</small>
                          @enderror
                      </div>
                  </div>
                  <div class="md:flex text-left py-1">
                      <div class="md:w-full px-2">
                          {!! Form::label('email', 'Email address', ['class' => 'mb-1']) !!}
                          {!! Form::email('email', null, ['wire:model.defer' => 'email', 'class' => 'w-full rounded-md border border-gray-400 p-1']) !!}
                          @error ('email')<small class="text-red-700">{{$message}}</small>
                          @enderror
                      </div>
                  </div>
                  <div class="md:flex text-left py-1">
                      <div class="md:w-full px-2">
                          {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
                          {!! Form::password('password', ['wire:model.defer' => 'password', 'class' => 'w-full rounded-md border border-gray-400 p-1']) !!}
                          @error ('password')<small class="text-red-700">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="md:w-full px-2">
                          {!! Form::label('password_confirm', 'Confirm password', ['class' => 'mb-1']) !!}
                          {!! Form::password('password_confirm', ['wire:model.defer' => 'password_confirm', 'class' => 'w-full rounded-md border border-gray-400 p-1']) !!}
                          @error ('password_confirm')<small class="text-red-700">{{$message}}</small>
                          @enderror
                      </div>
                  </div>
                  <div class="md:flex text-left py-1">
                    <div class="md:w-full px-2">
                        {!! Form::label('rol', 'Rol', ['class' => 'mb-1']) !!}
                        {!! Form::select('rol', $all_roles, false, ['wire:model.defer' => 'rol', 'class' => 'w-full rounded-md border border-gray-400 p-2 bg-white', 'placeholder' => '--Select option--']) !!}
                        @error ('rol')<small class="text-red-700">{{$message}}</small>
                        @enderror
                    </div>
                  </div>
              </div>

              <!-- Modal footer -->
              <div class="p-4 border-t-2">
                <button wire:click="update({{$user_id}})" class="w-auto bg-green-600 text-white text-base px-5 py-2 rounded font-medium hover:bg-green-500 transition duration-200 each-in-out">
                  <i class="fa-solid fa-floppy-disk"></i>
                  Save
                </button>
              </div>
          </div>
      </div>
      @push('js')
       <script type="text/javascript">
       Livewire.on('deleteUser', user_id => {
         Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to reverse this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!',
           }).then((result) => {
             if (result.isConfirmed) {
               Livewire.emitTo('show-users', 'delete', user_id);
             }
           })
       })
       </script>
     @endpush
  </div>
