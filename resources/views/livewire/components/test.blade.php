<div>
 <button wire:click="send" class="btn btn-primary">
    <span wire:loading.remove >Click me</span>
    <span wire:loading wire:target="send">Showing now</span>
 </button>
</div>
