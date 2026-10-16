<div>
    @if($notification)
        <div wire:ignore
             class="mb-4 p-5 {{ $notificationType === 'success' ? 'bg-primary text-center text-white' : 'bg-red-500 text-white' }} border rounded-2xl text-xl animate-fade-in-out relative z-50 shadow-lg"

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

    <div class="wow fadeInUp rounded-lg bg-white dark:bg-dark-2 py-10 px-8 shadow-testimonial dark:shadow-none sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]" data-wow-delay=".2s">
        <h3 class="mb-8 text-2xl font-semibold md:text-[28px] md:leading-[1.42] text-dark dark:text-white">
            Send us a Message
        </h3>
        <form>
            <div class="mb-[22px]">
                <label for="full_name" class="block mb-4 text-sm text-body-color dark:text-dark-6">Full Name*</label>
                <input wire:model="first_name" type="text" id="full_name" name="full_name" placeholder="Adam Gelius"
                    class="bg-transparent w-full text-body-color dark:text-dark-6 placeholder:text-body-color/60 border-0 border-b border-[#f1f1f1] dark:border-dark-3 pb-3 focus:border-primary focus:outline-hidden">
                @error('first_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-[22px]">
                <label for="email" class="block mb-4 text-sm text-body-color dark:text-dark-6">Email*</label>
                <input wire:model="email" type="email" id="email" name="email" placeholder="example@yourmail.com"
                    class="bg-transparent w-full text-body-color dark:text-dark-6 placeholder:text-body-color/60 border-0 border-b border-[#f1f1f1] dark:border-dark-3 pb-3 focus:border-primary focus:outline-hidden">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-[22px]">
                <label for="phone" class="block mb-4 text-sm text-body-color dark:text-dark-6">Phone*</label>
                <input wire:model="phone" type="text" id="phone" name="phone" placeholder="+885 1254 5211 552"
                    class="bg-transparent w-full text-body-color dark:text-dark-6 placeholder:text-body-color/60 border-0 border-b border-[#f1f1f1] dark:border-dark-3 pb-3 focus:border-primary focus:outline-hidden">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-[30px]">
                <label for="message" class="block mb-4 text-sm text-body-color dark:text-dark-6">Message*</label>
                <textarea wire:model="message" id="message" name="message" rows="1" placeholder="type your message here"
                    class="bg-transparent w-full text-body-color dark:text-dark-6 placeholder:text-body-color/60 resize-none border-0 border-b border-[#f1f1f1] dark:border-dark-3 pb-3 focus:border-primary focus:outline-hidden"></textarea>
                @error('message')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-0">
                <button type="button" wire:click="create"
                    class="inline-flex items-center justify-center px-10 py-3 text-base font-medium text-white transition duration-300 ease-in-out rounded-md bg-primary hover:bg-blue-dark">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>
