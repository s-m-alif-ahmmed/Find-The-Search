{{-- Import helper function to use in chatbox --}}
@use('Namu\WireChat\Helpers\Helper')
@use('Namu\WireChat\Facades\WireChat')

@php

    $primaryColor = WireChat::getColor();

@endphp



@assets
    <style>
        :root {
            --primary-color: {{ $primaryColor }};
            --wirechat-primary-color: {{ $primaryColor }}
        }


        emoji-picker {
            width: 100% !important;
            height: 100%;
        }

        /* Emoji picker configuration */
        emoji-picker {
            --background: #f9fafb;
            --border-radius: 12px;
            --input-border-color: rgb(229 229 229);
            --input-padding: 0.45rem;
            --outline-color: none;
            --outline-size: 1px;
            --num-columns: 8;
            /* Mobile-first default */
            --emoji-padding: 0.7rem;
            --emoji-size: 1.5rem;
            /* Smaller size for mobile */
            --border-color: none;
            --indicator-color: #9ca3af;
        }


        @media screen and (min-width: 600px) {
            emoji-picker {
                --num-columns: 10;
                /* Increase columns for larger screens */
                --emoji-size: 1.8rem;
                /* Larger size for desktop */
            }
        }

        @media screen and (min-width: 900px) {
            emoji-picker {
                --num-columns: 16;
                /* Increase columns for larger screens */
                --emoji-size: 1.9rem;
                /* Larger size for desktop */
            }
        }

        /* Emoji picker Dark mode configuration */
        @media (prefers-color-scheme: dark) {
            emoji-picker {
                --background: #1f2937;
                --input-border-color: #374151;
                --outline-color: none;
                --outline-size: 1px;
                --border-color: none;
                --input-font-color: white;
                --indicator-color: #9ca3af;
                --button-hover-background: #9ca3af
            }
        }


        .custom-scrollbar {
            overflow-y: auto;
            /* Make sure the div is scrollable */

            scrollbar-width: 7px;

            &::-webkit-scrollbar {
                width: 8px;
                background-color: transparent;
            }

            &::-webkit-scrollbar-thumb {
                border-radius: 15px;
                /* visibility: hidden; */
                background-color: #d1d5db;
            }

            /* Show scrollbar on hover */
            &:hover {
                &::-webkit-scrollbar-thumb {
                    /* visibility: visible; */
                }
            }

            @media (prefers-color-scheme: dark) {
                &::-webkit-scrollbar-thumb {
                    background-color: #374151;
                }
            }

            &::-webkit-scrollbar-track {
                background-color: transparent;
            }



        }
    </style>
@endassets

    <div x-data="{
        initializing: true,
        conversationElement: document.getElementById('conversation'),
        'loadEmojiPicker': function() {

            let script = document.createElement('script');
            script.type = 'module';
            script.src = 'https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js';
            script.defer = true;
            document.head.appendChild(script);
        }
    }" x-init="setTimeout(() => {
        $wire.dispatch('focus-input-field');
        requestAnimationFrame(() => {
          

            initializing = false;
        });

        }, 120);

        loadEmojiPicker();
    "
    @scroll-bottom.window="
        

            requestAnimationFrame(() => {
                {{-- overflow-y: hidden; is used to hide the vertical scrollbar initially. --}}
                conversationElement.style.overflowY='hidden';

                {{-- scroll the element down --}}
                conversationElement.scrollTop = conversationElement.scrollHeight;

                {{-- After updating the chat height, overflowY is set back to 'auto', 
                    which allows the browser to determine whether to display the scrollbar 
                    based on the content height.  --}}
                   conversationElement.style.overflowY='auto';
            });
  
    "
    class=" w-full transition  bg-white/95 dark:bg-gray-900  overflow-hidden  h-full relative" style="contain:content">

    {{-- todo: add rounded corners to attachment --}}
    <div class=" flex flex-col  grow  h-full relative ">

        {{-- ---------- --}}
        {{-- --Header-- --}}
        {{-- ---------- --}}
        <x-wirechat::chat.header :receiver="$receiver" :conversation="$conversation" />


        {{-- ---------- --}}
        {{-- -Body----- --}}
        {{-- ---------- --}}


        <x-wirechat::chat.body :conversation="$conversation" :authParticipant="$authParticipant" :loadedMessages="$loadedMessages" :isPrivate="$conversation->isPrivate()" :isGroup="$conversation->isGroup()"
            :receiver="$receiver" />


        {{-- ---------- --}}
        {{-- -Footer--- --}}
        {{-- ---------- --}}

        <footer class="shrink-0 h-auto relative   sticky bottom-0 mt-auto">


            {{-- @dd(['is Admin'=>$authParticipant->isAdmin(),$authParticipant,$authParticipant->particapantable]) --}}
            @if ($conversation->isGroup() && !$conversation->group?->allowsMembersToSendMessages() && !$authParticipant->isAdmin())
                <div
                    class="bg-gray-50 w-full text-center text-gray-600 dark:text-gray-200 justify-center text-sm flex py-4 dark:bg-gray-800">

                    Only admins can send messages

                </div>
            @else
                <x-wirechat::chat.footer :media="$media" :files="$files" :replyMessage="$replyMessage" />
            @endif

        </footer>

    </div>



    <x-wirechat::toast />
    <livewire:chat-drawer />
</div>
