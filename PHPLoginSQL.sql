-- TABLAS
CREATE TABLE cliente (
    idcliente SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    apellidos VARCHAR(100),
    dni VARCHAR(20),
    celular VARCHAR(20),
    direccion VARCHAR(200)
);

CREATE TABLE familia (
    idfamilia SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(255)
);

CREATE TABLE proveedor (
    idproveedor SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ruc VARCHAR(20) NOT NULL,
    celular VARCHAR(15),
    direccion VARCHAR(150)
);

CREATE TABLE categoria (
    idcategoria SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    idfamilia INT NOT NULL,
    CONSTRAINT fk_familia FOREIGN KEY (idfamilia) REFERENCES familia(idfamilia)
);

CREATE TABLE producto (
    idproducto SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio NUMERIC(10, 2),
    stock INT,
    idcategoria INT REFERENCES categoria(idcategoria),
    idproveedor INT REFERENCES proveedor(idproveedor)
);

-- FUNCIONES CLIENTE
CREATE OR REPLACE FUNCTION sp_insertar_cliente(
    _nombre VARCHAR, _apellidos VARCHAR, _dni VARCHAR,
    _celular VARCHAR, _direccion VARCHAR
)
RETURNS VOID AS $$
BEGIN
    INSERT INTO cliente(nombre, apellidos, dni, celular, direccion)
    VALUES (_nombre, _apellidos, _dni, _celular, _direccion);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_listar_clientes()
RETURNS TABLE (
    idcliente INT,
    nombre VARCHAR,
    apellidos VARCHAR,
    dni VARCHAR,
    celular VARCHAR,
    direccion VARCHAR
) AS $$
BEGIN
    RETURN QUERY SELECT * FROM cliente;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_actualizar_cliente(
    _id INT, _nombre VARCHAR, _apellidos VARCHAR, _dni VARCHAR,
    _celular VARCHAR, _direccion VARCHAR
)
RETURNS VOID AS $$
BEGIN
    UPDATE cliente SET
        nombre = _nombre,
        apellidos = _apellidos,
        dni = _dni,
        celular = _celular,
        direccion = _direccion
    WHERE idcliente = _id;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_eliminar_cliente(_id INT)
RETURNS VOID AS $$
BEGIN
    DELETE FROM cliente WHERE idcliente = _id;
END;
$$ LANGUAGE plpgsql;

-- FUNCIONES FAMILIA
CREATE OR REPLACE FUNCTION sp_insertar_familia(_nombre VARCHAR, _descripcion VARCHAR)
RETURNS VOID AS $$
BEGIN
    INSERT INTO familia (nombre, descripcion) VALUES (_nombre, _descripcion);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_listar_familia()
RETURNS TABLE(idfamilia INT, nombre VARCHAR, descripcion VARCHAR) AS $$
BEGIN
    RETURN QUERY SELECT * FROM familia ORDER BY idfamilia;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_actualizar_familia(_id INT, _nombre VARCHAR, _descripcion VARCHAR)
RETURNS VOID AS $$
BEGIN
    UPDATE familia SET nombre = _nombre, descripcion = _descripcion WHERE idfamilia = _id;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_eliminar_familia(_id INT)
RETURNS VOID AS $$
BEGIN
    DELETE FROM familia WHERE idfamilia = _id;
END;
$$ LANGUAGE plpgsql;

-- FUNCIONES PROVEEDOR
CREATE OR REPLACE FUNCTION sp_insertar_proveedor(
    p_nombre VARCHAR,
    p_ruc VARCHAR,
    p_celular VARCHAR,
    p_direccion VARCHAR
) RETURNS VOID AS $$
BEGIN
    INSERT INTO proveedor(nombre, ruc, celular, direccion)
    VALUES (p_nombre, p_ruc, p_celular, p_direccion);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_listar_proveedores()
