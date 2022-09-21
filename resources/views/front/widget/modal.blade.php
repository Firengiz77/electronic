<!-- The Modal -->


    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h1>{!! json_decode($product2['name'])->{app()->getLocale()} !!}</h1>
      <p> @foreach ($colors as $color )
         {!! json_decode($color['name'])->{app()->getLocale()} !!}
          
      @endforeach </p>

      <p> @foreach ($sizes as $size )
     {!! json_decode($size['size'])->{app()->getLocale()} !!}
         
     @endforeach </p>


    </div>