<form wire:submit.prevent="register">
    <div>
        <label for="email">E-mail</label>
        <input wire:keyup="validate_email" wire:model="email" type="email" id="email" name="email">
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input wire:keyup="validate_password" wire:model="password" type="text" id="password" name="password">
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="passwordConfirmation">Password Confirmation</label>
        <input wire:keyup="validate_password_confirm" wire:model="passwordConfirmation" type="text" id="passwordConfirmation"
            name="passwordConfirmation">
        @error('passwordConfirmation') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>