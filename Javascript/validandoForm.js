$( document ).ready( function () {

	$( "#formularioCPF" ).validate( {
		rules: {
			nome: {
            	required: true,
            	minlength: 2
          	},
			sexo: "required",
          	cep: "required",
			rua: "required",
			bairro: "required",
			cidade: "required",
			uf: "required",
			numero: "required",
			telefone: {
            	minlength: 14,
				maxlength: 14
          	},
			celular: {
            	required: true,
				minlength: 14,
				maxlength: 15
          	},		
			cpf: {
				required: true,
				cpf: true
			},
			usuario: {
            	required: true,
            	minlength: 5,
          	},
			senha: {
            	required: true,
            	minlength: 6,
          	},
			senha2: {
				required: true,
				equalTo: "#senha_principal"
          	},
		},
		messages: {
			nome: {
            	required: "O campo é obrigatório.",
            	minlength: "O campo deve conter no mínimo 2 caracteres."
          	},
			sexo: "O campo é obrigatório.",
			cep: "O campo é obrigatório.",
			rua: "O campo é obrigatório.",
			bairro: "O campo é obrigatório.",
			cidade: "O campo é obrigatório.",
			estado: "O campo é obrigatório.",
			numero: "O campo é obrigatório.",
			telefone: {
				minlength: "O telefone deve conter 14 caracteres com o DDD.",
				maxlength: "O telefone deve conter 14 caracteres com o DDD."
			},
			celular: {
				required: "O campo é obrigatório.",
				minlength: "O celular deve conter no mínimo 14 caracteres com o DDD.",
				maxlength: "O celular deve conter no máximo 15 caracteres com o DDD."
			},
			cpf: {
				required: "O campo é obrigatório.",
				cpf: "CPF inválido"
			},
			usuario: {
				required: "O campo é obrigatório.",
				minlength: "Seu usuário deve conter no mínimo 5 caracteres."
			},
			senha: {
				required: "O campo é obrigatório.",
				minlength: "Sua senha deve conter no mínimo 6 caracteres."
			},
			senha2: {
				required: "O campo é obrigatório.",				
				equalTo: "As senhas devem ser iguais."
			},
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			// Add `has-feedback` class to the parent div.form-group
			// in order to add icons to inputs
			element.parents( ".validar" ).addClass( "has-feedback" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}

			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !element.next( "span" )[ 0 ] ) {
				$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
			}
		},
		success: function ( label, element ) {
			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !$( element ).next( "span" )[ 0 ] ) {
				$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".validar" ).addClass( "has-error" ).removeClass( "has-success" );
			$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
		},
		unhighlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".validar" ).addClass( "has-success" ).removeClass( "has-error" );
			$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
		}
	} );
} );


$( document ).ready( function () {

	$( "#formularioCNPJ-" ).validate( {
		rules: {			
			usuario: {
            	required: true,
            	minlength: 5,
          	},
			senha: {
            	required: true,
            	minlength: 6,
          	},
			senha2: {
				required: true,
				equalTo: "#senha_principal"
          	},
		},
		messages: {				
			usuario: {
				required: "O campo é obrigatório.",
				minlength: "Seu usuário deve conter no mínimo 5 caracteres."
			},
			senha: {
				required: "O campo é obrigatório.",
				minlength: "Sua senha deve conter no mínimo 6 caracteres."
			},
			senha2: {
				required: "O campo é obrigatório.",				
				equalTo: "As senhas devem ser iguais."
			},
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			// Add `has-feedback` class to the parent div.form-group
			// in order to add icons to inputs
			element.parents( ".validar" ).addClass( "has-feedback" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}

			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !element.next( "span" )[ 0 ] ) {
				$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
			}
		},
		success: function ( label, element ) {
			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !$( element ).next( "span" )[ 0 ] ) {
				$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".validar" ).addClass( "has-error" ).removeClass( "has-success" );
			$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
		},
		unhighlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".validar" ).addClass( "has-success" ).removeClass( "has-error" );
			$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
		}
	} );
} );