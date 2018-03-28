$(document).ready(function() {
	//tutaj wstawiamy kod JQuery, który zostanie uruchomiony
	//jak tylko dokument będzie gotowy do manipulowania jego elementami
	/**
		Własne metody do walidacji
	**/	
	$.validator.addMethod('phonenumber', function (value, element) {
		return /^\d+$/.test(value);
		}, 'Numer telefonu musi składać się z samych cyfr');

    $('#KlientForm').validate({
		//reguły dla pola formularza
        rules: {
			//atrybut name: {reguły}
			Imie: {
				//reguły - kolejność ma znaczenia
                required: true,
				minlength: 2,
				maxlength: 50				
            },
			Nazwisko: {
				//reguły - kolejność ma znaczenia
                required: true,
				minlength: 2,
				maxlength: 50				
            },
            NazwaFirmy: {
				//reguły
                required: false,
				minlength: 4            
            },
			Telefon: {
				//reguły
                required: true,
				phonenumber: true,
				minlength: 9				              
            },
			Email: {
				//reguły
                required: false,
				minlength: 4,
				email: true                
				
            },
            nip: {
				//reguły
				minlength: 11,	
				maxlength: 11				              
            }				
        },
		//komunikaty dla pola formularza
		messages: {
			name: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
			},
			email: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Adres email musi zawierać minimum {0} znaki!"),
				email: 'Wpisz poprawny adres email',
			},
			phone: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Numer telefonu musi skłądać się z miniminum {0} znaków!")
			},
			price: {
				maxlength: jQuery.validator.format("Maksymalna ilość znaków wynosi {0}!"),				
			}			
		},			
        highlight: function(element, errorClass, validClass) {
            //znajdz najbliższy element form-group
            $(element).closest('.form-group').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'has-error',
		validClass: 'has-success',
		/**niestandradowa reakcja na kliknięcie submit,
		   gdy nie ma błędów,
		   blokuje standradową akcję
		**/
		/*submitHandler: function(form) {
			alert('reakcja na subit');
		},*/
		/**
			niestadardowa rekacja na kliknięcie submit,
			gdy są błędy,
			blokuje standradową akcję
		**/
		invalidHandler: function(event, validator) {
			// 'this' to referencja do form
			var errors = validator.numberOfInvalids();
			if (errors) {
			  var message = errors == 1
				? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
				: 'Nie wypełniono poprawnie ' + errors + ' pól. Zostały podświetlone';
			  $("div.alert-danger").html(message);
			  $("div.alert-danger").show();
			} else {
			  $("div.alert-danger").hide();
			}
		},
	});
});