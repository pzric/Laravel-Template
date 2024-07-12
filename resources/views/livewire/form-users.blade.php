<div class="flex">
    <button wire:click="$set('form_user', 'flex')" class="rounded-lg inline-flex items-center bg-green-600 hover:text-white hover:bg-green-400 focus:outline-none focus:shadow-outline text-white py-2 px-2 md:px-4">
        <i class="fa-solid fa-user-plus w-6 h-6 mr-2 py-1"></i>
        <span class="hidden md:block">New user</span>
    </button>
    <div class="{{$form_user}} fixed items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0">
        <div class="bg-white rounded-xl shadow-2xl sm:w-1/3">

            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b-2 text-xl p-2">
                <p class="">Create new user</p>
                <i class="fa-solid fa-xmark cursor-pointer" wire:click="$set('form_user', 'hidden')"></i>
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
                      {!! Form::select('rol', $roles, false, ['wire:model.defer' => 'rol', 'class' => 'w-full rounded-md border border-gray-400 p-2 bg-white', 'placeholder' => '--Select option--']) !!}
                      @error ('rol')<small class="text-red-700">{{$message}}</small>
                      @enderror
                  </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="p-4 border-t-2">
              <button wire:click="save()" class="w-auto bg-green-600 text-white text-base px-5 py-2 rounded font-medium hover:bg-green-500 transition duration-200 each-in-out">
                <i class="fa-solid fa-floppy-disk"></i>
                Save
              </button>
            </div>
        </div>
    </div>
</div>
