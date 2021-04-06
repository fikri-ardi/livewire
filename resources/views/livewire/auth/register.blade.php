<div class="container">
    <form wire:submit.prevent="register">
        <p>Create an account</p>

        <div class="form-group email">
            <span class="iconly-brokenMessage"><span class="path1"></span><span class="path2"></span></span>
            <input wire:keyup="validate_email" wire:model="email" type="email" id="email" name="email" placeholder="E-mail">
            @error('email') <div class="validation-errors">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <span class="iconly-brokenPassword"></span>
            <input wire:keyup="validate_password" wire:model="password" type="password" id="password" name="password" placeholder="Password">
            @error('password') <div class="validation-errors">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <span class="iconly-brokenScan"></span>
            <input wire:keyup="validate_password_confirm" wire:model="passwordConfirmation" type="password" id="passwordConfirmation"
                name="passwordConfirmation" placeholder="Password confirmation">
            @error('passwordConfirmation') <div class="validation-errors">{{ $message }}</div> @enderror
        </div>

        <div class="register">
            <button class="register-btn" type="submit">
                <span class="iconly-brokenArrow---Right-Square"></span>
                REGISTER
            </button>
        </div>
    </form>
</div>