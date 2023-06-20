create database GetDev_Web;
use GetDev_Web;

#Creates
create table Linguagem
(
	id_Linguagem int not null auto_increment primary key,
	nome_Linguagem varchar(25) not null unique ,
	status_Linguagem varchar(25) not null ,
	obs_Linguagem varchar(255) null
);

create table Usuario
(
	id_Usuario int not null auto_increment primary key,
	nome_Usuario varchar(50) not null ,
	celular_Usuario char(14) not null ,
	email_Usuario varchar(100) not null unique ,
	usuario_Usuario varchar(25) not null unique ,
	senha_Usuario varchar(25) not null ,
	descricao_Usuario varchar(255) null ,
	nascimento_Usuario datetime not null ,
	cadastro_Usuario timestamp not null ,
	avaliacao_Usuario int default 0 null ,
	projRealizado_Usuario int default 0 null ,
	img_Usuario longblob null ,
	curriculo_Usuario longblob null ,
	status_Usuario varchar(25) not null ,
	obs_Usuario varchar(255) null
);

create table UsuarioLinguagem
(
	id_UsuarioLinguagem int not null auto_increment primary key,
	id_Usuario_UsuarioLinguagem int not null ,
	id_Linguagem_UsuarioLinguagem int not null ,
	status_UsuarioLinguagem varchar(25) not null ,
	obs_UsuarioLinguagem varchar(255) null,
    
    constraint Fk_Id_Usuario_UsuarioLinguagem foreign key (id_Usuario_UsuarioLinguagem) references Usuario(id_Usuario),
    constraint Fk_Id_Linguagem_UsuarioLinguagem foreign key (id_Linguagem_UsuarioLinguagem) references Linguagem(id_Linguagem)
);

create table Projeto
(
	id_Projeto int not null auto_increment primary key,
	id_Usuario_Projeto int not null ,
	nome_Projeto varchar(50) not null ,
	link_Projeto varchar(50) not null ,
	img_Projeto longblob not null ,
	status_Projeto varchar(25) not null ,
	obs_Projeto varchar(255) null,
    
    constraint Fk_Id_Usuario_Projeto foreign key (id_Usuario_Projeto) references Usuario(id_Usuario)
);

create table Servico
(
	id_Servico int not null auto_increment primary key,
	id_Usuario_Servico int not null ,
	nome_Servico varchar(50) not null ,
	descricao_Servico varchar(255) not null ,
	publicacao_Servico timestamp not null ,
	valor_Servico decimal(10,2) not null ,
	status_Servico varchar(25) not null ,
	obs_Servico varchar(255) null,
    
    constraint Fk_Id_Usuario_Servico foreign key (id_Usuario_Servico) references Usuario(id_Usuario)
);

create table ServicoLinguagem
(
	id_ServicoLinguagem int not null auto_increment primary key,
	id_Servico_ServicoLinguagem int not null ,
	id_Linguagem_ServicoLinguagem int not null ,
	status_ServicoLinguagem varchar(25) not null ,
	obs_ServicoLinguagem varchar(255) null,
    
    constraint Fk_Id_Servico_ServicoLinguagem foreign key (id_Servico_ServicoLinguagem) references Servico(id_Servico),
    constraint Fk_Id_Linguagem_ServicoLinguagem foreign key (id_Linguagem_ServicoLinguagem) references Linguagem(id_Linguagem)
);

create table Proposta
(
	id_Proposta int not null auto_increment primary key,
	id_Usuario_Proposta int not null ,
	id_Servico_Proposta int not null ,
	descricao_Proposta varchar(255) not null ,
	valor_Proposta decimal(10,2) not null ,
	celular_Proposta char(14) null ,
	email_Proposta varchar(100) null ,
	publicacao_Proposta timestamp not null ,
	status_Proposta varchar(25) not null ,
	obs_Proposta varchar(255) null,
    
    constraint Fk_Id_Usuario_Proposta foreign key (id_Usuario_Proposta) references Usuario(id_Usuario),
    constraint Fk_Id_Servico_Proposta foreign key (id_Servico_Proposta) references Servico(id_Servico)
);

create table Mensagem
(
	id_Mensagem	int	not null auto_increment	primary key,
	id_Proposta_Mensagem int not null,
	texto_Mensagem varchar(255) not null,
	registro_Mensagem timestamp not null,
	remetente_Mensagem int not null,
	arquivo_Mensagem longblob null,
	status_Mensagem	varchar(25)	not null,
	obs_Mensagem varchar(255) null,
    
    constraint Fk_Id_Proposta_Mensagem foreign key (id_Proposta_Mensagem) references Proposta(id_Proposta)
);