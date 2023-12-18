<div class="text-center">
    
    <p class="text-2xl">Counter : {{$count}}    </p>
    <div class="w-[40%] mx-auto bg-blue-300 p-16  flex justify-around">
        <button wire:click="increment" wire:confirm="are u sure!" class="border rounded p-3 bg-green-400"> Increment + </button>
        <button wire:click="decrement" class="border rounded p-3 bg-red-400"> decrement -</button>
    </div>
</div>
