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
