with(document.registro){	// acá va el name="registro" que aparece en el registro.php
	onsubmit = function(e){
		e.preventDefault();
		ok = true;

		if (ok && (!(/^([0-9]+){7,12}$/.test(telefono.value)))){	// Solo acepta numeros. El telefono tiene que tener 7 o más digitos
			ok=false;
			alert("Teléfono inválido");
			telefono.focus();
		}
		if(ok){ submit(); }
	}
}