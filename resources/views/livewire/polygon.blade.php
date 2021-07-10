<div class="p-6">
    <x-jet-button wire:click="createShowModal">
        {{ __('Neues Polygon') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="$modalFormVisible">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('$modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>

</div>
