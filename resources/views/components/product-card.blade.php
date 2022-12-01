@props(['product'])
{{-- <div class="flex flex-col items-start justify-center border border-gray-300 shadow-xl rounded-lg">
    <img class="w-full rounded-tl-lg rounded-tr-lg" src="{{ Storage::url($product->images->first()->url) }}">
    <p class="text-xl px-4 mt-3 font-bold">{{ $product->name }}</p>
    <p class="px-4 mt-3">
        {{ Str::limit($product->description,100,'...') }}
    </p>
    <button class="my-3 mx-4 px-2 py-1 rounded text-sm bg-primary hover:bg-primary-dark text-gray-100 transition duration-150">Read More</button>
</div> --}}
<li class="glide__slide">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <article>
            <figure>
                <img class="h-48 w-full object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
            </figure>
            <div class="py-4 px-6">
                <h1 class="text-lg font-bold  text-center">
                    <a href="">{{Str::limit($product->name,20)}}</a>
                </h1>
                <p class="font-bold text-gray-700 text-center">S/. {{$product->price}}</p>
            </div>
        </article>
    </div>
</li>
