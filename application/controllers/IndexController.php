<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * fetchAll(WHERE,ORDER BY, LIMIT, START) - выбирает все записи из таблицы, аргументы не обязательны
     * toArray() - возвращает записи в виде ассоциативного массива
     * find() - выбираем запись по id
     */
    public function indexAction()
    {
        $postsmodel = new Application_Model_DbTable_Posts(); // Объект для работы с бд
        //$data = $postsmodel->fetchAll()->toArray(); // Выбираем все записи из таблицы
        //$data = $postsmodel->find(3)->toArray(); // Выбираем запись по id
        //$data = $postsmodel->fetchAll('id = 1 OR id = 3')->toArray(); // Выборка значений с условиями
        //$data = $postsmodel->fetchAll(null, 'text DESC')->toArray(); // Сортировка значений по полю text в обратном порядке
        //$data = $postsmodel->fetchAll(null,null,3)->toArray(); // Выбор 3 записей
        //$data = $postsmodel->fetchAll(null,null,null,2)->toArray(); // Выбор записей начиная с 3
        //$this->view->posts = $data; // Опасный запрос
       // $this->view->posts = $postsmodel->getSqlSafe(); // Безопасный запрос
       // $this->view->posts = $postsmodel->countPosts(); // Запрос с COUNT

       /* Вставка данных
          $newPost = array(
               'text' => 'New Lorem',
              );

            $lastId = $postsmodel->insertNewPost($newPost);
            $this->view->lastId = $lastId;

            $this->view->posts = $postsmodel->joinTables(); // Запрос с COUNT
*/

        /* Обновление данный БД
            $updatePost = array('text' => 'updated NEW NEW Lorem Ipsum');
            $postsmodel->updatePostById($updatePost,2);
        */

        // Удаление данных
       // $postsmodel->deletePost(2);
       // $postsmodel->myQuery();

    }




}

