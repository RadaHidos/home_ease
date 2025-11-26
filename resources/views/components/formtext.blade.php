<div class="flex flex-col gap-1">
    <label class="text-sm text-slate-600">{{$label}}</label>
    <input
        type="text"
        placeholder="{{$placeholder}}"
        name="{{$name}}"
        value="{{old($name, $value)}}"
        class="rounded-lg border border-slate-200 px-3 py-2 text-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500">

    </input>
</div>
@error($name)
<div class='text-red-500'>{{$message}}</div>
@enderror


