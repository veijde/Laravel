<x-layout>

    <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($categories) == 0)
            <p>No categories found</p>
        @else
            @foreach ($categories as $category)
                <div class="row items-center mb-4">
                    <div class="col-md-6">
                        <h3 class="text-2xl">
                            {{$category->title}}
                        </h3>
                    </div>
                    @auth
                        @if(auth()->user()->admin)
                            <div class="col-md-2">
                                <form method="POST" action="/faq/categories/{{$category->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth                                    
                </div>
                @foreach ($category->faqitems as $faqitem)
                        <div class="text-lg mt-4">
                            <i class="fa-solid fa-question"></i>
                            <span>{{$faqitem->question}}</span><br>
                            <i class="fa-solid fa-exclamation"></i>
                            <span>{{$faqitem->answer}}</span>
                        </div>
                    @endforeach  
            @endforeach
        @endif
    </div>

</x-layout>
