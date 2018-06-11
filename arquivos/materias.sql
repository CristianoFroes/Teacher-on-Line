-- Estrutura da tabela `alternativa`
--
CREATE TABLE `alternativa` (
  `cod_alternativa` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `alternativas` varchar(50) NOT NULL,
  `correta` tinyint(1) NOT NULL
);

-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `cod_aluno` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome_aluno` varchar(100) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `data_nascimento` varchar(10) DEFAULT NULL,
  `registro` varchar(10) NOT NULL,
  `data_matricula` varchar(10) DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `cod_rst` int(11) DEFAULT NULL
);

-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome_curso` varchar(50) DEFAULT NULL
);

-- Estrutura da tabela `cursomateria`
--

CREATE TABLE `cursomateria` (
  `cod_materia` int(11) DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL
);

-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `cod_materia` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome_materia` varchar(50) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL
);

-- Estrutura da tabela `materiaprova`
--

CREATE TABLE `materiaprova` (
  `cod_materia` int(11) DEFAULT NULL,
  `cod_prova` int(11) DEFAULT NULL
);

-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `cod_questoes` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `curso` varchar(50) DEFAULT NULL,
  `materia` varchar(50) NOT NULL,
  `questao` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` varchar(10) DEFAULT NULL
);

-- Estrutura da tabela `questoesalternativa`
--

CREATE TABLE `questoesalternativa` (
  `cod_questoes` int(11) DEFAULT NULL,
  `cod_alternativa` int(11) DEFAULT NULL
);

-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(8) DEFAULT NULL
);

-- Indexes for table `cursomateria`
--
ALTER TABLE `cursomateria`
  ADD KEY `cod_materia` (`cod_materia`),
  ADD KEY `cod_curso` (`cod_curso`);

-- Indexes for table `materiaprova`
--
ALTER TABLE `materiaprova`
  ADD KEY `cod_materia` (`cod_materia`),
  ADD KEY `cod_prova` (`cod_prova`);

-- Indexes for table `questoesalternativa`
--
ALTER TABLE `questoesalternativa`
  ADD KEY `cod_questoes` (`cod_questoes`),
  ADD KEY `cod_alternativa` (`cod_alternativa`);

-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_FK` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);

-- Limitadores para a tabela `cursomateria`
--
ALTER TABLE `cursomateria`
  ADD CONSTRAINT `cursomateria_FK1` FOREIGN KEY (`cod_materia`) REFERENCES `materia` (`cod_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `cursomateria_FK2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`) ON DELETE CASCADE;

-- Limitadores para a tabela `questoesalternativa`
--
ALTER TABLE `questoesalternativa`
  ADD CONSTRAINT `questoesalternativa_FK1` FOREIGN KEY (`cod_questoes`) REFERENCES `questoes` (`cod_questoes`) ON DELETE CASCADE,
  ADD CONSTRAINT `questoesalternativa_FK2` FOREIGN KEY (`cod_alternativa`) REFERENCES `alternativa` (`cod_alternativa`) ON DELETE CASCADE;