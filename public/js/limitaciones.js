window.addEventListener("load", function() {
    document.getElementById("container_carga").classList.toggle('loader2');
});

const caracter_mayus = (input) => {
    $(`#${input}`).on('input', () => {
        // $(`[name=${input}]`).val();
		$(`#${input}`).val().toUpperCase()
    });
}

const caracter_minus = (input) => {
    $(`#${input}`).on('input', () => {
        $(`#${input}`).val($(`#${input}]`).val().toLowerCase());
	});
}
const caracter_numeros = (input) => {
	$(`#${input}`).on('input', () => {
        $(`#${input}`).val($(`#${input}`).val().replace(/[^0-9]/g, ''));
		
	});
}
const caracter_letras = (input) => {
    $(`#${input}`).on('input', () => {
        $(`#${input}`).val($(`#${input}`).val().replace(/([^a-zA-Záéíóú\s])/i, ''));
	});
}
const caracter_varios = (input) => {
    $(`#${input}`).on('input', () => {
        $(`#${input}`).val($(`#${input}`).val().replace(/([^A-Za-z0-9ñÑ])/g, ''));
	});
}
const primer_mayuscula = (input) => {
	$(`#${input}`).on('input', ()=> {
		$(`#${input}`).val($(`#${input}`).val().charAt(0).toUpperCase() + $(`#${input}`).val().slice(1));
	});
}

// seccion nuevo y editar admin
caracter_numeros('numeroCelular');
primer_mayuscula('usuario');
primer_mayuscula('nombre');
caracter_letras('nombre');
primer_mayuscula('paterno');
caracter_letras('paterno');
primer_mayuscula('materno');
caracter_letras('materno');

// $('.disabledCheckboxes').removeAttr("disabled");
$('#actividad').on('change',()=>{
    $('#credito').removeAttr("disabled");
})
$('#credito').on('change',()=>{
    $('#nombre_evento').removeAttr("disabled");
    $('#archivo').removeAttr("disabled");
    $('#horas').removeAttr("disabled")
    let credito = $('#credito').val()
    if (credito == 1) {
        $('#civicos').removeAttr('hidden');
        $('#deportivos').prop('hidden',true);
        $('#culturales').prop('hidden',true);
        let horasE = $('#horasCivicas').val()
        console.log(horasE);
        if( horasE == 0){
            $('#horas').prop('disabled',true)
        }
    }else if(credito == 2){ 
        let horasEs = $('#horasDeportivas').val()
        console.log(horasEs);
        $('#civicos').prop('hidden',true);
        $('#deportivos').removeAttr('hidden');
        $('#culturales').prop('hidden',true);
        if( horasEs == 0){
            $('#horas').prop('disabled',true)
        }
    }else{
        let horasEsa = $('#horasCulturales').val()
        console.log(horasEsa);
        $('#civicos').prop('hidden',true);
        $('#deportivos').prop('hidden',true);
        $('#culturales').removeAttr('hidden');
        if( horasEsa == 0){
            $('#horas').prop('disabled',true)
        }
    }
   ;
});