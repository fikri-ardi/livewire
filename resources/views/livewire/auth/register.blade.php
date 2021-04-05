<form wire:submit.prevent="register">
    <div>
        <label for="email">E-mail</label>
        <input wire:model="email" type="email" id="email" name="email">
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input wire:model="password" type="password" id="password" name="password">
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="passwordConfirmation">Password Confirmation</label>
        <input wire:model="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>