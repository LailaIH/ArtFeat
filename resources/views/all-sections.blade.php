@extends('commonlanding2')
@section('content')

<div class="pageHeader" >
      <img src="/assets/img/termsconditions.svg" />
      <div class="overLay">
        <img src="/assets/img/shadowBlue.svg" />
      </div>
      <div class="header">
      @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif



    @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif
        <h1>{{ __('mycustom.allCategories')}}</h1>
      </div>
    </div>

<section class="CategoriesSection" style="margin-bottom:150px;">

<style>
        .image-container {
            position: relative;
            display: inline-block;
            width: 100%; /* Adjust as needed */
            max-width: 600px; /* Adjust as needed */
        }
        .image-container img {
            width: 100%;
            height: auto;
            display: block;
        }
        .image-container .Content {
            position: absolute;
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Center the element */
            color: white;
            background: rgba(0, 0, 0, 0.6); /* Background color with transparency */
            padding: 10px; /* Adjust as needed */
            border-radius: 20px; /* Optional: for rounded corners */
            font-size: 16.5px !important; /* Adjust as needed */
            text-align: center; /* Center the text */
        }
    </style>
  
    <div class="Categories">
    @foreach($sections as $section)
        <div class="card" data-bs-toggle="modal" data-bs-target="#sectionModal{{ $section->id }}">
            <div class="overlay">
            @if($section->img)
                <div class="image-container">
                    <img src="{{ asset('sectionImages/' . $section->img) }}" alt="section pic"/>
                    <p class="Content text-white">{{ $section->name }}</p>
                </div>
                @else
                <div class="image-container">
                <img src="{{asset('assets\img\sculptures.jpg')}}" alt="artist pic"/>
                <p class="Content text-white">{{ $section->name }}</p>
                </div>
                @endif
               <div class="OverLay2">
            <p class="Content">{{$section->name}}</p>
        </div>
        </div>
        </div>
 <!-- Modal -->
 <div class="modal fade" id="sectionModal{{ $section->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{$section->id}}" aria-hidden="true">
                            <style>
                        .image-container {
                            width: 100%; /* Ensures the container takes full width */
                            max-width: 300px; /* Set a fixed max-width for consistency */
                            height: auto;
                        }

                        .section-img {
                            width: 100%;
                            height: auto;
                            object-fit: cover; /* Ensures the image covers the container while maintaining aspect ratio */
                            display: block; /* Removes any inline-block space */
                            border-radius: 5px; /* Optional: Add some rounding to the corners */
                        }
                        .text-container {
                                text-align: left;
                            }

                            /* If the document is RTL, align text to the right */
                            html[dir="rtl"] .text-container {
                                text-align: right;
                            }
                                .text-container label {
                                    font-weight: bold; /* Makes the labels bold for better distinction */
                                }

                                .text-container div {
                                    margin-bottom: 10px; /* Adds some space between each text block */
                                }

                            </style>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('mycustom.sectionInfo')}}</h1>
            </div>
            <div class="modal-body">
               <div class="row">

                <div class="col mb-3">
                    <div class="image-container">
                    <img src="{{ asset('sectionImages/' . $section->img) }}" class="section-img" />
                    </div>
                </div>
                <div class="col mt-4 text-container">
                    <div>
                        <label for="recipient-name">{{__('mycustom.name')}}:</label>
                       {{$section->name}}
                       
                    </div>
                    <div>
                        <label for="message-text">{{__('mycustom.description')}}:</label>
                        @php
                        $words = explode(' ', $section->description);
                       $sectionDes = implode(' ', array_slice($words, 0, 14)).'...';
                         @endphp
                        {{$sectionDes}}
                    </div>
                </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('mycustom.close')}}</button>
                <a href="{{route('singleSection',$section->id)}}" style="text-decoration: none;" class="btn btn-primary">{{__('mycustom.seeDetails')}}</a>

            </div>
        </div>
    </div>
</div>








        @endforeach
</div>
</section>



<script>
   document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const modalId = card.getAttribute('data-bs-target');
            // Show modal on card hover
            card.addEventListener('mouseenter', function () {
                $(modalId).modal('show');
            });

            // Hide modal on card mouseleave
            card.addEventListener('mouseleave', function () {
                $(modalId).modal('hide');
            });

            // Hide modal on modal close button click
            $(modalId).find('.btn-close').on('click', function () {
                $(modalId).modal('hide');
            });
        });
    });
</script>

@endsection