<!DOCTYPE html>
<HTML>
	<HEAD>
		<META CHARSET="UTF-8" />
		<TITLE> Formulário de Cadastro </TITLE>
	</HEAD>
	<STYLE>
		*{
			font-family:Bookman, URW Bookman L, serif;
		}
		
		INPUT[type=text], INPUT[type=email],INPUT[type=date] {
			font-family:Bookman, URW Bookman L, serif;
			font-size: 12px;
			width: 95%;
			padding: 6px 10px;
			margin: 4px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			
		}

		.btn {
			font-family: Bookman, URW Bookman L, serif;
			font-size: 15px;
			width: 15%;
			background-color: #EE9572;
			color: black;
			padding: 10px 10px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			
		}

		.btn :hover {
			background-color: #8B4C39;
		}
		
		.btn {
			text-align: center;
		}

		.formulario {
			float: left;
			border-radius: 5px;
			background-color: #FFEFDB;
			padding: 10px;
			width: 580px;
			
		}
		.tabela {
			float: right;
			border-radius: 5px;
			background-color: #FFEFDB;
			padding: 10px;
			width: 700px;
			
		}
		TABLE {
			font-family: Bookman, URW Bookman L, serif;
			font-size: 15px;
			border-collapse: collapse;
			width: 100%;
		}

		TD, TH {
			border: 1px solid #8B5742;
			text-align: center;
			padding: 8px;
		}
		
		TR:nth-child(even) {
			background-color: #EE9572;
		}
		
		H1, H2 {
			font-family: Bookman, URW Bookman L, serif;
			text-align: center;
		}
	</STYLE>
	<BODY>
	<FORM method= "POST" action="/cliente" >
		
		@csrf 
		<INPUT type="hidden" id="id" name="id" value="{{ $cliente->id }}"/>
		
		<DIV class="formulario"> 
		
			<H1> Cadastro de Clientes </H1>
			
			Nome <INPUT type="text" name="nome" value="{{ $cliente->nome }}" /> <br /> <br />
			CPF <INPUT type="text" name="cpf" value="{{ $cliente->cpf }}" /> <br /> <br />
			E-mail <INPUT type="email" name="email" value="{{ $cliente->email }}" /> <br /> <br />
			Telefone <INPUT type="text" name="telefone" value="{{ $cliente->telefone }}" /> <br /> <br />
			Data de Nascimento <INPUT type="date" name="data_nascimento" value="{{ $cliente->data_nascimento }}"> <br /> <br />
			
		<DIV >
			<BUTTON class="btn" type="submit" >SALVAR</BUTTON>
			<a href="/cliente"><button style="background: #EE9572; border-radius: 4px;
					padding: 10px 10px; cursor: pointer; color: black; border: none; font-size: 15px; text-align: center;">NOVO</button></a>
		</DIV>
	</FORM>	
		</DIV>		
		<DIV class="tabela">
			<H2>Lista de Clientes</H2>	

			<TABLE>
			<TR>
				<TH>Nome</TH>
				<TH>E-mail</TH>
				<TH>Editar</TH>
				<TH>Excluir</TH>
			</TR>
			
			<TBODY>
				@Foreach($clientes as $cliente)
			<TR>
				<TD>{{ $cliente->nome }}</TD>
				<TD>{{ $cliente->email }}</TD>
				<TD>
					<a href="/cliente/{{ $cliente->id }}/edit"><button style="background: #EE9572; border-radius: 2px;
					padding: 5px; cursor: pointer; color: black; border: none; font-size: 12px;">EDITAR</button></a>
				</TD>
				<TD>
					<FORM action="/cliente/{{ $cliente->id }}"
					method="POST">
						@csrf
						<INPUT type="hidden" name="_method" value="DELETE" />
						<BUTTON type="submit"style="background: #EE9572; border-radius: 2px;
					padding: 5px; cursor: pointer; color: black; border: none; font-size: 12px;">EXCLUIR</BUTTON>
					</FORM>	
				
				</TD>
			</TR>
				@endforeach
			</TBODY>
			</TABLE>
		</DIV>
	</BODY>
</HTML>