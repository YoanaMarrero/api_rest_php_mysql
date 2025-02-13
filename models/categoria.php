<?php 

class Categoria extends Conectar{

    public function get_categoria() {
        $conectar = parent::conexion();
        parent::set_name();

        $sql = 'SELECT * FROM tm_categoria WHERE estado = 1';
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($cat_id) {
        $conectar = parent::conexion();
        parent::set_name();

        $sql = 'SELECT * FROM tm_categoria WHERE cat_id=?';
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_categoria($cat_name, $cat_obs){
        $conectar = parent::conexion();
        parent::set_name();

        $sql = 'INSERT INTO tm_categoria (cat_name, cat_obs, estado) VALUES (?,?,1)';
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_name);
        $sql->bindValue(2, $cat_obs);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update_categoria($cat_id, $cat_name, $cat_obs){
        $conectar = parent::conexion();
        parent::set_name();

        $sql = 'UPDATE tm_categoria set cat_name=?, cat_obs=? WHERE cat_id=?';
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_name);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($cat_id){
        $conectar = parent::conexion();
        parent::set_name();

        $sql = 'UPDATE tm_categoria set estado=0 WHERE cat_id=?';
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}