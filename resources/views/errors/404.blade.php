@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="batman-container">
      {{-- Segun ChatGPT esto es un murciélago: --}}
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="batman-logo">
        <path d="M50,5C28.1,5,11,19.2,11,26.5c0,7.4,5.7,13.5,13.7,15.6c-1.2,3.4-1.7,7.1-1.1,10.7c2.2,0.6,4.5,1,6.8,1 c4.5,0,8.7-2,12.2-4.7c3.5,2.7,7.7,4.7,12.2,4.7c2.3,0,4.6-0.4,6.8-1c0.6-3.6,0.1-7.3-1.1-10.7C83.3,40,89,34,89,26.5 C89,19.2,71.9,5,50,5z M50,35c-4.1,0-8.1-2.1-10.4-5.5C38.6,28,42.8,22,50,22s11.4,6,10.4,7.5C58.1,32.9,54.1,35,50,35z M50,18 c-5.3,0-10.1,3.1-12.5,7.6C37.2,25.1,43.6,22,50,22s12.8,3.1,12.5,3.6C60.1,21.1,55.3,18,50,18z"/>
      </svg>
      
      <div class="message">
        <h1 class="notfound">404 - Not Found</h1>
        <p class="description">The Batcave is closed for repairs. Sorry, this page couldn't be found.</p>
      </div>
    </div>
  </div>
@endsection
