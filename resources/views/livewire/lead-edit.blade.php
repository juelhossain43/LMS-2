<div>
   <form wire:submit.prevent="submitForm">
      <div class="flex -mx-4 mb-4">
         <div class="flex-1 px-4">
            <label for="" class="lms-label">Name</label>
               <input wire:model="name" type="text" class="lms-input"  >
               @error('name')
                  <div class="text-red-500 text-sm mt-2">{{ $messgae }}</div>
               @enderror
         </div>
         <div class="flex-1 px-4">
            <label for="" class="lms-label">Email</label>
            <input wire:model="email" type="text" class="lms-input"  >
            @error('email')
               <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
           @enderror
         </div>
         <div class="flex-1 px-4">
               <label for="" class="lms-label">Phone</label>
               <input wire:model="phone" type="tel" class="lms-input"  >
               @error('phone')
               <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
         </div>
      </div>

      
      @include('components.wire-loading-btn')
      <button wire:loading.remove class="lms-btn" type="submit">Update</button>
   </form>

   <h3 class="font-bold text-lg py-4 mb-4">Notes</h3>
   @foreach ($notes as $note )
      <p class="border border-gray-100 p-4 mb-4">{{ $note->description}}</p>
   @endforeach
      <h3 class="font-bold mb-2 "> Add New Note</h3>
   <form wire:submit.prevent="addNote">
      <div class="mb-4">
      <textarea wire:model.lazy="note" class="lms-input" placeholder="Type note"></textarea>
      </div>
      <button type="submit" class="lms-btn">Save</button>
   </form>

   

</div>