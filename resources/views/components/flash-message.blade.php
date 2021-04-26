<div>
    @if (session()->has('success'))
    <div class="bg-green-200 text-green-600 fixed bottom-10 left-10 z-50 p-4 rounded-md shadow-xl flex items-center transition ease-out animate-pop">
        <span class="iconly-brokenShield-Done text-2xl mr-2"></span>
        <span>{{ session('success') }}</span>
    </div>
    @endif
    @if (session('info'))
    <div
        class="bg-yellow-200 text-yellow-600 fixed bottom-10 left-10 z-50 p-4 rounded-md shadow-xl flex items-center transition ease-out animate-pop">
        <span class="iconly-brokenInfo-Square text-2xl mr-2"></span>
        <span>{{ session('info') }}</span>
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-200 text-red-600 fixed bottom-10 left-10 z-50 p-4 rounded-md shadow-xl flex items-center transition ease-out animate-pop">
        <span class="iconly-brokenShield-Fail text-2xl mr-2"></span>
        <span>{{ session('error') }}</span>
    </div>
    @endif
</div>