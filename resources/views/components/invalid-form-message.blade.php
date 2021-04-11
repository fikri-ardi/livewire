@if($errors->has($field))
<div {{ $attributes->merge(['class'=>'text-sm bottom-7 text-yellow-500 font-semibold mx-10 animate-pop']) }}>
    {{ $errors->first($field) }}
</div>
@else
<div></div>
@endif