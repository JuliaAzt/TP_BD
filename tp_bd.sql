CREATE TABLE Classe
(
Nome_Classe        VARCHAR(15)    NOT NULL,
      CONSTRAINT PK_Class PRIMARY KEY (Nome_Classe)
);

CREATE TABLE Servico_Classe
(
Nome_Classe        VARCHAR(15)    NOT NULL,
      Servico        VARCHAR(15)    NOT NULL,
CONSTRAINT PK_servclass PRIMARY KEY (Nome_Classe, Servico)
);


CREATE TABLE Passageiros
(
    CPF        VARCHAR(20)           NOT NULL,
    Telefone    VARCHAR(11)                      ,
    Nome        VARCHAR(25)    NOT NULL,
    Endereco    VARCHAR(40)    NOT NULL,
    Data_Nasc    DATE       NOT NULL,
    Passaporte    VARCHAR(25)        NOT NULL,
    CONSTRAINT PK_Passageiro PRIMARY KEY(CPF)
);

CREATE TABLE Passagem
(
    ID            INT            NOT NULL,
    valor            FLOAT            NOT NULL,
    data_da_compra    DATE            NOT NULL,
    CPF_Passageiro    VARCHAR(20)            NOT NULL,
    Nome_Classe        VARCHAR(30)     NOT NULL,
CONSTRAINT PK_Funcionario PRIMARY KEY(ID)
);

CREATE TABLE Viagem
(
    Numero    INT            NOT NULL,
    Chegada    TIME    NOT NULL,
    Partida        TIME    NOT NULL,
    ID_Aeronave    INT            NOT NULL,
    CONSTRAINT PK_Viagem PRIMARY KEY (Numero)

);

CREATE TABLE Passeio (
    Numero_Viagem    INT    NOT NULL,
    Codigo_Aeroporto    VARCHAR(15)    NOT NULL,
    CONSTRAINT PK_passeio PRIMARY KEY (Numero_Viagem)
);

CREATE TABLE Voo
(
    Numero_Viagem        INT        NOT NULL,
    Tipo                CHAR        NOT NULL,
    Codigo_Aeroporto_Origem    VARCHAR(15)        NOT NULL,
    Codigo_Aeroporto_Destino     VARCHAR(15)        NOT NULL,
    CONSTRAINT PK_Num PRIMARY KEY (Numero_Viagem)
);

CREATE TABLE Cidade (
    ID         INT             NOT NULL,
    Nome         VARCHAR(30)   NOT NULL,
    CONSTRAINT PK_cidade PRIMARY KEY (ID)
);

CREATE TABLE Aeroporto
(
    Codigo      VARCHAR(15)    NOT NULL,
    Nome        VARCHAR(30)    NOT NULL,
    IDCidade    INT            NOT NULL,
    CONSTRAINT PK_Cod PRIMARY KEY (Codigo)
);

CREATE TABLE Funcionario
(
    CPF            VARCHAR(20)         NOT NULL,
    nome            VARCHAR(50)        NOT NULL,
    endereco        VARCHAR(50)                 ,
    salario            FLOAT                         ,
    telefone        VARCHAR(11)                     ,
    CNPJ_Empresa    VARCHAR(20)       NOT NULL,

CONSTRAINT PK_Funcionario PRIMARY KEY (CPF)
);

CREATE TABLE ComissarioDeBordo
(
    CPF_FUNC           VARCHAR(20)    NOT NULL,
    CHT                VARCHAR(20)    NOT NULL,
CONSTRAINT PK_ComissarioDeBordo PRIMARY KEY(CPF_FUNC)
);

CREATE TABLE Piloto
(
    CPF_FUNC           VARCHAR(20)       NOT NULL,
    licenca            VARCHAR(20)       NOT NULL,
CONSTRAINT PK_Piloto PRIMARY KEY(CPF_FUNC)
);



CREATE TABLE Empresa
(
    CNPJ            VARCHAR(20)           NOT NULL,
    Nome            VARCHAR(25)           NOT NULL,
    Email           VARCHAR(25)           NOT NULL,
    Endereco        VARCHAR(25)              ,
    Telefone        VARCHAR(10)              ,
CONSTRAINT PK_Funcionario PRIMARY KEY(CNPJ)

);

CREATE TABLE Tipo_Aeronave
(
    Modelo        VARCHAR(30)        NOT NULL,
    Capacidade        INT,
    CONSTRAINT PK_TipoAeronave PRIMARY KEY (Modelo)
);

CREATE TABLE Aeronave (
    ID                  INT            NOT NULL,
    Modelo_Tipo         VARCHAR(30)    NOT NULL,
    CNPJ_Empresa        VARCHAR(20)    NOT NULL,
    CONSTRAINT PK_aeronave PRIMARY KEY (ID)
);

