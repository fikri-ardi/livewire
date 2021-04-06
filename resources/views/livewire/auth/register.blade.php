<div class="fixed h-full">
    <form wire:submit.prevent="register" class="fixed top-1/2 left-1/2">
        <p>Create an account</p>

        <div class="form-group email">
            <span class="iconly-brokenMessage"><span class="path1"></span><span class="path2"></span></span>
            <input wire:keyup="validates" wire:model="email" type="email" id="email" name="email" placeholder="E-mail" required>
            @error('email')
            @if ($email !== '')
            <div class="validation-errors">{{ $message }}</div>
            @endif
            @elseif($email != '')
            <div class="validation-errors">
                <span class="iconly-brokenTick-Square success"></span>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <span class="iconly-brokenPassword"></span>
            <input wire:keyup="validates" wire:model="password" type="password" id="password" name="password" placeholder="Password" required>
            @error('password')
            @if ($password !== '')
            <div class="validation-errors">{{ $message }}</div>
            @endif
            @elseif($password !== '')
            <div class="validation-errors">
                <span class="iconly-brokenTick-Square success"></span>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <span class="iconly-brokenScan"></span>
            <input wire:keyup="validates" wire:model="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation"
                placeholder="Password confirmation" required>
            @error('passwordConfirmation')
            @if ($passwordConfirmation !== '')
            <div class="validation-errors">{{ $message }}</div>
            @endif
            @elseif($passwordConfirmation != '')
            <div class="validation-errors">
                <span class="iconly-brokenTick-Square success"></span>
            </div>
            @enderror
        </div>

        <div class="register">
            <button class="register-btn" type="submit">
                <span class="iconly-brokenArrow---Right-Square"></span>
                REGISTER
            </button>
        </div>
    </form>
</div>