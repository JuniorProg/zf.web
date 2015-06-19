<?php

class Application_Model_DbTable_Posts extends Zend_Db_Table_Abstract
{

    protected $_name = 'posts'; // Имя таблицы

    public function getSqlSafe(){ // Метод для безопасного SQL запроса

        $query = $this->select()
                        ->from($this->_name/*,array('text')*/);// Достаем только text
                       // ->where('id = ?',1) // Защита от OR a=a
                       // ->orwhere('id = ?',2)
                       // ->order('text DESC');
        return $this->fetchAll($query)->toArray();
    }

    public function countPosts(){ // метод для работы с фун-ями COUNT, MIN, MAX и тд
        $query = $this->select()
                    ->from($this->_name,'COUNT(id) as number');


        return $this->fetchRow($query)->number; //достаем значение по алиасу number
    }

    // Объединение таблиц mysql

    public  function joinTables(){

        $query = $this->select()
                    ->setIntegrityCheck(false)
                    ->from(array('p' => 'posts')) // Объявляем алиасы, теперь нужно вместо posts писать p,
                    //вторым аргументом ->from можно передавать поля которые мы хотим получить array('p.text')

                // метод join - это Inner Join выбирает только те строки у которых есть соединения
                    ->join(array('c' => 'comments'),// Объявляем алиасы, теперь нужно вместо comments писать c
                                'p.id = c.post_id', // id из таблицы posts равен posts_id из таблицы comments
                                array('c.id AS comment_id','c.comment','c.post_id') // Перечисляем поля которые хотим вытащить
                             );

        return $this->fetchAll($query)->toArray();

    }

    //Вставка данных в БД
    public function insertNewPost($data){
        $this->insert($data);

        return $this->getDefaultAdapter()->lastInsertId(); // Сразу же получаем id последней записи


    }

    //Обновление данных в БД

    public function updatePostById($data,$id){

        $where = $this->getDefaultAdapter()->quoteInto('id = ?', $id); // Защищаемся от иньекций

        $this->update($data,$where);
        //$where .= " AND ";
       //$where .= $this->getDefaultAdapter()->quoteInto('active = ?', 1); // Защищаемся от иньекций


    }

    // Удаление данных из БД

    public  function deletePost($id){
        $where = $this->getDefaultAdapter()->quoteInto('id = ?', $id); // Защищаемся от иньекций

        $this->delete($where);



    }

    //Метод для собственных запросов, к примеру добавим новое поле.
    //Метод query() используется только при изменении структуры таблицы-+

    public function myQuery(){
        $this->getDefaultAdapter()->query("ALTER TABLE posts ADD date TIMESTAMP");
    }
}

