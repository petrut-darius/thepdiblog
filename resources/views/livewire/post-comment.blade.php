<div>
    <form wire:submit.prevent="submit">
        <label for="content">Write your opinion:</label><br>
        <textarea id="content" wire:model="content" rows="3"></textarea><br>
        <button type="submit">Comment!</button>
    </form>
</div>
