@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br><br>
               <table class="table" >
                       @foreach($lista as $list)
                       <tr>
                           <td>
                               <a href="#" class="business" data-id="{{ $list->id }}" data-group="{{ $list->grupo_id }}" data-description="{{ $list->descripcion }}">
                                   {{ $list->descripcion }}
                               </a>
                           </td>
                       </tr>
                       @endforeach
               </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.business').unbind().bind('click',function(){
                $.ajax({
                    url: '{{ route('busine_select') }}',
                    data: {
                        id: $(this).attr('data-id'),
                        group_id : $(this).attr('data-group'),
                        description: $(this).attr('data-description')
                    },
                    type: 'GET',
                    success: function(data){
                        console.log(data);
                        window.location="{{ route('auth.index') }}";
                    },error:function(e){
                        alert('Ocurrio un error ');

                    }
                });

            });
        });
    </script>
@endsection