RETURNS TABLE(
    idproveedor INT,
    nombre VARCHAR,
    ruc VARCHAR,
    celular VARCHAR,
    direccion VARCHAR
) AS $$
BEGIN
    RETURN QUERY SELECT * FROM proveedor;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_actualizar_proveedor(
    p_id INT,
    p_nombre VARCHAR,
    p_ruc VARCHAR,
    p_celular VARCHAR,
    p_direccion VARCHAR
) RETURNS VOID AS $$
BEGIN
    UPDATE proveedor
    SET nombre = p_nombre,
        ruc = p_ruc,
        celular = p_celular,
        direccion = p_direccion
    WHERE idproveedor = p_id;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_eliminar_proveedor(p_id INT)
RETURNS VOID AS $$
BEGIN
    DELETE FROM proveedor WHERE idproveedor = p_id;
END;
$$ LANGUAGE plpgsql;

-- FUNCIONES CATEGORIA
CREATE OR REPLACE FUNCTION sp_insertar_categoria(p_nombre VARCHAR, p_idfamilia INT)
RETURNS VOID AS $$
BEGIN
    INSERT INTO categoria(nombre, idfamilia) VALUES (p_nombre, p_idfamilia);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_listar_categoria()
RETURNS TABLE (idcategoria INT, nombre VARCHAR, idfamilia INT) AS $$
BEGIN
    RETURN QUERY 
    SELECT c.idcategoria, c.nombre, c.idfamilia 
    FROM categoria c 
    ORDER BY c.idcategoria;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_actualizar_categoria(p_idcategoria INT, p_nombre VARCHAR, p_idfamilia INT)
RETURNS VOID AS $$
BEGIN
    UPDATE categoria SET nombre = p_nombre, idfamilia = p_idfamilia WHERE idcategoria = p_idcategoria;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_eliminar_categoria(p_idcategoria INT)
RETURNS VOID AS $$
BEGIN
    DELETE FROM categoria WHERE idcategoria = p_idcategoria;
END;
$$ LANGUAGE plpgsql;

-- FUNCIONES PRODUCTO
CREATE OR REPLACE FUNCTION sp_insertar_producto(
    p_nombre VARCHAR,
    p_descripcion TEXT,
    p_precio NUMERIC,
    p_stock INT,
    p_idcategoria INT,
    p_idproveedor INT
)
RETURNS VOID AS $$
BEGIN
    INSERT INTO producto(nombre, descripcion, precio, stock, idcategoria, idproveedor)
    VALUES (p_nombre, p_descripcion, p_precio, p_stock, p_idcategoria, p_idproveedor);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_listar_producto()
RETURNS TABLE (
    idproducto INT,
    nombre VARCHAR,
    descripcion TEXT,
    precio NUMERIC,
    stock INT,
    idcategoria INT,
    idproveedor INT
) AS $$
BEGIN
    RETURN QUERY SELECT * FROM producto;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_actualizar_producto(
    p_idproducto INT,
    p_nombre VARCHAR,
    p_descripcion TEXT,
    p_precio NUMERIC,
    p_stock INT,
    p_idcategoria INT,
    p_idproveedor INT
)
RETURNS VOID AS $$
BEGIN
    UPDATE producto SET 
        nombre = p_nombre,
        descripcion = p_descripcion,
        precio = p_precio,
        stock = p_stock,
        idcategoria = p_idcategoria,
        idproveedor = p_idproveedor
    WHERE idproducto = p_idproducto;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_eliminar_producto(p_idproducto INT)
RETURNS VOID AS $$
BEGIN
    DELETE FROM producto WHERE idproducto = p_idproducto;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION buscar_producto(p_idproducto INT)
RETURNS TABLE (
    idproducto INT,
    nombre VARCHAR,
    descripcion TEXT,
    precio NUMERIC,
    stock INT,
    idcategoria INT,
    idproveedor INT
) AS $$
BEGIN
    RETURN QUERY SELECT * FROM producto WHERE idproducto = p_idproducto;
END;
$$ LANGUAGE plpgsql;
