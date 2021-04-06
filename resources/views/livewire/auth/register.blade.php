<div class="container">
    <form wire:submit.prevent="register">
        <p>Create an account</p>

        <div class="form-group email">
            <input wire:keyup="validate_email" wire:model="email" type="email" id="email" name="email" placeholder="email">
            @error('email') <div class="validation-errors">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input wire:keyup="validate_password" wire:model="password" type="text" id="password" name="password" placeholder="password">
            @error('password') <div class="validation-errors">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input wire:keyup="validate_password_confirm" wire:model="passwordConfirmation" type="text" id="passwordConfirmation"
                name="passwordConfirmation" placeholder="password confirmation">
            @error('passwordConfirmation') <div class="validation-errors">{{ $message }}</div> @enderror
        </div>

        <button class="register-btn" type="submit">REGISTER</button>
    </form>
</div>