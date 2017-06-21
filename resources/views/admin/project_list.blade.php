


                        <ul class="tree">
                            @foreach($projects as $pro)
                            <li>
                                <input type="checkbox" id="p-{{$pro['proyectos']['id']}}" />
                                <label class="tree_label" data-type="1" for="p-{{$pro['proyectos']['id']}}" data-id="{{$pro['proyectos']['id']}}">
                                    <i class="fa fa-suitcase " aria-hidden="true"></i> {{ $pro['proyectos']['name'] }}
                                </label>
                                @foreach($pro['sub_proyectos'] as $sup)
                                    <ul>
                                        <li>
                                            <input type="checkbox"  id="s-{{ $sup['id'] }}" />
                                            <label for="s-{{ $sup['id'] }}" data-type="2" class="tree_label" data-id="{{ $sup['id'] }}">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>   {{ $sup['name'] }}
                                            </label>
                                            @foreach($pro['travel'] as $tra)
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-plane" style="color: #2C398E;" aria-hidden="true"></i>
                                                        <span class="tree_label" data-type="3" data-id="{{ $tra['id'] }}" style="cursor: pointer;">{{ $tra['name'] }}</span>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                             @endforeach
                        </ul>

            <div id="script">
                <script>
                    function isNumber(n) {
                        return !isNaN(parseFloat(n)) && isFinite(n);
                    }

                    function setFontSize(el) {
                        var fontSize = el.val();

                        if ( isNumber(fontSize) && fontSize >= 0.5 ) {
                            $('body').css({ fontSize: fontSize + 'em' });
                        } else if ( fontSize ) {
                            el.val('1');
                            $('body').css({ fontSize: '1em' });
                        }
                    }

                    $(function() {
                        $('#fontSize')
                            .bind('change', function(){ setFontSize($(this)); })
                            .bind('keyup', function(e){
                                if (e.keyCode == 27) {
                                    $(this).val('1');
                                    $('body').css({ fontSize: '1em' });
                                } else {
                                    setFontSize($(this));
                                }
                            });

                        $(window)
                            .bind('keyup', function(e){
                                if (e.keyCode == 27) {
                                    $('#fontSize').val('1');
                                    $('body').css({ fontSize: '1em' });
                                }
                            });

                    });

                    $(document).ready(function(){
                        $('.add_project').unbind().bind('click', function(){
                            alert('add project');
                            $('#form_id').html();
                            $html ="";
                            $html += formProject();
                            $html += $('#script').html();


                            $('#form_id').html($html);
                        });

                        $('.save').unbind().bind('click',function(){
                            $data_type = $(this).attr('data-type');

                            switch(parseInt($data_type)){
                                case 1:
                                    $route = "{{ url('project/create') }}";
                                    break;
                                case 2:
                                    $route = "{{ url('sub_project/') }}"+"/"+$id;
                                    break;
                                case 3:
                                    $route = "{{ url('travel/') }}"+"/"+$id;
                                    break;
                                default:
                            }
                            alert($route);
                            $.ajax({
                                url : $route,
                                type:'GET',
                                data:$('#form_id').serialize(),
                                dataType: 'json',
                                success:function(data){
                                    console.log('este es el dat save');
                                    console.log(data);

                                },error:function(data){

                                }
                            });

                        });


                        $('.tree_label').unbind().bind('click', function(){
                            $data_type = $(this).attr('data-type');
                            $id = $(this).attr('data-id');
                            $route="";
                            switch(parseInt($data_type)){
                                case 1:
                                    $route = "{{ url('project/') }}"+"/"+$id;
                                    break;
                                case 2:
                                    $route = "{{ url('sub_project/') }}"+"/"+$id;
                                    break;
                                case 3:
                                    $route = "{{ url('travel/') }}"+"/"+$id;
                                    break;
                                default:
                            }

                            $.ajax({
                                url : $route,
                                type:'GET',
                                dataType: 'json',
                                success:function(data){
                                    switch(parseInt($data_type)){
                                        case 1:
                                             formAutoProject(data);
                                            break;
                                        case 2:
                                            $route = "{{ url('sub_project/') }}"+"/"+$id;
                                            break;
                                        case 3:
                                            $route = "{{ url('travel/') }}"+"/"+$id;
                                            break;
                                        default:
                                    }

                                },error:function(data){

                                }
                            });



                        });
                    });

                    function formAutoProject(data){

                        $('#txt_id').val(data.id);
                        $('#txt_pro_name').val(data.name);
                        $('#txt_pro_descr').val(data.description);
                        $('#txt_pro_activo').val();
                        $('[activo=options]').val( data.active );
                        $('#user_name').text(data.use);
                        $('#btn-plus').removeClass('hidden');
                        $('#form-auto').removeClass('hidden');
                        /* use*/
                        $("#txt_pro_activo option[value="+data.active+" ]").attr("selected", true);
                    }

                    function formProject(){
                        $html='';
                        $html +='{{ Form::open(['id'=>'form_id']) }}'+
                            "<div class='form-group'>" +
                                "<label class='control-label'>Nombre:</label>" +
                                "<input type='text' name='id' id='txt_id'>" +
                                "<input type='text' name='type' id='txt_type' value='1'>"+
                                '{{ Form::text('nombre','',['class' => 'form-control','id'=>'txt_pro_name']) }}'+
                                "</div>" +
                                "<div class='form-group'>" +
                                "<label class='control-label'>Descripcion</label>"+
                                '{{ Form::textarea('descripcion','',['class' => 'form-control','id'=>'txt_pro_descr']) }}'+
                                "<div class='form-group'> " +
                                "<label class='control-label'>Activo</label>"+
                                '{{ Form::select('activo', array('1' => 'Activo', '0' => 'Inactivo'), 1,['class' => 'form-control','id'=>'txt_pro_activo']) }}'+
                                "</div>" +
                                "<div class='form-group'>" +
                                "<input type='button' data-type='1' value='Guardar' class='save btn btn-sm btn-success'>" +
                                "<button  type='button' data-type='1' id='btn-plus' class='hidden btn btn-default pull-right'>+</button>" +
                                "</div>"+
                                '{{ Form::close() }}';
                            return $html;
                    }

                    function listProject (){
                        $.ajax({
                            url : "{{ route('list_project') }} ",
                            type:'GET',
                            dataType: 'json',
                            success:function(data){

                            },error:function(data){

                            }
                        });
                    }
                </script>
            </div>


