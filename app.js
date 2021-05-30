$(function() {
    
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
        });
    });
});

