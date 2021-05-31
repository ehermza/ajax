$(function() 
{
    listarTareasTodas();

    function mostrar_coincidencias(res)
    {
        // console.log(res);
        // return;
        let js_res= JSON.parse(res);
        let _templ = "";

        js_res.forEach(element => {
            _templ += `<li>${element.name}</li>`;
            // console.log(element);
        });
        console.log(_templ);
        $('#container').html(_templ);

    }
    function borrar(id) {
        console.log(id);
    }

    function get_tareas(res)
    {
        let js_res= JSON.parse(res);
        let _templ = "";

        js_res.forEach(element => {
            _templ += `<tr>
            <td>${element.id}</td>
            <td>${element.name}</td>
            <td>${element.description}</td>
            <td><button id=${element.id} class="btn bt-borrar btn-danger">
                DELETE
                </button></td>
            </tr>`;
        });
        // console.log(_templ);
        $('#tb-tareas').html(_templ);

    }
    function listarTareasTodas(){
        $.ajax({
            url:'task-list.php',
            type: 'GET',
            success: function(res) {
                // console.log(res);
                get_tareas(res);
            }
        })
    
    }

    $('#search').keyup(function() {
        let strbuscar= (this.value);    //OK
        if(!strbuscar) 
            return;
        // console.log(buscar);
        $.ajax({
            url: "task-search.php",
            type: 'post',
            data: {buscar: strbuscar},
            success: function(res) {
                mostrar_coincidencias(res);
            }
        });

    })

    $('#tarea-form').submit(function(e){
        e.preventDefault();
        // let t = $('#name').val();
        //  console.log(t);//  return;
        const objeto = {
            name: $('#name').val(),
            description: $('#description').val()
        }
        $.post('task-add.php', objeto, function(res){
            console.log(res);
            listarTareasTodas();            
            $('#tarea-form').trigger('reset');
        });
    });

    $(document).on('click', '.bt-borrar', (e)=>{
        let objeto= e.target;
        console.log(objeto.id);
        if(objeto.id==null)
            return;
        $.post('task-delete.php', {idtask: objeto.id}, function(res){
            console.log(res);
            listarTareasTodas();            

        });
    })
});

