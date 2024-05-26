@extends('commonlanding')
@section('content')

<section class="CategoriesSection" style="margin-bottom:150px;">
    <h1>{{ __('mycustom.allCategories')}}</h1>
    <div class="Categories">
    @foreach($sections as $section)
        <div class="card">
            <div class="overlay">
            @if($section->img)
                <img src="{{ asset('sectionImages/' . $section->img) }}" alt="section pic"/>

                @else
                <img src="{{asset('assets\img\sculptures.jpg')}}" alt="artist pic"/>
                @endif
               <div class="OverLay2">
            <p class="Content">{{$section->name}}</p>
        </div>
        </div>
        </div>
        @endforeach
</div>
</section>

@endsection