
//let uri="http://127.0.0.1:8000/"; ->esta ruta se usa si corremos el programa atravez del comando php artisan serve
let uri="http://localhost/codigo_reutilizable_laravel/laravelexcel_ajax/public/"; //-> dependiendo de la maquina donde se instale se cambia esta ruta 

function cargar(){
    let datatable=$('#tablaPersona')
    let route=uri+"persona/listing";
    datatable.empty();
    $.ajax({

        type:"GET",
        url:route,
        success:function(msj){

            msj.forEach(function(clave,valor){
                datatable.append(`  <tr>
                                        <th scope="row">${clave.id}</th>
                                        <td>V-${clave.cedula}</td>
                                        <td>${clave.nombre}</td>
                                        <td>${clave.apellido}</td>
                                        <td>${clave.estado}</td>
                                        <td>${clave.unidad}</td>
                                        <td>${clave.votacion}</td>
                                        <td>
                                            <button class="btn btn-success" value="${clave.id}" onclick="mostrar(this)">EDITAR</button>
                                        </td>
                                    </tr>    
                                `);
            });
        }
    });

}

function crear(){

    $('form[id="personacreate"]').submit(function(e){

        var formData = new FormData(this);
  			formData.append('_token', $('input[name=_token]').val());
        $.ajax({
            type:"POST",
            url:uri+"persona/import",
            dataType:'json',
		    contentType: false,
		    processData: false,
            data:formData,
            beforeSend:function(){

                $('button[form="personacreate"]').empty().append('Importando...');
            },
            success:function(msj){
                
                $('#modalCreatePersona').modal('hide')
                $('button[form="personacreate"]').empty().append('Importar');
                cargar();
            }
        });
        event.preventDefault();
        })
    
        $('#botoncerrarmodal').on('click', function (e) {
    
            $('div[class="invalid-feedback"]').empty();
            $('#personacreate input[type="text"]').val('');
            $('input[type="text"]').removeClass('is-invalid');
        });
}

function actualizar(){

    $('form[id="personaedit"]').on('submit',function(e){

        let datos=$(this).serialize();
        let token=$('meta[name="csrf-token"]').attr('content')
        let id=$('#personaedit input[name="id"]').val();
        let route=uri+"persona/"+id;

        $.ajax({
            type:"PUT",
            headers: {'X-CSRF-TOKEN': token},
            url:route,
            dataType:'json',
            data:datos,
            beforeSend:function(){
                
                $('button[form="personaedit"]').empty().append('Actualizando...');
                $('div[class="invalid-feedback"]').empty();
                $('input[type="text"]').removeClass('is-invalid');
            },  
            success:function(msj){
                $('button[form="personaedit"]').empty().append('Actualizar');
                $('#modalEditPersona').modal('hide')
                cargar();
            }
        });
        event.preventDefault();
    })
}

function mostrar(btn){

    let route=uri+"persona/"+btn.value+"/edit";

    $.get( route, function(data) {
        
       
        $('#personaedit input[name="cedula"]').val(data.votacion);
        $('#personaedit input[name="id"]').val(data.id);
        $('#modalEditPersona').modal('show');
    });
    
}

function busqueda(){

    $('form[id="form-busqueda"]').on('submit',function(e){

            let datos=$(this).serialize(),
            route=uri+"persona/busqueda",
            token=$('meta[name="csrf-token"]').attr('content'),
            datatable=$('#tablaPersona');


        $.ajax({
            type:"POST",
            headers: {'X-CSRF-TOKEN': token},
            url:route,
            dataType:'json',
            data:datos, 
            success:function(obj){
                datatable.empty()
                var obj=obj;
                $.each(obj, function(index,clave ){
                    datatable.append(`  <tr>
                                            <th scope="row">${clave.id}</th>
                                            <td>V-${clave.cedula}</td>
                                            <td>${clave.nombre}</td>
                                            <td>${clave.apellido}</td>
                                            <td>${clave.estado}</td>
                                            <td>${clave.unidad}</td>
                                            <td>${clave.votacion}</td>
                                            <td>
                                                <button class="btn btn-success" value="${clave.id}" onclick="mostrar(this)">EDITAR</button>
                                            </td>
                                        </tr>     
                                    `);
                })
            }
        });
    event.preventDefault();
    })

}

function eliminar(btn){

let route=uri+"persona/"+btn.value;
let token=$('meta[name="csrf-token"]').attr('content')


$.ajax({

    type:"DELETE",
    url:route,
    headers: {'X-CSRF-TOKEN': token},
    dataType:'json',
    success:function(msj){

        cargar()
    }
})


}