CREATE TABLE Bagagem
(
    ID_Passagem      INT                NOT NULL,
    Numero           INT                NOT NULL,
    Categoria        VARCHAR(25)        NOT NULL,
    CONSTRAINT PK_Bagagem PRIMARY KEY (ID_Passagem, Numero)
);

CREATE TABLE Trabalha
(
    CPF_Func        VARCHAR(20)        NOT NULL,
    Num_Viagem      INT                NOT NULL,
    CONSTRAINT PK_trabalha PRIMARY KEY (CPF_Func, Num_Viagem)
);

CREATE TABLE Pilota
(
    Model_TAero       VARCHAR(30)        NOT NULL,
    CPF_Piloto        VARCHAR(20)        NOT NULL,
CONSTRAINT PK_pilota PRIMARY KEY (Model_TAero, CPF_Piloto)

);

CREATE TABLE Pass_Tem_Viag
(
    ID_Pass           INT        NOT NULL,
    Num_Viagem        INT        NOT NULL,
    CONSTRAINT PK_pass_tem_viag PRIMARY KEY (ID_Pass, Num_Viagem)
);

ALTER TABLE Servico_Classe
ADD CONSTRAINT FK_NomeClass    FOREIGN KEY (Nome_Classe) REFERENCES Classe (Nome_Classe) ON DELETE CASCADE;


ALTER TABLE Passagem
ADD CONSTRAINT FK_CPF FOREIGN KEY (CPF_Passageiro) REFERENCES  Passageiros (CPF),
ADD CONSTRAINT FK_Nome FOREIGN KEY (Nome_Classe) REFERENCES Classe (Nome_Classe);

ALTER TABLE Viagem
ADD CONSTRAINT FK_IDAer FOREIGN KEY (ID_Aeronave) REFERENCES Aeronave (ID);

ALTER TABLE Passeio
ADD CONSTRAINT fk_passeio_nviagem FOREIGN KEY (Numero_Viagem) REFERENCES Viagem (Numero) ON DELETE CASCADE,
ADD CONSTRAINT fk_passeio_cdaerop FOREIGN KEY (Codigo_Aeroporto) REFERENCES Aeroporto(Codigo);

ALTER TABLE Voo
ADD CONSTRAINT FK_Num FOREIGN KEY (Numero_Viagem) REFERENCES Viagem (Numero) ON DELETE CASCADE,
ADD CONSTRAINT FK_CodOrig FOREIGN KEY (Codigo_Aeroporto_Origem) REFERENCES Aeroporto (Codigo),
ADD CONSTRAINT FK_CodDest FOREIGN KEY (Codigo_Aeroporto_Destino) REFERENCES Aeroporto (Codigo);

ALTER TABLE Aeroporto
ADD CONSTRAINT fk_aeroporto_cidade FOREIGN KEY (IDCidade) REFERENCES Cidade (ID);

ALTER TABLE Funcionario
ADD CONSTRAINT fk_func_emp FOREIGN KEY (CNPJ_Empresa) REFERENCES Empresa (CNPJ);

ALTER TABLE ComissarioDeBordo
ADD CONSTRAINT fk_cpf_func_comissario FOREIGN KEY (CPF_FUNC)
REFERENCES Funcionario(CPF) ON DELETE CASCADE;

ALTER TABLE Piloto
ADD CONSTRAINT fk_cpf_func_piloto FOREIGN KEY (CPF_FUNC)
REFERENCES Funcionario(CPF) ON DELETE CASCADE;

ALTER TABLE Aeronave
ADD CONSTRAINT fk_aeronave_modelo_tipo FOREIGN KEY (Modelo_tipo) REFERENCES Tipo_Aeronave (Modelo),
ADD CONSTRAINT fk_aeronave_cnpj_emp FOREIGN KEY (CNPJ_empresa) REFERENCES Empresa (CNPJ);

ALTER TABLE Bagagem
ADD CONSTRAINT fk_bagagem_id_passagem FOREIGN KEY(ID_Passagem)
REFERENCES Passagem(ID) ON DELETE CASCADE;


ALTER TABLE Trabalha
ADD CONSTRAINT fk_CPF_Func FOREIGN KEY(CPF_Func) REFERENCES
Funcionario(CPF),
ADD CONSTRAINT fk_Num_Viagem FOREIGN KEY(Num_Viagem) REFERENCES Viagem(Numero);


ALTER TABLE Pilota
ADD CONSTRAINT fk_pilota_model_tipo_aeronave FOREIGN KEY(Model_TAero)
REFERENCES Tipo_Aeronave(Modelo),
ADD CONSTRAINT fk_piloto_cpf_piloto FOREIGN KEY(CPF_Piloto)
REFERENCES Piloto(CPF_FUNC) ON DELETE CASCADE;

