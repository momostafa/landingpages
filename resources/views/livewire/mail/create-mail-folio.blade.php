<div>
    @if($notification)
        <div wire:ignore
             class="mb-4 p-5 {{ $notificationType === 'success' ? 'bg-zinc-800 border-accent text-center text-white' : 'bg-zinc-800 border-red-500 text-white' }} border rounded-2xl text-xl animate-fade-in-out relative z-50 shadow-lg"

              id="notification-banner">
            {{ $notification }}
        </div>
        <style>
            @keyframes fade-in-out {
                0% { opacity: 0; transform: translateY(-10px); }
                10% { opacity: 1; transform: translateY(0); }
                85% { opacity: 1; transform: translateY(0); }
                100% { opacity: 0; transform: translateY(-10px); }
            }
            .animate-fade-in-out {
                animation: fade-in-out 10s ease-in-out forwards;
            }
        </style>
    @endif

    <form>
            <div class="flex flex-col gap-4">
              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="first_name" class="block text-md font-medium text-zinc-400 mb-1.5">First Name <span aria-hidden="true">*</span></label>
                  <input wire:model="first_name"  type="text" id="first_name" name="first_name" placeholder="Jane Smith" required autocomplete="name"
                    class="w-full bg-zinc-800 border border-zinc-400 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-300 focus:outline-none focus:border-accent transition-colors">
                    @error('first_name')
                        <span class="text-white">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                  <label for="last_name" class="block text-md font-medium text-zinc-400 mb-1.5">Last Name <span aria-hidden="true">*</span></label>
                  <input wire:model="last_name"  type="text" id="last_name" name="last_name" placeholder="Jane Smith" required autocomplete="name"
                    class="w-full bg-zinc-800 border border-zinc-400 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-300 focus:outline-none focus:border-accent transition-colors">
                    @error('last_name')
                        <span class="text-white">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                  <label for="email" class="block text-md font-medium text-zinc-400 mb-1.5">Email <span aria-hidden="true">*</span></label>
                  <input wire:model="email" type="email" id="email" name="email" placeholder="jane@company.com" required autocomplete="email"
                    class="w-full bg-zinc-800 border border-zinc-400 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-300 focus:outline-none focus:border-accent transition-colors">
                    @error('email')
                        <span class="text-white">{{ $message }}</span>
                    @enderror
                    </div>
                <div>
                  <label for="phone" class="block text-md font-medium text-zinc-400 mb-1.5">Phone <span aria-hidden="true">*</span></label>
                  <input wire:model="phone" type="phone" id="phone" name="phone" placeholder="+149858594943" required autocomplete="phone"
                    class="w-full bg-zinc-800 border border-zinc-400 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-300 focus:outline-none focus:border-accent transition-colors">
                    @error('phone')
                        <span class="text-white">{{ $message }}</span>
                    @enderror
                    </div>
              </div>
              <div>
                <label for="subject" class="block text-md font-medium text-zinc-400 mb-1.5">Subject<span aria-hidden="true">*</span></label>
                <input wire:model="subject"  type="text" id="subject" name="subject" placeholder="Project inquiry" required autocomplete="subject"
                  class="w-full bg-zinc-800 border border-zinc-400 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-300 focus:outline-none focus:border-accent transition-colors">
                @error('subject')
                    <span class="text-white">{{ $message }}</span>
                    @enderror
                </div>
              <div>
                <label for="message" class="block text-md font-medium text-zinc-400 mb-1.5">Message <span aria-hidden="true">*</span></label>
                <textarea wire:model="message" id="message" name="message" rows="4" placeholder="Tell me about your project..." required
                  class="w-full bg-zinc-800 border border-zinc-400 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-300 focus:outline-none focus:border-accent transition-colors resize-none"></textarea>
                @error('message')
                    <span class="text-white">{{ $message }}</span>
                    @enderror
                </div>
              <button type="button" wire:click="create" class="shimmer w-full bg-accent text-white font-display font-bold text-sm py-3.5 rounded-xl hover:bg-accent-light transition-colors">
                Send message →
              </button>
            </div>
          </form>
</div>
