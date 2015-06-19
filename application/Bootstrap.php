<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView(){//Работа с layout

        $this->bootstrap('layout'); // Загружаем layout в bootstrap.php
        $layout = $this->getResource('layout'); // Достаем layout
        $view = $layout->getView();

        $view->doctype('XHTML1_TRANSITIONAL');
        $view->headTitle('Zend Framework')
                    ->setSeparator(' - ');

        $view->headMeta()->appendHttpEquiv('Content-type','text/html;charset-utf8') // Мета Теги
                            ->appendName('author','bloodrain777');


        /**
         * Подключение стилей
         * appendStylesheet - 1 аргумент: путь к файлу от каталога public
         * appendStylesheet - 2й : устройства для которых подключается css
         */

        $view->headLink()->appendStylesheet('/css/blueprint/screen.css','screen,projection')
                         ->appendStylesheet('/css/blueprint/print.css','print')
                         ->appendStylesheet('/css/blueprint/ie.css','screen,projection','ie');

        /**********************/


        $view->headScript()->appendFile('/js/jquery-1.11.3.min.js'); // Подключаем jQuery

        $view->headLink(array(
                'href' => 'favicon.png',
                'rel'   => 'icon'


        ));
    }

}