ALTER TABLE Pass_Tem_Viag
ADD CONSTRAINT fk_ID_Pass FOREIGN KEY(ID_Pass)
REFERENCES Passagem(ID) ON DELETE CASCADE,
ADD CONSTRAINT fk_Num_Pass_Viagem FOREIGN KEY(Num_Viagem)
REFERENCES Viagem(Numero) ON DELETE CASCADE;


INSERT INTO Classe VALUES("A");
INSERT INTO Classe VALUES("B");

INSERT INTO Passageiros VALUES("147.258.369", 4002-8922, "fulano de tal", "Rua tal", 31011995, "BR123456");
INSERT INTO Passageiros VALUES("159.753.159", 36411111, "ciclano", "Rua nada", 21051986,"BR123457");
INSERT INTO Passageiros VALUES("741.236.987", 12345678, "lorem ipsum", "Rua qualquer coisa", 10061966, "BR123458");

INSERT INTO Passagem VALUES (01, 320.00, 2019-10-02, "147.258.369", "A");
INSERT INTO Passagem VALUES (02, 215.00, 2019-09-10, "159.753.159", "B");
INSERT INTO Passagem VALUES (03, 215.00, 2019-11-09, "741.236.987", "B");

INSERT INTO Empresa VALUES("123.456.789","Tabajara CIA","tabajara@gmail.com","rua tabajara 240 Ouro Preto","9666-6666");
INSERT INTO Empresa VALUES("987.654.321","ACME CIA","acme@gmail.com","rua acme 199 Ouro Preto","9123-4567");
INSERT INTO Empresa VALUES("741.852.963","Pe de Fava","pedefava@gmail.com","rua pesadelo 333 Ouro Preto","9656-5656");

INSERT INTO Cidade VALUES (28900000,"Salvador");
INSERT INTO Cidade VALUES (36800000, "Sao Paulo");
INSERT INTO Cidade VALUES (98633000, "Belo Horizonte");

INSERT INTO Tipo_Aeronave VALUES("Airbus A319",124);
INSERT INTO Tipo_Aeronave VALUES("Boeing 757", 243);
INSERT INTO Tipo_Aeronave VALUES("Boeing 747SR", 498);

INSERT INTO Aeronave VALUES(1,"Airbus A319","123.456.789");
INSERT INTO Aeronave VALUES(2,"Boeing 757", "987.654.321");
INSERT INTO Aeronave VALUES(3,"Boeing 747SR", "741.852.963");

INSERT INTO Funcionario VALUES("444.444.444","ninguem da silva","Rua das couves 159",1500.00, "4003-4897", "123.456.789");
INSERT INTO Funcionario VALUES("124.578.963","fulana de tal","Rua X 269", 3500.00, "1000-0001", "987.654.321");
INSERT INTO Funcionario VALUES("369.369.369","pessoa", "Avenida das macas 333", 1700.00, "1458-9878", "741.852.963");

INSERT INTO ComissarioDeBordo VALUES ("444.444.444","0147258369");
INSERT INTO ComissarioDeBordo VALUES ("369.369.369","0258025802");

INSERT INTO Piloto VALUES("124.578.963", "1234512345");

INSERT INTO Bagagem VALUES(01,1,"pequena");
INSERT INTO Bagagem VALUES(02,2,"grande");
INSERT INTO Bagagem VALUES(03,1,"media");

INSERT INTO Aeroporto VALUES ("EST", "ESTAGI", 28900000);
INSERT INTO Aeroporto VALUES ("GUA", "GUARULHOS", 36800000);
INSERT INTO Aeroporto VALUES ("ITA", "ITA", 98633000);

INSERT INTO Viagem VALUES (001, 10-00-00, 23-00-00, 1);
INSERT INTO Viagem VALUES (002, 11-00-00, 15-30-00, 2);
INSERT INTO Viagem VALUES (003, 11-00-00, 17-40-00, 3);

INSERT INTO VOO VALUES (002,"N", "GUA", "ITA");
INSERT INTO VOO VALUES (003,"N", "EST", "GUA");

INSERT INTO Passeio VALUES (001,"GUA");

INSERT INTO Trabalha VALUES ("444.444.444",001);
INSERT INTO Trabalha VALUES ("124.578.963",002);
INSERT INTO Trabalha VALUES ("369.369.369",003);

INSERT INTO Pilota VALUES ("Airbus A319", "124.578.963");
INSERT INTO Pilota VALUES ("Boeing 757", "124.578.963");

INSERT INTO Pass_Tem_Viag VALUES(01,001);
INSERT INTO Pass_Tem_Viag VALUES(02,002);
INSERT INTO Pass_Tem_Viag VALUES(03,003);
