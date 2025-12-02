@extends('site.layouts.app')
@push('head')
    <link rel="stylesheet" href="/webcoder/assets/css/style.min.css">
    <style>
        .form-group{
            display:flex;
            align-items:center; 
            gap:30px;
        }
        .input__box{
            display:flex;
            align-items:center;
            gap:5px;
            cursor:pointer;
        }
        .input__box label{
            cursor:pointer;
        }
        .adress__box{
            display:none;
        }
    </style>
@endpush

@section('content')
    <main class="main">
        <div class="container">
            <div class="row" id="cartBox">
                @include('site.partials._cart',['products'=>$products])
            </div>
        </div>
        <div class="mb-6"></div>
    </main>
@endsection

@push('foot')
    <script>
        let adressInput=document.querySelector('.adress__box');
        let adressBtn=document.querySelectorAll('.adress__btn  input');
       
        adressBtn.forEach((btn)=>{
            btn.addEventListener("change",function(){
               
                 adressInput.style.display= this.matches("#deliveryFromAddress") ?"block":"none";
            })
        })
    </script>
@endpush
