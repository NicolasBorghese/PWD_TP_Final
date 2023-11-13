SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: 'bdcarritocompras'
--
CREATE DATABASE bdcarritocompras;
USE bdcarritocompras;

--
-- Estructura de tabla para la tabla 'compra'
--
CREATE TABLE compra (
  'idcompra' bigint(20) NOT NULL,
  'cofecha' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  'idusuario' bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Poblamiento de datos de la tabla 'compra' //cambiar los id compra y usuario
INSERT INTO compra (idcompra, cofecha, idusuario) VALUES
(1, '2021-11-19 02:43:15', 1),
(2, '2021-11-19 02:45:20', 1),
(3, '2021-11-19 02:53:10', 1),
(4, '2021-11-19 02:54:14', 1);

--
-- Estructura de tabla para la tabla 'compraestado'
--
CREATE TABLE compraestado (
  'idcompraestado' bigint(20) UNSIGNED NOT NULL,
  'idcompra' bigint(11) NOT NULL,
  'idcompraestadotipo' int(11) NOT NULL,
  'cefechaini' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  'cefechafin' timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Poblamiento de datos para la tabla 'compraestado' //cambiar los id de compraestado, compra y compraestadotipo
INSERT INTO compraestado (idcompraestado, idcompra, idcompraestadotipo, cefechaini, cefechafin) VALUES
(1, 1, 1, '2021-11-19 02:43:16', '2021-11-19 06:45:09'),
(2, 2, 2, '2021-11-19 02:45:21', '2021-11-19 06:52:46'),
(3, 3, 3, '2021-11-19 02:53:12', '2021-11-19 06:53:16'),
(4, 4, 4, '2021-11-19 02:54:15', '2021-11-19 06:54:18');

--
-- Estructura de tabla para la tabla 'compraestadotipo'
--
CREATE TABLE compraestadotipo (
  'idcompraestadotipo' int(11) NOT NULL,
  'cetdescripcion' varchar(50) NOT NULL,
  'cetdetalle' varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Poblamiento de datos para la tabla 'compraestadotipo'
--
INSERT INTO compraestadotipo (idcompraestadotipo, cetdescripcion, cetdetalle) VALUES
(1, 'iniciada', 'cuando el usuario : cliente inicia la compra de uno o mas productos del carrito'),
(2, 'aceptada', 'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 '),
(3, 'enviada', 'cuando el usuario administrador envia a uno de las compras en estado =2 '),
(4, 'cancelada', 'un usuario administrador podra cancelar una compra en cualquier estado y un usuario cliente solo en estado=1 ');

--
-- Estructura de tabla para la tabla 'compraitem'
--
CREATE TABLE compraitem (
  'idcompraitem' bigint(20) UNSIGNED NOT NULL,
  'idproducto' bigint(20) NOT NULL,
  'idcompra' bigint(20) NOT NULL,
  'cicantidad' int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Poblamiento de datos para la tabla 'compraitem' // cambiar los idproducto
INSERT INTO compraitem (idcompraitem, idproducto, idcompra, cicantidad) VALUES
(1, 123, 1, 1),
(2, 234, 2, 1),
(3, 345, 3, 1),
(4, 456, 4, 1);

--
-- Estructura de tabla para la tabla 'menu'
--
CREATE TABLE menu (
  'idmenu' bigint(20) NOT NULL,
  'menombre' varchar(50) NOT NULL COMMENT 'Nombre del item del menu',
  'medescripcion' varchar(124) NOT NULL COMMENT 'Descripcion mas detallada del item del menu',
  'idpadre' bigint(20) DEFAULT NULL COMMENT 'Referencia al id del menu que es subitem',
  'medeshabilitado' timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en la que el menu fue deshabilitado por ultima vez'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Poblamiento de datos para la tabla 'menu'
INSERT INTO menu (idmenu, menombre, medescripcion, idpadre, medeshabilitado) VALUES
(1, 'MenuPublico', '#', NULL, NULL),
(2, 'Home', 'home', 1, NULL),
(3, 'Iniciar Sesion', 'inicarSesion', 1, NULL),
(4, 'Registrarse', 'registrar', 1, NULL),
(5, 'Cliente', '#', NULL, NULL),
(6, 'Cambiar E-Mail','cambioEmail',5,NULL ),
(7, 'Cambiar Contraseña', 'cambioContrasenia', 5, NULL),
(8, 'Administrar Compras', 'compras', 5, NULL),
(9, 'Deposito','#',NULL,NULL),
(10,'Crear Producto', 'agregarProducto',9,NULL),
(11,'Administrar Productos', 'administrarProductos',9, NULL),
(12,'Administrar Compras', 'administrarCompras',9,NULL),
(13, 'Administrador', '#', NULL,NULL),
(14, 'Crear Usuario', 'crearUsuario',13,NULL), -- Habilita un usuario nuevo
(15, 'Administrar Usuarios', 'administrarUsuarios',13,NULL), -- asigna los roles correspondientes y actualiza la información que se requiera.
(16,'Crear Menu', 'crearMenu', 13, NULL), -- crea un rol con su respectivo menu
(17, 'Administrar Menu', 'administrarMenu',13,NULL); -- los gestiona

--
-- Estructura de tabla para la tabla 'menurol'
--
CREATE TABLE menurol (
  'idmenu' bigint(20) NOT NULL,
  'idrol' bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcado de datos para la tabla menurol
INSERT INTO menurol (idmenu, idrol) VALUES
(13, 1), -- Admin
(9, 2), -- Deposito
(5, 3); -- Cliente

--
-- Estructura de tabla para la tabla 'producto'
--
CREATE TABLE producto (
  'idproducto' bigint(20) NOT NULL,
  'pronombre' varchar(250) NOT NULL,
  'prodetalle' varchar(512) NOT NULL,
  'procantstock' int(11) NOT NULL,
  'tipo' varchar(20) NOT NULL,
  'imagenproducto' varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Poblamiento de datos para la tabla producto
INSERT INTO `producto` (`idproducto`,`pronombre`,`prodetalle`,`procantstock`,`tipo`,`imagenproducto`) VALUES
(01,'Mate Termico Argentina','4900', 10,"Mates","../../Archivos/Foto/mates/mate1.png"),
(02,'Mate Pampa Negro Afa','17999', 10,"Mates","../../Archivos/Foto/mates/mate2.png"),
(03,'Mate De Madera Imperial','19800', 10,"Mates","../../Archivos/Foto/mates/mate3.png"),
/*yerbas*/
(04,'Yerba Mate De Campo La Merced','1665', 100,"Yerbas","../../Archivos/Foto/yerbas/yerba1.png"),
(05,'Yerba mate Canarias sabor tradicional','4222', 100,"Yerbas","../../Archivos/Foto/yerbas/yerba2.png"),
(06,'Yerba Mate Grapia Milenaria','2700', 100,"Yerbas","../../Archivos/Foto/yerbas/yerba3.png"),
/*bombillas*/
(08,'Bombilla Mate Pico De Loro Uruguaya Gruesa Original','3.299', 110,"Bombillas","../../Archivos/Foto/bombillas/bombilla1.png"),
(09,'Bombilla Acero Inoxidable - Un Mate No Se Tapa','3.997', 110,"Bombillas","../../Archivos/Foto/bombillas/bombilla2.png"),
(10,'Bombillon Torneado De Acero Inoxidable','7.600', 80,"Bombillas","../../Archivos/Foto/bombillas/bombilla3.png"),
/*termoss*/
(11,'Termo Kushiro 1200ml Manija Y Pico Cebador 24hs Doble Capa Color Gris','22.499', 50,"Termos","../../Archivos/Foto/termos/Termo1.png"),
(12,'Termo Stanley Original Mate System Classic 1.2 Litros','95.863', 50,"Termos","../../Archivos/Foto/termos/Termo2.png"),
(13,'Termo Acero Inoxidable Discovery Antiderrame 500 Ml Color Azul','12.900', 60,"Termos","../../Archivos/Foto/termos/Termo3.png"),
/*Sets*/
(14,'Set Matero Completo Termo Stanley Mate Calabaza Y Cuero','180.199', 100,"SETS","../../Archivos/Foto/sets/set1.png"),
(15,'Set Matero Canasta + Mate + Bombilla + Yerbero + Azucarero','18.242', 100,"SETS","../../Archivos/Foto/sets/set2.png"),
(16,'Set Matero Mate Térmico Acero Inox Sumate Latas Y Canasta','12.927', 100,"SETS","../../Archivos/Foto/sets/set3.png")
;

--
-- Estructura de tabla para la tabla 'rol'
--
CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `rodescripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcado de datos para la tabla rol
INSERT INTO `rol` (`idrol`, `rodescripcion`) VALUES
(1, 'Admin'),
(2, 'Deposito'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` bigint(20) NOT NULL,
  `usnombre` varchar(50) NOT NULL,
  `uspass` varchar(50) NOT NULL,
  `usmail` varchar(50) NOT NULL,
  `usdeshabilitado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcado de doatos par la tabla usuario

INSERT INTO `usuario` (`idusuario`, `usnombre`,`uspass`,`usmail`, `usdeshabilitado`) VALUES
('1', 'Moya', '81dc9bdb52d04dc20036dbd8313ed055', 'moya@gmail.com', 'NULL'),-- 1234
('2', 'Farias', '81b073de9370ea873f548e31b8adc081', 'farias@gmail.com', 'NULL'),-- 2345
('3', 'Lopez', 'def7924e3199be5e18060bb3e1d547a7', 'lopez@gmail.com', 'NULL'),-- 3456
('4', 'Ramirez', '6562c5c1f33db6e05a082a88cddab5ea', 'ramirez@gmail.com', 'NULL');-- 4567

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--
INSERT INTO `usuariorol` (`idusuario`, `idrol`) VALUES
(1,1), -- Admin
(2,2), -- Deposito
(3,3), -- Cliente
(4,3); -- Cliente
--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD UNIQUE KEY `idcompra` (`idcompra`),
  ADD KEY `fkcompra_1` (`idusuario`);
  

--
-- Indices de la tabla `compraestado`
--
ALTER TABLE `compraestado`
  ADD PRIMARY KEY (`idcompraestado`),
  ADD UNIQUE KEY `idcompraestado` (`idcompraestado`),
  ADD KEY `fkcompraestado_1` (`idcompra`),
  ADD KEY `fkcompraestado_2` (`idcompraestadotipo`);

--
-- Indices de la tabla `compraestadotipo`
--
ALTER TABLE `compraestadotipo`
  ADD PRIMARY KEY (`idcompraestadotipo`);

--
-- Indices de la tabla `compraitem`
--
ALTER TABLE `compraitem`
  ADD PRIMARY KEY (`idcompraitem`),
  ADD UNIQUE KEY `idcompraitem` (`idcompraitem`),
  ADD KEY `fkcompraitem_1` (`idcompra`),
  ADD KEY `fkcompraitem_2` (`idproducto`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`),
  ADD UNIQUE KEY `idmenu` (`idmenu`),
  ADD KEY `fkmenu_1` (`idpadre`);

--
-- Indices de la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD PRIMARY KEY (`idmenu`,`idrol`),
  ADD KEY `fkmenurol_2` (`idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD UNIQUE KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `idrol` (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`idusuario`,`idrol`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compraestado`
--
ALTER TABLE `compraestado`
  MODIFY `idcompraestado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compraitem`
--
ALTER TABLE `compraitem`
  MODIFY `idcompraitem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fkcompra_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraestado`
--
ALTER TABLE `compraestado`
  ADD CONSTRAINT `fkcompraestado_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraestado_2` FOREIGN KEY (`idcompraestadotipo`) REFERENCES `compraestadotipo` (`idcompraestadotipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraitem`
--
ALTER TABLE `compraitem`
  ADD CONSTRAINT `fkcompraitem_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraitem_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fkmenu_1` FOREIGN KEY (`idpadre`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD CONSTRAINT `fkmenurol_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmenurol_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `fkmovimiento_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
