$(document).ready(function() {

    //caso 1 (elegir cual usar)
    // $('#cantidad').on('input', function() {
    //     var cantidad = $(this).val();
    //     var alturasContainer = $('#alturas-container');
    //     alturasContainer.empty();

    //     for (var i = 1; i <= cantidad; i++) {
    //         alturasContainer.append(`
    //             <div class="mb-3">
    //                 <label for="altura_${i}" class="form-label">Altura de la pirámide ${i}</label>
    //                 <input type="number" name="altura_${i}" id="altura_${i}" class="form-control" required>
    //             </div>
    //         `);
    //     }
    // });

    //caso 2 (elegir cual usar)
    $('#btn').click(function() {
        var alturasContainer = $('#alturas-container');
        let i = alturasContainer.find('.mb-3').length;
        alturasContainer.append(`
            <div class="mb-3 remove_${i}">
                <label for="altura_${i}" class="form-label">Altura de la pirámide</label>
                <input type="number" name="altura[]" id="altura_${i}" class="form-control" required>
            </div>
        `);
        $("#btnsubmit").removeClass("d-none");
        $("#btnRemove").parent().removeClass("d-none");
    })

    // $('#btnRemove').click(function() {
    //     var alturasContainer = $('#alturas-container');
    //     let i = alturasContainer.find('.mb-3').length;
    //     $(`#altura_${i - 1}`).parent().remove();
    // })
    
    $('#btnRemove').click(function() {
        var alturasContainer = $('#alturas-container');
        let ultimo = alturasContainer.find('.mb-3').length - 1;
        $(`.remove_${ultimo}`).remove();
        if (ultimo == 0) {
            $("#btnsubmit").addClass("d-none");
            $("#btnRemove").parent().addClass("d-none");
        }
    })

    // temperaturas
    
    // $(".grados").removeClass("btn-group");
    // $(".fahrenheit").removeClass("btn-group");
    
    // $('#grados').click(function() {
    //     $('.fahrenheit').addClass("d-none");
    //     $(".grados").addClass("btn-group");
    //     $("#cerrargrados").removeClass("d-none");
    
    //     if ($('#temp-container .grados').length === 0) {
    //         var grados = $('#temp-container');
    //         grados.append(`
    //             <div class="mb-3 grados campo-adic">
    //                 <label for="grados" class="form-label">Celsius a Fahrenheit.</label>
    //                 <input type="number" name="grados" id="grados" class="form-control" required>
    //             </div>
    //         `);
    //     }
    //     $("#btnsubmit").removeClass("d-none");
    // });

    // $('#fahrenheit').click(function() {
    //     $('.grados').addClass("d-none")
    //     $(".fahrenheit").addClass("btn-group");
    //     $("#cerrarfahrenheit").removeClass("d-none");

    //     if ($('#temp-container .fahrenheit').length === 0) {
    //     var grados = $('#temp-container');
    //     grados.append(`
    //         <div class="mb-3 fahrenheit campo-adic">
    //             <label for="fahrenheit" class="form-label">Fahrenheit a Celsius.</label>
    //             <input type="number" name="fahrenheit" id="fahrenheit" class="form-control" required>
    //         </div>
    //         `);
    //     }
    //     $("#btnsubmit").removeClass("d-none");
        
    // })

    // $('.btn-cerrar').click(function() {
    //     $(".fahrenheit").removeClass("d-none");
    //     $(".grados").removeClass("d-none");
    //     $("#cerrargrados").addClass("d-none");
    //     $("#cerrarfahrenheit").addClass("d-none");
    //     $(".btn-group").removeClass("btn-group");
    //     $(".campo-adic").remove();
    //     $("#btnsubmit").addClass("d-none");
    // })

    
});

