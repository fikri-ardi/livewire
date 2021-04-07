@if($errors->has($field) && $model !== '')
<div {{ $attributes->merge(['class'=>'text-sm bottom-7 text-yellow-500 font-semibold shadow-sm ml-10 animate-pop']) }}>
    {{ $errors->first($field) }}
</div>
@else
<div></div>
@endif